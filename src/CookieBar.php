<?php declare(strict_types=1);

use GeneralForm\ITemplatePath;
use Nette\Application\UI\Control;
use Nette\Localization\ITranslator;


/**
 * Class CookieBar
 *
 * @author  geniv, MartinFugess
 */
class CookieBar extends Control implements ITemplatePath
{
    /** @var ITranslator */
    private $translator = null;
    /** @var string template path */
    private $templatePath;
    /** @var string */
    private $cookieName = 'cookie-bar';
    /** @var string */
    private $cookieExpire = '+10 years';
    /** @var int */
    private $showBlock = 0;


    /**
     * CookieBar constructor.
     *
     * @param ITranslator|null $translator
     */
    public function __construct(ITranslator $translator = null)
    {
        parent::__construct();

        $this->translator = $translator;

        $this->templatePath = __DIR__ . '/CookieBar.latte';  // implicit path
    }


    /**
     * Set template path.
     *
     * @param string $path
     */
    public function setTemplatePath(string $path)
    {
        $this->templatePath = $path;
    }


    /**
     * Set cookie name.
     *
     * @param $name
     * @return $this
     */
    public function setCookieName($name)
    {
        $this->cookieName = $name;
        return $this;
    }


    /**
     * Set cookie expire.
     *
     * @param $time
     * @return $this
     */
    public function setCookieExpire($time)
    {
        $this->cookieExpire = $time;
        return $this;
    }


    /**
     * Handle hide block.
     *
     * @throws \Nette\Application\AbortException
     */
    public function handleHideBlock()
    {
        $this->presenter->getHttpResponse()->setCookie($this->cookieName, 1, $this->cookieExpire);
        $this->showBlock = 1;

        if ($this->presenter->isAjax()) {
            $this->redrawControl('snippetBlock');
        } else {
            $this->redirect('this');
        }
    }


    /**
     * Render.
     */
    public function render()
    {
        $template = $this->getTemplate();
        $template->showBlock = $this->presenter->getHttpRequest()->getCookie($this->cookieName, $this->showBlock);

        $template->setTranslator($this->translator);
        $template->setFile($this->templatePath);
        $template->render();
    }
}

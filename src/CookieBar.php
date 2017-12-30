<?php

use Nette\Application\UI\Control;
use Nette\Localization\ITranslator;


/**
 * Class CookieBar
 *
 * @author  geniv
 */
class CookieBar extends Control
{
    /** @var ITranslator */
    private $translator = null;
    /** @var string template path */
    private $templatePath;
    /** @var string style path */
    private $stylePath;
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
        $this->stylePath = __DIR__ . '/CookieBar.scss'; // implicit path
    }


    /**
     * Set template path.
     *
     * @param $path
     * @return $this
     */
    public function setTemplatePath($path)
    {
        $this->templatePath = $path;
        return $this;
    }


    /**
     * Set style path.
     *
     * @param $path
     * @return $this
     */
    public function setStylePath($path)
    {
        $this->stylePath = $path;
        return $this;
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

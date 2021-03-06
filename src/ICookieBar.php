<?php declare(strict_types=1);

use GeneralForm\ITemplatePath;


/**
 * Interface ICookieBar
 *
 * @author  geniv
 */
interface ICookieBar extends ITemplatePath
{

    /**
     * Set cookie name.
     *
     * @param string $name
     */
    public function setCookieName(string $name);


    /**
     * Set cookie expire.
     *
     * @param string $time
     */
    public function setCookieExpire(string $time);


    /**
     * Handle hide block.
     */
    public function handleHideBlock();
}

Nette cookie bar
================

via: https://phpfashion.com/jak-na-souhlas-s-cookie-ve-zkurvene-eu

Installation
------------
```sh
$ composer require geniv/nette-cookie-bar
```
or
```json
"geniv/nette-cookie-bar": ">=1.0.0"
```

require:
```json
"php": ">=5.6.0",
"nette/nette": ">=2.4.0"
```

Include in application
----------------------
neon configure:
```neon
services:
    - CookieBar
```

usage:
```php
protected function createComponentCookieBar(CookieBar $cookieBar): CookieBar
{
    //$cookieBar->setTemplatePath();
    //$cookieBar->setCookieName();
    //$cookieBar->setCookieExpire();
    return $cookieBar;
}
```

usage:
```latte
{control cookieBar}
```

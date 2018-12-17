Cookie bar
==========

via: 
- https://phpfashion.com/jak-na-souhlas-s-cookie-v-eu
- http://www.cookiechoices.org/

Installation
------------
```sh
$ composer require geniv/nette-cookie-bar
```
or
```json
"geniv/nette-cookie-bar": "^2.0"
```

require:
```json
"php": ">=7.0",
"nette/nette": ">=2.4",
"geniv/nette-general-form": ">=1.0"
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
protected function createComponentCookieBar(ICookieBar $cookieBar): ICookieBar
{
    //$cookieBar->setTemplatePath(__DIR__ . '/templates/cookieBar.latte');
    $cookieBar->setCookieName('nette-web-cookie-bar');
    //$cookieBar->setCookieExpire('+10 years');
    return $cookieBar;
}
```

usage (before `</body>`):
```latte
{control cookieBar}
```

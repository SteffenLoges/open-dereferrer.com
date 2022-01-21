<?php

use OpenDereferrer\Config;
use OpenDereferrer\URL;

class OpenDereferrer
{

    public static function init()
    {
        spl_autoload_register('\OpenDereferrer::autoloader');

        $redirectTo = isset($_SERVER['REQUEST_URI']) ? urldecode(ltrim(ltrim($_SERVER['REQUEST_URI'], '/'), '?')) : null;

        // Handle thank-you page for donations
        if ($redirectTo == 'thank-you') {
            self::render('thankYou');
            return;
        }

        // Handle redirects
        if ($redirectTo) {
            $url = new URL($redirectTo);
            if (!$url->isValid()) {
                self::render('index', ['invalidURLWarning' => true]);
                return;
            }

            if (Config::i()->get('NOSPLASH_SUBDOMAIN') && str_starts_with($_SERVER['HTTP_HOST'], Config::i()->get('NOSPLASH_SUBDOMAIN') . '.')) {
                header('Location: ' . htmlspecialchars($url->getFullURL()));
                exit;
            }

            self::render('redirect', [
                'redirectTo' => $url->getFullURL(),
                'redirectHost' => $url->getHost(),
            ]);
            return;
        }

        // Handle form submission
        if (isset($_POST['url']) && $_POST['url'] != '') {
            $url = new URL($_POST['url']);
            if (!$url->isValid()) {
                self::render('index', ['invalidURLWarning' => true]);
                return;
            }

            self::render('index', [
                'modal_show' => true,
                'modal_fullURL' => Config::i()->get('SITE_URL') . '/' . urlencode($url->getFullURL()),
                'modal_base64URL' => Config::i()->get('SITE_URL') . '/' . urlencode($url->encodeBase64()),
                'modal_host' => $url->getHost(),
            ]);
            return;
        }

        self::render('index');
    }

    public static function autoloader($class)
    {
        $e = explode('\\', $class);

        // remove namespace from class name
        array_shift($e);

        $path = __DIR__ . '/' . implode('/', $e) . '.class.php';
        if (!file_exists($path)) {
            throw new \Exception("Class $class not found in $path");
        }

        require_once $path;
    }

    protected static function render($template, $data = [])
    {
        extract($data);
        ob_start('ob_gzhandler');
        require ROOT_DIR . '/templates/' . $template . '.tpl.php';
        echo ob_get_clean();
    }

}
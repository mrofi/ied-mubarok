<?php

use Spatie\Browsershot\Browsershot;

require_once __DIR__.'/../vendor/autoload.php';

class Browser extends Browsershot
{
    public function base64Screenshot(): string
    {
        $command = $this->createScreenshotCommand();
        $encoded_image = $this->callBrowser($command);

        return $encoded_image;
    }
}

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

$author = $_REQUEST['author'] ?? null;
$url = $_SERVER['HTTP_HOST'].'/screen.php'.($author ? '?author='.$author : '');

$browser = Browser::url($url);

try {
    $browser
        ->noSandbox()
        ->waitUntilNetworkIdle(true)
        ->windowSize(568, 320)
        ->landscape()
        ->hideBrowserHeaderAndFooter();

    if ($_REQUEST['base64'] ?? false) {
        die('data:image/png;base64,'.$browser->base64Screenshot());
    }

    header("Cache-Control: public");
    header("Content-Type: image/png");
    header("Content-Transfer-Encoding: binary");
    echo $browser->screenshot();
    die();
} catch (\Exception $e) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    die('500 Internal Server Error');
}



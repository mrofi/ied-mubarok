<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ied Mubarok Card</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.0.3/styles/monokai-sublime.min.css">
</head>
<body style="background: #23241f;">
<?php

$author = $_REQUEST['author'] ?? false;
$username = $_REQUEST['username'] ?? false;
$message = 'Selamat Idul Fitri';
$alt = 'Mohon Maaf Lahir Batin';

$url = str_replace(basename(__FILE__), '', $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$text = '';

$text .= !$author ? '' : <<<HTML
    "author": "{$author}",
\n
HTML;

$text .= !$username ? '' : <<<HTML
    "username": "{$username}",
\n
HTML;

$text .= <<<HTML
    "message": "{$message}",

    "alt": "{$alt}",

    "timestamp": "1 Syawal 1441 H"

HTML;
?>
    <pre style="margin: auto; max-width: 480px;">
        <code class="lang-json">
// <?php echo $url; ?>


{
<?php echo $text; ?>
}

        </code>
    </pre>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.0.3/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</body>
</html>
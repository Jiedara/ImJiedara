<?php

require('config.php');

$lang = str_replace(SITE_URL, '', 'http://' . $_SERVER["HTTP_HOST"] . strtok($_SERVER["REQUEST_URI"],'?'));

if(empty($lang) || !in_array($lang, ['fr','en'])){
    header('Location: ' . SITE_URL . "fr");
}

include('translations/' . $lang . '.php');
include('translations/translate.php');

include('views/head.php');
include('views/header.php');

include('views/cv.php');

include('views/portfolio.php');

include('views/contact.php');

include('views/cgv.php');

include('views/footer.php');
include('views/foot.php');

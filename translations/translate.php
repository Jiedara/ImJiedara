<?php

function __($translate_key, $echo = 1)
{
    global $translations;

    if (isset($translations[$translate_key])) {
        $text = $translations[$translate_key];
    } else {
        $text = $translate_key;
    }

    if($echo){
        echo $text;
    }else {
        return $text;
    }
}
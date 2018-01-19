<?php

function __($translate_key, $echo = 1)
{
    global $translations;
    if($echo){
        echo $translations[$translate_key];
    }else {
        return $translations[$translate_key];
    }
}
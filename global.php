<?php

require_once 'classes' . DIRECTORY_SEPARATOR . 'config.php';

spl_autoload_register('carregaClasses');

function carregaClasses($classe)
{
    if(file_exists('classes' . DIRECTORY_SEPARATOR . $classe . '.php'))
    {
        require_once 'classes' . DIRECTORY_SEPARATOR . $classe . '.php';
    }    
}
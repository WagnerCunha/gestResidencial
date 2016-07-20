<?php
/**
* Essa função garante que todas as classes 
* da pasta lib serão carregadas automaticamente
*/
function __autoload($st_class)
{
    if(file_exists('lib/'.$st_class.'.php'))
    {
        require_once 'lib/'.$st_class.'.php';
    }
}
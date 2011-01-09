<?php

function my_autoload($className)
{
    if(is_file(dirname(__FILE__) . '/../lib/search_catalog/' . $className . '.php')) {
        require_once dirname(__FILE__) . '/../lib/search_catalog/' . $className . '.php';
    } elseif(is_file(dirname(__FILE__) . '/../lib/search_catalog/strategy/' . $className . '.php')) {
        require_once dirname(__FILE__) . '/../lib/search_catalog/strategy/' . $className . '.php';
    } elseif(is_file(dirname(__FILE__) . '/../lib/site_parameters/' . $className . '.php')) {
        require_once dirname(__FILE__) . '/../lib/site_parameters/' . $className . '.php';
    }
}

spl_autoload_register("my_autoload");

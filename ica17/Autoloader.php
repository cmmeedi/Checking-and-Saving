<?php


//This is the autoloader method that will automatically load any class that is needed by pulling the name of the class and appending the .php filetype to it.
function my_autoloader($class){
    require $class . '.php';
    
}

//Chester Meedi


spl_autoload_register('my_autoloader');
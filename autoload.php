<?php
foreach( array('/../autoload.php','/vendor/autoload.php') as $autoloader){
    if( file_exists(__DIR__.$autoloader) ){ 
        require __DIR__.$autoloader; 
        break;
    }
}
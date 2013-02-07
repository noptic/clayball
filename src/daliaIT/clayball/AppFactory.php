<?php
/*/
type:       class
author:     Oliver Anan
package:    dalia-it/clayball
tags:       [commandline, factory, application]
================================================================================
AppFactory
================================================================================
Turns clayballs into symfony applications

Example
--------------------------------------------------------------------------------

    $clayball = array(
        "commands" => array(
            array(
                "controller"    => "daliaIT\\clayball\\command\\PrintText",
                "name"          => "hello", 
                "text"          => "Hello World"
            ),
            array(
                "controller"    => "daliaIT\\clayball\\command\\PrintText",
                "name"          =>  "bye",     
                "text"          => "Hello World"
            )
        )
    );
    $myApp = (new AppFactory)->build($clayball);
    
Source
--------------------------------------------------------------------------------
/*/
namespace daliaIT\clayball;
use Symfony\Component\Console\Application;

class AppFactory{
    public function build(array $clayball){
        $version = ( isset($clayball['version']) )
            ? $clayball['version']
            : 'unknown version';
        $name = ( isset($clayball['name']) )
            ? $clayball['name']
            : 'console tool';
        $app = new Application($name,$version);
        foreach($clayball['commands'] as $name => $context){
            $context['name'] = $name;
            $context['raw'] = &$clayball;
            $controller = $context['controller'];
            $command = new $controller($context);
            if( isset($context['help']) ){
                $command->setHelp($context['help']);
            }
            $app->add($command);
        }
        return $app;
    }
}
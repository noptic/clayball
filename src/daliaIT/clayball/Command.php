<?php
/*/
type:       class
author:     Oliver Anan
package:    dalia-it/clayball
tags:       [commandline, command, application]
================================================================================
Command
================================================================================
Extends the Symphony command to accept an array of options
    
Source
--------------------------------------------------------------------------------
/*/
namespace daliaIT\clayball;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
class Command extends SymfonyCommand {
    protected
    #:array
        $context;
        
    public function __construct(array $context){
        $this->context = $context;
        $this->setName($this->context['name']);
        parent::__construct();
        if( isset($this->context['description']) ){
            $this->setDescription($this->context['name']);
        }
    }
}

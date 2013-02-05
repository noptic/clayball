<?php
namespace daliaIT\clayball;
use RuntimeException,
    Symfony\Component\Yaml\Parser;

class YamlAppParser extends AppParser{
    public function __construct(AppFactory $factory = null){
        if(! $factory){
            $factory = new AppFactory();
        }
        $this->factory = $factory;
    }
      
    protected function parseFile($path){
        $parser = new Parser();
        if(! is_readable($path)){
            throw new RuntimeException("Can not read application file '$path'");
        }
        return $parser->parse( file_get_contents($path) );
    }
    
}
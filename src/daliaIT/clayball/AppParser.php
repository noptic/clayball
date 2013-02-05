<?php
namespace daliaIT\clayball;
abstract class AppParser{
    protected 
    #:AppFactory
        $factory;
    public function __construct(AppFactory $factory = null){
        if(! $factory){
            $factory = new AppFactory();
        }
        $this->factory = $factory;
    }
    
    public function build($path){
        $appData = $this->parseFile($path);
        return $this->factory->build($appData);
    }
        
    public static function mk(){
        $class = get_called_class();
        return new $class();
    }
    
    protected abstract function parseFile($path);

}
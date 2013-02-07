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
    
    public function build($path, array $override=array()){
        $appData = $this->parseFile($path);
        $appData = array_replace_recursive($appData, $override);
        return $this->factory->build($appData);
    }
        
    public static function mk(){
        $class = get_called_class();
        return new $class();
    }
    
    protected abstract function parseFile($path);

}
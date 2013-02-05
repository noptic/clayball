<?php
namespace daliaIT\clayball\command;
use daliaIT\clayball\Command,
    Symfony\Component\Console\Input\InputInterface,
    Symfony\Component\Console\Input\InputOption;
    
use Symfony\Component\Console\Output\OutputInterface;
class PrintText extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if( isset($this->context['file']) ){
            $output->write( file_get_contents($this->context['file']) );
        }
        return $this;
    }
}
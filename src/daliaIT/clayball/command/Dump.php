<?php
namespace daliaIT\clayball\command;
use daliaIT\clayball\Command,
    Symfony\Component\Console\Input\InputInterface,
    Symfony\Component\Console\Input\InputOption;
    
use Symfony\Component\Console\Output\OutputInterface;
class Dump extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        var_dump($this->context);
    }
}
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
        $output->write( $this->context['text'] );
        return $this;
    }
}
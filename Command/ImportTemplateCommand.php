<?php

namespace Sfk\EmailTemplateBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ImportTemplateCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('email-template:import')
            ->setDescription('Imports email template to database')
            ->addArgument('template', InputArgument::REQUIRED, 'Template name')
            ->addArgument('entity', InputArgument::REQUIRED, 'Entity class')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $templateName = $input->getArgument('template');
        $entityClass = $input->getArgument('entity');

        if ($name) {
            $text = 'Hello '.$name;
        } else {
            $text = 'Hello';
        }

        if ($input->getOption('yell')) {
            $text = strtoupper($text);
        }

        $output->writeln($text);
    }

}
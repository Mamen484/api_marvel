<?php

namespace App\Command;

use GuzzleHttp\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ComicsCommand extends Command
{
    protected static $defaultName = 'comics';

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
       // create curl resource
       $ch = curl_init();

       // set url
       curl_setopt($ch, CURLOPT_URL, "https://gateway.marvel.com:443/v1/public/comics?apikey=d6b954962936207784c09d86de02e60c&ts=1&hash=af2e648c08cc0ccd4c931cedff0b8d5c");

       //return the transfer as a string
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

       // $output contains the output string
       $output = curl_exec($ch);

       // close curl resource to free up system resources
       curl_close($ch);

       //dump($output);die;

        $md5 = md5('1' . 'ea60fbd61ddb20bb6ccdf7703940ee1b78c3f9eb' . 'd6b954962936207784c09d86de02e60c');
        dump($md5);die;
        $client = new Client();
        $res = $client->request('GET', 'developer.marvel.com', [
            'apikey' => 'd6b954962936207784c09d86de02e60c',
        ]);

        //dump($res); die();

        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }
        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
    }
}

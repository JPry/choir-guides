<?php
/**
 * Created by IntelliJ IDEA.
 * User: jpry
 * Date: 8/8/15
 * Time: 12:35
 */

namespace JPry\Choir_Guide\Commands;

use Cocur\Slugify\Slugify;
use JPry\Choir_Guide\Exception\File_Exists;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Template_Create
 *
 * @package JPry\Choir_Guide\Commands
 */
class Template_Create extends Command
{

    protected function configure()
    {
        $this
            ->setName('template:create')
            ->setAliases(array('create'))
            ->setDescription('Create a new Choir Sheet from a Template')
            ->addArgument(
                'title',
                InputArgument::REQUIRED,
                'What is the title of the Guide (The Primary Saint or Feast being celebrated)?'
            )
            ->addArgument(
                'date',
                InputArgument::REQUIRED,
                'The date for the new post. Make sure to surround with quotes. Example: "next Sunday"'
            )
            ->addOption(
                'condensed',
                'c',
                InputOption::VALUE_REQUIRED,
                'Whether to use the condensed template. Valid options are "yes" or "no"',
                'no'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $slugify    = new Slugify();
        $date       = strtotime($input->getArgument('date'));
        $title      = $input->getArgument('title');
        $condensed  = 'yes' == strtolower($input->getOption('condensed'));
        $title_slug = date('Y-m-d', $date) . '-' . $slugify->slugify($title);
        $file       = ROOT_DIR . '/_posts/' . $title_slug . '.md';

        // Check if the file already exists
        if (file_exists($file)) {
            throw new File_Exists("A file with the name {$title_slug} already exists.");
        }

        // Copy the file
        $template = ROOT_DIR . '/_drafts/TEMPLATE';
        $template .= $condensed ? '_CONDENSED.md' : '.md';
        $result = copy($template, $file);


        if (false === $result) {
            $output->writeln('<error>Failed to create file</error>');
        } else {
            $output->writeln('Success!');
        }
    }


}

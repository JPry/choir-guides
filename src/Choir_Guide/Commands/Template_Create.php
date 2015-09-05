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
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;

/**
 * Class Template_Create
 *
 * @package JPry\Choir_Guide\Commands
 */
class Template_Create extends Command
{
    /**
     * Format for asking questions.
     *
     * @var string
     */
    protected $q_format = '<question>%s</question> ';

    /**
     * Configuration for this command.
     */
    protected function configure()
    {
        $this
            ->setName('guide:create')
            ->setAliases(array('create'))
            ->setDescription('Create a new Choir Sheet Guide from a Template')
            ->addArgument(
                'title',
                InputArgument::OPTIONAL,
                'What is the title of the Guide (The Primary Saint or Feast being celebrated)?'
            )
            ->addArgument(
                'date',
                InputArgument::OPTIONAL,
                'What is the date for the new post? Make sure to surround with quotes. Example: "next Sunday"'
            )
            ->addOption(
                'condensed',
                'c',
                InputOption::VALUE_NONE,
                'Use the condensed template.'
            )
            ->addOption(
                'feast',
                'f',
                InputOption::VALUE_NONE,
                'Designates that the guide is for a feast.'
            )
        ;
    }

    /**
     * Provide interaction when some or all arguments and options are missing.
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function interact(InputInterface $input, OutputInterface $output)
    {
        $definition = $this->getDefinition();
        $arguments  = $input->getArguments();

        /** @var QuestionHelper $question */
        $questioner = $this->getHelper('question');

        // Ask whether this is a feast
        if (!$input->getOption('feast')) {
            $text     = 'Is this for a feast?';
            $question = new ConfirmationQuestion(sprintf($this->q_format, $text));

            // Get the response and store it as boolean
            $response = (bool) $questioner->ask($input, $output, $question);
            $input->setOption('feast', $response);
        }

        // Loop through any missing arguments and ask for them
        foreach ($definition->getArguments() as $argument) {
            $name = $argument->getName();

            // If this is for a feast, skip the date because it's not needed in the file name
            if ($input->getOption('feast') && 'date' == $name) {
                continue;
            }

            // Only prompt if the argument wasn't set
            if (!isset($arguments[$name])) {

                // Set up the variables we'll need
                $description = $argument->getDescription();
                $default     = $argument->getDefault();
                $question    = new Question(sprintf($this->q_format, $description), $default);

                // Get the response, and store it
                $response = $questioner->ask($input, $output, $question);
                $input->setArgument($name, $response);
            }
        }

        // Ask about the condensed template
        if (!$input->getOption('condensed')) {
            $text     = 'Do you want to use the condensed template?';
            $question = new ConfirmationQuestion(sprintf($this->q_format, $text));

            // Get the response and store it as boolean
            $response = (bool) $questioner->ask($input, $output, $question);
            $input->setOption('condensed', $response);
        }
    }

    /**
     * Execute the command.
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     * @throws File_Exists When the file to create already exists.
     */
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

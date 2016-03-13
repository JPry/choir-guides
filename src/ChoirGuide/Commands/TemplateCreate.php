<?php
/**
 * Created by IntelliJ IDEA.
 * User: jpry
 * Date: 8/8/15
 * Time: 12:35
 */

namespace JPry\ChoirGuide\Commands;

use Cocur\Slugify\Slugify;
use JPry\ChoirGuide\Exception\FileExists;
use JPry\ChoirGuide\Helpers\TemplateHelper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

/**
 * Class TemplateCreate
 *
 * @package JPry\ChoirGuide\Commands
 */
class TemplateCreate extends Command
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
                'What is the date for the new post? Example: "next Sunday"'
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
        /** @var TemplateHelper $template_helper */
        $template_helper = $this->getHelper('choir_template');
        $template_helper->setDefinition($this->getDefinition());
        $template_helper->setInputOutput($input, $output);
        $template_helper->promptAllArguments();

        // Ask about the condensed template
        if (!$input->getOption('condensed')) {
            $text     = 'Do you want to use the condensed template?';
            $question = new ConfirmationQuestion(sprintf($this->q_format, $text));

            // Get the response and store it as boolean
            $response = (bool) $template_helper->getQuestionHelper()->ask($input, $output, $question);
            $input->setOption('condensed', $response);
        }

        // Default the 'date' option to 'next sunday'
        if (!$input->getArgument('date')) {
            $input->setArgument('date', 'next Sunday');
        }
    }

    /**
     * Execute the command.
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     * @throws FileExists When the file to create already exists.
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Set up initial variables
        $slugify   = new Slugify();
        $date      = strtotime($input->getArgument('date'));
        $title     = $input->getArgument('title');
        $condensed = $input->getOption('condensed');
        $feast     = $input->getOption('feast');

        // Determine if this is a feast or regular sunday
        if ($feast) {
            $file = sprintf('%s/_feasts/%s.md', ROOT_DIR, $slugify->slugify($title));
        } else {
            $file = sprintf('%s/_posts/%s-%s.md', ROOT_DIR, date('Y-m-d', $date), $slugify->slugify($title));
        }

        // Check if the file already exists
        if (file_exists($file)) {
            throw new FileExists("That file already exists.", 1);
        }

        // Copy the file
        $template = ROOT_DIR . '/_drafts/TEMPLATE';
        $template .= $feast ? '_FEAST' : '';
        $template .= $condensed ? '_CONDENSED.md' : '.md';
        $result = @copy($template, $file);

        // Verify the result
        if (false === $result) {
            $output->writeln('<error>Failed to create file</error>');
        } else {
            $output->writeln('Success!');
        }

        return 0;
    }
}

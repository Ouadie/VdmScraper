<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class ScrapCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'scrap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Scrap and store the lastest posts from VDM website";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->info("Let's strat VDM Scrapping...");
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
                    array('count', null, InputOption::VALUE_OPTIONAL, 'The number of posts to store (max value is 200)', 2)
                );
    }
}

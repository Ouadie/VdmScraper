<?php

namespace App\Console\Commands;

use App\Contracts\IScraperService;
use App\Contracts\IPostRepository;
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

  public function __construct(IScraperService $scraper, IPostRepository $postsRepository)
  {
      parent::__construct();
      $this->scraper = $scraper;
      $this->postsRepository = $postsRepository;
  }

  /**
  * Execute the console command.
  *
  * @return void
  */
  public function fire()
  {
    $maxCountToScrap = 200; // TODO add to config
    $postToScrapCount = max($this->option('count'), $maxCountToScrap);

    $this->info("[--> Let's strat VDM Scrapping...");

    $this->postsRepository->clear();
    $posts = $this->scraper->scrap($postToScrapCount);
    $this->postsRepository->persist($posts);
    $scrapedPostsCount = count($posts);

    $this->info(" --> finished! $scrapedPostsCount posts saved! ]");
  }

  /**
  * Get the console command options.
  *
  * @return array
  */
  protected function getOptions()
  {
    return array(
      array('count', null, InputOption::VALUE_OPTIONAL, 'The number of posts to store (max value is 200)', 200)
    );
  }

}

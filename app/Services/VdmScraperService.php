<?php

namespace App\Services;

use App\Contracts\IScraperService;
use Goutte\Client;

class VdmScraperService implements IScraperService {

  /**
  * Scrap $postToScrapCount posts
  * @param $postToScrapCount
  * @return array
  */
  public function scrap($postToScrapCount)
  {
    $websiteDomainName = "http://www.viedemerde.fr/"; // TODO add to config
    $posts = array();
    $pageIndex = 0;
    $client = new Client();

    do{
      $url = "$websiteDomainName?page=" . $pageIndex++;
      $crawler = $client->request('GET', $url);
      $postsPage = $crawler->filter('div.post.article')->each(function ($node) {

        $content = $node->children()->first()->text();
        $id = $node->attr('id');
        $rightpart = explode(" - ", $node->filter('.right_part')->children()->eq(1)->text());
        $authorBlock = preg_replace('/par /', "", end($rightpart));
        $author = trim(preg_replace('#\(.*?\)#','', $authorBlock));
        $date = preg_replace('#Le ([0-9]{2})\/([0-9]{2})\/([0-9]{4}) à ([0-9]{2}\:[0-9]{2})#', '$1-$2-$3 $4', $rightpart[0]);

        return [
          'id' => $id,
          'content' => $content,
          'date' => new \DateTime($date),
          'author' => $author
        ];

      });

      $posts = array_merge($posts, $postsPage);

    }while(count($posts) < $postToScrapCount);

    // Remove extra posts
    return array_slice($posts, 0, $postToScrapCount);
  }

}

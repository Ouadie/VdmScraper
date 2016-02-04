<?php

namespace App\Repositories;

use App\Models\Post;
use App\Contracts\IPostRepository;
use DB;
use DateTime;

class VdmPostRepository implements IPostRepository {

  /**
  * Insert an array of posts into DB
  * @param $arrayOfPosts
  * @return array
  */
  public function persist($arrayOfPosts)
  {
    DB::table('posts')->insert( $arrayOfPosts );
  }

  /**
  * Clear all the data
  */
  public function clear()
  {
    DB::table('posts')->delete();
  }

  /**
  * Get Post by $id
  * @param $id
  * @return Post
  */
  public function findById($id)
  {
    return Post::find($id);
  }

  /**
  * Get All posts
  * @return array
  */
  public function findAll($author = null, $from = null, $to = null)
  {
    $query = Post::query();

    if ($author) {
      $query = $query->where('author', $author);
    }

    if ($from) {
      $query = $query->whereDate('date', '>=', new DateTime( $from ));
    }

    if ($to) {
      $query = $query->whereDate('date', '<=', new DateTime( $to ));
    }

    return $query->get();
  }

}

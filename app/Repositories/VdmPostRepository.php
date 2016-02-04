<?php

namespace App\Repositories;


use App\Contracts\IPostRepository;
use DB;

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

}

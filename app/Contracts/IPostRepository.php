<?php

namespace App\Contracts;

interface IPostRepository {

  public function persist($arrayOfPosts);

  public function clear();

}

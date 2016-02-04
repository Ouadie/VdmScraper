<?php

use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Http\Request;

class PostTest extends TestCase
{
  /**
  * Testing the Get all posts
  *
  * @return void
  */
  public function testGetAllPostsResponseStatus()
  {
    $response = $this->call('GET', 'api/posts');
    $this->assertEquals(200, $response->status());
  }
  /**
  * Testing the Get all posts
  *
  * @return void
  */
  public function testGetAllPosts()
  {
    $this->get('api/posts')
            ->seeJson([
               'count' => 200,
            ]);
  }

  /**
  * Testing the Get post by id
  *
  * @return void
  */
  public function testGetPostById()
  {
    $id = 8665268;
    $this->get("api/posts/$id")
              ->seeJson(['id' => $id]);
  }

  /**
  * Testing the Get post by author
  *
  * @return void
  */
  public function testGetPostByAuthor()
  {
    $author = "maniokmaniok";
    $this->get("api/posts?author=$author")
            ->seeJson(['author' => $author]);
  }
}

<?php

namespace App\Http\Controllers;

use \App\Models\Post;

class PostController extends Controller
{
  /**
  * Retrieve all posts.
  *
  * @return Response
  */
  public function showAll()
  {
    $posts = Post::all();
    return response()->json(['posts' => $posts,  'count' => count($posts)]);
  }

  /**
  * Retrieve the post for the given ID.
  *
  * @param  int  $id
  * @return Response
  */
  public function show($id)
  {
    return Post::find($id);
    return response()->json(['post' => Post::find($id)]);
  }

  //
}

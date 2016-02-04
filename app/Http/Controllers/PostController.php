<?php

namespace App\Http\Controllers;

use \App\Models\Post;
use Illuminate\Http\Request;
use DateTime;

class PostController extends Controller
{
  /**
  * Retrieve all posts.
  *
  * @return Response
  */
  public function showAll(Request $request)
  {
    $query = Post::query();

    if ($request->has('author')) {
      $query = $query->where('author', $request->author);
    }

    if ($request->has('from')) {
      $query = $query->whereDate('date', '>=', new DateTime( $request->from ));
    }

    if ($request->has('to')) {
      $query = $query->whereDate('date', '<=', new DateTime( $request->to ));
    }

    $posts = $query->get();

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
    return response()->json(['post' => Post::find($id)]);
  }

  //
}

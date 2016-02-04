<?php

namespace App\Http\Controllers;

use App\Contracts\IPostRepository;
use \App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

  public function __construct(IPostRepository $postsRepository)
  {
    $this->postsRepository = $postsRepository;
  }

  /**
  * Retrieve all posts.
  *
  * @return Response
  */
  public function showAll(Request $request)
  {
    $posts = $this->postsRepository->findAll($request->get('author'), $request->get('from'), $request-> get('to'));
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
    return response()->json(['post' => $this->postsRepository->findById($id)]);
  }

}

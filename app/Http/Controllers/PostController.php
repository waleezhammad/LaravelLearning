<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function getIndex(Store $session)
    {
        $post = new Post();
        $posts = $post->getPosts($session);
        return view('blog.index', ['posts' => $posts]);
    }
    public function getAdminIndex(Store $session)
    {
        $postModel=new Post();
        $posts=$postModel->getPosts($session);
        return view('admin.index',['posts'=>$posts]);
    }
    public function getPost(Store $session,$id)
    {
        $postModel=new Post();
        $post=$postModel->getPost($session,$id);
        return view('blog.post',['post'=>$post]);
    }
    public function getAdminCreate()
    {
        return view('admin.create');
    }
    public function getAdminEdit(Store $session,$id)
    {
        $postModel = new Post();
        $post = $postModel->getPost($session,$id);
        return view('admin.Edit',['post'=>$post,'postId'=>$id]);
    }
    public function postAdminCreate(Store $session,Request $request)
    {
        $this->validate($request,[
            'title'=>'required | min:5',
            'content'=>'required | min:5'
        ]);
        $postModel = new Post();
        $postModel->addPost($session,$request->input('title'),$request->input('content'));
        return redirect()->route('admin.index')
            ->with('info','post is created title is:'.$request->input('title'));
    }
    public function postAdminEdit(Store $session,Request $request)
    {
        $this->validate($request,[
            'title'=>'required | min:5',
            'content'=>'required | min:5'
        ]);
        $postModel = new Post();
        $postModel->editPost($session,$request->input('title'),$request->input('content'),$request->input('postId'));
        return redirect()->route('admin.index')
            ->with('info','post is edited title is:'.$request->input('title'));
    }
}

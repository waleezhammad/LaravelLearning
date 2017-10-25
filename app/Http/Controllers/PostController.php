<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function getIndex()
    {
        $posts = Post::all();
        return view('blog.index', ['posts' => $posts]);
    }
    public function getAdminIndex()
    {
        //$postModel=new Post();
        $posts=Post::all();
        return view('admin.index',['posts'=>$posts]);
    }
    public function getPost($id)//Store $session,
    {
        //$postModel=new Post();
        $post=Post::find($id);//$postModel->getPost($session,$id);
        return view('blog.post',['post'=>$post]);
    }
    public function getAdminCreate()
    {
        return view('admin.create');
    }
    public function getAdminEdit($id)//Store $session,
    {
        //$postModel = new Post();
        $post = Post::find($id);//$postModel->getPost($session,$id);
        return view('admin.Edit',['post'=>$post,'postId'=>$id]);
    }
    public function postAdminCreate(Request $request)//Store $session,
    {
        $this->validate($request,[
            'title'=>'required | min:5',
            'content'=>'required | min:5'
        ]);
        $postModel = new Post([
            'title'=>$request->input('title'),
            'content'=>$request->input('content')
        ]);
        $postModel->save();
        //$postModel->addPost($session,$request->input('title'),$request->input('content'));

        return redirect()->route('admin.index')
            ->with('info','post is created title is:'.$request->input('title'));
    }
    public function postAdminEdit(Request $request)//Store $session,
    {
        $this->validate($request,[
            'title'=>'required | min:5',
            'content'=>'required | min:5'
        ]);
        $post = Post::find($request->input('postId'));
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        //$postModel = new Post();
        //$postModel->editPost($session,,$request->input('content'),);
        return redirect()->route('admin.index')
            ->with('info','post is edited title is:'.$request->input('title'));
    }
    public function deletePostAdmin($id)
    {
        $post=Post::find($id)->delete();
        return redirect()->route('admin.index')->with('info','post is deleted successfully');
    }
}

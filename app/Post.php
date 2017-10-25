<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['title','content'];



    //
    public function getPosts($session)
    {
        if (!$session->has('posts')) {
            $this->fillPostsSession($session);
        }
        return $session->get('posts');
    }
    public function  addPost($session,$title,$content)
    {
        if(!$session->has('posts'))
            $this->fillPostsSession($session);
        $posts = $session->get('posts');
        array_push($posts,['title'=>$title,'content'=>$content]);
        $session->put('posts',$posts);
    }
    public function  getPost($session,$id)
    {
        if(!$session->has('posts'))
            $this->fillPostsSession($session);
        $posts = $session->get('posts');
        return $posts[$id];
    }
    public function  editPost($session,$title,$content,$id)
    {
        $posts=$session->get('posts');
        $posts[$id] = ['title'=>$title,'content'=>$content];
        $session->put('posts',$posts);
    }
    private function fillPostsSession($session)
    {
        $posts = [
            ['title' => 'Learning Laravel',
                'content' => 'This blog post will get you right on Laravel Track'],
            ['title' => 'Something else',
                'content' => 'This blog post displays other content'
            ]
        ];
        $session->put('posts',$posts );
    }
}

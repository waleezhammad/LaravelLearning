<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $postModel= new \App\Post([
            'title'=>'Learning Laravel',
            'content'=>'Learning Laravel Content'
    ]);
       $postModel->save();
    }
}

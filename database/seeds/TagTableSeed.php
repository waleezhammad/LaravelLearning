<?php

use Illuminate\Database\Seeder;

class TagTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tagModel=new \App\Tag();
        $tagModel->name = 'Industry';
        $tagModel->save();
    }
}

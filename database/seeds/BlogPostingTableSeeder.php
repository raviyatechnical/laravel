<?php

use App\Model\BlogPosting;
use Illuminate\Database\Seeder;

class BlogPostingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//php artisan make:factory BlogPostingFactory --model=BlogPosting
        BlogPosting::truncate();
        factory(App\Model\BlogPosting::class, 10)->create();
    }
}

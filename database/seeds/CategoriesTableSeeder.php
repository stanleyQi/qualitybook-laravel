<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name'=>'Maori Culture','created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Art&Music','created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Business','created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Sports','created_at'=>$now,'updated_at'=>$now]
        ]);
    }
}

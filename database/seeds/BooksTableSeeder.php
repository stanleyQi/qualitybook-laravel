<?php

use App\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Book::create([
            'BookName'=> 'book1',
            'ShortDescription' =>'good book',
            'Description' =>'This is a very good book.',
            'ImageUrl' =>'',
            'Price' =>101,
            'Author' =>'liqi',
            'PreferredFlag' =>1,
        ])->Categories()->attach(1);

            $book = Book::find(1);
            $book->categories()->attach(2);
            $book->categories()->attach(3);
            $book->categories()->attach(4);

        Book::create([
            'BookName'=> 'book2',
            'ShortDescription' =>'good book',
            'Description' =>'This is a very good book.',
            'ImageUrl' =>'',
            'Price' =>102,
            'Author' =>'liqi',
            'PreferredFlag' =>1,
        ])->Categories()->attach(2);
        Book::create([
            'BookName'=> 'book3',
            'ShortDescription' =>'good book',
            'Description' =>'This is a very good book.',
            'ImageUrl' =>'',
            'Price' =>103,
            'Author' =>'liqi',
            'PreferredFlag' =>1,
        ])->Categories()->attach(3);
    }
}

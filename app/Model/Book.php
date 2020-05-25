<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $table = 'books';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [''];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'b_categories_id', 'id');
    }

    public function publishingCompany()
    {
        return $this->belongsTo(PublishingCompany::class, 'b_publishing_company_id', 'id');
    }

    public function amount()
    {
        return $this->hasMany(ImportBook::class, 'ib_books_id', 'id');
    }

    public function authorBook()
    {
        return $this->belongsToMany(Author::class, 'author_book', 'book_id', 'author_id');
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $table = 'authors';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [''];
}

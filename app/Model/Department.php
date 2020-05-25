<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $table = 'department';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'd_name', 'created_at','updated_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Education extends Model
{
    protected $post_type = 'education';


    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [];
}

<?php

namespace App\Models;

use App\Casts\CleanHtml;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'summary', 'content', 'category_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'title'         => 'string',
        'slug'          => 'string',
        'summary'       => 'string',
        'content'       => CleanHtml::class,
        'category_id'   => 'string',
    ];
}

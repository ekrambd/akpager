<?php

namespace Plugins\Testimonial\Models;

use App\Casts\CleanHtml;
use Illuminate\Database\Eloquent\Model;
use App\Support\Traits\UuidTrait;

class Testimonial extends Model
{
    use UuidTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'quote', 'author_name', 'author_image', 'author_intro'
    ];

        /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'quote'       => CleanHtml::class,
        'author_name' => 'string',
        // 'author_image' => 'string',
        'author_intro' => 'string',
    ];
}

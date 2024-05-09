<?php

namespace Plugins\Price\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\Traits\UuidTrait;
use App\Casts\CleanHtml;

class Price extends Model
{
    use UuidTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'icon', 'name', 'price', 'info', 'link'
    ];

        /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'info'       => CleanHtml::class,
    ];
}

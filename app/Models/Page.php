<?php

namespace App\Models;

use App\Casts\CleanHtml;
use App\Casts\SlugCast;
use App\Support\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory, UuidTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'seo_id', 'locale', 'title', 'slug', 'user_id', 'layout', 'summary', 'content', 'thumbnail',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'seo_id' => 'string', 
        'locale' => 'string', 
        'title' => 'string', 
        'slug' => SlugCast::class, 
        'user_id' => 'string', 
        'layout' => 'string', 
        'summary' => 'string', 
        'content'       => CleanHtml::class, 
        // 'thumbnail'     => ,
    ];

    /**
     * Get the Seo associated with the post.
     */
    public function seo()
    {
        // return dd($this->seo_id);
        // return Seo::find($this->seo_id);
        return $this->hasOne( Seo::class,  'id', 'seo_id', );
    }

    /**
     *
     * Get user uuuid
     */
    public function getId()
    {
        return $this->attributes['id'];
    }

}

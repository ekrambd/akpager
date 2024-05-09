<?php

namespace Plugins\Blog\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Support\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class Post extends Model
{
    use UuidTrait, HasFactory;

    protected $table = 'blog_posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'category_id',
        "seo_id",
        "user_id",
        'title',
        'slug',
        'summary',
        'content',
        'featured_image',
        'tags',
    ];

    public static function posts($perPage = 30) {

        $currentPage = Request::query('page', 1); //Determine if the given value is a valid page number.
        // Check if the current page is a valid integer, if not, set it to 1
        if (!ctype_digit($currentPage) || $currentPage < 1) {
            $currentPage = 1;
        }

        $offset = ($currentPage - 1) * $perPage;

        return Post::query() ->offset($offset)->limit($perPage)->get();
    }


    public static function postsLinks($perPage = 30) {

        $currentPage = Request::query('page', 1); // Get the current page number from the request
        // Check if the current page is a valid integer, if not, set it to 1
        if (!ctype_digit($currentPage) || $currentPage < 1) {
            $currentPage = 1;
        }

        $totalItems = Post::count(); // Get the total count of items

        $paginator = new LengthAwarePaginator([], $totalItems, $perPage, $currentPage);

        // Customize the pagination links as needed
        $paginator->setPath(Request::url());

        return $paginator->links();
    }

    protected static function newFactory()
    {
        return \Plugins\Blog\Database\Factories\PostFactory::new();
    }

    /**
     * Get the topic relationship.
     *
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     *Get the User relationship.
     */
    public function auth()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

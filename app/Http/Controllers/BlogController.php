<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Handle blog main page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('blade.blog.news');
    }

    /**
     * Handle single post.
     *
     * @param \WP_Post $post
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\Factory|\Illuminate\View\View
     */
    public function single(\WP_Post $post)
    {
        return view('blade.blog.single', [
            'latest_articles' => Post::where('post_status', 'publish')
                ->whereNotIn('ID', [$post->ID])
                ->orderby('post_date', 'asc')
                ->take(2)
                ->get()
        ]);
    }
}

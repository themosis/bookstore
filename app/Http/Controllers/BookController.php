<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Books archive page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\Factory|\Illuminate\View\View
     */
    public function archive()
    {
        return view('blade.books.archive');
    }

    /**
     * Single book page.
     *
     * @param \WP_Post $book
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\Factory|\Illuminate\View\View
     */
    public function single(\WP_Post $book)
    {
        return view('blade.books.single', [
            'books' => Book::where('post_status', 'publish')
                ->whereNotIn('ID', [$book->ID])
                ->inRandomOrder()
                ->take(3)
                ->get()
        ]);
    }

    /**
     * Handle search page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        return view('blade.books.search', [
            'searched_terms' => $request->get('s')
        ]);
    }
}

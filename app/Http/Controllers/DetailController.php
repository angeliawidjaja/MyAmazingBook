<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($book_id) {
        $chosenBook = Ebook::Where('id', $book_id)->first();
        // dd($chosenBook);
        return view('pages.bookdetail', ['book' => $chosenBook]);
    }
}

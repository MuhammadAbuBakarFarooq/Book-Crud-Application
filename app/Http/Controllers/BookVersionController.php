<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookVersion;
use Session;

class BookVersionController extends Controller
{
    public function storeVersion(Request $request)
    {

    	$isbn = $request->input('isbn');
 
    	$book = Book::where('isbn' , $isbn)->first();

    	$language = $request->input('language');
// dd($book->id);
    	$version = BookVersion::where('book_id' , $book->id)->where('language', $language)->count();
// dd($version);
    	$bookVersion = new BookVersion();

    	if ($version==0) {
    		$version++;
    	}
    	$bookVersion->v_no = $version = $version+1;
    	$bookVersion->price = $request->input('price');
    	$bookVersion->description = $request->input('description');
    	$bookVersion->language = $request->input('language');
    	// $bookVersion->book_id = $book[0];

    	$book->version()->save($bookVersion);
    	// $bookVersion->save();
    	Session::flash('success' , 'Book Version Added Successfully!!!');
		return redirect()
		->route('home');
    }
}

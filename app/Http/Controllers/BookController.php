<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Session;
use App\Http\Controllers\BookVersionController;


use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookVersion;


class BookController extends Controller
{
	protected $Book ;
  function __construct()
  {
    // $this->BookController     = new BookController();
    $this->BookVersionController    = new BookVersionController();
  }
	public function viewAllBooks()
	{
		$book = Book::all();
		return view('viewAllBooks', ['book'=> $book]);
	}//view ALL Books

	public function mockbook($id)
	{
		$book = Book::find($id);
		$version = BookVersion::where('book_id', $id)->latest()->first();
		return view('mockbook', ['book'=> $book, 'version'=> $version]); 
		// 0 is not good practice
	}//Open Book Profile

	public function edit($id)
	{
		$book = Book::find($id);
		return view('edit', ['book'=> $book]);
	}//open Book Edit Form

	public function addVersion($id)
	{
		$book = Book::find($id);
		$version = BookVersion::find($id);
		return view('addVersion', ['book'=> $book, 'version'=> $version]);
	}
	
	public function delete($id)
	{
		$book = Book::find($id);

		$book->delete();
		
		Session::flash('success' , 'Book Deleted Successfully!!!');
		return redirect()
		->route('home');
		// return view('mockbook', ['book'=> $book]);
		}//Book delete

		public function addBookView()
		{
			return view('addBookView');
    }//Add New Book Form

    public function store(Request $request)
    {

    	$request-> validate([
    		'title' => 'required | min:5| max:60',
    		'description' => 'required | min:10| max:500',
    		'price' => 'required',
    	]);

    	$user = Auth::user();

    	$books = new Book();
    	$books->isbn = $request->input('isbn');
    	$books->title = $request->input('title');
    	$books->category = $request->input('type');
    	$books->author = $request->input('author');
    	
    	$user->books()->save($books);

    	$this->BookVersionController->storeVersion($request);

    	Session::flash('success' , 'New Book Added Successfully!!!');
    	return redirect()
    	->route('home');
	}// Save New Book

	public function update(Request $request)
	{
		$request-> validate([
			'title' => 'required | min:3| max:60',
			'description' => 'required | min:10| max:500',
			'price' => 'required',
			]);

		$id = $request->input('id');
		$book = Book::find($id);
		$book->isbn = $request->input('isbn');
		$book->title = $request->input('title');
		$book->category = $request->input('type');
		$book->author = $request->input('author');
		$book->price = $request->input('price');
		$book->description = $request->input('description');

		$book->save();

		Session::flash('success' , 'Book Updated Successfully!!!');
		return redirect()
		->route('home');
	}
}

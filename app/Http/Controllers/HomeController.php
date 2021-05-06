<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

        // Role::create(['name'=>'Author']);
        // Role::create(['name'=>'Admin']);
        // Permission::create(['name'=> 'Add Book']);
        // Permission::create(['name'=> 'Edit Book']);
        // Permission::create(['name'=> 'Delete Book']);
        

        $book = Book::all();
        return view('home', ['book'=> $book]);
        
    }
}

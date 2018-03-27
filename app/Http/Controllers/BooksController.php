<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookFormRequest;
use App\Http\Requests\UpdateBookFormRequest;
use App\Models\Book;
use Illuminate\Database\Eloquent\paginate;
use Illuminate\Http\Request;
use Illuminate\Routing\redirect;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the books
        $books = Book::orderBy('title','asc')->paginate(10);

        // view
        return  view('books.index',compact('books'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBookFormRequest $request)
    {
        
              
         Book::create($request->all());

        session()->flash('status', 'Task was successful!');
         session()->flash('type', 'success');
           
         
        return redirect(route('homeBooks'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {

        
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
           
           return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookFormRequest $request ,$id)
    {
         
      

         $book = Book::findOrFail($id);

         $book->update([
            'title' => $request->title,
            'author'  => $request->author,
            'resume' => $request->resume,            
            'category' => $request->category
            ]);

          session()->flash('status', 'Update was successful!');
          session()->flash('type', 'success');
         return redirect(route('books.show', compact('book')));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
       
        $book->delete();
          session()->flash('status', 'Delete was successful!');
          session()->flash('type', 'danger');
        return redirect(route('homeBooks',compact('request')));
    }
}

<?php

namespace App\Modules\Book\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Book\Models\Book;
use App\Modules\Book\Http\Requests\Book as BookRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class BookController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view("Book::view", compact('books'));
    }

    public function create()
    {
        return view("Book::create");
    }

    public function store(BookRequest $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {

            Book::create([
                'title' => $request->title,
                'description' => $request->description,
                'image_url' => $request->image_url,
                'published_at' => $request->published_at,
                'created_by' => auth()->user()->id
            ]);

            DB::commit();
            session()->flash('success', 'Book was successfully created!');
        } catch (\Exception $e) {

            DB::rollback();

            // session()->flash('failed', 'Oops! Something went wrong. Try again later.');
            session()->flash('failed', $e->getMessage());
            return redirect()->route('book.create');
        }

        return redirect()->route('books.view');

    }

    public function edit(Book $book)
    {
        return view("Book::edit", compact('book'));
    }

    public function update(BookRequest $request, Book $book)
    {
        DB::beginTransaction();

        try {

            $book->update([
                'title' => $request->title,
                'description' => $request->description,
                'image_url' => $request->image_url,
                'published_at' => $request->published_at,
                'updated_by' => auth()->user()->id
            ]);
            DB::commit();
            session()->flash('success', 'Book was successfully updated!');
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back();
            session()->flash('failed', 'Oops! Something went wrong. Try again later.');
        }

        return redirect()->route('books.view');
    }

    public function delete(Request $request)
    {

        DB::beginTransaction();

        try {
            $book = Book::findOrFail($request->did);
            $book->delete();


            DB::commit();
            session()->flash('success', 'Book was successfully removed!');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back();
            session()->flash('failed', 'Oops! Something went wrong. Try again later.');
        }
        return redirect()->route('books.view');
    }
}

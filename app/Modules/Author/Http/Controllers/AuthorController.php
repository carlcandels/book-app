<?php

namespace App\Modules\Author\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\Author\Models\Author;
use App\Modules\Author\Http\Requests\Author as AuthorRequest;
use Exception;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();

        return view("Author::view", compact('authors'));
    }

    public function create()
    {
        return view("Author::create");
    }

    public function store(AuthorRequest $request)
    {

        DB::beginTransaction();
        try {

            $author = Author::create([
                'name' => $request->name,
                'bio' => $request->bio,
                'created_by' => auth()->user()->id
            ]);

            DB::commit();
            session()->flash('success', 'Author was successfully created!');
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back($e->getCode);
            session()->flash('failed', 'Oops! Something went wrong. Try again later.');
        }

        return redirect()->route('authors.view');

    }

    public function edit(Author $author)
    {
        return view("Author::edit", compact('author'));
    }

    public function update(AuthorRequest $request, Author $author)
    {
        DB::beginTransaction();

        try {

            $author->update([
                'name' => $request->name,
                'bio' => $request->bio,
                'updated_by' => auth()->user()->id
            ]);
            DB::commit();
            session()->flash('success', 'Author was successfully updated!');
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back($e->getCode);
            session()->flash('failed', 'Oops! Something went wrong. Try again later.');
        }

        return redirect()->route('authors.view');
    }

    public function delete(Request $request)
    {

        DB::beginTransaction();

        try {
            $author = Author::findOrFail($request->did);
            $author->delete();


            DB::commit();
            session()->flash('success', 'Author was successfully removed!');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back($e->getCode);
            session()->flash('failed', 'Oops! Something went wrong. Try again later.');
        }
        return redirect()->route('authors.view');
    }
}

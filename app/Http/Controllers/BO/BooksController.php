<?php

namespace App\Http\Controllers\BO;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Book;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use App\Author;
use App\Tag;
use App\TagsRel;
use Illuminate\Support\Facades\File;

class BooksController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        $books = Book::paginate(25);

        return view('BO.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        $authors = Author::pluck('name', 'id')->toArray();
        $tags = Tag::pluck('name', 'id')->toArray();
        return view('BO.books.create')
                        ->with('authors', $authors)
                        ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:books',
            'description' => 'required',
            'author' => 'required',
            'tags' => 'required',
            'cover' => 'required|image'
        ]);

        $bookimagename = uniqid() . '.' . $request->cover->extension();

        $img = Image::make($request->cover)->resize(500, 700, function($pict) {
            $pict->aspectRatio();
            $pict->upsize();
        });
        $img->resizeCanvas(500, 700, 'center', false, '#fff');
        $img->save("books/$bookimagename");
        $requestData = array_replace($request->all(), ['cover' => $bookimagename]);

        $book = Book::create($requestData);

        foreach ($request->tags as $tag) {
            TagsRel::create(['bookid' => $book->id, 'tagid' => (int) $tag]);
        }

        Session::flash('flash_message', 'Book added!');

        return redirect('auth/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $book = Book::findOrFail($id);

        return view('FO.book', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $book = Book::findOrFail($id);
        $selectedtags = $book->tags->pluck('id')->toArray();
        $taguri = Tag::pluck('name', 'id')->toArray();
        $selectedauthor = $book->autor->pluck('id')->toArray();
        $authors = Author::pluck('name', 'id')->toArray();
        return view('BO.books.edit')
                        ->with('book', $book)
                        ->with('selectedtags', $selectedtags)
                        ->with('taguri', $taguri)
                        ->with('authors', $authors)
                        ->with('selectedauthor', $selectedauthor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request) {
        //dd($request->all());
        $book = Book::findOrFail($id);
        $cover = [];
        if (@$request->cover) {
            $bookimagename = uniqid() . '.' . $request->cover->extension();
            $img = Image::make($request->cover)->resize(500, 700, function($pict) {
                $pict->aspectRatio();
                $pict->upsize();
            });
            $img->resizeCanvas(500, 700, 'center', false, '#fff');
            $img->save("books/$bookimagename");
            File::delete('books/' . $book->cover);
            $cover = ['cover' => $bookimagename];
        }

        $requestData = array_replace($request->all(), $cover);

        $book->update($requestData);
        
        $book->Tags()->sync($request->tags);

        Session::flash('flash_message', 'Book updated!');

        return redirect('auth/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        $bookcoverimage = Book::findOrFail($id)->cover;
        File::delete("books/$bookcoverimage");
        Book::destroy($id);

        Session::flash('flash_message', 'Book deleted!');

        return redirect('auth/books');
    }

}

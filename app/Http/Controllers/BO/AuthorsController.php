<?php

namespace App\Http\Controllers\BO;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Author;
use Illuminate\Http\Request;
use Session;

class AuthorsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        $authors = Author::paginate(25);

        return view('BO.authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('BO.authors.create');
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
            'name' => 'required',
            'description' => 'required'
        ]);

        $requestData = $request->all();

        Author::create($requestData);

        Session::flash('flash_message', 'Author added!');

        return redirect('auth/authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $author = Author::findOrFail($id);

        return view('BO.authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $author = Author::findOrFail($id);

        return view('BO.authors.edit', compact('author'));
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

        $requestData = $request->all();

        $author = Author::findOrFail($id);
        $author->update($requestData);

        Session::flash('flash_message', 'Author updated!');

        return redirect('auth/authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        Author::destroy($id);

        Session::flash('flash_message', 'Author deleted!');

        return redirect('auth/authors');
    }

}

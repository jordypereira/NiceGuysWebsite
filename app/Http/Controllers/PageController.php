<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $pages = Page::all();
    return view('admin/pages/index', ['pages' => $pages]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    return view('admin/pages/create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   *
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    $page = new Page;

    $validatedData = $request->validate([
      'title' => 'required|unique:pages|max:255',
      'body' => 'required',
    ]);

    $page->title = $request->get('title');
    $page->body = $request->get('body');

    $page->save();
    Session::flash('message', 'Page has been added.');
    Session::flash('alert-class', 'alert-success');
    return redirect('admin/pages/create');
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $page = Page::find($id);
    return view('admin/pages/edit', ['page' => $page]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {
    $validatedData = $request->validate([
      'title' => 'required|unique:pages|max:255',
      'body' => 'required',
    ]);

    $page = Page::find($id);
    $page->title = $request->get('title');
    $page->body = $request->get('body');
    $page->save();

    Session::flash('message', 'Page has been added.');
    Session::flash('alert-class', 'alert-success');
    return redirect('admin/pages');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    Page::destroy($id);
    Session::flash('message', 'Page has been deleted.');
    Session::flash('alert-class', 'alert-success');
    return redirect('admin/pages');
  }
}

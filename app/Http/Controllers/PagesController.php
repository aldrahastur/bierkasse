<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('content.pages');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Page $page)
    {
        return view('pages.show', compact('page'));
    }

    public function showPublic(Page $page)
    {
        return view('pages.show', compact('page'));
    }

    public function edit(Page $page)
    {
        //
    }

    public function update(Request $request, Page $page)
    {
        //
    }

    public function destroy(Page $page)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Block;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index')->with('pages', $pages);
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $page = $request->all();
        Page::create($page);
        return redirect()->route('admin.pages.index');
    }
    
    public function show(Request $request)
    {
        $url = $request->path();
        $page = Page::where('path', $url)->first();
        $pages = Page::orderBy('created_at', 'desc')->get();
        
        if ($page) {
            $blocks = Block::where('page_id', $page->id)->get();
            return view('home', ['page' => $page, 'blocks' => $blocks]);
        }     
        return view('sorry', ['pages' => $pages]);
    }


    public function edit(Page $page)
    {
        return view('admin.pages.edit')->with([
            'page' => $page,
        ]);
    }

    public function update(Request $request, Page $page)
    {      
        $params = $request->all();
        $page->update($params);
        $page->save();
        return redirect()->route('admin.pages.index');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.pages.index');
    }
}

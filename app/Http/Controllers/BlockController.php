<?php

namespace App\Http\Controllers;
use App\Models\Block;
use Illuminate\Http\Request;

class BlockController extends Controller
{

    public function index($page)
    {

        $blocks = Block::where('page_id', $page)->sortable()->get();
        return view('admin.blocks.index', ['page' => $page, 'blocks' => $blocks]);  
    }
    

    public function create($page)
    {
        return view('admin.blocks.create', ['page' => $page]);
    }

    public function store(Request $request, $page)
    {
        $block = $request->all();
        Block::create($block);
        return redirect()->route('admin.blocks.index', $page );
    }
    
    public function show($page)
    {
        $blocks = Block::where('page_id', $page)->get();
        return view('admin.blocks.show', ['page' => $page, 'blocks' => $blocks]);  
    }


    public function edit(Block $block, $page)
    {
        return view('admin.blocks.edit')->with([
            'block' => $block,
            'page' => $page
        ]);
    }

    public function update(Request $request, Block $block, $page)
    {      
        $params = $request->all();
        $block->update($params);
        $block->save();
        return redirect()->route('admin.blocks.index',  $page);
    }

    public function destroy(Block $block, $page)
    {
        $block->delete();

        return redirect()->route('admin.blocks.index', $page);
    }
}

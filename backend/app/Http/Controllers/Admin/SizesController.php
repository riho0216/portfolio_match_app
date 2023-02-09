<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Size;

class SizesController extends Controller
{
    private $size;
    private $post;

    public function __construct(Size $size, Post $post)
    {
        $this->size = $size;
        $this->post = $post;
    }

    public function index()
    {
        $all_sizes = $this->size->latest()->paginate(10);

        $uncategorized_size_count = 0;
        $all_post = $this->post->all();

        foreach ($all_sizes as $size)
            if ($size->sizePost->count() == 0)
            {
                $uncategorized_size_count++;
            }

        return view('admin.sizes.index')
                ->with('all_sizes', $all_sizes)
                ->with('uncategorized_size_count', $uncategorized_size_count);
    }

    public function store(Request $request)
    {
        $request->validate([
            'size' => 'min:1|max:50'
        ]);

        $this->size->name = $request->size;
        $this->size->save();

        return redirect()->back();
    }

    public function edit($id)
    {
        $size = $this->size->findOrFail($id);
        return view('admin.sizes.index')
                ->with('size', $size);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'size' => 'min:1|max:50'
        ]);

        $size = $this->size->findOrFail($id);
        $size->name = $request->size;
        $size->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $size = $this->size->findOrFail($id);
        $this->size->destroy($id);
        return redirect()->back();
    }
}

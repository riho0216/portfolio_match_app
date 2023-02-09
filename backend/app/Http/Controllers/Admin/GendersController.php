<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gender;
use App\Models\Post;


class GendersController extends Controller
{
    private $gender;
    private $post;

    public function __construct(Gender $gender, Post $post)
    {
        $this->gender = $gender;
        $this->post = $post;
    }

    public function index()
    {
        $all_genders = $this->gender->latest()->paginate(10);

        $uncategorized_gender_count = 0;
        $all_post = $this->post->all();

        foreach($all_post as $post)
            if ($post->genderPost->count() == 0)
            {
                $uncategorized_gender_count++;
            }

        return view('admin.genders.index')
                ->with('all_genders', $all_genders)
                ->with('uncategorized_gender_count', $uncategorized_gender_count);
    }

    public function store(Request $request)
    {
        $request->validate([
            'gender' => 'min:1|max:50'
        ]);

        $this->gender->name = $request->gender;
        $this->gender->save();

        return redirect()->back();
    }

    public function edit($id)
    {
        $gender = $this->gender->findOrFail($id);
        return view('admin.genders.index')
                ->with('gender', $gender);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gender' => 'min:1|max:50'
        ]);
        
        $gender = $this->gender->findOrFail($id);
        $gender->name = $request->gender;
        $gender->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $gender = $this->gender->findOrFail($id);
        $this->gender->destroy($id);
        return redirect()->back();
    }
}

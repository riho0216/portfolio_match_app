<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Gender;
use App\Models\Size;

class PostsController extends Controller
{
    private $post;
    private $gender;
    private $size;

    public function __construct(Post $post, Gender $gender, Size $size)
    {
        $this->post = $post;
        $this->gender = $gender;
        $this->size = $size;
    }

    public function index()
    {
        $all_posts = $this->post->withTrashed()->latest()->paginate(10);
        $all_genders = $this->gender->all();
        $all_sizes = $this->size->all();

        return view('admin.posts.index')
                ->with('all_posts', $all_posts)
                ->with('all_genders', $all_genders)
                ->with('all_sizes', $all_sizes);
    }

    public function hidepost($id)
    {
        $this->post->destroy($id);
        return redirect()->back();
    }

    public function unhidepost($id)
    {
        $this->post->onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back();
    }
}

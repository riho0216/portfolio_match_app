<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Gender;
use App\Models\Size;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    const LOCAL_STORAGE_FOLDER = 'public/images';
    private $post;
    private $size;
    private $gender;

    public function __construct(Post $post, Size $size, Gender $gender)
    {
        $this->post = $post;
        $this->gender = $gender;
        $this->size = $size;
    }

    public function create()
    {
        $all_genders = $this->gender->all();
        $all_sizes = $this->size->all();
        return view('users.posts.create')
                ->with('all_genders', $all_genders)
                ->with('all_sizes', $all_sizes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:1048',
            'name' => 'required|min:1|max:255',
            'gender' => 'required',
            'size' => 'required',
            'quantity' => 'required|max:100',
            'description' => 'required|min:1|max:2000'
        ]);


        $this->post->user_id = Auth::user()->id;
        $this->post->image = $this->saveImage($request->image);
        $this->post->name = $request->name;
        $this->post->quantity = $request->quantity;
        $this->post->price_1 = $request->price_1;
        $this->post->price_2 = $request->price_2;
        $this->post->price_3 = $request->price_3;
        $this->post->description = $request->description;
        $this->post->save();

        foreach ($request->gender as $gender_id)
        {
            $gender_post = ['gender_id'=>$gender_id];
        }
        
        foreach ($request->size as $size_id)
        {
            $size_post = ['size_id'=>$size_id];
        }


        $this->post->genderPost()->create($gender_post);
    
        $this->post->sizePost()->create($size_post);
    

        return redirect()->route('index');
    }

    public function saveImage($image)
    {
        $image_name = time().".".$image->extension();

        $image->storeAs(self::LOCAL_STORAGE_FOLDER,$image_name);

        return $image_name;
    }

    public function show($id)
    {
        $post = $this->post->findOrFail($id);
        return view('users.posts.show')
                ->with('post', $post);
    }

    public function edit($id)
    {
        $post = $this->post->findOrFail($id);

        if(Auth::user()->id != $post->user->id)
        {
            return redirect()->route('index');
        }

        $all_genders = $this->gender->all();
        $all_sizes = $this->size->all();

        // $select_gender = [];
        // foreach($post->genderPost as $gender_post)
        // {
        //     $selected_gender[] = $gender_post->gender_id;
        // }

        // $select_size = [];
        // foreach($post->sizePost as $size_post)
        // {
        //     $selected_size[] = $size_post->size_id;
        // }

        return view('users.posts.edit')
                ->with('post', $post)
                ->with('all_genders', $all_genders)
                ->with('all_sizes', $all_sizes);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'mimes:jpeg,jpg,png,gif|max:1048',
            'name' => 'required|min:1|max:255',
            'gender' => 'required',
            'size' => 'required',
            'quantity' => 'required|max:100',
            'description' => 'required|min:1|max:2000'
        ]);

        $post = $this->post->findOrFail($id);
        $post->name = $request->name;
        $post->quantity = $request->quantity;
        $post->price_1 = $request->price_1;
        $post->price_2 = $request->price_2;
        $post->price_3 = $request->price_3;
        $post->description = $request->description;

        if($request->image)
        {
            $this->deleteImage($post->image);
            $post->image = $this->saveImage($request->image);
        }
        $post->save();

        $post->genderPost()->delete();
        $post->sizePost()->delete();

        foreach ($request->gender as $gender_id)
        {
            $gender_post = ['gender_id'=>$gender_id];
        }
        $post->genderPost()->create($gender_post);

        foreach ($request->size as $size_id)
        {
            $size_post = ['size_id'=>$size_id];
        }
        $post->sizePost()->create($size_post);

        return redirect()->route('post.show', $id);   
    }

    public function deleteImage($image_name)
    {
        $image_path = self::LOCAL_STORAGE_FOLDER.$image_name;

         if(Storage::disk('local')->exists($image_path))
        {
            Storage::disk('local')->delete($image_path);
        }
    }

    public function destroy($id)
    {
        $post = $this->post->findOrFail($id);
        $this->deleteImage($post->image);

        $this->post->destroy($id);

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\post\PutRequest;
use App\Http\Requests\post\StoreRequest;
use App\Models\Category;
use App\Models\post;


class postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       //return route("post.create");
       //return redirect("/post/create");
       //return to_route("post.create");

       $posts = Post::paginate(2);
       return view("dashboard.post.index",compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('id','title');
        $post = new post();


        echo view('dashboard.post.create',compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
       //echo (request('title'));
       // dd($request);

       //$validated = $request->validate(StoreRequest::myRules());

       //dd($validated);

       //$data = array_merge($request->all(),['image' => '']);
       
       //dd($data);

    //    $data =$request->validated();

    //    $data['slug']= Str::slug($data['title']);

    //    dd($data); 
       
       Post::create($request->validated());
       return to_route("post.index")->with('status',"Registro Creado.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return view("dashboard.show",compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        $categories = Category::pluck('id','title');
        echo view('dashboard.post.edit',compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, post $post)

    {
        $data = $request->validated();
        if (isset($data["image"])){
            $data["image"] = $filename = time().".".$data["image"]->extension();

            $request->image->move(public_path("image"), $filename);
        }
    
        $post->update($data);
        //$request->session()->flash('status',"Registro actualizado.");
        return to_route("post.index")->with('status',"Registro actualizado.");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        
        $post->delete();
        return to_route("post.index")->with('status',"Registro Eliminado.");
    }
}

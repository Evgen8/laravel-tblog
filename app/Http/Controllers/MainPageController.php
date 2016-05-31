<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests;

class MainPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::latest('created_at')->where('status', '=', 1)->paginate(9);
        $category = Category::all();
        return view('main', ['post' => $post, 'category' => $category]);
    }
    public function slug()
    {
        Post::Slug()->get();
        return redirect('/');
    }

    public function sortPost($category)
    {
        $categoryId = Category::select('id')->where('slug', '=', $category )->firstOrFail()->id;
        //dd($categoryId);
        $post = Post::where('category_id', '=', $categoryId )->where('status', '=', 1)->paginate(9);
        $category = Category::all();
        return view('main', ['post' => $post, 'category' => $category, 'categoryId' => $categoryId ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $result = Post::SearchByKeyword($keyword)->where('status', '=', 1)->orderBy('id', 'asc')->get();
        $count = $result->count();
        $category = Category::all();
        return view('post.searchResults', ['result' => $result, 'keyword' => $keyword, 'count' => $count, 'category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Application;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $title = Post::find($id);
        if (!$title) {
            return redirect()->back()->with('errorMsg', 'Post not found');
        }

        // Some older submissions store the human title; newer ones store the slug.
        $news = Application::where('position', $title->slug)
            ->orWhere('position', $title->title)
            ->get();
        return view('admin.applicant.index', compact('news','title'));
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
        $news = Application::find($id);
        if (file_exists('uploads/application/'.$news->image))
        {
            unlink('uploads/application/'.$news->image);
        }
        $news->delete();
        return redirect()->back()->with('successMsg','Application Successfully Deleted');
    }
}
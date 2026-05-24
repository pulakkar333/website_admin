<?php

namespace App\Http\Controllers\admin;

use App\Models\ClientsPhoto;
use App\photo_gallery_table;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // $photo =   ClientsPhoto::all();
                $photo = ClientsPhoto::with('category')->orderBy('sl', 'asc')->get();

        return view('admin.client.index',compact('photo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Models\ClientCategory::where('status', 1)->orderBy('order', 'asc')->get();
        return view('admin.client.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'category_id' => 'required|exists:client_categories,id',
            'title' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = Str::slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/client'))
            {
                mkdir('uploads/client', 0777 , true);
            }
            $image->move('uploads/client',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $photo = new ClientsPhoto();
        $photo->category_id = $request->category_id;
        $photo->title = $request->title;
        $photo->designation = $request->designation;
        $photo->slug = $slug;
        $photo->image = $imagename;
        $photo->status = $request->has('status') ? 1 : 0;
        $photo->save();
        return redirect()->route('client.index')->with('successMsg','Clients Logo Successfully Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = ClientsPhoto::find($id);
        $categories = \App\Models\ClientCategory::where('status', 1)->orderBy('order', 'asc')->get();
        return view('admin/client/edit', compact('photo', 'categories'));
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
        $this->validate($request,[
            'category_id' => 'required|exists:client_categories,id',
            'title' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = Str::slug($request->title);
        $sl = $request->sl;
        $photo= ClientsPhoto::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/client'))
            {
                mkdir('uploads/client', 0777 , true);
            }
            $image->move('uploads/client',$imagename);
        }else {
            $imagename = $photo->image;
        }

        $photo->category_id = $request->category_id;
        $photo->title = $request->title;
        $photo->designation = $request->designation;
        $photo->slug = $slug;
        $photo->sl = $sl;
        $photo->image = $imagename;
        $photo->status = $request->has('status') ? 1 : 0;
        $photo->save();
        return redirect()->route('client.index')->with('successMsg','Clients Photo Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = ClientsPhoto::find($id);
        if (file_exists('uploads/client/'.$photo->image))
        {
            unlink('uploads/client/'.$photo->image);
        }
        $photo->delete();
        return redirect()->back()->with('successMsg','Clients Photo Successfully Deleted');
    }
}
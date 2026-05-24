<?php

namespace App\Http\Controllers\admin;

use App\Models\TechnicalSupportService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechnicalSupportServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = TechnicalSupportService::orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        return view('admin.technicalsupportservice.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.technicalsupportservice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'details' => 'required|string',
        ]);

        $service = new TechnicalSupportService();
        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->details = $request->details;
        $service->status = $request->status ?? 1;
        $service->order = $request->order ?? 0;
        $service->save();

        return redirect()->route('technicalsupportservice.index')->with('successMsg', 'Support Service Successfully Saved');
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
        $service = TechnicalSupportService::findOrFail($id);
        return view('admin.technicalsupportservice.edit', compact('service'));
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
        $this->validate($request, [
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'details' => 'required|string',
        ]);

        $service = TechnicalSupportService::findOrFail($id);
        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->details = $request->details;
        $service->status = $request->status ?? 1;
        $service->order = $request->order ?? 0;
        $service->save();

        return redirect()->route('technicalsupportservice.index')->with('successMsg', 'Support Service Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = TechnicalSupportService::findOrFail($id);
        $service->delete();

        return redirect()->back()->with('successMsg', 'Support Service Successfully Deleted');
    }
}


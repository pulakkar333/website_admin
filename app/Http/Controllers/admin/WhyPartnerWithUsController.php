<?php

namespace App\Http\Controllers\admin;

use App\Models\WhyPartnerWithUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WhyPartnerWithUsController extends Controller
{
    public function index()
    {
        $items = WhyPartnerWithUs::orderBy('order', 'asc')->get();
        return view('admin.why-partner.index', compact('items'));
    }

    public function create()
    {
        return view('admin.why-partner.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'icon' => 'required',
            'title' => 'required',
            'details' => 'required',
        ]);

        $item = new WhyPartnerWithUs();
        $item->icon = $request->icon;
        $item->title = $request->title;
        $item->details = $request->details;
        $item->order = $request->order ?? 0;
        $item->save();

        return redirect()->route('why-partner.index')->with('successMsg', 'Item Successfully Saved');
    }

    public function edit($id)
    {
        $item = WhyPartnerWithUs::find($id);
        return view('admin.why-partner.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'icon' => 'required',
            'title' => 'required',
            'details' => 'required',
        ]);

        $item = WhyPartnerWithUs::find($id);
        $item->icon = $request->icon;
        $item->title = $request->title;
        $item->details = $request->details;
        $item->order = $request->order ?? 0;
        $item->save();

        return redirect()->route('why-partner.index')->with('successMsg', 'Item Successfully Updated');
    }

    public function destroy($id)
    {
        $item = WhyPartnerWithUs::find($id);
        $item->delete();
        return redirect()->back()->with('successMsg', 'Item Successfully Deleted');
    }
}


<?php

namespace App\Http\Controllers\admin;

use App\Models\Partner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('order', 'asc')->get();
        return view('admin.partner.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partner.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png,webp',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->name);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/partners')) {
                mkdir('uploads/partners', 0777, true);
            }
            $image->move('uploads/partners', $imagename);
        } else {
            $imagename = 'default.png';
        }

        $partner = new Partner();
        $partner->name = $request->name;
        $partner->image = $imagename;
        $partner->website = $request->website;
        $partner->order = $request->order ?? 0;
        $partner->status = $request->status ?? 1;
        $partner->save();

        return redirect()->route('partner.index')->with('successMsg', 'Partner Successfully Saved');
    }

    public function edit($id)
    {
        $partner = Partner::find($id);
        return view('admin.partner.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png,webp',
        ]);

        $partner = Partner::find($id);
        $image = $request->file('image');
        $slug = Str::slug($request->name);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/partners')) {
                mkdir('uploads/partners', 0777, true);
            }
            $image->move('uploads/partners', $imagename);

            // Delete old image
            if (file_exists('uploads/partners/' . $partner->image)) {
                unlink('uploads/partners/' . $partner->image);
            }
        } else {
            $imagename = $partner->image;
        }

        $partner->name = $request->name;
        $partner->image = $imagename;
        $partner->website = $request->website;
        $partner->order = $request->order ?? 0;
        $partner->status = $request->status ?? 1;
        $partner->save();

        return redirect()->route('partner.index')->with('successMsg', 'Partner Successfully Updated');
    }

    public function destroy($id)
    {
        $partner = Partner::find($id);
        if (file_exists('uploads/partners/' . $partner->image)) {
            unlink('uploads/partners/' . $partner->image);
        }
        $partner->delete();

        return redirect()->back()->with('successMsg', 'Partner Successfully Deleted');
    }
}


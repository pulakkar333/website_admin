<?php

namespace App\Http\Controllers\admin;

use App\Models\FooterAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FooterAddressController extends Controller
{
    public function index()
    {
        $addresses = FooterAddress::orderBy('order', 'asc')->get();
        return view('admin.footer-address.index', compact('addresses'));
    }

    public function create()
    {
        return view('admin.footer-address.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $address = new FooterAddress();
        $address->title = $request->title;
        $address->address = $request->address;
        $address->order = $request->order ?? 0;
        $address->save();

        return redirect()->route('footer-address.index')->with('successMsg', 'Address Successfully Saved');
    }

    public function edit($id)
    {
        $address = FooterAddress::find($id);
        return view('admin.footer-address.edit', compact('address'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $address = FooterAddress::find($id);
        $address->title = $request->title;
        $address->address = $request->address;
        $address->order = $request->order ?? 0;
        $address->save();

        return redirect()->route('footer-address.index')->with('successMsg', 'Address Successfully Updated');
    }

    public function destroy($id)
    {
        $address = FooterAddress::find($id);
        $address->delete();
        return redirect()->back()->with('successMsg', 'Address Successfully Deleted');
    }
}


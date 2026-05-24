<?php

namespace App\Http\Controllers\admin;

use App\Models\DealershipContact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DealershipContactController extends Controller
{
    public function edit()
    {
        $contact = DealershipContact::first();
        if (!$contact) {
            $contact = new DealershipContact();
            $contact->email = '';
            $contact->phone = '';
            $contact->office_hours = '';
            $contact->save();
        }
        return view('admin.dealership-contact.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'phone' => 'required',
            'office_hours' => 'required',
        ]);

        $contact = DealershipContact::first();
        if (!$contact) {
            $contact = new DealershipContact();
        }

        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->office_hours = $request->office_hours;
        $contact->save();

        return redirect()->route('dealership-contact.edit')->with('successMsg', 'Contact Information Successfully Updated');
    }
}


 <?php

namespace App\Http\Controllers\admin;

use App\Models\FooterContact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FooterContactController extends Controller
{
    public function edit()
    {
        $contact = FooterContact::first();
        if (!$contact) {
            $contact = new FooterContact();
            $contact->phone = '';
            $contact->ordermobile = '';
            $contact->salesmobile = '';
            $contact->servicemobile = '';
            $contact->email = '';
            $contact->save();
        }
        return view('admin.footer-contact.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|string|max:255',
            'ordermobile' => 'required|string|max:255',
            'salesmobile' => 'required|string|max:255',
            'servicemobile' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $contact = FooterContact::first();
        if (!$contact) {
            $contact = new FooterContact();
        }

        $contact->phone = $request->phone;
        $contact->ordermobile = $request->ordermobile; 
        $contact->salesmobile = $request->salesmobile;
        $contact->servicemobile = $request->servicemobile;
        $contact->email = $request->email;
        $contact->save();

        return redirect()->route('footer-contact.edit')->with('successMsg', 'Footer Contact Information Successfully Updated');
    }
}
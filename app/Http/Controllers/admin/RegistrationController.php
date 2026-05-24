<?php

namespace App\Http\Controllers\admin;

use App\Models\Registration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::orderBy('created_at', 'desc')->get();
        return view('admin.registration.index', compact('registrations'));
    }

    public function show($id)
    {
        $registration = Registration::findOrFail($id);
        return view('admin.registration.show', compact('registration'));
    }

    public function destroy($id)
    {
        $registration = Registration::findOrFail($id);
        
        // Delete file if exists
        if ($registration->file && file_exists(public_path($registration->file))) {
            unlink(public_path($registration->file));
        }
        
        $registration->delete();

        return redirect()->back()->with('successMsg', 'Registration Successfully Deleted');
    }

    public function updateStatus($id)
    {
        $registration = Registration::find($id);
        $registration->status = $registration->status == 1 ? 0 : 1;
        $registration->save();

        return redirect()->back()->with('successMsg', 'Status Successfully Updated');
    }
}


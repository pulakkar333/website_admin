<?php

namespace App\Http\Controllers\admin;

use App\Models\TechnicalSupport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechnicalSupportController extends Controller
{
    public function index()
    {
        $technicalSupports = TechnicalSupport::orderBy('created_at', 'desc')->get();
        return view('admin.technicalsupport.index', compact('technicalSupports'));
    }

    public function show($id)
    {
        $support = TechnicalSupport::findOrFail($id);
        return view('admin.technicalsupport.show', compact('support'));
    }

    public function destroy($id)
    {
        $support = TechnicalSupport::findOrFail($id);
        
        // Delete file if exists
        if ($support->file && file_exists(public_path($support->file))) {
            unlink(public_path($support->file));
        }
        
        $support->delete();

        return redirect()->back()->with('successMsg', 'Technical Support Request Successfully Deleted');
    }

    public function updateStatus($id)
    {
        $support = TechnicalSupport::findOrFail($id);
        $support->status = $support->status == 1 ? 0 : 1;
        $support->save();

        return redirect()->back()->with('successMsg', 'Status Successfully Updated');
    }
}


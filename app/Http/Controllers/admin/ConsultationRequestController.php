<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ConsultationRequest;
use Illuminate\Http\Request;

class ConsultationRequestController extends Controller
{
    public function index()
    {
        $consultationRequests = ConsultationRequest::orderBy('created_at', 'desc')->get();
        return view('admin.consultation-request.index', compact('consultationRequests'));
    }

    public function show($id)
    {
        $consultationRequest = ConsultationRequest::findOrFail($id);
        return view('admin.consultation-request.show', compact('consultationRequest'));
    }

    public function destroy($id)
    {
        $consultationRequest = ConsultationRequest::findOrFail($id);

        // Delete file if exists
        if ($consultationRequest->file && file_exists(public_path($consultationRequest->file))) {
            unlink(public_path($consultationRequest->file));
        }

        $consultationRequest->delete();

        return redirect()->back()->with('successMsg', 'Consultation Request Successfully Deleted');
    }
}

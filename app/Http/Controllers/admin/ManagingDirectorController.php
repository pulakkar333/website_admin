<?php

namespace App\Http\Controllers\admin;

use App\Models\ManagingDirector;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ManagingDirectorController extends Controller
{
    /**
     * Display a listing of managing directors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managingDirectors = ManagingDirector::orderBy('created_at', 'DESC')->get();
        return view('admin.managing_director.index', compact('managingDirectors'));
    }

    /**
     * Show the form for creating a new managing director.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.managing_director.create');
    }

    /**
     * Store a newly created managing director.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'message' => 'nullable|string',
            'career_title' => 'nullable|array',
            'career_title.*' => 'nullable|string|max:255',
            'career_short' => 'nullable|array',
            'career_short.*' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'status' => 'boolean',
        ]);

        $md = new ManagingDirector();
        $md->name = $request->name;
        $md->designation = $request->designation;
        $md->message = $request->message;

        // Handle career highlights
        $careerHighlights = [];
        if ($request->has('career_title') && is_array($request->career_title)) {
            $titles = $request->career_title;
            $shorts = $request->has('career_short') ? $request->career_short : [];

            foreach ($titles as $index => $title) {
                if (!empty(trim($title))) {
                    $careerHighlights[] = [
                        'title' => trim($title),
                        'short' => isset($shorts[$index]) ? trim($shorts[$index]) : ''
                    ];
                }
            }
        }
        $md->career_highlights = $careerHighlights;
        $md->status = $request->has('status') ? 1 : 0;

        // Handle profile image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'md_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/managing_director'), $imageName);
            $md->image = $imageName;
        }

        // Handle signature upload
        if ($request->hasFile('signature')) {
            $signature = $request->file('signature');
            $signatureName = 'signature_' . time() . '.' . $signature->getClientOriginalExtension();
            $signature->move(public_path('uploads/managing_director'), $signatureName);
            $md->signature = $signatureName;
        }

        $md->save();

        return redirect()->route('admin.managing_director.index')
            ->with('successMsg', 'Managing Director added successfully');
    }

    /**
     * Show the form for editing the managing director.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $md = ManagingDirector::findOrFail($id);
        return view('admin.managing_director.edit', compact('md'));
    }

    /**
     * Update the managing director information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'message' => 'nullable|string',
            'career_title' => 'nullable|array',
            'career_title.*' => 'nullable|string|max:255',
            'career_short' => 'nullable|array',
            'career_short.*' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'status' => 'boolean',
        ]);

        $md = ManagingDirector::findOrFail($id);

        $md->name = $request->name;
        $md->designation = $request->designation;
        $md->message = $request->message;

        // Handle career highlights - combine title and short description
        $careerHighlights = [];
        if ($request->has('career_title') && is_array($request->career_title)) {
            $titles = $request->career_title;
            $shorts = $request->has('career_short') ? $request->career_short : [];

            foreach ($titles as $index => $title) {
                // Only add if title is not empty
                if (!empty(trim($title))) {
                    $careerHighlights[] = [
                        'title' => trim($title),
                        'short' => isset($shorts[$index]) ? trim($shorts[$index]) : ''
                    ];
                }
            }
        }
        $md->career_highlights = $careerHighlights;

        $md->status = $request->has('status') ? 1 : 0;

        // Handle profile image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($md->image && File::exists(public_path('uploads/managing_director/' . $md->image))) {
                File::delete(public_path('uploads/managing_director/' . $md->image));
            }

            $image = $request->file('image');
            $imageName = 'md_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/managing_director'), $imageName);
            $md->image = $imageName;
        }

        // Handle signature upload
        if ($request->hasFile('signature')) {
            // Delete old signature if exists
            if ($md->signature && File::exists(public_path('uploads/managing_director/' . $md->signature))) {
                File::delete(public_path('uploads/managing_director/' . $md->signature));
            }

            $signature = $request->file('signature');
            $signatureName = 'signature_' . time() . '.' . $signature->getClientOriginalExtension();
            $signature->move(public_path('uploads/managing_director'), $signatureName);
            $md->signature = $signatureName;
        }

        $md->save();

        return redirect()->route('admin.managing_director.index')
            ->with('successMsg', 'Managing Director information updated successfully');
    }

    /**
     * Remove the specified managing director.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $md = ManagingDirector::findOrFail($id);

        // Delete images if exist
        if ($md->image && File::exists(public_path('uploads/managing_director/' . $md->image))) {
            File::delete(public_path('uploads/managing_director/' . $md->image));
        }

        if ($md->signature && File::exists(public_path('uploads/managing_director/' . $md->signature))) {
            File::delete(public_path('uploads/managing_director/' . $md->signature));
        }

        $md->delete();

        return redirect()->route('admin.managing_director.index')
            ->with('successMsg', 'Managing Director deleted successfully');
    }
}


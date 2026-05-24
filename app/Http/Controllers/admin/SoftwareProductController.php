<?php

namespace App\Http\Controllers\admin;

use App\Models\SoftwareProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SoftwareProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $software = SoftwareProduct::orderBy('order', 'ASC')->get();
        return view('admin.software.index', compact('software'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.software.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate arrays
        $request->validate([
            'name' => 'required|array',
            'name.*' => 'required|string|max:255',
            'description' => 'nullable|array',
            'description.*' => 'nullable|string',
            'version' => 'nullable|array',
            'version.*' => 'nullable|string|max:50',
            'icon' => 'nullable|array',
            'icon.*' => 'nullable|url|max:500',
            'pdf_manual_link' => 'nullable|array',
            'pdf_manual_link.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,csv,ppt,pptx,txt,zip,rar,7z,tar,gz|max:10240',
            'software_file' => 'nullable|array',
'software_file.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,csv,ppt,pptx,txt,zip,rar,7z,tar,gz,exe,msi,dmg,deb,rpm|max:81920',
            'order' => 'required|array',
            'order.*' => 'required|integer|min:0',
            'status' => 'nullable|array',
        ]);

        // Ensure upload directories exist
        if (!file_exists(public_path('uploads/software/manuals'))) {
            mkdir(public_path('uploads/software/manuals'), 0777, true);
        }
        if (!file_exists(public_path('uploads/software/files'))) {
            mkdir(public_path('uploads/software/files'), 0777, true);
        }

        $names = $request->name;
        $count = count($names);
        $savedCount = 0;

        // Loop through each software entry
        foreach ($names as $index => $name) {
            // Skip if name is empty
            if (empty(trim($name))) {
                continue;
            }

            $software = new SoftwareProduct();
            $software->name = trim($name);
            $software->slug = Str::slug($name);
            $software->description = isset($request->description[$index]) ? $request->description[$index] : null;
            $software->version = isset($request->version[$index]) ? $request->version[$index] : null;
            $software->icon = isset($request->icon[$index]) ? $request->icon[$index] : null;
            // Note: Download link, video tutorial link, installation steps, license info, and support details are managed separately via Settings
            $software->order = isset($request->order[$index]) ? $request->order[$index] : ($index + 1);

            // Handle status checkbox array
            $status = isset($request->status[$index]) && $request->status[$index] == '1' ? 1 : 0;
            $software->status = $status;

            // Handle PDF manual upload
            if ($request->hasFile('pdf_manual_link') && isset($request->file('pdf_manual_link')[$index])) {
                $pdf = $request->file('pdf_manual_link')[$index];
                if ($pdf && $pdf->isValid()) {
                    $pdfName = time() . '_' . uniqid() . '_' . $index . '.' . $pdf->getClientOriginalExtension();
                    $pdf->move(public_path('uploads/software/manuals'), $pdfName);
                    $software->pdf_manual_link = $pdfName;
                }
            }

            // Handle software file upload
            if ($request->hasFile('software_file') && isset($request->file('software_file')[$index])) {
                $softwareFile = $request->file('software_file')[$index];
                if ($softwareFile && $softwareFile->isValid()) {
                    $fileName = time() . '_' . uniqid() . '_' . $index . '_' . Str::slug($name) . '.' . $softwareFile->getClientOriginalExtension();
                    $softwareFile->move(public_path('uploads/software/files'), $fileName);
                    $software->software_file = $fileName;
                }
            }

            $software->save();
            $savedCount++;
        }

        if ($savedCount > 0) {
            $message = $savedCount == 1
                ? 'Software product added successfully'
                : $savedCount . ' software products added successfully';

            return redirect()->route('admin.software.index')
                ->with('successMsg', $message);
        } else {
            return redirect()->back()
                ->with('errorMsg', 'No software products were saved. Please fill in at least one software name.')
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $software = SoftwareProduct::findOrFail($id);
        return view('admin.software.edit', compact('software'));
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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'version' => 'nullable|string|max:50',
            'icon' => 'nullable|url|max:500',
            'pdf_manual_link' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,csv,ppt,pptx,txt,zip,rar,7z,tar,gz|max:10240',
'software_file.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,csv,ppt,pptx,txt,zip,rar,7z,tar,gz,exe,msi,dmg,deb,rpm|max:81920',
            'order' => 'required|integer|min:0',
            'status' => 'boolean',
        ]);

        $software = SoftwareProduct::findOrFail($id);
        $software->name = $request->name;
        $software->slug = Str::slug($request->name);
        $software->description = $request->description;
        $software->version = $request->version;
        $software->icon = $request->icon;
        // Note: Download link, video tutorial link, installation steps, license info, and support details are managed separately via Settings
        $software->order = $request->order;
        $software->status = $request->has('status') ? 1 : 0;

        // Handle PDF manual upload
        if ($request->hasFile('pdf_manual_link')) {
            // Delete old PDF if exists
            if ($software->pdf_manual_link && File::exists(public_path('uploads/software/manuals/' . $software->pdf_manual_link))) {
                File::delete(public_path('uploads/software/manuals/' . $software->pdf_manual_link));
            }

            $pdf = $request->file('pdf_manual_link');
            $pdfName = time() . '_' . uniqid() . '.' . $pdf->getClientOriginalExtension();

            if (!file_exists(public_path('uploads/software/manuals'))) {
                mkdir(public_path('uploads/software/manuals'), 0777, true);
            }

            $pdf->move(public_path('uploads/software/manuals'), $pdfName);
            $software->pdf_manual_link = $pdfName;
        }

        // Handle software file upload
        if ($request->hasFile('software_file')) {
            // Delete old software file if exists
            if ($software->software_file && File::exists(public_path('uploads/software/files/' . $software->software_file))) {
                File::delete(public_path('uploads/software/files/' . $software->software_file));
            }

            $softwareFile = $request->file('software_file');
            $fileName = time() . '_' . uniqid() . '_' . Str::slug($software->name) . '.' . $softwareFile->getClientOriginalExtension();

            if (!file_exists(public_path('uploads/software/files'))) {
                mkdir(public_path('uploads/software/files'), 0777, true);
            }

            $softwareFile->move(public_path('uploads/software/files'), $fileName);
            $software->software_file = $fileName;
        }

        $software->save();

        return redirect()->route('admin.software.index')
            ->with('successMsg', 'Software product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $software = SoftwareProduct::findOrFail($id);

        // Delete PDF if exists
        if ($software->pdf_manual_link && File::exists(public_path('uploads/software/manuals/' . $software->pdf_manual_link))) {
            File::delete(public_path('uploads/software/manuals/' . $software->pdf_manual_link));
        }

        // Delete software file if exists
        if ($software->software_file && File::exists(public_path('uploads/software/files/' . $software->software_file))) {
            File::delete(public_path('uploads/software/files/' . $software->software_file));
        }

        $software->delete();

        return redirect()->route('admin.software.index')
            ->with('successMsg', 'Software product deleted successfully');
    }

    /**
     * Download software file for frontend users
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $software = SoftwareProduct::where('id', $id)
            ->where('status', 1)
            ->firstOrFail();

        if (!$software->software_file) {
            abort(404, 'Software file not found');
        }

        $filePath = public_path('uploads/software/files/' . $software->software_file);

        if (!File::exists($filePath)) {
            abort(404, 'Software file not found on server');
        }

        return response()->download($filePath, $software->name . '_' . $software->software_file);
    }
}
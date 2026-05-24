<?php

namespace App\Http\Controllers\Admin;

use App\Models\ParentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class ParentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $categories = ParentCategory::all();
        $categories = ParentCategory::orderBy('id', 'DESC')->get();
        return view('admin.pcategory.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,bmp,png,webp|max:2048',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->name);
        $imagename = 'default.png';

        if ($image) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('uploads/pcategory')) {
                mkdir('uploads/pcategory', 0777, true);
            }

            // Resize image before saving
            $this->resizeImage($image, 'uploads/pcategory/' . $imagename);
        }

        $pcategory = new ParentCategory();
        $pcategory->name = $request->name;
      //  $pcategory->title = $request->name; // Using name as title
        $pcategory->image = $imagename;
        $pcategory->save();

        return redirect()->route('pcategory.index')
            ->with('successMsg', 'Parent Category Successfully Saved');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pcategory = ParentCategory::findOrFail($id);
        return view('admin.pcategory.edit', compact('pcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,bmp,png,webp|max:2048',
        ]);

        $pcategory = ParentCategory::findOrFail($id);
        $image = $request->file('image');
        $slug = Str::slug($request->name);

        if ($image) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('uploads/pcategory')) {
                mkdir('uploads/pcategory', 0777, true);
            }

            // Delete old image if it's not the default
            if ($pcategory->image && file_exists('uploads/pcategory/' . $pcategory->image) && $pcategory->image !== 'default.png') {
                unlink('uploads/pcategory/' . $pcategory->image);
            }

            // Resize image before saving
            $this->resizeImage($image, 'uploads/pcategory/' . $imagename);
        } else {
            $imagename = $pcategory->image; // Keep existing image
        }

        $pcategory->name = $request->name;
        //$pcategory->title = $request->name; // Using name as title
        $pcategory->image = $imagename;
        $pcategory->save();

        return redirect()->route('pcategory.index')
            ->with('successMsg', 'Parent Category Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
//    public function destroy($id)
//    {
//        $pcategory = ParentCategory::findOrFail($id);
//        $pcategory->delete();
//
//        return redirect()->back()->with('successMsg', 'Parent Category Successfully Deleted');
//    }

    public function destroy($id)
    {
        $pcategory = ParentCategory::findOrFail($id);

        // Check if this parent category has subcategories
        if ($pcategory->subCategories()->exists()) {
            return redirect()->back()->with('successMsg', 'Cannot delete. This parent category has subcategories.');
        }

        // Delete image if it's not the default
        if ($pcategory->image && file_exists('uploads/pcategory/' . $pcategory->image) && $pcategory->image !== 'default.png') {
            unlink('uploads/pcategory/' . $pcategory->image);
        }

        $pcategory->delete();

        return redirect()->back()->with('successMsg', 'Parent Category Successfully Deleted');
    }

    /**
     * Resize an image to a maximum width of 600px and height of 400px.
     *
     * @param  \Illuminate\Http\UploadedFile  $image
     * @param  string  $path
     * @return void
     */
    private function resizeImage($image, $path)
    {
        // Get the image dimensions
        list($width, $height) = getimagesize($image);

        // Set the maximum width and height
        $maxWidth = 600;
        $maxHeight = 400;

        // Calculate the aspect ratio
        $aspectRatio = $width / $height;

        // Calculate new dimensions
        if ($width > $height) {
            $newWidth = $maxWidth;
            $newHeight = $maxWidth / $aspectRatio;
        } else {
            $newHeight = $maxHeight;
            $newWidth = $maxHeight * $aspectRatio;
        }

        // Create a new image resource
        $newImage = imagecreatetruecolor($newWidth, $newHeight);

        // Create the image based on the file type
        $imageType = exif_imagetype($image);
        switch ($imageType) {
            case IMAGETYPE_JPEG:
                $img = imagecreatefromjpeg($image);
                break;
            case IMAGETYPE_PNG:
                $img = imagecreatefrompng($image);
                break;
            case IMAGETYPE_GIF:
                $img = imagecreatefromgif($image);
                break;
            default:
                return; // Unsupported image type
        }

        // Resample the image to new dimensions
        imagecopyresampled($newImage, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        // Save the image to the given path
        imagejpeg($newImage, $path, 90); // 90 is the quality level for JPEG images

        // Free up memory
        imagedestroy($img);
        imagedestroy($newImage);
    }

}
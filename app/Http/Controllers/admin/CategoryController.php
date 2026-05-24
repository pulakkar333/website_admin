<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Import Str class
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all categories
        $categories = Category::all();
        return view('admin.category.index', compact('categories')); // Return the view with categories
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->name); // Use Str::slug

        // Handling images2
        $images2 = [];
        if ($request->hasFile('images2')) {
            foreach ($request->file('images2') as $image2) {
                $imageName = time() . '_' . $image2->getClientOriginalName();
                // Resize image2 before saving
                $this->resizeImage($image2, public_path('images/' . $imageName));
                $images2[] = $imageName;
            }
        }
        $imagesString = implode(',', $images2);

        // Handling main image
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('uploads/category')) {
                mkdir('uploads/category', 0777, true);
            }

            // Resize main image before saving
            $this->resizeImage($image, 'uploads/category/' . $imagename);
        } else {
            $imagename = 'default.png'; // Default image name if no image is uploaded
        }

        // Save category to the database
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = $slug;
        $category->image = $imagename;
        $category->images2 = $imagesString;
        $category->save();

        return redirect()->route('category.index')->with('successMsg', 'Category Successfully Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Implementation for showing a specific resource
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
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
        $this->validate($request, [
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->name);
        $category = Category::find($id);

        // Handling main image upload
        if ($image) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('uploads/category')) {
                mkdir('uploads/category', 0777, true);
            }

            // Resize main image before saving
            $this->resizeImage($image, 'uploads/category/' . $imagename);
        } else {
            $imagename = $category->image; // Keep existing image if no new image is uploaded
        }

        // Handling multiple images2
        if ($request->hasFile('images2')) {
            $images2 = $request->file('images2');
            $newImageNames = [];

            foreach ($images2 as $image2) {
                $imageName2 = uniqid() . '_' . $image2->getClientOriginalName();
                // Resize image2 before saving
                $this->resizeImage($image2, public_path('images/' . $imageName2));
                $newImageNames[] = $imageName2;
            }

            // Merge new images with existing images
            $existingImages = $category->images2 ? explode(',', $category->images2) : [];
            $mergedImages = array_merge($existingImages, $newImageNames);
            $category->images2 = implode(',', $mergedImages);
        }

        // Handle image deletions (if any)
        if ($request->has('deleted_images')) {
            $deletedImages = $request->input('deleted_images');
            foreach ($deletedImages as $imageToDelete) {
                $imagePath = public_path('images/' . $imageToDelete);
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Delete image from the server
                }
            }

            // Update DB to remove deleted image names
            $currentImages = explode(',', $category->images2);
            $category->images2 = implode(',', array_diff($currentImages, $deletedImages));
        }

        // Update other fields
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = $slug;
        $category->image = $imagename;

        $category->save();

        return redirect()->route('category.index')->with('successMsg', 'Category Successfully Updated');
    }

    /**
     * Resize an image to a maximum width of 800px and height of 600px.
     *
     * @param  \Illuminate\Http\UploadedFile  $image
     * @param  string  $path
     * @return void
     */
    private function resizeImage($image, $path)
    {
        // Check if GD library is installed to prevent the error
        if (!extension_loaded('gd')) {
            $image->move(dirname($path), basename($path));
            return;
        }

        // Use getRealPath() for the image file
        $imagePath = $image->getRealPath();
        
        // Get the image dimensions
        list($width, $height) = getimagesize($imagePath);

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
        $imageType = exif_imagetype($imagePath);
        switch ($imageType) {
            case IMAGETYPE_JPEG:
                $img = imagecreatefromjpeg($imagePath);
                break;
            case IMAGETYPE_PNG:
                $img = imagecreatefrompng($imagePath);
                break;
            case IMAGETYPE_GIF:
                $img = imagecreatefromgif($imagePath);
                break;
            default:
                $image->move(dirname($path), basename($path));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (file_exists('uploads/category/' . $category->image)) {
            unlink('uploads/category/' . $category->image);
        }
        $category->delete();
        return redirect()->back()->with('successMsg', 'Category Successfully Deleted');
    }
}
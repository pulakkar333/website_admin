<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClientCategory;
use App\Models\ClientsPhoto;
use Illuminate\Http\Request;

class ClientCategoryController extends Controller
{
    public function index()
    {
        $categories = ClientCategory::where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();

        $categories->transform(function ($category) {
            $category->image_url = $category->image ? url('uploads/clientmanage/' . $category->image) : null;
            $category->has_image = !empty($category->image);
            return $category;
        });

        return response()->json($categories);
    }


    // public function show($slug)
    // {
    //     $category = ClientCategory::where('slug', $slug)
    //         ->where('status', 1)
    //         ->firstOrFail();

    //     // Add image URL
    //     $category->image_url = $category->image ? url('uploads/clientmanage/' . $category->image) : null;
    //     $category->has_image = !empty($category->image);

    //     // Get clients for this category
    //     $clients = ClientsPhoto::where('category_id', $category->id)
    //         ->where('status', 1)
    //         ->get();

    //     $clients->transform(function ($client) {
    //         $client->photo = $client->image ? url('uploads/client/' . $client->image) : null;
    //         return $client;
    //     });

    //     $category->clients = $clients;

    //     return response()->json($category);
    // }


    public function getClientsByCategory()
    {
        $categories = ClientCategory::where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        $result = [];
        foreach ($categories as $category) {
            // Add image URL to category
            $category->image_url = $category->image ? url('uploads/clientmanage/' . $category->image) : null;
            $category->has_image = !empty($category->image);

           $clients = ClientsPhoto::where('category_id', $category->id)
                ->where('status', 1) ->orderBy('sl', 'asc')
                ->get();

            $clients->transform(function ($client) {
                $client->photo = $client->image ? url('uploads/client/' . $client->image) : null;
                return $client;
            });

            $categoryData = [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
                'title' => $category->title,
                'details' => $category->details,
                'image' => $category->image,
                'image_url' => $category->image_url,
                'has_image' => $category->has_image,
                'order' => $category->order,
                'clients' => $clients
            ];

            $result[$category->slug] = $categoryData;
        }

        return response()->json($result);
    }
}
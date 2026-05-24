<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    public function index()
    {
       $services = Testimonials::orderBy('sl', 'asc')->get();
($services); // Check the ordered results here

$services->transform(function ($service) {
    $service->image = url('uploads/testimonial/' . $service->image);
    return $service;
});
return response()->json($services);

    }



}

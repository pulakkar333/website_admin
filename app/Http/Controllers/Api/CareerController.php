<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Post;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query();

        // Search by keyword (searches in title, description, job_summery)
        if ($request->has('keyword') && $request->keyword) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('description', 'like', '%' . $keyword . '%')
                    ->orWhere('job_summery', 'like', '%' . $keyword . '%');
            });
        }

        // Filter by department (jobFunction)
        if ($request->has('department') && $request->department && $request->department !== 'All Departments') {
            $query->where('jobFunction', $request->department);
        }

        // Filter by location
        if ($request->has('location') && $request->location && $request->location !== 'All Locations') {
            $query->where('location', $request->location);
        }

        // Auto-hide posts where deadline has passed
        $query->where(function ($q) {
            $q->whereNull('deadline')
                ->orWhere('deadline', '>=', now()->toDateString());
        });

        $careers = $query->orderBy('sequence', 'asc')->get();

        return response()->json([
            'success' => true,
            'data'    => $careers,
            'total'   => $careers->count(),
        ]);
    }

    public function details($slug)
    {
        // Fetch the page based on the slug
        $page = Post::where('slug', $slug)
            ->where(function ($q) {
                $q->whereNull('deadline')
                    ->orWhere('deadline', '>=', now()->toDateString());
            })
            ->first();

        // Check if the page exists
        if (! $page) {
            return response()->json(['message' => 'Post not found or deadline has passed'], 404); // Return a 404 error if the page is not found
        }

        // Return the page data as JSON
        return response()->json([
            'success' => true,
            'data'    => $page,
        ]);
    }

    /**
     * Get all unique departments for filter dropdown
     */
    public function getDepartments()
    {
        $departments = Post::whereNotNull('jobFunction')
            ->where('jobFunction', '!=', '')
            ->distinct()
            ->pluck('jobFunction')
            ->sort()
            ->values();

        return response()->json([
            'success' => true,
            'data'    => $departments,
        ]);
    }

    /**
     * Get all unique locations for filter dropdown
     */
    public function getLocations()
    {
        $locations = Post::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->sort()
            ->values();

        return response()->json([
            'success' => true,
            'data'    => $locations,
        ]);
    }
}

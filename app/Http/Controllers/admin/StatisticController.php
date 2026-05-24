<?php

namespace App\Http\Controllers\admin;

use App\Statistic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statistics = Statistic::orderBy('order', 'ASC')->get();
        return view('admin.statistics.index', compact('statistics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.statistics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|integer|min:0',
            'order' => 'required|integer|min:0',
            'status' => 'boolean',
        ]);

        // Auto-generate key from label
        $key = strtolower(str_replace(' ', '_', $request->label));
        $key = preg_replace('/[^a-z0-9_]/', '', $key); // Remove special characters

        // Ensure key is unique by appending number if needed
        $originalKey = $key;
        $counter = 1;
        while (Statistic::where('key', $key)->exists()) {
            $key = $originalKey . '_' . $counter;
            $counter++;
        }

        $statistic = new Statistic();
        $statistic->key = $key;
        $statistic->label = $request->label;
        $statistic->value = $request->value;
        $statistic->order = $request->order;
        $statistic->status = $request->has('status') ? 1 : 0;
        $statistic->save();

        return redirect()->route('admin.statistics.index')
            ->with('successMsg', 'Statistic created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statistic = Statistic::findOrFail($id);
        return view('admin.statistics.edit', compact('statistic'));
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
            'key' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'value' => 'required|integer|min:0',
            'order' => 'required|integer|min:0',
            'status' => 'boolean',
        ]);

        $statistic = Statistic::findOrFail($id);

        $statistic->key = $request->key;
        $statistic->label = $request->label;
        $statistic->value = $request->value;
        $statistic->order = $request->order;
        $statistic->status = $request->has('status') ? 1 : 0;

        $statistic->save();

        return redirect()->route('admin.statistics.index')
            ->with('successMsg', 'Statistic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statistic = Statistic::findOrFail($id);
        $statistic->delete();

        return redirect()->route('admin.statistics.index')
            ->with('successMsg', 'Statistic deleted successfully');
    }
}


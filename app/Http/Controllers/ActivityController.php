<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    // Insert new activity api
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'activity' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        // Create the activity
        $activity = Activity::create($validated);

        // Return response as a success message
        return response()->json([
            'message' => 'Activity registered successfully!',
            'activity' => $activity,
        ], 201);
    }

    // Activities view
    public function create()
    {
        return view('activities.create');
    }

    // add a newly created activity in the database
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'activity' => 'required|string|max:255',
            'address' => 'required|string|max:500',
        ]);

        Activity::create($request->all());

        return redirect()->route('activities.index')->with('success', 'Activity added successfully.');
    }
    // Edit Activity
    public function edit($id)
    {
        $activity = Activity::find($id);

        // Check if activity exists
        if (!$activity) {
            return redirect()->route('activities.index')->with('error', 'Activity not found');
        }

        return view('activity.edit', compact('activity'));
    }

    // Show all activities in a table format
    public function index()
    {
        // Get all activities
        $activities = Activity::all();

        // Return response as an HTML table
        return view('activities.index', ['activities' => $activities]);
    }

    // Show a single activity by ID in a table format
    public function show($id)
    {
        // Find the activity by ID
        $activity = Activity::find($id);

        // Check if activity exists
        if (!$activity) {
            return response()->json(['message' => 'Activity not found'], 404);
        }

        // Return activity in a table format
        return view('activities.show', ['activity' => $activity]);
    }

    // Update an activity by ID
    public function update(Request $request, $id)
    {
        // Find the activity by ID
        $activity = Activity::find($id);

        // Check if activity exists
        if (!$activity) {
            return response()->json(['message' => 'Activity not found'], 404);
        }

        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'activity' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        // Update the activity
        $activity->update($validated);

        // Return response as a success message
        return response()->json([
            'message' => 'Activity updated successfully!',
            'activity' => $activity,
        ]);
    }

    // Delete an activity by ID
    public function destroy($id)
    {
        // Find the activity by ID
        $activity = Activity::find($id);

        // Check if activity exists
        if (!$activity) {
            return response()->json(['message' => 'Activity not found'], 404);
        }

        // Delete the activity
        $activity->delete();

        // Return response as a success message
        return response()->json(['message' => 'Activity deleted successfully']);
    }
}

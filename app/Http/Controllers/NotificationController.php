<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NotificationController extends Controller
{
    // Show form to upload a PDF notification
    public function create()
    {
        return view('notifications.create');
    }

    // Store the uploaded PDF notification
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Handle the file upload
        $filePath = $request->file('pdf')->store('notifications', 'public');

        // Store notification in the database
        Notification::create([
            'title' => $request->title,
            'path' => $filePath,
        ]);

        return redirect()->route('notifications.index')->with('success', 'Notification uploaded successfully!');
    }

    // Show all notifications
    public function index()
    {
        $notifications = Notification::all();
        return view('notifications.index', compact('notifications'));
    }

    // Delete a notification
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return response()->json([
            'message' => 'Notification deleted successfully!'
        ]);
    }

    // Fetch all notifications USER show
    public function index1()
    {
        // Fetch all notifications from the database
        $notifications = Notification::all();
        return response()->json(['status' => 'ok', 'data' => $notifications], 200);
    }
}

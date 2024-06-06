<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    // Display a listing of the facilities.
    public function index()
    {
        $facilities = Facility::all(); // Get all facilities
        return view('Admin.Facility.index', compact('facilities'));
    }

    // Show the form for creating a new facility.
    public function create()
    {
        return view('Admin.Facility.create');
    }

    // Store a newly created facility in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // You might want to handle file uploads here
        ]);

        $imagelocation = $request->file('image_path')->store('facilty', 'public');
        // Create the facility with the authenticated user's ID
        Facility::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'image_path' => $imagelocation,
        ]);

        return redirect()->route('facilities.index')->with('success', 'Facility created successfully.');
    }

    // Show the form for editing the specified facility.
    public function edit(Facility $facility)
    {
        return view('Admin.Facility.edit', compact('facility'));
    }    

    // Update the specified facility in storage.
    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'nullable|image', // Ensure it is an image
        ]);

        $data = $request->only(['name', 'description']);

        if ($request->hasFile('image_path')) {
            // Delete the old image if it exists
            if ($facility->image_path && Storage::disk('public')->exists($facility->image_path)) {
                Storage::disk('public')->delete($facility->image_path);
            }

            $data['image_path'] = $request->file('image_path')->store('facility', 'public');
        }

        $facility->update($data);

        return redirect()->route('facilities.index')->with('success', 'Facility updated successfully.');
    }

    // Remove the specified facility from storage.
    public function destroy(Facility $facility)
    {
        if ($facility->image_path && Storage::disk('public')->exists($facility->image_path)) {
            Storage::disk('public')->delete($facility->image_path);
        }

        $facility->delete();

        return redirect()->route('facilities.index')->with('success', 'Facility deleted successfully.');
    }
    public function indexUser()
    {
        $facilities = Facility::all();
        return view('Pasien.Fasilitas.index', compact('facilities'));
    }

    public function show(Facility $facility)
    {
        return view('Admin.Facility.detail', compact('facility'));
    }

}

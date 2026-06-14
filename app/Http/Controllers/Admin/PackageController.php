<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->get();

        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('packages', 'public');
        }

        Package::create($validated);

        return redirect()->route('admin.packages.index')->with('success', 'Paket wisata berhasil ditambahkan.');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($package->image) {
                Storage::disk('public')->delete($package->image);
            }
            $validated['image'] = $request->file('image')->store('packages', 'public');
        }

        $package->update($validated);

        return redirect()->route('admin.packages.index')->with('success', 'Paket wisata berhasil diperbarui.');
    }

    public function destroy(Package $package)
    {
        // Delete image if exists
        if ($package->image) {
            Storage::disk('public')->delete($package->image);
        }

        $package->delete();

        return redirect()->route('admin.packages.index')->with('success', 'Paket wisata berhasil dihapus.');
    }

    public function toggleAvailability(Package $package)
    {
        $package->update(['is_available' => !$package->is_available]);

        $status = $package->is_available ? 'tersedia' : 'tidak tersedia';

        return redirect()->route('admin.packages.index')->with('success', "Paket wisata sekarang {$status}.");
    }
}

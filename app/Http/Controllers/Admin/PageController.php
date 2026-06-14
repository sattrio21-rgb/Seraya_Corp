<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function edit()
    {
        $pages = Page::all()->keyBy('slug');

        return view('admin.pages.edit', compact('pages'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'about_title' => 'required|string|max:255',
            'about_content' => 'required|string',
            'founder_name' => 'required|string|max:255',
            'founder_description' => 'required|string',
            'values_title' => 'required|string|max:255',
            'values' => 'required|array',
            'values.*' => 'required|string',
        ]);

        // About section
        Page::updateOrCreate(['slug' => 'about_title'], ['title' => 'Judul Tentang Kami', 'content' => $validated['about_title']]);
        Page::updateOrCreate(['slug' => 'about_content'], ['title' => 'Konten Tentang Kami', 'content' => $validated['about_content']]);

        // Founder
        Page::updateOrCreate(['slug' => 'founder_name'], ['title' => 'Nama Pendiri', 'content' => $validated['founder_name']]);
        Page::updateOrCreate(['slug' => 'founder_description'], ['title' => 'Deskripsi Pendiri', 'content' => $validated['founder_description']]);

        // Values
        Page::updateOrCreate(['slug' => 'values_title'], ['title' => 'Judul Alasan Memilih Kami', 'content' => $validated['values_title']]);
        foreach ($validated['values'] as $index => $value) {
            Page::updateOrCreate(
                ['slug' => "value_{$index}"],
                ['title' => 'Nilai ' . ($index + 1), 'content' => $value]
            );
        }

        return redirect()->route('admin.pages.edit')->with('success', 'Konten beranda berhasil diperbarui.');
    }
}

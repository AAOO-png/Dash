<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kerjasama;

class KerjasamaController extends Controller
{
    public function index()
    {
        $logos = kerjasama::all();
        return view('admin.kerjasama.index', compact('logos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_img' => 'required|string|max:255',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/kerjasama'), $filename);

            Kerjasama::create([
                'name_img' => $request->input('name_img'),
                'image' => $filename,
            ]);
        }

        return redirect()->back()->with('success', 'Logo berhasil di-upload.');
    }

    public function destroy($id)
    {
    $logo = Kerjasama::findOrFail($id);
    $logo->delete();
    return redirect()->route('admin.kerjasama.index')->with('success', 'Gambar berhasil dihapus.');
    }

    public function edit($id)
    {
        $logo = Kerjasama::findOrFail($id);
        return view('admin.kerjasama.edit', compact('logo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_img' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $logo = Kerjasama::findOrFail($id);
        $logo->name_img = $request->input('name_img');

        if ($request->hasFile('img')) {
            if ($logo->img && file_exists(public_path('uploads/kerjasama/' . $logo->img))) {
                unlink(public_path('uploads/kerjasama/' . $logo->img));
            }

            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/kerjasama'), $imageName);
            $logo->img = $imageName;
        }

        $logo->save();

        return redirect()->route('admin.kerjasama.index')->with('success', 'Gambar berhasil diperbarui.');
    }


}

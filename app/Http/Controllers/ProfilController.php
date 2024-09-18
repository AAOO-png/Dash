<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $title = 'Profil';
        return view('profilPerusahaan', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string',
        ]);

        $item = new Profil();
        $item->name = $request->input('name');
        $item->code = $request->input('code');
        $item->is_publish = $request->has('is_publish') ? true : false;

        $item->save();

        return redirect()->route('Admin.profil.index')->with('success', 'Item berhasil disimpan!');
    }

    public function showIndex()
    {
        $code = Profil::all();
        return view('admin.Profile.index', compact('code'));
    }

    public function show(Profil $profil, $id)
    {
        $profil = Profil::findOrFail($id);
        return view('admin.Profile.show', compact('profil'));
    }

    public function create()
    {
        return view('admin.profile.create');
    }

    public function edit(Profil $profil)
    {
        return view('admin.profile.edit', compact('profil'));
    }

    public function update(Request $request, Profil $profil)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string',
            // Validasi is_publish jika diperlukan
        ]);

        $profil->name = $request->input('name');
        $profil->code = $request->input('code');
        $profil->is_publish = $request->has('is_publish') ? true : false;

        $profil->save();

        return redirect()->route('Admin.profil.index')->with('success', 'Item berhasil diperbarui!');
    }

    public function destroy(Profil $profil, $id)
    {
        $profil = Profil::findOrFail($id);
        $profil->delete();

        return redirect()->route('Admin.profil.index')->with('success', 'Item berhasil dihapus!');
    }

    public function publishProfil($id)
    {
        $photo = Profil::findOrFail($id);
        $photo->is_publish = !$photo->is_publish; 
        $photo->save();
        Profil::where('id','!=',$id)->update([
            'is_publish' => 0
        ]);
        return redirect()->back()->with('success', 'Status publikasi berhasil diubah.');
    }
}
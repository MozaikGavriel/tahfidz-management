<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;

class SantriController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Santri::query();

        // Jika ada query pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where('nis', 'like', '%' . $request->search . '%')
                  ->orWhere('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('asal', 'like', '%' . $request->search . '%')
                  ->orWhere('kategori', 'like', '%' . $request->search . '%');
        }
    
        $santris = $query->get();  // Mengambil data santri
    
        return view('admin.santri.index', compact('santris'));
    }

    public function create()
{
    return view('admin.santri.create'); // Pastikan view ini ada
}   

public function store(Request $request)
{
    $request->validate([
        'nis' => 'required|numeric|unique:santris,nis',
        'nama' => 'required|string|max:255',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'asal' => 'required|string|max:255',
        'kategori' => 'required|string|max:50',
        'kelas' => 'required|string|max:20',
        'alamat' => 'nullable|string|max:500',
        'no_hp' => 'nullable|string|max:15',
        'email' => 'nullable|email|max:255',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'wali_nama' => 'required',
        'wali_no_hp' => 'nullable',
        'wali_alamat' => 'required',
    ]);

    $data = $request->all();

    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('santri-foto', 'public');
    }

    Santri::create($data);

    return redirect()->route('santri.index')->with('success', 'Data Santri berhasil ditambahkan.');
}

// public function update(Request $request, $id)
// {
//     // Validasi input
//     $validated = $request->validate([
//         'nama' => 'required|string|max:255',
//         'nis' => 'required|numeric|unique:santris,nis,' . $id,
//         'tempat_lahir' => 'required|string|max:255',
//         'tanggal_lahir' => 'required|date',
//         'asal' => 'required|string|max:255',
//         'kategori' => 'required|string',
//         'kelas' => 'required|string|max:10',
//         'alamat' => 'nullable|string',
//         'no_hp' => 'nullable|numeric',
//         'email' => 'nullable|email',
//         'foto' => 'nullable|image|max:2048',
    
//     ]);

//     // Cari data santri dan update
//     $santri = Santri::findOrFail($id);
//     $santri->update($request->all());
    
//     // Jika foto lama ada, hapus file foto sebelumnya
//     if ($request->hasFile('foto') && $santri->foto) {
//         \Storage::delete('public/' . $santri->foto);  // Menghapus foto lama
//     }

//     // Update data santri
//     $santri->update($request->except('foto'));  // Menghindari overwrite foto jika tidak ada perubahan

//     // Upload foto baru jika ada
//     if ($request->hasFile('foto')) {
//         $path = $request->file('foto')->store('foto_santri', 'public');
//         $santri->update(['foto' => $path]);
//     }

//     return redirect()->route('santri.index')->with('success', 'Data santri berhasil diperbarui.');
// }

public function update(Request $request, $id)
{
    // Validasi input
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'nis' => 'required|numeric|unique:santris,nis,' . $id,
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'asal' => 'required|string|max:255',
        'kategori' => 'required|string',
        'kelas' => 'required|string|max:10',
        'alamat' => 'nullable|string',
        'no_hp' => 'nullable|numeric',
        'email' => 'nullable|email',
        'foto' => 'nullable|image|max:2048',
        'wali_nama' => 'required',
        'wali_no_hp' => 'nullable',
        'wali_alamat' => 'required',
    ]);

    // Cari data santri dan update
    $santri = Santri::findOrFail($id);

    // Jika ada perubahan foto, hapus foto lama dan simpan foto baru
    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($santri->foto) {
            \Storage::delete('public/' . $santri->foto);  // Menghapus foto lama
        }

        // Simpan foto baru
        $path = $request->file('foto')->store('foto_santri', 'public');
        $validated['foto'] = $path;  // Menyimpan path foto baru
    }

    // Update data santri (termasuk foto jika ada)
    $santri->update($validated);

    return redirect()->route('santri.index')->with('success', 'Data santri berhasil diperbarui.');
}


// public function show($id)
// {
//     $santri = Santri::with('wali')->findOrFail($id);
//     return view('admin.santri.show', compact('santri'));
// }
public function show($id)
{
    $santri = Santri::findOrFail($id);
    return view('admin.santri.show', compact('santri'));
}

public function edit($id)
{
    // Ambil data santri berdasarkan ID
    $santri = Santri::findOrFail($id);

    // Kirim data santri ke view edit
    return view('admin.santri.edit', compact('santri'));
}

public function destroy($id)
{
    // Cari santri berdasarkan ID
    $santri = Santri::findOrFail($id);

    // Hapus data santri
    $santri->delete();

    // Redirect ke halaman index santri
    return redirect()->route('santri.index')->with('success', 'Santri berhasil dihapus');
}

public function deleteMultiple(Request $request)
{
    $request->validate([
        'ids' => 'required|array',
        'ids.*' => 'exists:santris,id',
    ]);

    Santri::whereIn('id', $request->ids)->delete();

    return response()->json(['success' => true]);
}
}


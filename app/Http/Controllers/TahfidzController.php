<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SendWhatsappMessage;
use App\Models\Tahfidz;
use App\Models\Santri;

class TahfidzController extends Controller
{
     /**
     * Kirim notifikasi tahfidz ke WhatsApp orang tua
     *
     * @param string $parentPhone Nomor WhatsApp orang tua
     * @param array $tahfidzData Data tahfidz
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendTahfidzNotification($parentPhone, $tahfidzData)
    {
        // Menyusun pesan yang akan dikirim
        $message = "Assalamu'alaikum, berikut data tahfidz terbaru:\n";
        foreach ($tahfidzData as $item) {
            $message .= "- Surat {$item['surat']}: {$item['ayat']}\n";
        }
        $message .= "Barakallah!";

        // Anda bisa langsung memanggil WhatsappController atau menggunakan service
        // Cara 1: Menggunakan langsung WhatsappController
        // $response = (new WhatsappController)->sendWhatsappNotification($parentPhone, $message);

        // Cara 2: Menggunakan service SendWhatsappMessage langsung (cara ini lebih sederhana)
        $response = SendWhatsappMessage::send($parentPhone, $message);

        // Mengecek apakah pengiriman pesan berhasil
        if (isset($response['status']) && $response['status'] === 'queued') {
            return response()->json(['success' => 'Pesan berhasil dikirim']);
        }

        return response()->json(['error' => 'Gagal mengirim pesan'], 500);
    }

    public function index()
{
    $tahfidz = Tahfidz::with('santri')->get();
    return view('admin.tahfidz.index', compact('tahfidz'));
}

public function create()
{
    $santris = Santri::all();
    return view('admin.tahfidz.create', compact('santris'));
}

public function store(Request $request)
{
    // Validasi input dari form
    $request->validate([
        'tanggal' => 'required|date',
        'waktu' => 'required',
        'santri_id' => 'required|string|max:255',
        'nama_ustadz' => 'required|string|max:255',
        'surat' => 'required|string|max:255',
        'ayat' => 'required|string|max:50',
        'jumlah_juzz' => 'required|integer',
        'keterangan' => 'nullable|string',
    ]);

    // Membuat data baru berdasarkan input yang valid
    Tahfidz::create([
        'tanggal' => $request->tanggal,
        'waktu' => $request->waktu,
        'santri_id' => $request->santri_id,
        'nama_ustadz' => $request->nama_ustadz,
        'surat' => $request->surat,
        'ayat' => $request->ayat,
        'jumlah_juzz' => $request->jumlah_juzz,
        'keterangan' => $request->keterangan,
    ]);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('tahfidz.index')->with('success', 'Data berhasil ditambahkan.');
}


public function edit(Tahfidz $tahfidz)
{
    // Ambil data tahfidz berdasarkan ID
    // $tahfidz = Tahfidz::findOrFail($id);

    // Ambil semua data santri untuk dropdown
    $santris = Santri::all();

    // Kirim data tahfidz dan santris ke view
    return view('admin.tahfidz.edit', compact('tahfidz', 'santris'));
}

// app/Http/Controllers/TahfidzController.php
public function update(Request $request, $id)
{
    // Validasi input
    $validated = $request->validate([
        'santri_id' => 'required|exists:santris,id',
        'nama_ustadz' => 'required|string|max:255',
        'waktu' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'surat' => 'required|string|max:255',
        'ayat' => 'required|string|max:255',
        'jumlah_juzz' => 'required|numeric',
        'keterangan' => 'nullable|string',
    ]);

    // Cari data tahfidz dan update
    $tahfidz = Tahfidz::findOrFail($id);
    $tahfidz->update($validated);

    return redirect()->route('tahfidz.index')->with('success', 'Data Tahfidz berhasil diperbarui.');
}


public function destroy($id)
{
    $tahfidz = Tahfidz::findOrFail($id);
    $tahfidz->delete();

    return redirect()->route('tahfidz.index')->with('success', 'Data berhasil dihapus.');
}

}

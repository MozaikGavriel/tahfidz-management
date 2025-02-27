<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Whatsapp;
use App\Models\Santri;
use App\Models\Tahfidz;
use Illuminate\Http\RedirectResponse;

class WhatsappController extends Controller
{
    public function index()
    {
        $santris = Santri::all(); // Ambil semua data Santri
        $whatsapps = Whatsapp::with('santri')->latest()->take(10)->get();
        return view('admin.whatsapp.index', compact('santris', 'whatsapps'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'nomor_wa' => 'required|regex:/^\+?\d{10,15}$/',
            'message' => 'required',
        ]);

        // Simpan data ke database
        $whatsapp = Whatsapp::create([
            'santri_id' => $request->santri_id,
            'nomor_wa' => $request->nomor_wa,
            'message' => $request->message,
        ]);

        // Kirim pesan WhatsApp setelah menyimpan data
        return $this->send($whatsapp);
    }

    public function edit(Whatsapp $whatsapp)
    {
        $santris = Santri::all();
        return view('admin.whatsapp.edit', compact('whatsapp', 'santris'));
    }

    public function update(Request $request, Whatsapp $whatsapp)
    {
        $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'nomor_wa' => 'required',
            'message' => 'required',
        ]);

        $whatsapp->update($request->all());

        return redirect()->route('whatsapp.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Whatsapp $whatsapp)
    {
        $whatsapp->delete();
        return redirect()->route('whatsapp.index')->with('success', 'Pesan berhasil dihapus!');
    }

    public function getTahfidzData($santri_id)
    {
        $tahfidz = Tahfidz::where('santri_id', $santri_id)->latest()->first();
        return response()->json($tahfidz);
    }

    public function send(Whatsapp $whatsapp): RedirectResponse
    {
        $pesan = $whatsapp->message; // Ambil pesan dari database
        $nowa = $whatsapp->nomor_wa; // Ambil nomor WA dari database
        $token = 'nKBscgN3BKCmzodqRmo7'; // Token API Fonnte

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('target' => $nowa, 'message' => $pesan),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $token
            ),
        ));

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($httpCode == 200) {
            return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
        } else {
            return redirect()->back()->with('error', 'Gagal mengirim pesan: ' . $response);
        }
    }
}
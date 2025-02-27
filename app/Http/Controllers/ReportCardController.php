<?php
namespace App\Http\Controllers;

use App\Models\ReportCard;
use App\Models\Whatsapp;
use Illuminate\Http\Request;
use PDF;
use App\Models\Santri;
use App\Models\Tahfidz;

class ReportCardController extends Controller
{
    public function index()
    {
        $reportCards = ReportCard::with('santri')->get();
        return view('admin.invoice.index', compact('reportCards'));
    }

    public function create()
    {
        
        $santris = \App\Models\Santri::all(); // Tambahkan ini
        return view('admin.invoice.create', compact('santris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'sekolah' => 'required|string|max:255',
            'ttd_pengasuh' => 'required|string|max:255',
        ]);

        $santri = Santri::findOrFail($request->santri_id);

        $reportCard = new ReportCard();
        $reportCard->santri_id = $request->santri_id;
        $reportCard->nama = $santri->nama;
        $reportCard->sekolah = $request->sekolah;
        $reportCard->ttd_pengasuh = $request->ttd_pengasuh;
        $reportCard->save();

        return redirect()->route('report-cards.index')
            ->with('success', 'Kartu laporan berhasil ditambahkan');
    }

    public function generate($id)
    {
        $reportCard = ReportCard::with('santri')->findOrFail($id);
        
        // Ambil data dari tabel tahfidz
        $tahfidz = Tahfidz::where('santri_id', $reportCard->santri_id)
            ->get()
            ->map(function($item) {
                return [
                    'tanggal' => $item->tanggal ?? $item->created_at->format('d-m-Y'),
                    'surat' => $item->surat ?? 'Tidak ada informasi surat',
                ];
            });

        // Ambil data dari tabel whatsapps (jika masih diperlukan)
        $hafalan = Whatsapp::where('santri_id', $reportCard->santri_id)
            ->get()
            ->map(function($item) {
                $message = $item->message;
                $pattern = '/(\d{2}-\d{2}-\d{4})?.*(Surat\s+[\w\s]+|[\w\s]+ Surat)/i';
                preg_match($pattern, $message, $matches);
                
                if (empty($matches[2])) {
                    $patternSurat = '/(Surat\s+[\w\s]+|[\w\s]+ Surat)/i';
                    preg_match($patternSurat, $message, $matchesSurat);
                    $surat = $matchesSurat[0] ?? 'Tidak ada informasi surat';
                } else {
                    $surat = $matches[2];
                }
                
                return [
                    'tanggal' => $matches[1] ?? $item->created_at->format('d-m-Y'),
                    'surat' => $surat,
                ];
            });

        // Gabungkan data dari tahfidz dan whatsapps
        $dataHafalan = $tahfidz->merge($hafalan);

        $pdf = PDF::loadView('admin.invoice.invoice', compact('reportCard', 'dataHafalan'));
        return $pdf->download('kartu-laporan-' . $reportCard->santri->nama . '.pdf');
    }

    public function view($id)
    {
        $reportCard = ReportCard::with('santri')->findOrFail($id);
        $hafalan = Whatsapp::where('santri_id', $reportCard->santri_id)->get();
        return view('admin.invoice.view', compact('reportCard', 'hafalan'));
    }

    public function destroy($id)
    {
        $reportCard = ReportCard::findOrFail($id);
        $reportCard->delete();
        
        return redirect()->route('report-cards.index')
            ->with('success', 'Kartu laporan berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Detail_Kursus;
use App\Models\Detail_Pembayaran;
use App\Models\Detail_Transaksi;
use App\Models\Fk_detail_siswa;
use App\Models\Kursus;
use App\Models\Level;
use App\Models\Program;
use App\Models\Regencies;
use App\Models\Siswa;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PDF;

class ViewLaporanController extends Controller
{
    public function arsipSiswaView()
    {
        $data['parent'] = 'View & Laporan';
        $data['title'] = 'Arsip Siswa';
        $data['siswa'] = Fk_detail_siswa::all();
        return view('viewlaporan.arsipsiswa', $data);
    }

    public function arsipPembayaranView()
    {
        $data['parent'] = 'View & Laporan';
        $data['title'] = 'Arsip Pembayaran';
        $data['siswa'] = Fk_detail_siswa::all();
        return view('viewlaporan.arsippembayaran', $data);
    }

    public function laporanHarianView()
    {
        $data['parent'] = 'View & Laporan';
        $data['title'] = 'Laporan Harian';
        return view('viewlaporan.laporanharian', $data);
    }

    public function laporanPeriodeView()
    {
        $data['parent'] = 'View & Laporan';
        $data['title'] = 'Laporan Periode';
        return view('viewlaporan.laporanperiode', $data);
    }

    public function detailSiswa(Request $request)
    {
        $data['parent'] = 'View & Laporan';
        $data['title'] = 'Arsip Siswa';
        $data['extra'] = 'Edit Siswa';
        $id_siswa = $request->s;
        $id_detail_kursus = $request->d;
        $data['detail'] = Fk_detail_siswa::where('id_siswa', $id_siswa)->where('id_detail_kursus', $id_detail_kursus)->first();
        $data['regencies'] = Regencies::all();
        $data['kursus'] = Kursus::orderBy('created_at', 'ASC')->get();
        $data['program'] = Program::orderBy('created_at', 'ASC')->get();
        $data['pendidikan'] = [
            'SD',
            'SMP',
            'SMA',
            'D1',
            'D2',
            'D3',
            'D4',
            'S1',
            'S2',
            'S3'
        ];
        $data['level'] = Level::all();
        $data['hari'] = [
            'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
        ];
        $data['hariTerpilih'] = explode(',', $data['detail']->hasDetailKursus->hari_kursus);
        // dd($data['hari'], $data['hariTerpilih']);
        return view('viewlaporan.detailsiswa', $data);
    }

    public function editSiswa(Request $request)
    {
        $id_siswa = $request->id_siswa;
        $id_detail_kursus = $request->id_detail_kursus;

        $siswa = Siswa::where('id_siswa', $id_siswa)->first();
        $detailKursus = Detail_Kursus::where('id_detail', $id_detail_kursus)->first();
        // Siswa
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->kota_lahir = $request->kota_lahir;
        $tanggal_lahir = explode('/', $request->tanggal_lahir);
        $siswa->tanggal_lahir = $tanggal_lahir[2] . '-' . $tanggal_lahir[1] . '-' . $tanggal_lahir[0];
        $siswa->alamat = $request->alamat;
        $siswa->kota_tinggal = $request->kota;
        $siswa->no_telpon = $request->no_telepon;
        $siswa->pendidikan = $request->pendidikan;

        $array_hari_kursus = $request->hari_kursus;
        $hari_kursus = '';
        for ($i = 1; $i <= count($array_hari_kursus); $i++) {
            // echo $array_hari_kursus[$i-1];
            $hari_kursus .= $array_hari_kursus[$i - 1];
            if ($i != count($array_hari_kursus)) {
                $hari_kursus .= ',';
            }
        }

        $tanggal_daftar = explode('/', $request->tanggal_daftar);
        $detailKursus->kursus = $request->kursus;
        $detailKursus->program = $request->program;
        $detailKursus->level = $request->level;
        $detailKursus->catatan_kursus = $request->catatan_kursus;
        $detailKursus->hari_kursus = $hari_kursus;
        $detailKursus->jam_kursus = $request->jam_kursus;
        $detailKursus->no_urut = $request->no_urut;
        $detailKursus->uang_pendaftaran = $request->uang_pendaftaran;
        $detailKursus->uang_kursus = $request->uang_kursus;
        $detailKursus->uang_ujian_sertifikat = $request->uang_ujian_sertifikat;
        $detailKursus->uang_buku = $request->uang_buku;
        $detailKursus->jumlah = $request->jumlah;
        $detailKursus->tanggal_daftar = $tanggal_daftar[2] . '-' . $tanggal_daftar[1] . '-' . $tanggal_daftar[0];

        $siswa->save();
        $detailKursus->save();

        return Redirect::route('arsipSiswaView')->with('success', 'Data berhasil terupdate');
    }

    public function removeSiswa(Request $request)
    {
        $id_siswa = $request->s;
        $id_detail_kursus = $request->d;

        Fk_detail_siswa::where('id_siswa', $id_siswa)->where('id_detail_kursus', $id_detail_kursus)->delete();
        return Redirect::back()->with('success', 'Data Siswa Berhasil Dihapus');
    }

    public function detailPembayaran(Request $request)
    {
        try {
            $data['parent'] = 'View & Laporan';
            $data['title'] = 'Arsip Pembayaran';
            $data['extra'] = 'Edit Pembayaran';
            $id_siswa = $request->s;
            $id_detail_kursus = $request->d;
            $data['siswa'] = Siswa::where('id_siswa', $id_siswa)->first();
            $data['detail_kursus'] = Detail_Kursus::where('id_detail', $id_detail_kursus)->first();
            $detail_pembayaran = Detail_Pembayaran::where('id_detail_kursus', $id_detail_kursus)->where('id_siswa', $id_siswa)->first();
            if ($detail_pembayaran == null) {
                throw new Exception('error');
            }
            $data['telah_dibayar'] = 0;
            if ($detail_pembayaran) {
                $data['telah_dibayar'] += $detail_pembayaran->pembayaran_1;
                $data['telah_dibayar'] += $detail_pembayaran->pembayaran_2;
                $data['telah_dibayar'] += $detail_pembayaran->pembayaran_3;
                $data['telah_dibayar'] += $detail_pembayaran->pembayaran_4;
            }
            $data['sisa_pembayaran'] = $data['detail_kursus']->jumlah - $data['telah_dibayar'];
            $data['detail_pembayaran']  = $detail_pembayaran;
            return view('viewlaporan.detailpembayaran', $data);
        } catch (\Throwable $th) {
            return Redirect::route('arsipPembayaranView')->with('error', 'Data ini belum pernah transaksi pembayaran');
        }
    }

    public function editPembayaran(Request $request)
    {
        $id_siswa = $request->s;
        $id_detail_kursus = $request->d;

        $detailPembayaran = Detail_Pembayaran::where(['id_siswa' => $id_siswa])->where(['id_detail_kursus' => $id_detail_kursus])->first();
        $detailPembayaran->pembayaran_1 = $request->pembayaran_1;
        $detailPembayaran->pembayaran_2 = $request->pembayaran_2;
        $detailPembayaran->pembayaran_3 = $request->pembayaran_3;
        $detailPembayaran->pembayaran_4 = $request->pembayaran_4;
        $detailPembayaran->save();
        return Redirect::route('arsipPembayaranView')->with('success', 'Data pembayaran berhasil diperbarui');
    }

    public function laporanHarianDetail(Request $request)
    {
        $data['parent'] = 'View & Laporan';
        $data['title'] = 'Laporan Harian';
        $data['extra'] = $request->tanggal;
        $tanggal_set = explode('/', $request->tanggal);
        $tanggal = $tanggal_set[2] . '-' . $tanggal_set[1] . '-' . $tanggal_set[0];
        $data['transaksi'] = Detail_Transaksi::where('tanggal', $tanggal)->get();
        if ($data['transaksi'] == null) {
            return Redirect::route('laporanHarianView')->with('error', 'Tidak ada data yang tercatat pada tanggal tersebut');
        }
        return view('viewlaporan.detaillaporanharian', $data);
    }

    public function laporanPeriodeDetail(Request $request)
    {
        $data['parent'] = 'View & Laporan';
        $data['title'] = 'Laporan Periode';
        $data['extra'] = $request->tanggal_dari . ' - ' . $request->tanggal_sampai;
        $tanggal_set_dari = explode('/', $request->tanggal_dari);
        $tanggal_set_sampai = explode('/', $request->tanggal_sampai);
        $tanggal_dari = $tanggal_set_dari[2] . '-' . $tanggal_set_dari[1] . '-' . $tanggal_set_dari[0];
        $tanggal_sampai = $tanggal_set_sampai[2] . '-' . $tanggal_set_sampai[1] . '-' . $tanggal_set_sampai[0];
        $data['dari'] = $request->tanggal_dari;
        $data['sampai'] = $request->tanggal_sampai;
        $data['transaksi'] = Detail_Transaksi::where('tanggal', '>=', $tanggal_dari)->where('tanggal', '<=', $tanggal_sampai)->orderBy('tanggal', 'ASC')->get();
        if ($data['transaksi'] == null) {
            return Redirect::route('laporanPeriodeView')->with('error', 'Tidak ada data yang tercatat pada tanggal tersebut');
        }
        return view('viewlaporan.detaillaporanperiode', $data);
    }

    public function exportArsipSiswa()
    {
        $data['siswa'] = Fk_detail_siswa::all();
        $pdf = PDF::loadview('export.pdf.arsipsiswa', $data);

        return $pdf->download('Arsip Siswa.pdf');
    }

    public function exportLaporanHarian(Request $request)
    {
        $tanggal_laporan = urldecode($request->date);
        $tanggal = explode("/", $tanggal_laporan);
        $data['tanggal'] = $tanggal_laporan;
        $data['laporanharian'] = Detail_Transaksi::where('tanggal', $tanggal[2] . '-' . $tanggal[1] . '-' . $tanggal[0])->get();
        $pdf = PDF::loadview('export.pdf.laporanharian', $data);

        return $pdf->download('Laporan Harian - ' . $tanggal_laporan . '.pdf');
    }

    public function exportLaporanPeriode(Request $request)
    {
        $tanggal_dari = urldecode($request->from);
        $tanggal_sampai = urldecode($request->to);
        $dari = explode("/", $tanggal_dari);
        $sampai = explode("/", $tanggal_sampai);
        $data['tanggal_dari'] = $tanggal_dari;
        $data['tanggal_sampai'] = $tanggal_sampai;
        $data['laporanperiode'] = Detail_Transaksi::where('tanggal', '>=', $dari[2] . '-' . $dari[1] . '-' . $dari[0])->where('tanggal', '<=', $sampai[2] . '-' . $sampai[1] . '-' . $sampai[0])->orderBy('tanggal', 'ASC')->get();
        $pdf = PDF::loadview('export.pdf.laporanperiode', $data);

        return $pdf->download('Laporan Harian - ' . $tanggal_dari . ' s/d ' . $tanggal_sampai . '.pdf');
    }

    public function printArsipPembayaran(Request $request)
    {
        // $id_siswa = $request->s;
        // $id_detail_kursus = $request->d;
        // $data['siswa'] = Siswa::where('id_siswa', $id_siswa)->first();
        // $data['detail_kursus'] = Detail_Kursus::where('id_detail', $id_detail_kursus)->first();
        // $detail_pembayaran = Detail_Pembayaran::where('id_detail_kursus', $id_detail_kursus)->where('id_siswa', $id_siswa)->first();
        // if ($detail_pembayaran == null) {
        //     throw new Exception('error');
        // }
        // $data['telah_dibayar'] = 0;
        // if ($detail_pembayaran) {
        //     $data['telah_dibayar'] += $detail_pembayaran->pembayaran_1;
        //     $data['telah_dibayar'] += $detail_pembayaran->pembayaran_2;
        //     $data['telah_dibayar'] += $detail_pembayaran->pembayaran_3;
        //     $data['telah_dibayar'] += $detail_pembayaran->pembayaran_4;
        // }
        // $data['sisa_pembayaran'] = $data['detail_kursus']->jumlah - $data['telah_dibayar'];
        // $data['detail_pembayaran']  = $detail_pembayaran;
        return view('print.arsippembayaran');
    }
}

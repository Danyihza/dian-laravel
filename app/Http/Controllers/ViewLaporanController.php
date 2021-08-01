<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Detail_Kursus;
use App\Models\Detail_Pembayaran;
use App\Models\Detail_Transaksi;
use App\Models\Fk_detail_siswa;
use App\Models\Kursus;
use App\Models\Level;
use App\Models\Pembayaran;
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
        $data['siswa'] = Fk_detail_siswa::where('id_cabang', session('login-data')['cabang'])->get();
        return view('viewlaporan.arsipsiswa', $data);
    }

    public function arsipPembayaranView()
    {
        $data['parent'] = 'View & Laporan';
        $data['title'] = 'Arsip Pembayaran';
        $data['siswa'] = Fk_detail_siswa::where('id_cabang', session('login-data')['cabang'])->get();
        return view('viewlaporan.arsippembayaran', $data);
    }

    public function laporanHarianView()
    {
        $data['parent'] = 'View & Laporan';
        $data['title'] = 'Laporan Harian';
        $data['cabang'] = Cabang::all();
        return view('viewlaporan.laporanharian', $data);
    }

    public function laporanPeriodeView()
    {
        $data['parent'] = 'View & Laporan';
        $data['title'] = 'Laporan Periode';
        $data['cabang'] = Cabang::all();
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
        Siswa::where('id_siswa', $id_siswa)->delete();
        Detail_Kursus::where('id_detail', $id_detail_kursus)->delete();
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
            $data['id_siswa'] = $id_siswa;
            $data['id_detail_kursus'] = $id_detail_kursus;
            $data['siswa'] = Siswa::where('id_siswa', $id_siswa)->first();
            $data['detail_kursus'] = Detail_Kursus::where('id_detail', $id_detail_kursus)->first();
            $pembayaran = Pembayaran::where('id_detail_kursus', $id_detail_kursus)->orderBy('pembayaran_ke', 'ASC')->get();
            if (count($pembayaran) == 0) {
                throw new Exception('error');
            }
            $data['telah_dibayar'] = 0;
            if (count($pembayaran) > 0) {
                foreach ($pembayaran as $pby) {
                    $data['telah_dibayar'] += $pby->bayar;
                }
            }
            $data['sisa_pembayaran'] = $data['detail_kursus']->jumlah - $data['telah_dibayar'];
            $data['detail_pembayaran']  = $pembayaran;
            // dd($data);
            return view('viewlaporan.detailpembayaran', $data);
        } catch (\Throwable $th) {
            return Redirect::route('arsipPembayaranView')->with('error', 'Data ini belum pernah transaksi pembayaran');
        }
    }

    public function editPembayaran(Request $request)
    {
        $id_siswa = $request->s;
        $id_detail_kursus = $request->d;
        $pembayaran = $request->pembayaran;
        foreach ($pembayaran as $key => $value) {
            $dataPembayaran = Pembayaran::where('id_detail_kursus', $id_detail_kursus)->where('pembayaran_ke', $key+1)->first();
            $dataPembayaran->bayar = $value;
            $dataPembayaran->save();
            $dataTransaksi = Detail_Transaksi::where('id_detail_transaksi', $dataPembayaran->id_pembayaran)->first();
            $dataTransaksi->jumlah = $value;
            $dataTransaksi->save();
        }

        // $pembayaran = Pembayaran::where('id_detail_kursus', $id_detail_kursus)->orderBy('pembayaran_ke', 'ASC')->
        return Redirect::route('arsipPembayaranView')->with('success', 'Data pembayaran berhasil diperbarui');
    }

    public function laporanHarianDetail(Request $request)
    {
        $data['parent'] = 'View & Laporan';
        $data['title'] = 'Laporan Harian';
        $data['extra'] = $request->tanggal;
        $tanggal_set = explode('/', $request->tanggal);
        $tanggal = $tanggal_set[2] . '-' . $tanggal_set[1] . '-' . $tanggal_set[0];
        $cabang = $request->cabang ?? session('login-data')['cabang'] ;
        $data['transaksi'] = Detail_Transaksi::where('tanggal', $tanggal)->where('cabang', $cabang)->orderBy('tanggal', 'DESC')->orderBy('created_at', 'DESC')->get();
        if ($data['transaksi'] == null) {
            return Redirect::route('laporanHarianView')->with('error', 'Tidak ada data yang tercatat pada tanggal tersebut');
        }
        // $data['buku_kassss'] = Monev_Finansial::where('id_user', session('login-data')['id'])->orderby('tanggal', 'DESC')->orderby('created_at', 'DESC')->get();
        $saldo = 0;
        $data['saldo'] = [];
        for ($i = count($data['transaksi']) - 1; $i >= 0; $i--) {
            if ($data['transaksi'][$i]->jenis_transaksi == 'Pengeluaran') {
                $saldo -= $data['transaksi'][$i]->jumlah;
                $data['saldo'][$i] = $saldo;
            } else {
                $saldo += $data['transaksi'][$i]->jumlah;
                $data['saldo'][$i] = $saldo;
            }
        }
        $data['saldos'] = array_reverse($data['saldo']);
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
        $cabang = $request->cabang ?? session('login-data')['cabang'] ;
        $data['transaksi'] = Detail_Transaksi::where('tanggal', '>=', $tanggal_dari)->where('tanggal', '<=', $tanggal_sampai)->where('cabang', $cabang)->orderBy('tanggal', 'DESC')->orderBy('created_at', 'DESC')->get();
        if ($data['transaksi'] == null) {
            return Redirect::route('laporanPeriodeView')->with('error', 'Tidak ada data yang tercatat pada tanggal tersebut');
        }
        $saldo = 0;
        $data['saldo'] = [];
        for ($i = count($data['transaksi']) - 1; $i >= 0; $i--) {
            if ($data['transaksi'][$i]->jenis_transaksi == 'Pengeluaran') {
                $saldo -= $data['transaksi'][$i]->jumlah;
                $data['saldo'][$i] = $saldo;
            } else {
                $saldo += $data['transaksi'][$i]->jumlah;
                $data['saldo'][$i] = $saldo;
            }
        }
        $data['saldos'] = array_reverse($data['saldo']);
        return view('viewlaporan.detaillaporanperiode', $data);
    }

    public function exportArsipSiswa()
    {
        $data['siswa'] = Fk_detail_siswa::where('id_cabang', session('login-data')['cabang'])->get();
        $pdf = PDF::loadview('export.pdf.arsipsiswa', $data);

        return $pdf->download('Arsip Siswa.pdf');
    }

    public function exportLaporanHarian(Request $request)
    {
        $tanggal_laporan = urldecode($request->date);
        $tanggal = explode("/", $tanggal_laporan);
        $data['tanggal'] = $tanggal_laporan;
        $cabang = $request->cabang ?? session('login-data')['cabang'];
        $data['laporanharian'] = Detail_Transaksi::where('tanggal', $tanggal[2] . '-' . $tanggal[1] . '-' . $tanggal[0])->where('cabang', $cabang)->orderBy('tanggal', 'DESC')->orderBy('created_at', 'DESC')->get();
        $saldo = 0;
        $data['saldo'] = [];
        for ($i = count($data['laporanharian']) - 1; $i >= 0; $i--) {
            if ($data['laporanharian'][$i]->jenis_transaksi == 'Pengeluaran') {
                $saldo -= $data['laporanharian'][$i]->jumlah;
                $data['saldo'][$i] = $saldo;
            } else {
                $saldo += $data['laporanharian'][$i]->jumlah;
                $data['saldo'][$i] = $saldo;
            }
        }
        $data['saldos'] = array_reverse($data['saldo']);
        $pdf = PDF::loadview('export.pdf.laporanharian', $data);

        return $pdf->download('Laporan Harian - ' . $tanggal_laporan . '.pdf');
    }

    public function exportLaporanPeriode(Request $request)
    {
        $tanggal_dari = urldecode($request->from);
        $tanggal_sampai = urldecode($request->to);
        $dari = explode("/", $tanggal_dari);
        $sampai = explode("/", $tanggal_sampai);
        $cabang = $request->cabang ?? session('login-data')['cabang'];
        $data['tanggal_dari'] = $tanggal_dari;
        $data['tanggal_sampai'] = $tanggal_sampai;
        $data['laporanperiode'] = Detail_Transaksi::where('tanggal', '>=', $dari[2] . '-' . $dari[1] . '-' . $dari[0])->where('tanggal', '<=', $sampai[2] . '-' . $sampai[1] . '-' . $sampai[0])->where('cabang', $cabang)->orderBy('tanggal', 'DESC')->orderBy('created_at', 'DESC')->get();
        $saldo = 0;
        $data['saldo'] = [];
        for ($i = count($data['laporanperiode']) - 1; $i >= 0; $i--) {
            if ($data['laporanperiode'][$i]->jenis_transaksi == 'Pengeluaran') {
                $saldo -= $data['laporanperiode'][$i]->jumlah;
                $data['saldo'][$i] = $saldo;
            } else {
                $saldo += $data['laporanperiode'][$i]->jumlah;
                $data['saldo'][$i] = $saldo;
            }
        }
        $data['saldos'] = array_reverse($data['saldo']);
        $pdf = PDF::loadview('export.pdf.laporanperiode', $data);

        return $pdf->download('Laporan Periode - ' . $tanggal_dari . ' s/d ' . $tanggal_sampai . '.pdf');
    }

    public function printArsipPembayaran(Request $request)
    {
        $id_siswa = $request->s;
        $id_detail_kursus = $request->d;
        $data['siswa'] = Siswa::where('id_siswa', $id_siswa)->first();
        $data['detail_kursus'] = Detail_Kursus::where('id_detail', $id_detail_kursus)->first();
        $pembayaran = Pembayaran::where('id_detail_kursus', $id_detail_kursus)->orderBy('pembayaran_ke', 'ASC')->get();
        $data['telah_dibayar'] = 0;
        if (count($pembayaran) > 0) {
            foreach ($pembayaran as $pby) {
                $data['telah_dibayar'] += $pby->bayar;
            }
        }
        $data['sisa_pembayaran'] = $data['detail_kursus']->jumlah - $data['telah_dibayar'];
        $data['detail_pembayaran']  = $pembayaran;
        return view('print.arsippembayaran', $data);
    }
}

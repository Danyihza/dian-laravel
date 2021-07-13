<?php

namespace App\Http\Controllers;

use App\Models\Detail_Kursus;
use App\Models\Detail_Pembayaran;
use App\Models\Detail_Transaksi;
use App\Models\Fk_detail_siswa;
use App\Models\Kursus;
use App\Models\Pengeluaran;
use App\Models\Program;
use App\Models\Regencies;
use App\Models\Siswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdministrasiController extends Controller
{
    public function pendaftaranView(Request $request)
    {
        $data['title'] = 'pendaftaran';
        $data['parent'] = 'administrasi';
        $data['regencies'] = Regencies::all();
        $data['kursus'] = Kursus::orderBy('created_at', 'ASC')->get();
        $data['program'] = Program::orderBy('created_at', 'ASC')->get();
        if ($request->redirect_to) {
            $data['redirect_to'] = $request->redirect_to;
        }
        // dd($data['regencies']);
        return view('administrasi.pendaftaran', $data);
    }

    public function pembayaranView()
    {
        $data['title'] = 'pembayaran';
        $data['parent'] = 'administrasi';
        $data['pembayaran'] = Fk_detail_siswa::orderBy('created_at', 'DESC')->get();
        // dd($data['pembayaran'][0]->hasDetailKursus->hasKursus);
        return view('administrasi.pembayaran', $data);
    }

    public function detailPembayaranView($id_siswa, $id_detail_kursus)
    {
        $data['siswa'] = Siswa::where('id_siswa', $id_siswa)->first();
        $data['detail_kursus'] = Detail_Kursus::where('id_detail', $id_detail_kursus)->first();
        $detail_pembayaran = Detail_Pembayaran::where('id_detail_kursus', $id_detail_kursus)->where('id_siswa', $id_siswa)->first();
        $data['telah_dibayar'] = 0;
        if ($detail_pembayaran) {
            $data['telah_dibayar'] += $detail_pembayaran->pembayaran_1;
            $data['telah_dibayar'] += $detail_pembayaran->pembayaran_2 ?? 0;
            $data['telah_dibayar'] += $detail_pembayaran->pembayaran_3 ?? 0;
            $data['telah_dibayar'] += $detail_pembayaran->pembayaran_4 ?? 0;
        }
        $data['sisa_pembayaran'] = $data['detail_kursus']->jumlah - $data['telah_dibayar'];
        $data['detail_pembayaran']  = $detail_pembayaran;
        $data['title'] = 'pembayaran';
        $data['parent'] = 'administrasi';
        $data['extra'] = 'Pembayaran Siswa';
        return view('administrasi.detailpembayaran', $data);
    }
    
    public function pengeluaranView()
    {
        $data['title'] = 'pengeluaran';
        $data['parent'] = 'administrasi';
        $data['pengeluaran'] = Pengeluaran::orderBy('created_at', 'ASC')->get();
        return view('administrasi.pengeluaran', $data);
    }

    public function daftar(Request $request)
    {
        $newSiswa = new Siswa;
        $newDetailKursus = new Detail_Kursus;
        $newDetailPembayaran = new Detail_Pembayaran;
        $newDetailSiswa = new Fk_detail_siswa;

        $id_siswa = Str::random(32);
        $id_detail_kursus = Str::random(32);
        $id_detail_pembayaran = Str::random(32);
        $tanggal_lahir = explode('/', $request->tanggal_lahir);
        $tanggal_daftar = explode('/', $request->tanggal_daftar);

        $array_hari_kursus = $request->hari_kursus;
        
        $hari_kursus = '';
        for ($i=1; $i <= count($array_hari_kursus); $i++) { 
            // echo $array_hari_kursus[$i-1];
            $hari_kursus .= $array_hari_kursus[$i-1];
            if ($i != count($array_hari_kursus)) {
                $hari_kursus .= ',';
            }
        }

        // Siswa
        $newSiswa->id_siswa = $id_siswa;
        $newSiswa->nis = $request->nis;
        $newSiswa->nama = $request->nama;
        $newSiswa->kota_lahir = $request->kota_lahir;
        $newSiswa->tanggal_lahir = $tanggal_lahir[2] . '-' . $tanggal_lahir[1] . '-' . $tanggal_lahir[0];
        $newSiswa->alamat = $request->alamat;
        $newSiswa->kota_tinggal = $request->kota;
        $newSiswa->no_telpon = $request->no_telepon;
        $newSiswa->pendidikan = $request->pendidikan;

        $newDetailKursus->id_detail = $id_detail_kursus;
        $newDetailKursus->kursus = $request->kursus;
        $newDetailKursus->program = $request->program;
        $newDetailKursus->level = $request->level;
        $newDetailKursus->catatan_kursus = $request->catatan_kursus;
        $newDetailKursus->hari_kursus = $hari_kursus;
        $newDetailKursus->jam_kursus = $request->jam_kursus;
        $newDetailKursus->no_urut = $request->no_urut;
        $newDetailKursus->uang_pendaftaran = $request->uang_pendaftaran;
        $newDetailKursus->uang_kursus = $request->uang_kursus;
        $newDetailKursus->uang_ujian_sertifikat = $request->uang_ujian_sertifikat;
        $newDetailKursus->uang_buku = $request->uang_buku;
        $newDetailKursus->jumlah = $request->jumlah;
        $newDetailKursus->tanggal_daftar = $tanggal_daftar[2] . '-' . $tanggal_daftar[1] . '-' . $tanggal_daftar[0];

        $newDetailSiswa->id_siswa = $id_siswa;
        $newDetailSiswa->id_detail_kursus = $id_detail_kursus;

        $newSiswa->save();
        $newDetailKursus->save();
        $newDetailSiswa->save();
        // jika asal dari arsip siswa
        if ($request->redirect_to) {
            return redirect($request->redirect_to)->with('success', 'Data berhasil ditambah');
        }
        return redirect()->route('pembayaranView')->with('success', 'Siswa baru berhasil didaftarkan');
    }

    public function bayarPendidikan(Request $request)
    {
        $id_siswa = $request->id_siswa;
        $id_detail_kursus = $request->id_detail_kursus;
        $detail_pembayaran = Detail_Pembayaran::where('id_siswa', $id_siswa)->where('id_detail_kursus', $id_detail_kursus)->first();
        // dd($detail_pembayaran->pembayaran_2);
        if ($detail_pembayaran) {
            if ($detail_pembayaran->pembayaran_3 != null) {
                $detail_pembayaran->pembayaran_4 = $request->dibayar;
                $detail_pembayaran->save();
            } else {
                if ($detail_pembayaran->pembayaran_2 != null) {
                    $detail_pembayaran->pembayaran_3 = $request->dibayar;
                    $detail_pembayaran->save();
                } else {
                    $detail_pembayaran->pembayaran_2 = $request->dibayar;
                    $detail_pembayaran->save();
                }
            }
        } else {
            $newDetailPembayaran = new Detail_Pembayaran;
            $newDetailPembayaran->id_siswa = $id_siswa;
            $newDetailPembayaran->id_detail_kursus = $id_detail_kursus;
            $newDetailPembayaran->pembayaran_1 = $request->dibayar;
            $newDetailPembayaran->save();
        }

        $newDetailTransaksi = new Detail_Transaksi;
        $newDetailTransaksi->id_detail_transaksi = Str::random(32);
        $tanggal = explode('/', $request->tanggal_pembayaran);
        $newDetailTransaksi->tanggal = $tanggal[2] . '-' . $tanggal[1] . '-' . $tanggal[0];
        $newDetailTransaksi->keterangan = $request->keterangan;
        $newDetailTransaksi->jenis_transaksi = 'Pemasukan';
        $newDetailTransaksi->jumlah = $request->dibayar;
        $newDetailTransaksi->save();
        return Redirect::route('arsipPembayaranView')->with('success', 'Pembayaran Berhasil');
    }

    public function addPengeluaran(Request $request)
    {
        $newPengeluaran = new Pengeluaran;
        $newPengeluaran->id_pengeluaran = Str::random(32);
        $newPengeluaran->rincian = $request->rincian;
        $newPengeluaran->biaya = $request->biaya;
        $tanggal = explode('/', $request->tanggal);
        $newPengeluaran->tanggal = $tanggal[2] . '-' . $tanggal[1] . '-' . $tanggal[0];
        $newPengeluaran->save();

        $newDetailTransaksi = new Detail_Transaksi;
        $newDetailTransaksi->id_detail_transaksi = Str::random(32);
        $tanggal = explode('/', $request->tanggal);
        $newDetailTransaksi->tanggal = $tanggal[2] . '-' . $tanggal[1] . '-' . $tanggal[0];
        $newDetailTransaksi->keterangan = $request->rincian;
        $newDetailTransaksi->jenis_transaksi = 'Pengeluaran';
        $newDetailTransaksi->jumlah = $request->biaya;
        $newDetailTransaksi->save();
        return Redirect::back()->with('success', 'Data Baru Pengeluaran Berhasil Ditambahkan');
    }
}

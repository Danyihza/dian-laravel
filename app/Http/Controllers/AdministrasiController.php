<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Detail_Kursus;
use App\Models\Detail_Pembayaran;
use App\Models\Detail_Transaksi;
use App\Models\Fk_detail_siswa;
use App\Models\Kursus;
use App\Models\Level;
use App\Models\Pengeluaran;
use App\Models\Program;
use App\Models\Regencies;
use App\Models\Siswa;
use App\Models\Uang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

class AdministrasiController extends Controller
{
    public function pendaftaranView(Request $request)
    {
        $data['title'] = 'pendaftaran';
        $data['parent'] = 'administrasi';
        $data['level'] = Level::all();
        $data['regencies'] = Regencies::all();
        $data['uang_pendaftaran'] = Uang::where('jenis_uang', 'pendaftaran')->orderBy('jumlah', 'ASC')->get();
        $data['uang_kursus'] = Uang::where('jenis_uang', 'kursus')->orderBy('jumlah', 'ASC')->get();
        $data['uang_ujian'] = Uang::where('jenis_uang', 'ujian_sertifikat')->orderBy('jumlah', 'ASC')->get();
        $data['uang_buku'] = Uang::where('jenis_uang', 'buku')->orderBy('jumlah', 'ASC')->get();
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
        // dd($data['detail_kursus']->jumlah);
        $data['detail_pembayaran']  = $detail_pembayaran;
        $data['tanggal'] = date('d/m/Y');
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
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'kota_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'no_telepon' => 'required',
            'pendidikan' => 'required',
            'kursus' => 'required',
            'program' => 'required',
            'level' => 'required',
            'hari_kursus' => 'required',
            'jam_kursus' => 'required',
            'no_urut' => 'required',
            'nis' => 'required',
            'uang_pendaftaran' => 'required',
            'uang_kursus' => 'required',
            'uang_ujian_sertifikat' => 'required',
            'uang_buku' => 'required',
            'jumlah' => 'required'
        ], [
            'required' => 'Semua Kolom Wajib Diisi'
        ]);
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
        for ($i = 1; $i <= count($array_hari_kursus); $i++) {
            // echo $array_hari_kursus[$i-1];
            $hari_kursus .= $array_hari_kursus[$i - 1];
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
        $tanggal = explode('/', $request->tanggal_pembayaran);
        $time = strtotime($tanggal[2] . '-' . $tanggal[1] . '-' . $tanggal[0]);
        // dd($time);
        $detail_pembayaran = Detail_Pembayaran::where('id_siswa', $id_siswa)->where('id_detail_kursus', $id_detail_kursus)->first();
        // $no_transaksi = str_pad(Detail_Transaksi::generateId($time),2,'0',STR_PAD_LEFT);
        // dd($no_transaksi);
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
        
        // $nourut = str_pad($no,2,'0',STR_PAD_LEFT);
        
        $newDetailTransaksi = new Detail_Transaksi;
        $newDetailTransaksi->id_detail_transaksi = 'DI' . '-' . self::numberToRomanRepresentation(session('login-data')['cabang']) . '/' . $request->tanggal_pembayaran . '/' . Detail_Transaksi::generateID($time);
        $newDetailTransaksi->tanggal = $tanggal[2] . '-' . $tanggal[1] . '-' . $tanggal[0];
        $newDetailTransaksi->keterangan = $request->keterangan;
        $newDetailTransaksi->jenis_transaksi = 'Pemasukan';
        $newDetailTransaksi->jumlah = $request->dibayar;
        $newDetailTransaksi->save();
        return Redirect::route('arsipPembayaranView')->with('success', 'Pembayaran Berhasil');
    }

    public function printNota(Request $request)
    {
        $id_siswa = $request->s;
        $id_detail_kursus = $request->d;
        $tanggal = $request->t;
        $tang = explode('/', $tanggal);
        $time = strtotime($tang[2] . '-' . $tang[1] . '-' . $tang[0]);
        $data['jumlah_bayar'] = $request->j;
        // dd(Crypt::decryptString($request->j));
        $data['cabang'] = Cabang::where('id_cabang', session('login-data')['cabang'])->first();
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
        $data['sisa_pembayaran'] = $data['detail_kursus']->jumlah - $data['telah_dibayar'] - $data['jumlah_bayar'];
        // dd($data['detail_kursus']->jumlah);
        $data['detail_pembayaran']  = $detail_pembayaran;
        $data['no_transaksi'] = 'DI' . '-' . self::numberToRomanRepresentation($data['cabang']->id_cabang) . '/' . $tanggal . '/' . Detail_Transaksi::generateID($time);
        $tanggal = date('d');
        $bulan = (int) date('m');
        $tahun = date('Y');
        $nama_bulan = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];
        $data['tanggalTransaksi'] = "$tanggal $nama_bulan[$bulan] $tahun";
        // dd($tanggalTransaksi);
        // dd($no_transaksi);
        return view('print.notapembayaran', $data);
    }

    private static function numberToRomanRepresentation($number)
    {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if ($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }

    public function addPengeluaran(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'rincian' => 'required',
            'biaya' => 'required',
        ], [
            'required' => 'Mohon lengkapi semua form yang ada'
        ]);
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

    public function removePengeluaran($id_pengeluaran)
    {
        Pengeluaran::where('id_pengeluaran', $id_pengeluaran)->delete();
        return Redirect::back()->with('success', 'Data Berhasil Dihapus');
    }
}

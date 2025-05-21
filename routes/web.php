<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangDetailController;
use App\Http\Controllers\DspController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisBayarDetailController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KelasDetailController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MutasiKelasController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\PinjamDetailController;
use App\Http\Controllers\ProgramKeahlianController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaKelasController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\RuanganDetailController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


//=========================AWAL ROUTE LOGIN=========================
Route::get('/', [LoginController::class, 'awal'])->name('awal');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('loginaksi', [LoginController::class, 'loginaksi'])->name('loginaksi');
Route::get('logoutaksi', [LoginController::class, 'logoutaksi'])->name('logoutaksi')->middleware('auth');
//=========================AWAL ROUTE LOGIN=========================


//=========================AWAL ROUTE HOME=========================
Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');
Route::get('/about', [HomeController::class, 'about'])->middleware('auth');
//=========================AKHIR ROUTE HOME=========================

//=========================AWAL ROUTE PROGRAM KEAHLIAN=========================
Route::get('/programkeahlian', [ProgramKeahlianController::class, 'programkeahlian'])->middleware('auth');
Route::post('/programkeahlian/tambah', [ProgramKeahlianController::class, 'programkeahliantambah'])->middleware('auth');
Route::get('/programkeahlian/hapus/{idprogramkeahlian}', [ProgramKeahlianController::class, 'programkeahlianhapus'])->middleware('auth');
Route::put('/programkeahlian/edit/{idprogramkeahlian}', [ProgramKeahlianController::class, 'programkeahlianedit'])->middleware('auth');
//========================AKHIR ROUTE PROGRAM KEAHLIAN========================




//=========================AWAL ROUTE JURUSAN=========================
Route::get('/jurusan', [JurusanController::class, 'jurusan'])->middleware('auth');
Route::post('/jurusan/tambah', [JurusanController::class, 'jurusantambah'])->middleware('auth');
Route::get('/jurusan/hapus/{idjurusan}', [JurusanController::class, 'jurusanhapus'])->middleware('auth');
Route::put('/jurusan/edit/{idjurusan}', [JurusanController::class, 'jurusanedit'])->middleware('auth');
//========================AKHIR ROUTE JURUSAN========================



//=========================AWAL ROUTE KELAS=========================
Route::get('/kelas', [KelasController::class, 'kelas'])->middleware('auth');
Route::post('/kelas/tambah', [KelasController::class, 'kelastambah'])->middleware('auth');
Route::get('/kelas/hapus/{idkelas}', [KelasController::class, 'kelashapus'])->middleware('auth');
Route::put('/kelas/edit/{idkelas}', [KelasController::class, 'kelasedit'])->middleware('auth');
//========================AKHIR ROUTE KELAS========================


//=========================AWAL ROUTE KELAS DETAIL=========================
Route::get('/kelasdetail', [KelasDetailController::class, 'kelasdetail'])->middleware('auth');
Route::post('/kelasdetail/tambah', [KelasDetailController::class, 'kelasdetailtambah'])->middleware('auth');
Route::get('/kelasdetail/hapus/{idkelasdetail}', [KelasDetailController::class, 'kelasdetailhapus'])->middleware('auth');
Route::put('/kelasdetail/edit/{idkelasdetail}', [KelasDetailController::class, 'kelasdetailedit'])->middleware('auth');
//========================AKHIR ROUTE KELAS DETAIL========================




//=========================AWAL ROUTE TAHUN AJARAN=========================
Route::get('/thnajaran', [TahunAjaranController::class, 'thnajaran'])->middleware('auth');
Route::post('/thnajaran/tambah', [TahunAjaranController::class, 'thnajarantambah'])->middleware('auth');
Route::get('/thnajaran/hapus/{idthnajaran}', [TahunAjaranController::class, 'thnajaranhapus'])->middleware('auth');
Route::put('/thnajaran/edit/{idthnajaran}', [TahunAjaranController::class, 'thnajaranedit'])->middleware('auth');
//========================AKHIR ROUTE TAHUN AJARAN========================



//=========================AWAL ROUTE SISWA=========================
//AWAL CRUD SISWA
Route::get('/siswa', [SiswaController::class, 'siswa'])->middleware('auth');
Route::post('/siswa/tambah', [SiswaController::class, 'siswatambah'])->middleware('auth');
Route::get('/siswa/hapus/{nis}', [SiswaController::class, 'siswahapus'])->middleware('auth');
Route::put('/siswa/edit/{nis}', [SiswaController::class, 'siswaedit'])->middleware('auth');
//AWAL CRUD SISWA

//AWAL CARI SISWA
Route::get('/siswadetail', [SiswaController::class, 'siswadetail'])->middleware('auth');
Route::get('/siswadetail/cari', [SiswaController::class, 'siswadetailcari'])->middleware('auth');
//AKHIR CARI SISWA

//========================AKHIR ROUTE SISWA========================


//========================AWAL ROUTE MUTASI KELAS SISWA========================
Route::get('/mutasikelas', [MutasiKelasController::class, 'mutasikelas'])->middleware('auth');
Route::get('/mutasikelas/cari', [MutasiKelasController::class, 'mutasikelascari'])->middleware('auth');
Route::post('/mutasikelas/proses', [MutasiKelasController::class, 'mutasikelasproses'])->middleware('auth');
//========================AKHIR ROUTE MUTASI KELAS SISWA========================



//=========================AWAL ROUTE SISWA KELAS=========================
Route::get('/siswakelas', [SiswaKelasController::class, 'siswakelas'])->middleware('auth');
Route::get('/siswakelas/cari', [SiswaKelasController::class, 'siswakelascari'])->middleware('auth');


Route::post('/siswakelas/tambah', [SiswaKelasController::class, 'siswakelastambah'])->middleware('auth');
Route::get('/siswakelas/hapus/{idsiswakelas}', [SiswaKelasController::class, 'siswakelashapus'])->middleware('auth');
Route::put('/siswakelas/edit/{idsiswakelas}', [SiswaKelasController::class, 'siswakelasedit'])->middleware('auth');

// Route::get('/siswakelas', function () 
// {
//         $kelas = Carbon::parse(request()->kelas);
//         $data = App\Models\KelasModel::where('kelas',[$kelas])->get();

//     return view('siswakelas', compact('data'))
// })->middleware('auth');

//========================AKHIR ROUTE SISWA KELAS========================


//=========================AWAL ROUTE BAYAR SPP=========================
Route::get('/spp', [SppController::class, 'spp'])->middleware('auth');
Route::get('/spp/cari', [SppController::class, 'sppcari'])->middleware('auth');
Route::post('/spp/tambah', [SppController::class, 'spptambah'])->middleware('auth');
//========================AKHIR ROUTE BAYAR SPP========================

//=========================AWAL ROUTE BAYAR DSP=========================
Route::get('/dsp', [DspController::class, 'dsp'])->middleware('auth');
Route::get('/dsp/cari', [DspController::class, 'dspcari'])->middleware('auth');
Route::post('/dsp/tambah', [DspController::class, 'dsptambah'])->middleware('auth');
//========================AKHIR ROUTE BAYAR DSP========================



//=========================AWAL ROUTE LAPORAN PEMBAYARAN=========================
Route::get('/laporan', [LaporanController::class . 'laporan'])->middleware('auth');
Route::get('/laporan/cari', [LaporanController::class . 'laporancari'])->middleware('auth');
Route::get('/laporan/cetakpdf', [LaporanController::class . 'laporancetakpdf'])->middleware('auth');
//========================AKHIR ROUTE LAPORAN PEMBAYARAN========================


//=========================AWAL ROUTE JENIS BAYAR DETAIL=========================
Route::get('/jenisbayardetail', [JenisBayarDetailController::class, 'tampil'])->middleware('auth');
Route::post('/jenisbayardetail/tambah', [JenisBayarDetailController::class, 'tambah'])->middleware('auth');
Route::get('/jenisbayardetail/hapus/{idjenisbayardetail}', [JenisBayarDetailController::class, 'hapus'])->middleware('auth');
Route::put('/jenisbayardetail/edit/{idjenisbayardetail}', [JenisBayarDetailController::class, 'edit'])->middleware('auth');
//========================AKHIR ROUTE JENIS BAYAR DETAIL========================

//=========================AWAL ROUTE BARANG=========================

// Halaman User
Route::get('user/barang/cari', [BarangController::class, 'usercari'])->name('barang.usercari');
Route::get('/user/barang', [BarangController::class, 'user'])->name('barang.user');
Route::get('/user/barangdetail', [BarangController::class, 'usershow'])->name('barang.usershow');
Route::get('/user/barang/{id}', [BarangController::class, 'usershow'])->name('barang.usershow');




Route::get('/barang/cari', [BarangController::class, 'cari'])->name('barang.cari');
Route::resource('barang', BarangController::class)->middleware('auth');
Route::get('/barang/trash', [BarangController::class, 'trash'])->name('barang.trash')->middleware('auth');
Route::get('/barang/restore/{idbarang}', [BarangController::class, 'restore'])->name('barang.restore')->middleware('auth');
Route::get('/barang/force-delete/{idbarang}', [BarangController::class, 'forceDelete'])->name('barang.forceDelete')->middleware('auth');
Route::post('/barangdetail/bulk-update', [BarangDetailController::class, 'bulkUpdate'])->name('barangdetail.bulkUpdate');
Route::delete('/barangdetail/{id}', [BarangDetailController::class, 'destroydetail'])->name('barangdetail.destroy');


//========================AKHIR ROUTE BARANGs========================

//=========================AWAL ROUTE RUANGAN=========================

// Halaman User Ruangan
Route::get('user/ruangan/cari', [RuanganController::class, 'usercari'])->name('ruangan.usercari');
Route::get('/user/ruangan', [RuanganController::class, 'user'])->name('ruangan.user');
Route::get('/user/ruangandetail', [RuanganController::class, 'usershow'])->name('ruangan.usershow');
Route::get('/user/ruangan/{id}', [RuanganController::class, 'usershow'])->name('ruangan.usershow');

// Pencarian dan resource CRUD Ruangan (auth middleware)
Route::get('/ruangan/cari', [RuanganController::class, 'cari'])->name('ruangan.cari');
Route::resource('ruangan', RuanganController::class)->middleware('auth');
Route::get('/ruangan/trash', [RuanganController::class, 'trash'])->name('ruangan.trash')->middleware('auth');
Route::get('/ruangan/restore/{idruangan}', [RuanganController::class, 'restore'])->name('ruangan.restore')->middleware('auth');
Route::get('/ruangan/force-delete/{idruangan}', [RuanganController::class, 'forceDelete'])->name('ruangan.forceDelete')->middleware('auth');

// Jika ada bulk update untuk ruangan detail, misal:
// Route::post('/ruangandetail/bulk-update', [RuanganDetailController::class, 'bulkUpdate'])->name('ruangandetail.bulkUpdate');


//=========================AWAL ROUTE PINJAM=========================
Route::prefix('peminjaman')->name('pinjam.')->group(function () {
    Route::get('/', [PinjamController::class, 'index'])->name('index');
    Route::get('/create', [PinjamController::class, 'create'])->name('create');
    Route::post('/store', [PinjamController::class, 'store'])->name('store');
    Route::get('/{idpinjam}/edit', [PinjamController::class, 'edit'])->name('edit');
    Route::put('/{idpinjam}', [PinjamController::class, 'update'])->name('update');
    Route::delete('/{idpinjam}', [PinjamController::class, 'destroy'])->name('destroy');
    Route::get('/{idpinjam}', [PinjamController::class, 'show'])->name('show');
});
//========================AKHIR ROUTE PINJAM========================

//=========================AWAL ROUTE PINJAM DETAIL=========================
Route::prefix('pinjamdetail')->name('pinjamdetail.')->group(function () {
    Route::get('/{idpinjam}', [PinjamDetailController::class, 'index'])->name('index');
    Route::put('/pinjam/konfirmasi/{id}', [PinjamController::class, 'konfirmasi'])->name('pinjam.konfirmasi');
    Route::get('/create/{idpinjam}', [PinjamDetailController::class, 'create'])->name('create');
    Route::post('/store', [PinjamDetailController::class, 'store'])->name('store');
    Route::delete('/{id}', [PinjamDetailController::class, 'destroy'])->name('destroy');
});
//========================AKHIR ROUTE PINJAM========================
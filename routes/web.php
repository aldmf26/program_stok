<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PemeliharaanController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SelesaiServiceController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data = [
        'title' => 'Login'
    ];
    return view('login.login', $data);
})->name('/');
Route::post('prosesLogin', function (Request $r) {
    $data = [
        'username' => $r->username,
        'password' => $r->password,
    ];
    if (Auth::attempt($data)) {
        $r->session()->regenerate();

        return redirect()->intended('barang');
    } else {

        return redirect()->route('/')->with('error', 'Username / password salah!');
    }
})->name('prosesLogin');
Route::get('logout', function (Request $r) {
    Auth::logout();

    $r->session()->invalidate();

    $r->session()->regenerateToken();

    return redirect('/');
})->name('logout');

Route::get('user', [UserController::class, 'index'])->name('user')->middleware('auth');
Route::post('tambahUser', [UserController::class, 'tambah'])->name('tambahUser')->middleware('auth');
Route::post('editUser', [UserController::class, 'edit'])->name('editUser')->middleware('auth');
Route::get('hapusUser', [UserController::class, 'hapus'])->name('hapusUser')->middleware('auth');

Route::get('barang', [BarangController::class, 'index'])->name('barang')->middleware('auth');
Route::post('tambahBarang', [BarangController::class, 'tambah'])->name('tambahBarang')->middleware('auth');
Route::post('editBarang', [BarangController::class, 'edit'])->name('editBarang')->middleware('auth');
Route::get('hapusBarang', [BarangController::class, 'hapus'])->name('hapusBarang')->middleware('auth');
Route::get('lapBarang', [BarangController::class, 'lapBarang'])->name('lapBarang')->middleware('auth');
Route::post('exportLapBarang', [BarangController::class, 'exportLapBarang'])->name('exportLapBarang')->middleware('auth');

Route::get('stok', [StokController::class, 'index'])->name('stok')->middleware('auth');
Route::post('tambahStok', [StokController::class, 'tambah'])->name('tambahStok')->middleware('auth');
Route::post('editStok', [StokController::class, 'edit'])->name('editStok')->middleware('auth');
Route::get('hapusStok', [StokController::class, 'hapus'])->name('hapusStok')->middleware('auth');
Route::get('lapStok', [StokController::class, 'lapStok'])->name('lapStok')->middleware('auth');
Route::post('exportLapStok', [StokController::class, 'exportLapStok'])->name('exportLapStok')->middleware('auth');

Route::get('jenis', [JenisController::class, 'index'])->name('jenis')->middleware('auth');
Route::post('tambahJenis', [JenisController::class, 'tambah'])->name('tambahJenis')->middleware('auth');
Route::post('editJenis', [JenisController::class, 'edit'])->name('editJenis')->middleware('auth');
Route::get('hapusJenis', [JenisController::class, 'hapus'])->name('hapusJenis')->middleware('auth');

Route::get('satuan', [SatuanController::class, 'index'])->name('satuan')->middleware('auth');
Route::post('tambahSatuan', [SatuanController::class, 'tambah'])->name('tambahSatuan')->middleware('auth');
Route::post('editSatuan', [SatuanController::class, 'edit'])->name('editSatuan')->middleware('auth');
Route::get('hapusSatuan', [SatuanController::class, 'hapus'])->name('hapusSatuan')->middleware('auth');
 
Route::get('pemeliharaan', [PemeliharaanController::class, 'index'])->name('pemeliharaan')->middleware('auth');
Route::post('tambahPemeliharaan', [PemeliharaanController::class, 'tambah'])->name('tambahPemeliharaan')->middleware('auth');
Route::post('editPemeliharaan', [PemeliharaanController::class, 'edit'])->name('editPemeliharaan')->middleware('auth');
Route::get('hapusPemeliharaan', [PemeliharaanController::class, 'hapus'])->name('hapusPemeliharaan')->middleware('auth');

Route::get('service', [SelesaiServiceController::class, 'index'])->name('service')->middleware('auth');
Route::post('tambahService', [SelesaiServiceController::class, 'tambah'])->name('tambahService')->middleware('auth');
Route::post('editService', [SelesaiServiceController::class, 'edit'])->name('editService')->middleware('auth');
Route::get('hapusService', [SelesaiServiceController::class, 'hapus'])->name('hapusService')->middleware('auth');

Route::get('pegawai', [PegawaiController::class, 'index'])->name('pegawai')->middleware('auth');
Route::post('tambahPegawai', [PegawaiController::class, 'tambah'])->name('tambahPegawai')->middleware('auth');
Route::post('editPegawai', [PegawaiController::class, 'edit'])->name('editPegawai')->middleware('auth');
Route::get('hapusPegawai', [PegawaiController::class, 'hapus'])->name('hapusPegawai')->middleware('auth');

Route::get('cabang', [CabangController::class, 'index'])->name('cabang')->middleware('auth');
Route::post('tambahCabang', [CabangController::class, 'tambah'])->name('tambahCabang')->middleware('auth');
Route::post('editCabang', [CabangController::class, 'edit'])->name('editCabang')->middleware('auth');
Route::get('hapusCabang', [CabangController::class, 'hapus'])->name('hapusCabang')->middleware('auth');

Route::get('suplier', [SuplierController::class, 'index'])->name('suplier')->middleware('auth');
Route::post('tambahSuplier', [SuplierController::class, 'tambah'])->name('tambahSuplier')->middleware('auth');
Route::post('editSuplier', [SuplierController::class, 'edit'])->name('editSuplier')->middleware('auth');
Route::get('hapusSuplier', [SuplierController::class, 'hapus'])->name('hapusSuplier')->middleware('auth');

// laporan 
Route::get('lapPegawai', [LaporanController::class, 'lapPegawai'])->name('lapPegawai')->middleware('auth');
Route::get('exportPegawai', [LaporanController::class, 'exportPegawai'])->name('exportPegawai')->middleware('auth');
Route::get('lapSuplier', [LaporanController::class, 'lapSuplier'])->name('lapSuplier')->middleware('auth');
Route::get('exportSuplier', [LaporanController::class, 'exportSuplier'])->name('exportSuplier')->middleware('auth');
Route::get('lapPemeliharaan', [LaporanController::class, 'lapPemeliharaan'])->name('lapPemeliharaan')->middleware('auth');
Route::get('exportPemeliharaan', [LaporanController::class, 'exportPemeliharaan'])->name('exportPemeliharaan')->middleware('auth');
Route::get('lapSelesai', [LaporanController::class, 'lapSelesai'])->name('lapSelesai')->middleware('auth');
Route::post('exportSelesai', [LaporanController::class, 'exportSelesai'])->name('exportSelesai')->middleware('auth');
Route::get('lapPengambilan', [LaporanController::class, 'lapPengambilan'])->name('lapPengambilan')->middleware('auth');
Route::post('exportPengambilan', [LaporanController::class, 'exportPengambilan'])->name('exportPengambilan')->middleware('auth');

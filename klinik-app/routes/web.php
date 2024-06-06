<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienDashboardController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\CutiDokterController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AntrianOnlineController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\PasswordResetController;


Route::get('login/form', [AuthController::class, 'showLoginForm'])->name('loginForm');
Route::get('register/form', [AuthController::class, 'showRegistrationForm'])->name('registerForm');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('password/reset', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [PasswordResetController::class, 'reset'])->name('password.update');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/', [PasienDashboardController::class, 'index'])->name('pasien.dashboard');

Route::get('/data/pegawai', [PegawaiController::class, 'showPegawai'])->name('pegawai.show');

Route::get('/patient/artikel', [ArtikelController::class, 'indexPasien'])->name('patient.artikel.index');


Route::get('/all/faq', [FAQController::class, 'showFAQs'])->name('faq.show');

Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');

//Post
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{post}',  [PostController::class, 'show'])->name('posts.show');

//Reply
Route::post('/posts/{post}/replies', [ReplyController::class, 'store'])->name('replies.store');
Route::get('/replies/{reply}/edit', [ReplyController::class, 'edit'])->name('replies.edit');
Route::put('/replies/{reply}', [ReplyController::class, 'update'])->name('replies.update');
Route::delete('/replies/{reply}', [ReplyController::class, 'destroy'])->name('replies.destroy');


Route::middleware(['admin'])->group(function () {
    //Dashboard 
    Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    //Kelola Pegawai 
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('/pegawai/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::put('/pegawai/{pegawai}/update', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::delete('/pegawai/{pegawai}/destroy', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

    //Kelola Kategori Artikel
    Route::get('kategori_artikels', [KategoriArtikelController::class, 'index'])->name('kategori_artikel.index');
    Route::get('kategori_artikel/create', [KategoriArtikelController::class, 'create'])->name('kategori_artikel.create');
    Route::post('kategori_artikel', [KategoriArtikelController::class, 'store'])->name('kategori_artikel.store');
    Route::get('kategori_artikel/{kategori_artikel}/edit', [KategoriArtikelController::class, 'edit'])->name('kategori_artikel.edit');
    Route::put('kategori_artikel/{kategori_artikel}', [KategoriArtikelController::class, 'update'])->name('kategori_artikel.update');
    Route::delete('kategori_artikel/{kategori_artikel}', [KategoriArtikelController::class, 'destroy'])->name('kategori_artikel.destroy');

    //FAQ
    Route::get('/faq', [FAQController::class, 'index'])->name('faq.index');
    Route::get('/faq/create', [FAQController::class, 'create'])->name('faq.create');
    Route::post('/faq/store', [FAQController::class, 'store'])->name('faq.store');
    Route::get('/faq/{faq}/edit', [FAQController::class, 'edit'])->name('faq.edit');
    Route::put('/faq/{faq}/update', [FAQController::class, 'update'])->name('faq.update');
    Route::delete('/faq/{faq}/delete', [FAQController::class, 'destroy'])->name('faq.destroy');

    //Treatments
    Route::get('/treatments', [TreatmentController::class, 'index'])->name('treatments.index');
    Route::get('/treatments/create', [TreatmentController::class, 'create'])->name('treatments.create');
    Route::post('/treatments', [TreatmentController::class, 'store'])->name('treatments.store');
    Route::get('/treatments/{treatment}/edit', [TreatmentController::class, 'edit'])->name('treatments.edit');
    Route::put('/treatments/{treatment}', [TreatmentController::class, 'update'])->name('treatments.update');
    Route::delete('/treatments/{treatment}', [TreatmentController::class, 'destroy'])->name('treatments.destroy');
    Route::get('treatments/export', [TreatmentController::class, 'export'])->name('treatments.export');
    Route::get('/treatments/{id}/print', [TreatmentController::class, 'print'])->name('treatments.print');
    Route::get('/treatments/{id}/pdf', [TreatmentController::class, 'pdf'])->name('treatments.pdf');

    //Cuti Dokter
    Route::get('/cuti-dokter', [CutiDokterController::class, 'index'])->name('cuti_dokter.index');
    Route::get('/cuti-dokter/create', [CutiDokterController::class, 'create'])->name('cuti_dokter.create');
    Route::post('/cuti-dokter', [CutiDokterController::class, 'store'])->name('cuti_dokter.store');
    Route::get('/cuti-dokter/{cuti_dokter}/edit', [CutiDokterController::class, 'edit'])->name('cuti_dokter.edit');
    Route::put('/cuti-dokter/{cuti_dokter}', [CutiDokterController::class, 'update'])->name('cuti_dokter.update');
    Route::delete('/cuti-dokter/{cuti_dokter}', [CutiDokterController::class, 'destroy'])->name('cuti_dokter.destroy');

    //Obat
    Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
    Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
    Route::post('/obat/store', [ObatController::class, 'store'])->name('obat.store');
    Route::get('/obat/{obat}/edit', [ObatController::class, 'edit'])->name('obat.edit');
    Route::put('/obat/{obat}/update', [ObatController::class, 'update'])->name('obat.update');
    Route::delete('/obat/{obat}/destroy', [ObatController::class, 'destroy'])->name('obat.destroy');
    Route::get('/obat/{obat}', [ObatController::class, 'show'])->name('obat.show');

    //Antrian
    Route::get('antrian_online/today', [AntrianOnlineController::class, 'showToday'])->name('antrian_online.show_today');

    //Artikel
    Route::get('artikel', [ArtikelController::class, 'index'])->name('artikel.index');
    Route::get('artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
    Route::post('artikel/store', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::get('artikel/{artikel}', [ArtikelController::class, 'show'])->name('artikel.show');
    Route::get('artikel/{artikel}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::put('artikel/{artikel}', [ArtikelController::class, 'update'])->name('artikel.update');
    Route::delete('artikel/{artikel}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');

    //Jadwal
    Route::get('jadwals', [JadwalController::class, 'index'])->name('jadwals.index');
    Route::get('jadwals/create', [JadwalController::class, 'create'])->name('jadwals.create');
    Route::post('jadwals', [JadwalController::class, 'store'])->name('jadwals.store');
    Route::get('jadwals/{jadwal}/edit', [JadwalController::class, 'edit'])->name('jadwals.edit');
    Route::put('jadwals/{jadwal}', [JadwalController::class, 'update'])->name('jadwals.update');
    Route::delete('jadwals/{jadwal}', [JadwalController::class, 'destroy'])->name('jadwals.destroy');

    //Facilty
    Route::get('/facilities', [FacilityController::class, 'index'])->name('facilities.index');
    Route::get('/facilities/create', [FacilityController::class, 'create'])->name('facilities.create');
    Route::post('/facilities', [FacilityController::class, 'store'])->name('facilities.store');
    Route::get('/facilities/{facility}/edit', [FacilityController::class, 'edit'])->name('facilities.edit');
    Route::put('/facilities/{facility}', [FacilityController::class, 'update'])->name('facilities.update');
    Route::delete('/facilities/{facility}', [FacilityController::class, 'destroy'])->name('facilities.destroy');
    Route::get('/facilities/{facility}', [FacilityController::class, 'show'])->name('facilities.show');

    //Layanan
    Route::get('/all/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

    //Ulasan

    Route::get('/admin/ulasan', [UlasanController::class, 'adminIndex'])->name('admin.ulasan.index');
    Route::delete('/admin/ulasan/{ulasan}', [UlasanController::class, 'adminDestroy'])->name('admin.ulasan.destroy');
});

Route::middleware(['pasien'])->group(function () {

    //Cuti Dokter
    Route::get('/leave-dates', [CutiDokterController::class, 'showNextMonthLeaves'])->name('leave_dates');

    //Obat
    Route::get('/pasien/obats', [ObatController::class, 'userIndex'])->name('user.obat.index');
    Route::get('/obat/pasien/{obat}', [ObatController::class, 'userShow'])->name('user.obat.show');

    //Artikel
    Route::get('/patient/artikel/{id}', [ArtikelController::class, 'detail'])->name('patient.artikel.show');

    //Antrian
    Route::get('antrian_online', [AntrianOnlineController::class, 'index'])->name('antrian_online.index');
    Route::get('antrian_online/create', [AntrianOnlineController::class, 'create'])->name('antrian_online.create');
    Route::post('antrian_online/store', [AntrianOnlineController::class, 'store'])->name('antrian_online.store');
    Route::delete('antrian_online/{antrian}', [AntrianOnlineController::class, 'destroy'])->name('antrian_online.destroy');
    Route::get('/antrian_online/print/{id}', [AntrianOnlineController::class, 'print'])->name('antrian_online.print');
    Route::get('antrian_online/download_pdf/{id}', [AntrianOnlineController::class, 'downloadPDF'])->name('antrian_online.download_pdf');

    //Jadwal
    Route::get('show/jadwals', [JadwalController::class, 'indexUser'])->name('jadwalstouser.index');

    //Facility
    Route::get('/all/facility', [FacilityController::class, 'indexUser'])->name('pasien.facilities.index');

    //Layanan
    Route::get('/pasien/all/services', [ServiceController::class, 'indexUser'])->name('pasien.services.index');
    Route::get('/detail/services/{id}', [ServiceController::class, 'showUser'])->name('pasien.services.show');

    //Ulasan
    Route::get('/ulasan/create', [UlasanController::class, 'create'])->name('ulasan.create');
    Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');
    Route::delete('/ulasan/{ulasan}', [UlasanController::class, 'destroy'])->name('ulasan.destroy');
});

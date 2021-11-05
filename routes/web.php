<?php

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

Route::group(['middleware' => 'languange'], function () {
    Route::get('/', 'LandingController@index')->name('landing');

    Route::get('/articles_details/{id}', 'LandingController@articles_details')->name('articles_details');
    Route::get('/informasi_kemahasiswaan', 'LandingController@informasi_kemahasiswaan')->name('informasi_kemahasiswaan');
    Route::get('/kegiatan_kemahasiswaan', 'LandingController@kegiatan_kemahasiswaan')->name('kegiatan_kemahasiswaan');
    Route::get('/informasi_beasiswa', 'LandingController@informasi_beasiswa')->name('informasi_beasiswa');

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/set-role/{role}', 'HomeController@setRole')->name('setRole');

    Route::get('kegiatan', 'HomeController@kegiatan')->name('kegiatan');


    Route::resource('lomba', 'LombaController');
    Route::resource('nonlomba', 'NonLombaController');
    Route::resource('sertifikat', 'SertifikatController');
    Route::resource('pelatihan', 'PelatihanController');
    Route::resource('magang', 'MagangController');
    Route::resource('pendaftaran', 'PendaftaranBeasiswaController');
    Route::resource('statuspemrosesan', 'StatusPemrosesanController');
    Route::resource('ekspor', 'EksporBeasiswaController');
    Route::resource('mahasiswa', 'MahasiswaController');
    Route::resource('skpi', 'SkpiController');
    Route::resource('kategorikegiatan', 'KategoriKegiatanController');
    Route::resource('jeniskepesertaan', 'JenisKepesertaanController');
    Route::resource('capaianprestasi', 'CapaianPrestasiController');
    Route::resource('agama', 'AgamaController');
    Route::resource('prodi', 'ProdiController');

    Route::get('/export/skpi/excel', 'SkpiController@excel')->name('skpi.excel');


    Route::get('pendaftaran/{id}/daftar', 'PendaftaranBeasiswaController@daftar')->name('pendaftaran.daftar');
    Route::put('pendaftaran/{id}/storedaftar', 'PendaftaranBeasiswaController@storedaftar')->name('pendaftaran.storedaftar');

    // Route::get('/skpi/excel', 'SkpiController@s', function(){
	// 	return Excel::download(new SkpiExport, 'skpi.xlsx');
    // })->name('skpi.excel');


    Route::post('schedule/getclockstart', 'ScheduleController@getclockstart')->name('schedule.getclockstart');
    Route::post('schedule/getclockstartedit', 'ScheduleController@getclockstartedit')->name('schedule.getclockstartedit');

    Route::post('home/period_filter', 'HomeController@period_filter')->name('home.period_filter');




    Route::resource('documents', 'DocumentController');
    Route::get('documents/{id}/print', 'DocumentController@print')->name('document.print');
    Route::resource('checklists', 'CheckListController');
    Route::get('checklists/{id}/print', 'CheckListController@print')->name('checklists.print');
    Route::resource('findings', 'FindingController');
    Route::get('findings/{id}/print', 'FindingController@print')->name('findings.print');
    Route::resource('reports', 'ReportsController');
    Route::get('reports/{id}/print', 'ReportsController@print')->name('reports.print');
    Route::resource('uploaddocuments', 'UploadDocumentController');
    Route::resource('reportalls', 'ReportAllController');
    Route::get('reportalls/{periode_id}/print', 'ReportAllController@print')->name('reportall.print');
    Route::get('uploaddocuments/{id}/print', 'UploadDocumentController@print')->name('uploaddocument.print');
    
    Route::resource('articles', 'ArticleController');
    Route::resource('sliders', 'SlidersController');
    Route::resource('pages', 'PagesController');
    Route::resource('standards', 'StandardController');
    Route::resource('standarddetails', 'StandardDetailController');
    Route::resource('identity', 'IdentityController');
    Route::resource('division', 'DivisionController');
    Route::resource('period', 'PeriodController');

    Route::resource('agenda', 'AgendaController');
    Route::get('agenda/{periode_id}/print', 'AgendaController@print')->name('agenda.print');
    Route::resource('verification', 'VerificationController');
    Route::get('verification/{periode_id}/print', 'VerificationController@print')->name('verification.print');
    


    Route::resource('employees', 'EmployeeController');
    Route::post('/employees/assignroles', 'EmployeeController@assignRoles')->name('assign.roles');
    Route::post('/employeerole/create', 'EmployeeController@roleCreate')->name('employeerole.create');
    Route::get('/allpermissions/{role_id?}', 'EmployeeController@permissionList')->name('permissions.list');
    Route::post('permissions/create', 'EmployeeController@createPermission')->name('permissions.create');
    Route::post('permissionrole/create', 'EmployeeController@rolePermissionMapping')->name('permissionrole.create');

    Route::resource('flexiblepossetting', 'FlexiblePosSettingController');
    Route::post('/flexiblepossetting/add-payment-type', 'FlexiblePosSettingController@addPaymentType')->name('flexiblepossetting.payment_type');
    Route::post('/flexiblepossetting/store-settings', 'FlexiblePosSettingController@storeSettings')->name('flexiblepossetting.store_settings');
    Route::get('/flexiblepossetting/update-payment-type/{id}', 'FlexiblePosSettingController@updatePaymentType')->name('flexiblepossetting.payment_type.update');
});
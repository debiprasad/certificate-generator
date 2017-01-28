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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/completion-certificate', function () {
    return view('completion-certificate');
});

Route::post('/generate/completion-certificate', 'CertificateGeneratorController@completionCertificate');

Route::get('/participation-certificate', function () {
    return view('participation-certificate');
});

Route::post('/generate/participation-certificate', 'CertificateGeneratorController@participationCertificate');

//Route::get('/generate-certificate', 'CertificateGeneratorController');

Route::get('/generate-certificate-html', function () {
    return view('certificate');
});

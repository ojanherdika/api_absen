<?php
use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function () use ($router) {
    return $router->app->version();
});
//get key
$router->get('/key', function() {
    return Str::random(32);
});

//LOGIN USER
$router->post('auth/login','AuthController@loginPost');
$router->get('/viewsDataSkill','C_Skill@index');
$router->get('/viewDataSkill/{id_skill}','C_Skill@view');
$router->get('/viewsDataReligion','C_Religion@index');
$router->get('/viewDataReligion/{id_religion}','C_Religion@view');
$router->get('/viewsDataMartial','C_Martial@index');
$router->get('/viewDataMartial/{id_martial}','C_Martial@view');
$router->get('/viewsDataGender','C_Gender@index');
$router->get('/viewDataGender/{id_gender}','C_Gender@view');
$router->post('/tambahDataSkill', 'C_Skill@inputdata');
$router->post('/tambahDataReligion', 'C_Religion@inputdata');
$router->post('/tambahDataMartial', 'C_Martial@inputdata');
$router->post('/tambahDataGender', 'C_Gender@inputdata');
$router->put('/updateDataSkill/{id_skill}','C_Skill@update');
$router->put('/updateDataReligion/{id_religion}','C_Religion@update');
$router->put('/updateDataMartial/{id_martial}','C_Martial@update');
$router->put('/updateDataGender/{id_gender}','C_Gender@update');
$router->delete('/deleteDataSkill/{id_skill}','C_Skill@delete');
$router->delete('/deleteDataReligion/{id_religion}','C_Religion@delete');
$router->delete('/deleteDataMartial/{id_martial}','C_Martial@delete');
$router->delete('/deleteDataGender/{id_gender}','C_Gender@delete');
$router->get('/viewDataAbsensi/{id_absensi}','C_Absensi@view');

$router->group(
    ['middleware' => 'auth'], 
    function() use ($router) {
        $router->get('/viewsDataAbsensi','C_Absensi@index');
        
        $router->get('/viewsDataCompany','C_Company@index');
        $router->get('/viewsDataBranch','C_Branch@index');
        $router->get('/viewsDataDepartement','C_Departement@index');
        $router->get('/viewsDataUser','C_User@index');
        $router->get('/viewDataUser/{id_user}','C_User@view');
        $router->get('/viewsDataAbsensiLevel','C_Absensi_Level@index');
        $router->get('/viewDataAbsensiLevel/{id_absensi_level}','C_Absensi_Level@view');
        $router->get('/viewsDataKaryawan','C_Karyawan@index');
        $router->get('/viewDataKaryawan/{id_karyawan}','C_Karyawan@view');
        $router->post('/tambahDataAbsensi', 'C_Absensi@inputdata');
        $router->post('/tambahDataUser', 'C_User@inputdata');
        $router->post('/tambahDataAbsensiLevel', 'C_Absensi_Level@inputdata');
        $router->post('/tambahDataCompany', 'C_Company@inputdata');
        $router->post('/tambahDataBranch', 'C_Branch@inputdata');
        $router->post('/tambahDataDepartement', 'C_Departement@inputdata');
        $router->put('/updateDataAbsensi/{id_absensi}','C_Absensi@update');
        $router->put('/updateDataUser/{id_user}','C_User@update');
        $router->put('/updateDataAbsensiLevel/{id_absensi_level}','C_Absensi_Level@update');
        $router->put('/updateDataKaryawan/{id_karyawan}','C_Karyawan@update');
        $router->put('/updateDataCompany/{id_company}','C_Company@update');
        $router->put('/updateDataDepartement/{id_departement}','C_Departement@update');
        $router->put('/updateDataBranch/{id_branch}','C_Branch@update');
        $router->delete('/deleteDataAbsensi/{id_absensi}','C_Absensi@delete');
        $router->delete('/deleteDataUser/{id_user}','C_User@delete');
        $router->delete('/deleteDataAbsensiLevel/{id_absensi_level}','C_Absensi_Level@delete');
        $router->delete('/deleteDataKaryawan/{id_karyawan}','C_Karyawan@delete');
        $router->delete('/deleteDataCompany/{id_company}','C_Company@delete');
        $router->delete('/deleteDataDepartement/{id_departement}','C_Departement@delete');
        $router->delete('/deleteDataBranch/{id_branch}','C_Branch@delete');
        //UPDATE DATA WITH POST
        $router->post('/updateDataKaryawan/{id_karyawan}','C_Karyawan@updatedata');
        $router->post('/updateDataAbsensiLevel/{id_absensi_level}','C_Absensi_Level@updatedata');
        $router->post('/updateDataUser/{id_user}','C_User@updatedata');
        $router->post('/updateDataAbsensi/{id_absensi}','C_Absensi@updatedata');
        //CHECKOUT USER
        $router->post('/checkOut/{id_absensi}','C_Absensi@checkOut');
    }
);
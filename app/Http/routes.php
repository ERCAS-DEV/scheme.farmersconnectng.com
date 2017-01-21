<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('front.index');
});
////////////////////////////////////////////////////////////////farmer
//Route for listing farmers
Route::controller('datatables', 'DatatablesController', [
    'anyData'  => 'datatables.data',
    'getIndex' => 'datatables',
]);
//Route assigning farmer
Route::controller('assign', 'AssignController', [
    'anyData'  => 'assign.data',
    'getIndex' => 'assign',
]);
Route::controller('schemefarmers', 'SchemeFarmersController', [
    'anyData'  => 'schemefarmers.data',
    'getIndex' => 'schemefarmers',
]);
Route::controller('approvedfarmer', 'ApprovedFarmerController', [
    'anyData'  => 'approvedfarmer.data',
    'getIndex' => 'approvedfarmer',
]);

Route::controller('farmers_grouping', 'FarmerGroupController', [
    'anyData'  => 'farmers_grouping.data',
    'getIndex' => 'farmers_grouping',
]);
Route::post('assign','DashboardController@assign');
Route::post('farmers_grouping','DashboardController@farmers_grouping');
//////////////////////////////////////////////////////////////////worker
//Route worker datatable
Route::controller('work', 'DataWorkerController', [
    'anyData'  => 'work.data',
    'getIndex' => 'work',
]);
Route::controller('assignworker', 'AssignWorkerController', [
    'anyData'  => 'assignworker.data',
    'getIndex' => 'assignworker',
]);
Route::controller('approvedworker', 'ApprovedWorkerController', [
    'anyData'  => 'approvedworker.data',
    'getIndex' => 'approvedworker',
]);
Route::controller('schemeworker', 'SchemeWorkerController', [
    'anyData'  => 'schemeworker.data',
    'getIndex' => 'schemeworker',
]);
Route::post('workerassign','DashboardController@assignWorker');
Route::post('action','WorkerController@action');
////////////////////////////////////////////////////////////////////////dealer
//Route for viewing dealer and assigning
Route::controller('viewdealer', 'DataDealerController', [
    'anyData'  => 'viewdealer.data',
    'getIndex' => 'viewdealer',
]);
Route::controller('assigndealer', 'AssignDealerController', [
    'anyData'  => 'assigndealer.data',
    'getIndex' => 'assigndealer',
]);
Route::controller('quotation', 'QuotationController', [
    'anyData'  => 'quotation.data',
    'getIndex' => 'quotation',
]);
Route::controller('approveddealer', 'ApprovedDealerController', [
    'anyData'  => 'approveddealer.data',
    'getIndex' => 'approveddealer',
]);
Route::controller('schemedealer', 'SchemeDealerController', [
    'anyData'  => 'schemedealer.data',
    'getIndex' => 'schemedealer',
]);
Route::post('action1','DealerController@action');
//Dealer billing information
Route::get("postdata/{any}","DashboardController@postdata");
Route::get('/billing/{token}/{any}/{morex}',['as'=>'billing','uses'=>'DashboardController@billing']);
Route::post('assigndealer','DashboardController@assignDealer');
Route::post('quotation','DashboardController@quotation');
Route::get("/view_quotation","DashboardController@view_quotation");
Route::get("postdata1","DashboardController@postdata1");
Route::get("dealer_feedback/{token}","DashboardController@dealer_feedback");
///////////////////////////////////////////////////////////////////////////////////////////////////////////////scheme
//view scheme
Route::controller('viewscheme', 'DataSchemeController', [
    'anyData'  => 'viewscheme.data',
    'getIndex' => 'viewscheme',
]);
////////////////////////////////////////////////////////////////////////////////
//Display dashboard
Route::get('admin/dashboard','DashboardController@index');
//Logout from the systems
Route::get('admin/logout','DashboardController@logout');
Route::get('csv','CsvController@csv');
Route::post('csv','CsvController@upload');
Route::get('crops','CsvController@crop');
Route::post('crops','CsvController@addCrop');
Route::delete('crops/{any}','CsvController@deleteCrop');
//////////////////////////////////////////////////Print CARD
Route::get('/farmers/card/{any}','FarmerController@card');
//////////////////////////////////////////////////////
//workers email confirm
Route::get('email/{token}/{id}/{email}',['as'=>'email','uses'=>'WorkerController@emailConfirm']);
//Dealer email confirmation
Route::get('emaildealer/{token}/{id}/{email}',['as'=>'emaildealer','uses'=>'DealerController@emailConfirm']);
//changing user status
Route::post('status','UserController@status');
////////////////////////ACL///////////////////////////
Route::resource('/admin','AdminController'); //Display Login page
Route::resource('permission','PermissionController');
Route::resource('role','RoleController');
Route::resource('/users','UserController');
/////////////////////////Faermers/////////////////////////
Route::resource('/farmers','FarmerController');
////////////////////////////////////////////////////////////
//worker Registration
Route::resource('/worker','WorkerController');
//////////////////////////////////////////////////////////
//Dealer Registration
Route::resource('/dealer','DealerController');
////////////////////////////////////////////////////////////
//scheme
Route::resource('/scheme','SchemeController');
//////////////////////////////////////////////////////////
//activity
Route::resource('/activity','ActivityController');
//Dealer billing email
Route::resource('/billing','BillingController');
////////////////////////////////////////////////////////////
//gruop
Route::resource('/group','GroupController');


<?php

Route::get('/', function () {
  return view('errors.404-custom');
});

// Route::get('/tokens/create', function (Request $request) {
//     $token = Auth::user()->createToken('test');
//     return ['token' => $token->plainTextToken];
// });
//
// Route::get('/generate', function () {
//   $test = PersonalAccessToken::create([
//     'tokenable_type'    => 'App\Models\User',
//     'tokenable_id'      => '1',
//     'name'              => 'Test',
//     'abilities'         => '["read","create","update","delete"]',
//     'token'             => hash('sha256', 'test2'),
//   ]);
//
//   if ($test->token == hash('sha256', 'test2')) {
//     return hash('sha256', 'test2') . ' Success';
//   }
//   else { return 'error'; }
//
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
  'as' => 'dashboard.',
  'prefix' => 'dashboard',
  'namespace' => 'App\Http\Controllers\Backend',
], function(){
  Route::get('/', 'DashboardController@index')->name('index');
  Route::get('/documentation', 'DashboardController@documentation')->name('documentation');
  Route::get('/file-manager', 'DashboardController@file_manager')->name('file-manager');
  Route::get('/language/{language}', 'DashboardController@language')->name('language');
  Route::get('/logout', 'DashboardController@logout')->name('logout');
  Route::get('/messages', 'DashboardController@message')->name('message');
  Route::group([
    'as' => 'profile.',
    'prefix' => 'profile',
  ], function(){
    Route::get('/account-information', 'DashboardController@profile_account_information')->name('account-information');
    Route::patch('/account-information/{id}', 'DashboardController@profile_update_account_information')->name('update-account-information');
    Route::get('/change-password', 'DashboardController@profile_change_password')->name('change-password');
    Route::get('/timeline', 'DashboardController@profile_timeline')->name('timeline');
    Route::post('update-password', 'DashboardController@profile_update_password')->name('update-password');
    Route::get('/', function () { return redirect('/dashboard/profile/timeline'); });
  });
});

Route::group([
  'as' => 'dashboard.dummy.',
  'prefix' => 'dashboard/dummy',
  'namespace' => 'App\Http\Controllers\Backend',
], function(){
  Route::get('/', 'SystemController@index')->name('index');
  Route::get('/tables', 'SystemController@table')->name('tables');
});

// DUMMY - TABLE GENERALS
Route::group([
  'as' => 'system.dummy.table.generals.',
  'prefix' => 'dashboard/dummy/tables/generals',
  'namespace' => 'App\Http\Controllers\Backend\System\Dummy\Table',
], function(){
  Route::get('active/{id}', 'GeneralController@active')->name('active');
  Route::get('inactive/{id}', 'GeneralController@inactive')->name('inactive');
  Route::get('restore/{id}', 'GeneralController@restore')->name('restore');
  Route::get('restoreall', 'GeneralController@restoreall')->name('restore-all');
  Route::get('delete-permanent/{id}', 'GeneralController@delete_permanent')->name('delete-permanent');
  Route::get('delete-permanentall', 'GeneralController@delete_permanentall')->name('delete-permanentall');
  Route::get('delete/{id}', 'GeneralController@delete')->name('delete');
  Route::get('deleteall', 'GeneralController@deleteall')->name('delete-all');
  Route::get('history', 'GeneralController@history')->name('history');
  Route::get('trash', 'GeneralController@trash')->name('trash');
  Route::resource('/', 'GeneralController')->parameters(['' => 'id']);
});

// DUMMY - TABLE RELATIONS
Route::group([
  'as' => 'system.dummy.table.relations.',
  'prefix' => 'dashboard/dummy/tables/relations',
  'namespace' => 'App\Http\Controllers\Backend\System\Dummy\Table',
], function(){
  Route::get('active/{id}', 'RelationController@active')->name('active');
  Route::get('inactive/{id}', 'RelationController@inactive')->name('inactive');
  Route::get('restore/{id}', 'RelationController@restore')->name('restore');
  Route::get('restoreall', 'RelationController@restoreall')->name('restore-all');
  Route::get('delete-permanent/{id}', 'RelationController@delete_permanent')->name('delete-permanent');
  Route::get('delete-permanentall', 'RelationController@delete_permanentall')->name('delete-permanentall');
  Route::get('delete/{id}', 'RelationController@delete')->name('delete');
  Route::get('deleteall', 'RelationController@deleteall')->name('delete-all');
  Route::get('history', 'RelationController@history')->name('history');
  Route::get('trash', 'RelationController@trash')->name('trash');
  Route::resource('/', 'RelationController')->parameters(['' => 'id']);
});

// MANAGEMENTS - ACCESSES
Route::group([
  'as' => 'system.management.access.',
  'prefix' => 'dashboard/managements/accesses',
  'namespace' => 'App\Http\Controllers\Backend\System\Management',
], function(){
  Route::get('active/{id}', 'AccessController@active')->name('active');
  Route::get('inactive/{id}', 'AccessController@inactive')->name('inactive');
  Route::get('restore/{id}', 'AccessController@restore')->name('restore');
  Route::get('restoreall', 'AccessController@restoreall')->name('restore-all');
  Route::get('delete-permanent/{id}', 'AccessController@delete_permanent')->name('delete-permanent');
  Route::get('delete-permanentall', 'AccessController@delete_permanentall')->name('delete-permanentall');
  Route::get('delete/{id}', 'AccessController@delete')->name('delete');
  Route::get('deleteall', 'AccessController@deleteall')->name('delete-all');
  Route::get('history', 'AccessController@history')->name('history');
  Route::get('trash', 'AccessController@trash')->name('trash');
  Route::resource('/', 'AccessController')->parameters(['' => 'id']);
});

// MANAGEMENTS - USERS
Route::group([
  'as' => 'system.management.user.',
  'prefix' => 'dashboard/managements/users',
  'namespace' => 'App\Http\Controllers\Backend\System\Management',
], function(){
  Route::get('active/{id}', 'UserController@active')->name('active');
  Route::get('inactive/{id}', 'UserController@inactive')->name('inactive');
  Route::get('restore/{id}', 'UserController@restore')->name('restore');
  Route::get('restoreall', 'UserController@restoreall')->name('restore-all');
  Route::get('delete-permanent/{id}', 'UserController@delete_permanent')->name('delete-permanent');
  Route::get('delete-permanentall', 'UserController@delete_permanentall')->name('delete-permanentall');
  Route::get('delete/{id}', 'UserController@delete')->name('delete');
  Route::get('deleteall', 'UserController@deleteall')->name('delete-all');
  Route::get('history', 'UserController@history')->name('history');
  Route::get('trash', 'UserController@trash')->name('trash');
  Route::resource('/', 'UserController')->parameters(['' => 'id']);
});

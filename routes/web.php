<?php




Route::get('/version',function(){

print_r(phpinfo());

});



Route::any('/blog', 'PageController@welcome');


Route::any('/users', array('as'=>'admin.pages.user', 'uses' => 'PageController@users'));


Route::any('/admin-reset-password/{id}', array('as'=>'admin.pages.user', 'uses' => 'UserloginController@admin_reset_password'));



Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');;


Route::any('/', array('as'=>'admin.pages.welcome', 'uses' => 'AdminController@welcome'));

Route::any('/add', array('as'=>'admin.pages.user', 'uses' => 'AdminController@blog_add'));

Route::any('/edit/{id}', array('as'=>'admin.pages.user', 'uses' => 'AdminController@blog_edit'));

Route::any('/view/{id}', 'AdminController@blog_view');

Route::any('/delete/{id}', 'AdminController@blog_delete');




Route::any('/login', array('as'=>'admin.pages.login', 'uses' => 'AdminloginController@login'));


Route::any('/login_process', array('as'=>'admin.pages.login', 'uses' => 'AdminloginController@login_process'));


Route::any('/user', array('as'=>'admin.pages.user', 'uses' => 'AdminController@user'));
Route::any('/user/add', array('as'=>'admin.pages.user', 'uses' => 'AdminController@user_add'));
Route::any('/user/edit/{id}', array('as'=>'admin.pages.user', 'uses' => 'AdminController@user_edit'));
Route::any('/user/delete/{id}', array('as'=>'admin.pages.user', 'uses' => 'AdminController@user_delete'));


Route::any('/category', array('as'=>'admin.pages.user', 'uses' => 'AdminController@category'));
Route::any('/category/add', array('as'=>'admin.pages.user', 'uses' => 'AdminController@category_add'));
Route::any('/category/edit/{id}', array('as'=>'admin.pages.user', 'uses' => 'AdminController@category_edit'));
Route::any('/category/delete/{id}', array('as'=>'admin.pages.user', 'uses' => 'AdminController@category_delete'));


Route::any('/guest', array('as'=>'admin.pages.user', 'uses' => 'PageController@welcome'));



Route::group(['middleware' => ['web']], function () {

});




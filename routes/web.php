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

Route::group(['namespace'=>'Auth'], function () {

    Route::get('/', 'LoginController@login')->name('login');
    Route::post('/', 'LoginController@postLogin');
    Route::get('logout','LoginController@logoutUser')->name('logout');

    Route::get('/update-info-profile', 'UserUpdateInforProfileController@userUpdateInfo')->name('update.info.profile');
    Route::post('/update-info-profile', 'UserUpdateInforProfileController@updateInfoUser');

    Route::get('forgot-password', 'ForgotPasswordController@forgotPassword')->name('forgot.password');
    Route::post('forgot-password', 'ForgotPasswordController@postForgotPassword');

    Route::get('change-forgot-password/{token}', 'ForgotPasswordController@changePassword')->name('change.forgot.password');
    Route::post('change-forgot-password/{token}', 'ForgotPasswordController@postChangePassword');
});


Route::group(['prefix' => 'library-manager', 'namespace' => 'Backend'], function (){

    Route::get('/','AdminDashboardController@index')->name('admin.dashboard');

    Route::group(['prefix' => 'system-management','namespace' => 'Account'], function (){

        // quan ly nhom quyen
        Route::group(['prefix' => 'group-permission'], function(){
            Route::get('/','AdminGroupPermissionController@index')->name('get.list.group-permission');
            Route::get('/create','AdminGroupPermissionController@create')->name('get.create.group-permission');
            Route::post('/create','AdminGroupPermissionController@store');

            Route::get('/update/{id}','AdminGroupPermissionController@edit')->name('get.update.group-permission');
            Route::post('/update/{id}','AdminGroupPermissionController@update');

            Route::get('/delete/{id}','AdminGroupPermissionController@delete')->name('get.delete.group-permission');
        });

        Route::group(['prefix' => 'permission'], function(){
            Route::get('/','AdminPermissionController@index')->name('get.list.permission');
            Route::get('/create','AdminPermissionController@create')->name('get.create.permission');
            Route::post('/create','AdminPermissionController@store');

            Route::get('/update/{id}','AdminPermissionController@edit')->name('get.update.permission');
            Route::post('/update/{id}','AdminPermissionController@update');

            Route::get('/delete/{id}','AdminPermissionController@delete')->name('get.delete.permission');
        });

        // quản lý vai trò
        Route::group(['prefix' => 'role'], function(){
            Route::get('/','AdminRoleController@index')->name('get.list.role')->middleware('permission:full-permission|list-role');
            Route::get('/create','AdminRoleController@create')->name('get.create.role')->middleware('permission:full-permission|create-role');
            Route::post('/create','AdminRoleController@store');

            Route::get('/update/{id}','AdminRoleController@edit')->name('get.update.role')->middleware('permission:full-permission|update-role');
            Route::post('/update/{id}','AdminRoleController@update');

            Route::get('/delete/{id}','AdminRoleController@delete')->name('get.delete.role')->middleware('permission:full-permission|delete-role');
        });

        // quan ly thanh vien
        Route::group(['prefix' => 'user'], function(){
            Route::get('/','AdminUserController@index')->name('get.list.user')->middleware('permission:full-permission|list-user');

            Route::get('/create','AdminUserController@create')->name('get.create.user')->middleware('permission:full-permission|create-user');
            Route::post('/create','AdminUserController@store');

            Route::get('/update/{id}','AdminUserController@edit')->name('get.update.user')->middleware('permission:full-permission|update-user');
            Route::post('/update/{id}','AdminUserController@update');

            Route::get('/delete/{id}','AdminUserController@delete')->name('get.delete.user')->middleware('permission:full-permission|deate-user');

            Route::get('/account', 'AdminUserController@account')->name('get.account.info');
            Route::post('/account/update/{id}', 'AdminUserController@updateAccount')->name('update.account');

            Route::get('/change/password', 'AdminUserController@changePassword')->name('change.password');
            Route::post('/password/change', 'AdminUserController@postChangePassword')->name('post.change.password');
        });
    });

    Route::group(['prefix' => 'department'], function(){
        Route::get('/','AdminDepartmentController@index')->name('get.list.department')->middleware('permission:full-permission|list-department');
        Route::get('/create','AdminDepartmentController@create')->name('get.create.department')->middleware('permission:full-permission|create-department');
        Route::post('/create','AdminDepartmentController@store');

        Route::get('/update/{id}','AdminDepartmentController@edit')->name('get.update.department')->middleware('permission:full-permission|update-department');
        Route::post('/update/{id}','AdminDepartmentController@update');

        Route::get('/delete/{id}','AdminDepartmentController@delete')->name('get.delete.department')->middleware('permission:full-permission|delete-department');
    });

    Route::group(['prefix' => 'class'], function(){
        Route::get('/','AdminClassController@index')->name('get.list.class')->middleware('permission:full-permission|list-class');
        Route::get('/create','AdminClassController@create')->name('get.create.class')->middleware('permission:full-permission|create-class');
        Route::post('/create','AdminClassController@store');

        Route::get('/update/{id}','AdminClassController@edit')->name('get.update.class')->middleware('permission:full-permission|update-class');
        Route::post('/update/{id}','AdminClassController@update');

        Route::get('/delete/{id}','AdminClassController@delete')->name('get.delete.class')->middleware('permission:full-permission|delete-class');
    });

    Route::group(['prefix' => 'reader'], function(){
        Route::get('/','AdminReaderController@index')->name('get.list.reader')->middleware('permission:full-permission|list-reader');
        Route::get('/create','AdminReaderController@create')->name('get.create.reader')->middleware('permission:full-permission|create-reader');
        Route::post('/create','AdminReaderController@store');

        Route::get('/update/{id}','AdminReaderController@edit')->name('get.update.reader')->middleware('permission:full-permission|update-reader');
        Route::post('/update/{id}','AdminReaderController@update');
        Route::get('/delete/{id}','AdminReaderController@delete')->name('get.delete.reader')->middleware('permission:full-permission|delete-reader');
        Route::post('/preview_card/{id}', 'AdminReaderController@previewCard')->name('get.preview.card');
        Route::get('list/reader/book/{id}', 'AdminReaderController@readerBook')->name('get.list.reader.book')->middleware('permission:full-permission|list-reader-book');
    });

    Route::group(['prefix' => 'author'], function(){
        Route::get('/','AdminAuthorController@index')->name('get.list.author')->middleware('permission:full-permission|list-author');
        Route::get('/create','AdminAuthorController@create')->name('get.create.author')->middleware('permission:full-permission|create-author');
        Route::post('/create','AdminAuthorController@store');

        Route::get('/update/{id}','AdminAuthorController@edit')->name('get.update.author')->middleware('permission:full-permission|update-author');
        Route::post('/update/{id}','AdminAuthorController@update');

        Route::get('/delete/{id}','AdminAuthorController@delete')->name('get.delete.author')->middleware('permission:full-permission|delete-author');
    });
    Route::group(['prefix' => 'category'], function(){
        Route::get('/','AdminCategoryController@index')->name('get.list.category')->middleware('permission:full-permission|list-category');
        Route::get('/create','AdminCategoryController@create')->name('get.create.category')->middleware('permission:full-permission|create-category');
        Route::post('/create','AdminCategoryController@store');

        Route::get('/update/{id}','AdminCategoryController@edit')->name('get.update.category')->middleware('permission:full-permission|update-category');
        Route::post('/update/{id}','AdminCategoryController@update');

        Route::get('/delete/{id}','AdminCategoryController@delete')->name('get.delete.category')->middleware('permission:full-permission|delete-category');
    });

    Route::group(['prefix' => 'publishing_company'], function(){
        Route::get('/','AdminPublishingCompanyController@index')->name('get.list.publishing_company')->middleware('permission:full-permission|list-publishing-company');
        Route::get('/create','AdminPublishingCompanyController@create')->name('get.create.publishing_company')->middleware('permission:full-permission|create-publishing-company');
        Route::post('/create','AdminPublishingCompanyController@store');

        Route::get('/update/{id}','AdminPublishingCompanyController@edit')->name('get.update.publishing_company')->middleware('permission:full-permission|update-publishing-company');
        Route::post('/update/{id}','AdminPublishingCompanyController@update');

        Route::get('/delete/{id}','AdminPublishingCompanyController@delete')->name('get.delete.publishing_company')->middleware('permission:full-permission|delete-publishing-company');
    });

    Route::group(['prefix' => 'book'], function(){
        Route::get('/','AdminBookController@index')->name('get.list.book')->middleware('permission:full-permission|list-book');
        Route::get('/create','AdminBookController@create')->name('get.create.book')->middleware('permission:full-permission|create-book');
        Route::post('/create','AdminBookController@store');

        Route::get('/update/{id}','AdminBookController@edit')->name('get.update.book')->middleware('permission:full-permission|update-book');
        Route::post('/update/{id}','AdminBookController@update');

        Route::get('/delete/{id}','AdminBookController@delete')->name('get.delete.book')->middleware('permission:full-permission|delete-book');
    });

    Route::group(['prefix' => 'import_books'], function(){
        Route::get('/{id}','AdminImportBookController@index')->name('get.list.import_books')->middleware('permission:full-permission|import-books');
        Route::post('/post/create/{id}','AdminImportBookController@store')->name('post.create.import_books')->middleware('permission:full-permission|import-books');
        Route::get('/delete/{id}','AdminImportBookController@delete')->name('get.delete.import_books')->middleware('permission:full-permission|delete-import-books');
    });

    Route::group(['prefix' => 'borrow'], function(){
        Route::get('/','AdminBorrowController@index')->name('get.list.borrow')->middleware('permission:full-permission|list-borrow');
        Route::get('/create','AdminBorrowController@create')->name('get.create.borrow')->middleware('permission:full-permission|create-borrow');
        Route::post('/create','AdminBorrowController@store');

        Route::get('/update/{id}','AdminBorrowController@edit')->name('get.update.borrow')->middleware('permission:full-permission|update-borrow');
        Route::post('/update/{id}','AdminBorrowController@update');

        Route::get('/delete/{id}','AdminBorrowController@delete')->name('get.delete.borrow')->middleware('permission:full-permission|detele-borrow');
        Route::get('/add/row/table', 'AdminBorrowController@ajaxAddRow')->name('add.row.book');
        Route::get('/ajax/view/{id}', 'AdminBorrowController@ajaxViewBorrow')->name('get.ajax.view');
        Route::get('/delete/orders/{id}','AdminBorrowController@deleteOrders')->name('get.delete.orders')->middleware('permission:full-permission|delete-book-borrow');
    });

    Route::group(['prefix' => 'list/borrow/book'], function(){
        Route::get('/',  'AdminBorrowController@listBorrowBook')->name('get.list.borrow.book')->middleware('permission:full-permission|list-book-borrow');
    });

});

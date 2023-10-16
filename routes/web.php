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


Route::get('/',[
     'as' => 'trangchu',
     'uses'=>'PageController@getIndex'
]);
Route::get('loai-san-pham/{types}',[
    'as'=>'loaisanpham',
    'uses'=>'PageController@getLoaiSp'

]);

Route::get('chi-tiet-san-pham/{id}',[
    'as'=>'sanpham',
    'uses'=>'PageController@getChitiet'
 // ])->middleware('checklogindetail');
 ]);

Route::get('lien-he',[
    'as'=>'lienhe',
    'uses'=>'PageController@getLienhe'

]);
Route::get('gioi-thieu',[
    'as'=>'gioithieu',
    'uses'=>'PageController@getGioiThieu'

]);
Route::get('them-gio-hang/{id}',[
    'as'=>'themgiohang',
    'uses'=>'PageController@getAddtoCart'

]);
Route::get('xoa-gio-hang/{id}',[
    'as'=>'xoagiohang',
    'uses'=>'PageController@getDeleteCart'
]);
Route::get('xoagiohangAll/{id}',[
    'as'=>'xoagiohangAll',
    'uses'=>'PageController@getDeleteCartAll'
]);
Route::get('dathang',[
    'as'=>'dat-hang',
    'uses'=>'PageController@getCheckout'

])->middleware('checkLogin');
Route::post('dathang',[
    'as'=>'dat-hang',
    'uses'=>'PageController@postCheckout'

]);//route cua gui form don hang di 
Route::get('dang-nhap',[
    'as'=>'dangnhap',
    'uses'=>'PageController@getLogin'

]);
Route::post('dang-nhap',[
    'as'=>'dangnhap',
    'uses'=>'PageController@postLogin'

]);
Route::get('dang-ki',[
    'as'=>'dangki',
    'uses'=>'PageController@getSignup'

]);
Route::post('dang-ki',[
    'as'=>'dangki',
    'uses'=>'pageController@postSignin'

]);
Route::get('dang-xuat',[
    'as'=>'dangxuat',
    'uses'=>'PageController@getLogout'

]);
Route::get('tim-kiem',[
    'as'=>'timkiem',
    'uses'=>'PageController@getSearch'   
]);
Route::get('admin',[
    'as'=>'admin',
    'uses'=>'PageController@getAdmin'

]);
Route::get('delete-data/{id}',[
    'as'=>'delete',
    'uses'=>'PageController@getDeleteData'

]);
Route::get('tin-tuc',[
 'as'=>'tintuc',
 'uses'=>'PageController@getNews'

]);
Route::get('quan-li-san-pham',[
 'as'=>'quanlisanpham',
 'uses'=>'PageController@getManagerProduct',

]);
Route::post('them-san-pham',[
 'as'=>'themsanpham',
 'uses'=>'PageController@postAddProduct',

]);
Route::get('them-san-pham',[
 'as'=>'themsanpham',
 'uses'=>'PageController@getAddProduct',

]);
Route::get('sua-san-pham/{id}',[
 'as'=>'suasanpham',
 'uses'=>'PageController@getEditProduct',

]);

Route::post('suasanpham/{id}',[
 'as'=>'editsanpham',
 'uses'=>'PageController@postEditProduct',

]);
Route::get('xoa-san-pham/{id}',[
 'as'=>'xoasanpham',
 'uses'=>'PageController@getDeleteProduct',

]);
Route::post('comment/{id}',[
    'as'=>'comment',
    'uses'=>'PageController@postCommentProduct',
]);
Route::get('sua-don-hang/{id}',[
 'as'=>'suadonhang',
 'uses'=>'PageController@getEditOrder',

]);
Route::post('suadonhang/{id}',[
 'as'=>'suadonhang2',
 'uses'=>'PageController@postUpdateOrder',

]);
Route::get('quan-li-gio-hang/{id}',[
 'as'=>'quanligiohang',
 'uses'=>'PageController@getCart',

]);
Route::get('huy-don-hang/{idbill}',[
 'as'=>'huydonhang',
 'uses'=>'PageController@getrequestdelete',

]);


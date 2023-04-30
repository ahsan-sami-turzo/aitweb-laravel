<?php

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


Auth::routes();
/*****************************************************
*  frontend 
*
*****************************************************/
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','FrontEnd\HomeController@index');
Route::get('frontEnd/productDetails/{id}','FrontEnd\ProductDetailsController@index');
Route::get('frontEnd/ecommerce/','FrontEnd\ProductDetailsController@ecommerce');
Route::get('frontEnd/serviceDetails/{id}','FrontEnd\HomeController@serviceDetails');


//gallery start
Route::get('/gallery','FrontEnd\GalleryController@index');
Route::get('/allGallery','FrontEnd\GalleryController@allGallery');
Route::get('/categoryWiseAllImage/{id}','FrontEnd\GalleryController@categoryWiseAllImage');

// gallery end
//news start
Route::get('frontEnd/news','FrontEnd\NewsController@index');
Route::get('frontEnd/newsDetails/{id}','FrontEnd\NewsController@newsDetails');

// news end
/*****************************************************
*  frontend 
*
*****************************************************/


//admin routes
// Route::get('/home', 'user\UserController@index')->name('home');
// Route::get('/adminDashBoard', 'admin\AdminController@adminDashBoard');
Route::get('/home', 'admin\AdminController@adminDashBoard');
Route::get('/admin', 'user\UserController@admin');
//Auth::routes();



Route::get('/adminAboutPageEditor','admin\AboutController@adminAboutPageEditor');
Route::post('/addBackGroundAbout','admin\AboutController@addBackGroundAbout');
Route::post('/deleteBackgroundImageAbout','admin\AboutController@deleteBackgroundImageAbout');
Route::post('/firstSectionContentsOfAbout','admin\AboutController@firstSectionContentsOfAbout');
Route::post('/aboutDeletePostSectionOne','admin\AboutController@aboutDeletePostSectionOne');
Route::post('/aboutSectionOneContentsEditView','admin\AboutController@aboutSectionOneContentsEditView');
Route::post('/editFirstSectionContentsOfAbout','admin\AboutController@editFirstSectionContentsOfAbout');

//service route
Route::get('/adminServicePageEditor','admin\ServiceController@servicePageEditor');
Route::post('/admin/saveService', 'admin\ServiceController@saveService');
Route::post('/editServiceDetails', 'admin\ServiceController@editServiceDetails');
Route::post('/deleteServiceDetails', 'admin\ServiceController@deleteServiceDetails');
Route::get('/admin/activeService/{id}', 'admin\ServiceController@activeService');
Route::get('/admin/InactiveService/{id}', 'admin\ServiceController@inactiveService');

//gallery admin route
Route::get('/adminGalleryPageEditor','admin\GalleryController@adminGalleryPageEditor');
Route::post('/admin/saveGalleryImageType', 'admin\GalleryController@saveGalleryImageType');
Route::post('/editGalleryImageType', 'admin\GalleryController@editGalleryImageType');
Route::post('/deleteGalleryDetails', 'admin\GalleryController@deleteGalleryDetails');
Route::get('/admin/activeGallery/{id}', 'admin\GalleryController@activeGallery');
Route::get('/admin/InactiveGallery/{id}', 'admin\GalleryController@inactiveGallery');


//GalleryImageType admin route
Route::get('/adminGalleryImageTypePageEditor','admin\GalleryController@adminGalleryImageTypePageEditor');
Route::post('/admin/saveGallery', 'admin\GalleryController@saveGallery');
Route::post('/editGalleryDetails', 'admin\GalleryController@editGalleryDetails');
Route::post('/deleteGalleryDetails', 'admin\GalleryController@deleteGalleryDetails');
Route::get('/admin/activeGallery/{id}', 'admin\GalleryController@activeGallery');
Route::get('/admin/InactiveGallery/{id}', 'admin\GalleryController@inactiveGallery');

//Gallery image type
Route::get('/createNews/','admin\NewsController@createNews');
Route::post('/admin/saveNews', 'admin\NewsController@saveNews');
Route::post('/editNews', 'admin\NewsController@editNews');
Route::post('/deleteNews', 'admin\NewsController@deleteNews');
Route::get('/activeNews/{id}', 'admin\NewsController@activeNews');
Route::get('/inactiveNews/{id}', 'admin\NewsController@inactiveNews');
//custom url
// Authentication Routes...
Route::get('admin', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::post('sendMail/','Auth\ForgotPasswordController@postEmail');

// Why Choose Us
Route::get('/admin/createWhyChooseUs', 'admin\WhyChooseController@createWhyChooseUs');
Route::get('/admin/deleteWhyChooseUs/{id}', 'admin\WhyChooseController@deleteWhyChooseUs');
Route::post('/admin/saveWhyChooseUs', 'admin\WhyChooseController@saveWhyChooseUs');
Route::post('/admin/editWhyChooseUsDetails', 'admin\WhyChooseController@editWhyChooseUsDetails');

// Products
Route::get('/admin/createProduct', 'admin\ProductController@createProduct');
Route::post('/admin/saveProduct', 'admin\ProductController@saveProduct');
Route::post('/admin/editProductDetails', 'admin\ProductController@editProductDetails');
Route::post('/admin/deleteProductDetails', 'admin\ProductController@deleteProductDetails');
Route::get('/admin/activeProduct/{id}', 'admin\ProductController@activeProduct');
Route::get('/admin/InactiveProduct/{id}', 'admin\ProductController@inActiveProduct');
// Our Clients
Route::get('/admin/createClient', 'admin\ClientsController@createClient');
Route::post('/admin/saveClient', 'admin\ClientsController@saveClient');
Route::post('/admin/editClientDetails', 'admin\ClientsController@editClientDetails');
Route::post('/admin/deleteClientDetails', 'admin\ClientsController@deleteClientDetails');
Route::get('/admin/activeClient/{id}', 'admin\ClientsController@activeClient');
Route::get('/admin/InactiveClient/{id}', 'admin\ClientsController@inActiveClient');
//App Privacy Policy
Route::get('/admin/ManageAppPrivacyPolicy', 'admin\AppPrivacyPolicyController@indexApp')->name('app.manage');
Route::get('/admin/createAppPrivacyPolicy', 'admin\AppPrivacyPolicyController@createApp')->name('app.create');
Route::post('/admin/saveAppPrivacyPolicy', 'admin\AppPrivacyPolicyController@saveApp');
Route::get('/admin/editAppPrivacyPolicy/{id}', 'admin\AppPrivacyPolicyController@editApp')->name('app.edit');
Route::post('/admin/updateAppPrivacyPolicy/{id}', 'admin\AppPrivacyPolicyController@updateApp')->name('app.update');
Route::post('/admin/deleteAppDetails', 'admin\AppPrivacyPolicyController@deleteAppDetails');
/*****************************************************
*  Contact
*
*****************************************************/
Route::get('/adminContactPageEditor','admin\ContactController@adminContactPageEditor');
Route::post('/addBackGroundContact','admin\ContactController@addBackGroundContact');
Route::post('/addContactInfos','admin\ContactController@addContactInfos');



/*****************************************************
*  fronteend gallery
*
*****************************************************/
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

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
    return view('dashboard');
});

Route::group(['prefix' => 'email'], function(){
    Route::get('inbox', function () { return view('pages.email.inbox'); });
    Route::get('read', function () { return view('pages.email.read'); });
    Route::get('compose', function () { return view('pages.email.compose'); });
});

Route::group(['prefix' => 'apps'], function(){
    Route::get('chat', function () { return view('pages.apps.chat'); });
    Route::get('calendar', function () { return view('pages.apps.calendar'); });
});

Route::group(['prefix' => 'ui-components'], function(){
    Route::get('alerts', function () { return view('pages.ui-components.alerts'); });
    Route::get('badges', function () { return view('pages.ui-components.badges'); });
    Route::get('breadcrumbs', function () { return view('pages.ui-components.breadcrumbs'); });
    Route::get('buttons', function () { return view('pages.ui-components.buttons'); });
    Route::get('button-group', function () { return view('pages.ui-components.button-group'); });
    Route::get('cards', function () { return view('pages.ui-components.cards'); });
    Route::get('carousel', function () { return view('pages.ui-components.carousel'); });
    Route::get('collapse', function () { return view('pages.ui-components.collapse'); });
    Route::get('dropdowns', function () { return view('pages.ui-components.dropdowns'); });
    Route::get('list-group', function () { return view('pages.ui-components.list-group'); });
    Route::get('media-object', function () { return view('pages.ui-components.media-object'); });
    Route::get('modal', function () { return view('pages.ui-components.modal'); });
    Route::get('navs', function () { return view('pages.ui-components.navs'); });
    Route::get('navbar', function () { return view('pages.ui-components.navbar'); });
    Route::get('pagination', function () { return view('pages.ui-components.pagination'); });
    Route::get('popovers', function () { return view('pages.ui-components.popovers'); });
    Route::get('progress', function () { return view('pages.ui-components.progress'); });
    Route::get('scrollbar', function () { return view('pages.ui-components.scrollbar'); });
    Route::get('scrollspy', function () { return view('pages.ui-components.scrollspy'); });
    Route::get('spinners', function () { return view('pages.ui-components.spinners'); });
    Route::get('tabs', function () { return view('pages.ui-components.tabs'); });
    Route::get('tooltips', function () { return view('pages.ui-components.tooltips'); });
});

Route::group(['prefix' => 'advanced-ui'], function(){
    Route::get('cropper', function () { return view('pages.advanced-ui.cropper'); });
    Route::get('owl-carousel', function () { return view('pages.advanced-ui.owl-carousel'); });
    Route::get('sweet-alert', function () { return view('pages.advanced-ui.sweet-alert'); });
});

Route::group(['prefix' => 'forms'], function(){
    Route::get('basic-elements', function () { return view('pages.forms.basic-elements'); });
    Route::get('advanced-elements', function () { return view('pages.forms.advanced-elements'); });
    Route::get('editors', function () { return view('pages.forms.editors'); });
    Route::get('wizard', function () { return view('pages.forms.wizard'); });
});

Route::group(['prefix' => 'charts'], function(){
    Route::get('apex', function () { return view('pages.charts.apex'); });
    Route::get('chartjs', function () { return view('pages.charts.chartjs'); });
    Route::get('flot', function () { return view('pages.charts.flot'); });
    Route::get('morrisjs', function () { return view('pages.charts.morrisjs'); });
    Route::get('peity', function () { return view('pages.charts.peity'); });
    Route::get('sparkline', function () { return view('pages.charts.sparkline'); });
});

Route::group(['prefix' => 'tables'], function(){
    Route::get('basic-tables', function () { return view('pages.tables.basic-tables'); });
    Route::get('data-table', function () { return view('pages.tables.data-table'); });
});

Route::group(['prefix' => 'icons'], function(){
    Route::get('feather-icons', function () { return view('pages.icons.feather-icons'); });
    Route::get('flag-icons', function () { return view('pages.icons.flag-icons'); });
    Route::get('mdi-icons', function () { return view('pages.icons.mdi-icons'); });
});

Route::group(['prefix' => 'general'], function(){
    Route::get('blank-page', function () { return view('pages.general.blank-page'); });
    Route::get('faq', function () { return view('pages.general.faq'); });
    Route::get('invoice', function () { return view('pages.general.invoice'); });
    Route::get('profile', function () { return view('pages.general.profile'); });
    Route::get('pricing', function () { return view('pages.general.pricing'); });
    Route::get('timeline', function () { return view('pages.general.timeline'); });
});

Route::group(['prefix' => 'auth'], function(){
    Route::get('login', function () { return view('pages.auth.login'); });
    Route::get('register', function () { return view('pages.auth.register'); });
});

Route::group(['prefix' => 'error'], function(){
    Route::get('404', function () { return view('pages.error.404'); });
    Route::get('500', function () { return view('pages.error.500'); });
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('admin/form', function() {
  
   return view('pages.forms.forms');
});
Route::get('admin/table', function() {
  
    return view('pages.tables.table');
 });
 

// 404 for undefined routes
// Route::any('/{page?}',function(){
//     return View::make('pages.error.404');
// })->where('page','.*');
Route::get('/createCat',[CategoryController::class,'create'])->name('create.cat');  // create page show
Route::post('/insertCat',[CategoryController::class,'store'])->name('insert.cat');  // Insert data
Route::get('/showCat',[CategoryController::class,'index'])->name('show.cat');  // show all category
Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('cat.edit');  // show ssingle product
Route::post('/updateCat/{id}',[CategoryController::class,'update'])->name('update.cat');  // show ssingle product
Route::get('/catStatusSilent/{cat_id}',[CategoryController::class,'silent'])->name('cat.silent');  // show ssingle product
Route::get('/catStatusOn/{cat_id}',[CategoryController::class,'catStatusOn'])->name('cat.silent');  // show ssingle product
Route::Delete('/deleteCat/{cat_id}',[CategoryController::class,'destroy'])->name('delete.cat');  // show all category
Route::get('/showCatPro/{cat_id}',[CategoryController::class,'showCatPro'])->name('show.catPro');  // show ssingle product

Route::get('/showCat/{id}',[CategoryController::class,'show'])->name('show.cat');  // show ssingle product


//  Routes for Product
Route::get('/createPro',[ProductController::class,'create'])->name('create.pro');  // create page show
Route::post('/insertPro',[ProductController::class,'store'])->name('insert.pro');  // Insert data
Route::get('/showPro',[ProductController::class,'index'])->name('show.pro');  // show all pro
Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('pro.edit');  // show all pro
Route::post('/updatePro/{id}',[ProductController::class,'update'])->name('update.pro');  // show ssingle pro
Route::get('/proStatusSilent/{pro_id}',[ProductController::class,'silent'])->name('pro.silent');  // show ssingle product
Route::get('/proStatusOn/{pro_id}',[ProductController::class,'proStatusOn'])->name('pro.status');  // show ssingle product
Route::Delete('/deletePro/{pro_id}',[ProductController::class,'destroy'])->name('delete.pro');  // show all pro
Route::get('/showSubPro/{pro_id}',[ProductController::class,'showProSubProducts'])->name('pro.subpro');  // show ssingle product


Route::get('/showPro/{id}',[ProductController::class,'show'])->name('show.pro');  // show ssingle pro

//  Routes for SubProduct
Route::get('/createSubPro',[SubProductController::class,'create'])->name('create.subPro');  // create page show
Route::post('/insertSubPro',[SubProductController::class,'store'])->name('insert.subPro');  // Insert data
Route::get('/showSubProall',[SubProductController::class,'index'])->name('show.subPro');  // show all pro
Route::Delete('/deleteSubPro/{id}',[SubProductController::class,'destroy'])->name('delete.subPro');  // show all pro
Route::get('/subproStatusSilent/{id}',[SubProductController::class,'silent'])->name('subpro.silent');  // show ssingle product
Route::get('/subproStatusOn/{id}',[SubProductController::class,'subproStatusOn'])->name('subpro.status');  // show ssingle product
Route::get('/subproduct/{id}/edit',[SubProductController::class,'edit'])->name('subpro.edit');  // show ssingle product
Route::get('/subproImage/{id}',[SubProductController::class,'image'])->name('subpro.image.id');  // show ssingle product
Route::Delete('/deleteSubProImage/{subpro_id}/{image}',[SubProductController::class,'deleteimage'])->name('subpro.image');  // show ssingle product
Route::get('/showSubPros/{id}',[SubProductController::class,'show'])->name('show.subPro');  // show ssingle pro

Route::post('/updateSubPro/{id}',[SubProductController::class,'update'])->name('update.subPro');  // show ssingle pro

//Route for Users
Route::get('/createUser',[UserController::class,'create'])->name('create.user');  // show all pro
Route::post('/insertUser',[UserController::class,'store'])->name('insert.user');  // Insert data
Route::get('/showAllUser',[UserController::class,'index'])->name('show.user');  // show all pro
Route::Delete('/deleteUser/{id}',[UserController::class,'destroy'])->name('user.destroy');  // show all pro
Route::get('/user/{id}/edit',[UserController::class,'edit'])->name('user.edit');  // show ssingle product

//routes for role
Route::get('/createRole',[RoleController::class,'create'])->name('create.role');  // show all pro
Route::post('/insertRole',[RoleController::class,'store'])->name('store.role');  // show all pro
Route::get('/showAllRole',[RoleController::class,'index'])->name('show.role');  // show all pro
Route::get('/showRolePer/{id}',[RoleController::class,'showRolePermission'])->name('show.role.per');  // show all pro
Route::get('/role/{id}/edit',[RoleController::class,'edit'])->name('edit.role');  // show all pro
Route::post('/roleUpdate/{id}',[RoleController::class,'update'])->name('update.role');  // show all pro
Route::get('/deleteRole/{id}',[RoleController::class,'destroy'])->name('delete.role');  // show all pro



//Routes for storage
Route::get('/showStorage',[StorageController::class,'index'])->name('show.storage');  // show all pro
Route::Delete('/deleteStorage/{id}',[StorageController::class,'destroy'])->name('delete.storage');  // show all pro
Route::post('/insertStorage',[StorageController::class,'store'])->name('insert.storage');  // Insert data
Route::get('/createStorage',[StorageController::class,'create'])->name('create.storage');  // create page show
Route::get('/showStorage/{id}',[StorageController::class,'show'])->name('show.storage');  // show ssingle pro
Route::post('/updateStorage/{id}',[StorageController::class,'update'])->name('update.storage');  // show ssingle pro

//Price against Products
Route::post('/insertProPrice',[ProPriceController::class,'store'])->name('insert.proprice');  // Insert data



Auth::routes();
Route::get('admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard')->middleware('auth');


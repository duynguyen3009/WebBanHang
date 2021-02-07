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

$prefixAdmin = config('zvn.url.prefix_admin');
$prefixNews  = config('zvn.url.prefix_news');

Route::group(['prefix' => $prefixAdmin, 'namespace' => 'Admin', ], function () { //'middleware' => ['permission.admin']
// ============================== DASHBOARD ==============================
    $prefix         = 'dashboard';
    $controllerName = 'dashboard';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/', [ 'as' => $controllerName,  'uses' => $controller . 'index' ]);
        Route::get('change-status-{contact}/{id}',  [ 'as' => $controllerName . '/contact',     'uses' => $controller . 'contact'])->where('id', '[0-9]+');
    });

// ============================== SLIDER =================================
    $prefix         = 'slider';
    $controllerName = 'slider';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{ ?}',                    [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                         [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                   [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',   [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-ordering-{ordering}/{id}',   [ 'as' => $controllerName . '/ordering',    'uses' => $controller . 'ordering'])->where('id', '[0-9]+');
    });
// ============================== CATEGORY PRODUCT =======================
    $prefix         = 'categoryProduct';    
    $controllerName = 'categoryProduct';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status']);
        Route::get('change-is-home-{isHome}/{id}',      [ 'as' => $controllerName . '/isHome',     'uses' => $controller  . 'isHome']);
        Route::get('change-node-{node}/{id}',           [ 'as' => $controllerName . '/node',        'uses' => $controller . 'node'])->where('id', '[0-9]+');
    });
// ============================== CATEGORY ===============================
    $prefix         = 'category';
    $controllerName = 'category';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-is-home-{isHome}/{id}',      [ 'as' => $controllerName . '/isHome',      'uses' => $controller . 'isHome']);
        Route::get('change-display-{display}/{id}',     [ 'as' => $controllerName . '/display',     'uses' => $controller . 'display']);
    });

// ============================== ATTRIBUTE ==============================
    $prefix         = 'attribute';
    $controllerName = 'attribute';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });
// ============================== ATTRIBUTE GROUP ========================
    $prefix         = 'attribute_group';
    $controllerName = 'attributeGroup';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',          [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });
// ============================== PRODUCT ================================
    $prefix         = 'product';
    $controllerName = 'product';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                              'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',                    'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',                    'uses' => $controller . 'save']);
        Route::post('store',                            [ 'as' => $controllerName . '/store',                   'uses' => $controller . 'store']);
        Route::post('storeMedia',                       [ 'as' => $controllerName . '/storeMedia',              'uses' => $controller . 'storeMedia']);
        Route::post('document_upload',                  [ 'as' => $controllerName . '/document_upload',         'uses' => $controller . 'document_upload']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',                  'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',                  'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('get-attribute/{id}',                [ 'as' => $controllerName . '/getAttribute',            'uses' => $controller . 'getAttribute'])->where('id', '[0-9]+');
        Route::get('get-attribute-change-price/{id}',                [ 'as' => $controllerName . '/getAttributeChangePrice',            'uses' => $controller . 'getAttributeChangePrice'])->where('id', '[0-9]+');
        Route::get('autocomplete',                      [ 'as' => $controllerName . '/autocomplete',      'uses' => $controller . 'autocomplete']);
        Route::get('change-type-{type}/{id}',           [ 'as' => $controllerName . '/type',        'uses' => $controller . 'type']);
        Route::get('add-price-row',           [ 'as' => $controllerName . '/add-price-row',        'uses' => $controller . 'addPriceRow']);
        Route::get('add-price-row-no-change-price',           [ 'as' => $controllerName . '/addPriceRowNoChangePrice',        'uses' => $controller . 'addPriceRowNoChangePrice']);
        Route::post('update-attribute-price',                      [ 'as' => $controllerName . '/updateAttrPrice',      'uses' => $controller . 'updateAttrPrice']);
        Route::get('change-category-{category}/{id}',   [ 'as' => $controllerName . '/category',    'uses' => $controller . 'category']);
    });
// ============================== ARTICLE ================================
    $prefix         = 'article';
    $controllerName = 'article';
    Route::group(['prefix' =>  $prefix], function () use($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status']);
        Route::get('change-type-{type}/{id}',           [ 'as' => $controllerName . '/type',        'uses' => $controller . 'type']);
        Route::get('change-category-{category}/{id}',   [ 'as' => $controllerName . '/category',    'uses' => $controller . 'category']);
    });
// ============================== CATEGORY ARTICLE =======================
    $prefix         = 'categoryArticle';
    $controllerName = 'categoryArticle';
    Route::group(['prefix' =>  $prefix], function () use($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status']);
        Route::get('change-is-home-{isHome}/{id}',      [ 'as' => $controllerName . '/isHome',      'uses' => $controller  . 'isHome']);
        Route::get('change-node-{node}/{id}',           [ 'as' => $controllerName . '/node',        'uses' => $controller . 'node'])->where('id', '[0-9]+');
    });
// ============================== USER ===================================
    $prefix         = 'user';
    $controllerName = 'user';
    Route::group(['prefix' =>  $prefix], function () use($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::post('change-password',                  [ 'as' => $controllerName . '/change-password',        'uses' => $controller . 'changePassword']);
        Route::post('change-level',                     [ 'as' => $controllerName . '/change-level',        'uses' => $controller . 'changeLevel']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status']);
        Route::get('change-level-{level}/{id}',         [ 'as' => $controllerName . '/level',      'uses' => $controller . 'level']);
    });
// ============================== CATEGORY QUESTION ======================
    $prefix         = 'categoryQuestion';
    $controllerName = 'categoryQuestion';
    Route::group(['prefix' =>  $prefix], function () use($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status']);
        Route::get('change-is-home-{isHome}/{id}',      [ 'as' => $controllerName . '/isHome',      'uses' => $controller  . 'isHome']);
        Route::get('change-node-{node}/{id}',           [ 'as' => $controllerName . '/node',        'uses' => $controller . 'node'])->where('id', '[0-9]+');
    });
// ============================== FAQ ====================================
    $prefix         = 'question';
    $controllerName = 'question';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-ordering-{ordering}/{id}',   [ 'as' => $controllerName . '/ordering',    'uses' => $controller . 'ordering'])->where('id', '[0-9]+');
        Route::get('change-category-{category}/{id}',   [ 'as' => $controllerName . '/category',    'uses' => $controller . 'category']);
    });
// ============================== VIDEO ==================================
    $prefix         = 'video';
    $controllerName = 'video';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                    [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                         [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                   [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',   [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });
// ============================== CONTACT ================================
    $prefix         = 'contact';
    $controllerName = 'contact';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                    [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                         [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                   [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{contact}/{id}',  [ 'as' => $controllerName . '/contact',     'uses' => $controller . 'contact'])->where('id', '[0-9]+');
    });
// ============================== TAG ====================================
    $prefix         = 'tag';
    $controllerName = 'tag';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });

// ============================== SCRIPT =================================
    $prefix         = 'script';
    $controllerName = 'script';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                    [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                         [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
    });
// ============================== SETTING ================================
    $prefix         = 'setting';
    $controllerName = 'setting';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                    [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                         [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
    });
// ============================== LIBRARY IMAGE ==========================
    $prefix         = 'image';
    $controllerName = 'image';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
    
    });
// ============================== FEEDBACK ===============================
    $prefix         = 'feedback';
    $controllerName = 'feedback';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                    [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                         [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                   [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',   [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });
// ============================== SHIPPING ===============================
    $prefix         = 'shipping';
    $controllerName = 'shipping';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                    [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                         [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                   [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',   [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-price-{price}/{id}',     [ 'as' => $controllerName . '/price',       'uses' => $controller . 'price'])->where('id', '[0-9]+');
    });
// ============================== COUPON =================================
    $prefix         = 'coupon';
    $controllerName = 'coupon';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                    [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                         [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                   [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',   [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-price-{price}/{id}',     [ 'as' => $controllerName . '/price',       'uses' => $controller . 'price'])->where('id', '[0-9]+');
        Route::get('get-coupon-{coupon}',             [ 'as' => $controllerName . '/coupon',        'uses' => $controller.'coupon']);
    });
// ============================== MENU ===================================
    $prefix         = 'menu';
    $controllerName = 'menu';
    Route::group(['prefix' =>  $prefix], function () use($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                       'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',             'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',             'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',           'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',           'uses' => $controller . 'status']);
        Route::get('change-ordering-{ordering}/{id}',   [ 'as' => $controllerName . '/ordering',      'uses' => $controller . 'ordering'])->where('id', '[0-9]+');
        Route::get('change-type_menu-{type_menu}/{id}', [ 'as' => $controllerName . '/type_menu',     'uses' => $controller . 'type_menu']);
        Route::get('change-type_open-{type_open}/{id}', [ 'as' => $controllerName . '/type_open',     'uses' => $controller . 'type_open']);
        Route::get('change-node-{node}/{id}',           [ 'as' => $controllerName . '/node',         'uses' => $controller . 'node'])->where('id', '[0-9]+');
    });

// ============================== AGENCEIS ===============================
    $prefix         = 'agencies';
    $controllerName = 'agencies';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-ordering-{ordering}/{id}',   [ 'as' => $controllerName . '/ordering',    'uses' => $controller . 'ordering'])->where('id', '[0-9]+');
    });
// ============================== INTRODUCTION ===========================
    $prefix         = 'intro';
    $controllerName = 'intro';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                                 [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                        [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                             [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                       [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',       [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-ordering-{ordering}/{id}',   [ 'as' => $controllerName . '/ordering',    'uses' => $controller . 'ordering'])->where('id', '[0-9]+');
    });
// ============================== PARTNER =================================
    $prefix         = 'partner';
    $controllerName = 'partner';
    Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName)  . 'Controller@';
        Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
        Route::get('form/{id?}',                    [ 'as' => $controllerName . '/form',        'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save',                         [ 'as' => $controllerName . '/save',        'uses' => $controller . 'save']);
        Route::get('delete/{id}',                   [ 'as' => $controllerName . '/delete',      'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}',   [ 'as' => $controllerName . '/status',      'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-ordering-{ordering}/{id}',   [ 'as' => $controllerName . '/ordering',    'uses' => $controller . 'ordering'])->where('id', '[0-9]+');
    });




}); /////// END


































































































































































Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
}); // FILE MANAGER


















// Route::group(['prefix' => $prefixNews, 'namespace' => 'News'], function () {
//     // ============================== HOMEPAGE ==============================
//     $prefix         = '';
//     $controllerName = 'home';
//     Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
//         $controller = ucfirst($controllerName)  . 'Controller@';
//         Route::get('/',                             [ 'as' => $controllerName,                  'uses' => $controller . 'index' ]);
//     });

//     // ============================== CATEGORY ==============================
//     $prefix         = 'chuyen-muc';
//     $controllerName = 'category';
//     Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
//         $controller = ucfirst($controllerName)  . 'Controller@';
//         Route::get('/{category_name}-{category_id}.html',  [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ])
//             ->where('category_name', '[0-9a-zA-Z_-]+')
//             ->where('category_id', '[0-9]+');
//     });

//     // ====================== ARTICLE ========================
//     $prefix         = 'bai-viet';
//     $controllerName = 'article';
//     Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
//         $controller = ucfirst($controllerName)  . 'Controller@';
//         Route::get('/{article_name}-{article_id}.html',  [ 'as' => $controllerName . '/index', 'uses' => $controller . 'index' ])
//                 ->where('article_name', '[0-9a-zA-Z_-]+')
//                 ->where('article_id', '[0-9]+');
//     });

//     // ============================== NOTIFY ==============================
//     $prefix         = '';
//     $controllerName = 'notify';
//     Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
//         $controller = ucfirst($controllerName)  . 'Controller@';
//         Route::get('/no-permission',                             [ 'as' => $controllerName . '/noPermission',                  'uses' => $controller . 'noPermission' ]);
//     });

//     // ====================== LOGIN ========================
//     // news69/login
//     $prefix         = '';
//     $controllerName = 'auth';
    
//     Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
//         $controller = ucfirst($controllerName)  . 'Controller@';
//         Route::get('/login',        ['as' => $controllerName.'/login',      'uses' => $controller . 'login'])->middleware('check.login');;
//         Route::post('/postLogin',   ['as' => $controllerName.'/postLogin',  'uses' => $controller . 'postLogin']);

//         // ====================== LOGOUT ========================
//         Route::get('/logout',       ['as' => $controllerName.'/logout',     'uses' => $controller . 'logout']);
//     });
// });
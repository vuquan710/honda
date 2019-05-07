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

// Route::middleware(['UserMiddleware'])
// ->domain(env('DOMAIN_USER', 'fashion-dev.com'))
// ->namespace('User')
// ->group(function () {
// Route::resource('/', 'HomesController', [
// 'names' => [
// 'index' => 'user.homes.index'
// ]
// ]);

// Route::get('thong-tin-lien-he', 'ContactsController@index')->name('user.contacts.index');

// Route::post('contact/send', 'ContactsController@send')->name('user.contacts.send');

// Route::resource('lien-he', 'ContactsController');
// Route::resource('hinh-anh-san-pham', 'GallerysController', [
// 'names' => [
// 'index' => 'user.gallerys.index'
// ]
// ]);
// Route::resource('gioi-thieu', 'NewsCategoriesController', [
// 'names' => [
// 'index' => 'user.news_categories.index'

// ]
// ]);
// Route::get('tin-tuc-{id}', 'NewsCategoriesController@pages')->name('user.news_categories.pages');
// Route::get('tin-tuc-chi-tiet/{id}', 'NewsController@show')->name('user.news.show');
// Route::get('user/profile', function () {
// // Uses first & second Middleware
// });
// Route::get('ao-viet-nam-xuat-khau', 'ProductsController@exporters')->name('user.products.exporters');
// Route::get('ao-dong-luc', 'ProductsController@motivation')->name('user.products.motivation');
// Route::get('in-ao-theo-yeu-cau', 'ProductsController@printOnRequest')->name('user.products.printOnRequest');
// Route::get('changelang/{lang}', 'HomesController@changelang')->name('user.homes.changelang');
// Route::get('san-pham-{alias}', 'ProductsController@show')->name('user.products.show');
// });


//Route::middleware(['UserMiddleware'])
//    // ->prefix('v2')
//    ->domain(env('DOMAIN_USER', 'fashion-dev.com'))
//    ->namespace('UserV2')
//    ->group(function () {
//
//        Route::resource('/', 'HomesController', [
//            'names' => [
//                'index' => 'user.v2.homes.index',
//
//            ]
//        ]);
//        Route::get('lien-he', 'HomesController@contact')->name('user.v2.homes.contact');
//        Route::post('lien-he', 'HomesController@postSaveContact')->name('user.v2.homes.saveContact');
//        Route::post('tim-kiem-san-pham', 'HomesController@search')->name('user.v2.homes.search');
//        Route::get('ket-qua-tim-kiem', 'HomesController@show')->name('user.v2.homes.show');
//        Route::resource('san-pham', 'ProductsController', [
//            'names' => [
//                'index' => 'user.v2.products.index',
//                'show' => 'user.v2.products.show'
//            ]
//        ]);
//
//        Route::resource('danh-muc', 'CategoriesController', [
//            'names' => [
//                'index' => 'user.v2.categories.index',
//                'show' => 'user.v2.categories.show'
//            ]
//        ]);
//        Route::resource('tin-tuc', 'NewsCategoryController', [
//            'names' => [
//                'index' => 'user.v2.newsCategories.index',
//                'show' => 'user.v2.newsCategories.show'
//            ]
//        ]);
//        Route::resource('tin-tuc-chi-tiet', 'NewsController', [
//            'names' => [
//                'show' => 'user.v2.news.show',
//            ]
//        ]);
//    });

//Route::middleware(['UserMiddleware'])
// ->prefix('v3')
//    ->domain(env('DOMAIN_USER', 'fashion-dev.com'))
//    ->namespace('UserV3')
//    ->group(function () {
//
//        Route::resource('/', 'HomesController', [
//            'names' => [
//                'index' => 'user.v3.homes.index',
//
//            ]
//        ]);
//        Route::get('contact-us', 'HomesController@contactUs')->name('user.v3.homes.contactUs');
//        Route::get('about-us', 'HomesController@aboutUs')->name('user.v3.homes.aboutUs');
//        Route::post('lien-he', 'HomesController@postSaveContact')->name('user.v2.homes.saveContact');
//        Route::post('tim-kiem-san-pham', 'HomesController@search')->name('user.v2.homes.search');
//        Route::get('ket-qua-tim-kiem', 'HomesController@show')->name('user.v2.homes.show');
//        Route::resource('products', 'ProductsController', [
//            'names' => [
//                'index' => 'user.v3.products.index',
//                'show' => 'user.v3.products.show'
//            ]
//        ]);
//
//        Route::resource('categories', 'CategoriesController', [
//            'names' => [
//                'index' => 'user.v3.categories.index',
//                'show' => 'user.v3.categories.show'
//            ]
//        ]);
//        Route::resource('news-category', 'NewsCategoryController', [
//            'names' => [
//                'index' => 'user.v3.newsCategories.index',
//                'show' => 'user.v3.newsCategories.show'
//            ]
//        ]);
//        Route::resource('news', 'NewsController', [
//            'names' => [
//                'show' => 'user.v3.news.show',
//            ]
//        ]);
//    });


//BackEnd route
Route::prefix('admin')
//    ->domain(env('DOMAIN_ADMIN', 'admin.fashion-dev.com'))
    ->namespace('Admin')
    ->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.auth.login');
        });
        Route::match(['get'], 'create', ['as' => 'admin.auth.create', 'uses' => 'AuthController@create']);
        Route::match(['get'], 'logout', ['as' => 'admin.auth.logout', 'uses' => 'AuthController@logout']);
        Route::match(['post'], 'forgot-password', ['as' => 'admin.auth.forgotPassword', 'uses' => 'AuthController@forgotPassword']);
        Route::match(['get', 'post'], 'reset-password/{token}', ['as' => 'admin.auth.resetPassword', 'uses' => 'AuthController@resetPassword']);
        Route::match(['get', 'post'], 'login', ['as' => 'admin.auth.login', 'uses' => 'AuthController@login']);
        Route::middleware(['AdminMiddleware'])
            ->group(function () {
                Route::resource('homes', 'HomesController', [
                    'names' => [
                        'index' => 'admin.homes.index'
                    ]
                ]);
                Route::resource('users', 'UsersController', [
                    'names' => [
                        'index' => 'admin.users.index',
                        'show' => 'admin.users.show',
                        'create' => 'admin.users.create',
                        'store' => 'admin.users.store',
                        'destroy' => 'admin.users.destroy',
                        'edit' => 'admin.users.edit',
                        'update' => 'admin.users.update'
                    ]
                ]);
                Route::resource('staffs', 'StaffsController', [
                    'names' => [
                        'index' => 'admin.staffs.index',
                        'show' => 'admin.staffs.show',
                        'create' => 'admin.staffs.create',
                        'store' => 'admin.staffs.store',
                        'destroy' => 'admin.staffs.destroy',
                        'edit' => 'admin.staffs.edit',
                        'update' => 'admin.staffs.update'
                    ]
                ]);
                Route::post('staffs/change-password', 'StaffsController@postChangePassword')->name('admin.staffs.change_password');
                Route::resource('products', 'ProductsController', [
                    'names' => [
                        'index' => 'admin.products.index',
                        'show' => 'admin.products.show',
                        'create' => 'admin.products.create',
                        'store' => 'admin.products.store',
                        'edit' => 'admin.products.edit',
                        'update' => 'admin.products.update',
                        'destroy' => 'admin.products.destroy',
                    ]
                ]);
                Route::resource('categories', 'CategoriesController', [
                    'names' => [
                        'index' => 'admin.categories.index',
                        'show' => 'admin.categories.show',
                        'edit' => 'admin.categories.edit',
                        'create' => 'admin.categories.create',
                        'store' => 'admin.categories.store',
                        'update' => 'admin.categories.update',
                        'destroy' => 'admin.categories.destroy',
                    ]
                ]);
                Route::resource('vendors', 'VendorsController', [
                    'names' => [
                        'index' => 'admin.vendors.index',
                        'show' => 'admin.vendors.show',
                        'edit' => 'admin.vendors.edit',
                        'create' => 'admin.vendors.create',
                        'store' => 'admin.vendors.store',
                        'update' => 'admin.vendors.update',
                        'destroy' => 'admin.vendors.destroy',
                    ]
                ]);
                Route::resource('orders', 'OrdersController', [
                    'names' => [
                        'index' => 'admin.orders.index',
                        'show' => 'admin.orders.show',
                        'edit' => 'admin.orders.edit',
                    ]
                ]);
                Route::resource('comments', 'CommentsController', [
                    'names' => [
                        'index' => 'admin.comments.index',
                        'show' => 'admin.comments.show',
                        'destroy' => 'admin.comments.destroy',
                    ]
                ]);
                Route::resource('news-categories', 'NewsCategoriesController', [
                    'names' => [
                        'index' => 'admin.news_categories.index',
                        'show' => 'admin.news_categories.show',
                        'edit' => 'admin.news_categories.edit',
                        'create' => 'admin.news_categories.create',
                        'store' => 'admin.news_categories.store',
                        'update' => 'admin.news_categories.update',
                        'destroy' => 'admin.news_categories.destroy',
                    ]
                ]);
                Route::resource('news', 'NewsController', [
                    'names' => [
                        'index' => 'admin.news.index',
                        'show' => 'admin.news.show',
                        'edit' => 'admin.news.edit',
                        'create' => 'admin.news.create',
                        'store' => 'admin.news.store',
                        'update' => 'admin.news.update',
                        'destroy' => 'admin.news.destroy',
                    ]
                ]);
                Route::resource('settings', 'SettingsController', [
                    'names' => [
                        'index' => 'admin.settings.index',
                        'update' => 'admin.settings.update',
                    ]
                ]);

                Route::match(['post'], 'orders/list-recent-order', ['as' => 'admin.orders.listRecentOrder', 'uses' => 'OrdersController@listRecentOrder']);
            });

    });
//End BackEnd route


//Front-end
Route::prefix('/')
//    ->domain(env('DOMAIN_ADMIN', 'admin.fashion-dev.com'))
    ->namespace('Honda')
    ->group(function () {
        Route::get('/', function () {
            return redirect()->route('user.auth.login');
        });
        Route::match(['get', 'post'], 'login', ['as' => 'user.auth.login', 'uses' => 'AuthController@login']);
        Route::middleware(['UserMiddleware'])
            ->group(function () {
                Route::resource('homes', 'HomesController', [
                    'names' => [
                        'index' => 'user.homes.index'
                    ]
                ]);
            });
    });

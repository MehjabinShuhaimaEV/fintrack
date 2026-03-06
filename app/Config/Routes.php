<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
//$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->setDefaultNamespace('App\Controllers');
//$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// authentication
$routes->get('/', 'AuthController::index');
$routes->get('/register', 'AuthController::register');
$routes->post('/save','AuthController::save');
$routes->post('/check','AuthController::check');
$routes->get('/logout','AuthController::logout');


// main files
$routes->get('/dashboard','Home::dashboard');

//TRANSACTION ROUTES
$routes->get('/transaction','TransactionController::transaction');
$routes->post('get_categories', 'TransactionController::get_categories');
$routes->post('/save_transaction','TransactionController::save_transaction');
$routes->get('/income_list','TransactionController::income_list');
$routes->post('/income_listfilter','TransactionController::income_listfilter');
$routes->get('/expense_list','Home::expense_list');
$routes->post('/edit','TransactionController::update_transaction');
$routes->get('/edit','TransactionController::update_transaction');
$routes->post('/delete_transaction','TransactionController::delete_transaction');
$routes->get('/view','TransactionController::view_transaction');
$routes->post('/filter_transactions','TransactionController::filter_transactions');
$routes->get('/soareport','TransactionController::soa_report');
// $routes->get('transaction/soa_pdf', 'Transaction::soa_pdf');
$routes->get('transaction/soa_pdf', 'TransactionController::soa_pdf', ['as' => 'soa_pdf']);

//file upload
$routes->get('/upload-list', 'TransactionController::listUploads');
$routes->get('/uploadFiles', 'TransactionController::uploadFiles');
$routes->post('/upload-file', 'TransactionController::upload');




// $routes->match(['get','post'], '/save_transaction', 'Home::save_transaction');
$routes->post('/save_transaction','Home::save_transaction');
// $routes->post('/get_categories','Home::get_categories');
// $routes->get('transaction', 'TransferController::transaction');



// $routes->get('/updatetransation', 'Home::update_transaction');


// $routes->get('/dashhb', 'Home::index');

// $routes->get('/add', 'Home::add');    
// $routes->post('/add', 'Home::add');   

// //authentication

// $routes->get('/','auth::index');
// $routes->post('/check','auth::check');
// $routes->get('/reg','auth::register');
// $routes->post('/save','auth::save');


// //product
// $routes->get('/products', 'Product::index');
// $routes->get('/products/search', 'Product::products');  
// $routes->get('products/update', 'Product::update');
// $routes->post('products/update', 'Product::update');
// $routes->get('products/delete', 'Product::delete');




   
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

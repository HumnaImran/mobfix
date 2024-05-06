<?php
use App\Models\product;
use Sample\PayPalClient;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\paypalController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use PaypalPayoutsSDK\Core\PayPalHttpClient;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EasyPostController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\warrantyController;
use App\Http\Controllers\UserPagesController;
use PaypalPayoutsSDK\Core\SandboxEnvironment;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\BookRepairController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\FacebookAuthController;
use PaypalPayoutsSDK\Payouts\PayoutsPostRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//user Routes
// Route::get('/seesion',function(){
//  Session::get('repairdetail');
// return session()->get('repairdetail');
// });

Route::get('/view-store/{store_id}', [UserPagesController::class, 'viewStore'])->name('viewStore')->middleware('auth');

Route::get('/', [UserPagesController::class, 'index'])->name('index');
Route::get('/AboutUs', [UserPagesController::class, 'AboutUs'])->name('AboutUs');

Route::get('/WarrantyClaim', [UserPagesController::class, 'WarrantyClaim'])->name('WarrantyClaim');
Route::post('/submit-warranty-claim', [warrantyController::class, 'submit'])->name('submit.warranty.claim');
Route::get('/viewYourclaims',[warrantyController::class, 'viewYourclaims'])->name('viewYourclaims');

Route::get("/DeliverWarrantyProduct/{id}", [warrantyController::class ,'DeliverWarrantyProduct'])->name('DeliverWarrantyProduct');

Route::get("/DeliverwarrntyRepair/{id}", [warrantyController::class ,'DeliverwarrntyRepair'])->name('DeliverwarrntyRepair');
Route::post("/UserRecievedProduct", [warrantyController::class ,'UserRecievedProduct'])->name('UserRecievedProduct');
Route::get('/ComplainToAdminForm', [warrantyController::class,'ComplainToAdminForm'])->name('ComplainToAdminForm');
Route::post('/submit-complaint', [warrantyController::class,'submitComplaint'])->name('submit.complaint');
Route::get('/ViewComplains', [warrantyController::class, 'ViewComplains'])->name('viewwarrantyComplains');
Route::get('/viewAllContacts', [ContactController::class, 'viewAllContacts'])->name('viewAllContacts');

Route::get('/ProductReview/{orderId}', [UserPagesController::class, 'ProductReview'])->name('ProductReview');
Route::get('/OrderHistory', [UserPagesController::class, 'OrderHistory'])->name('OrderHistory');
Route::post('/addProduct-review', [ProductController::class, 'addReview'])->name('AddProductReview');

Route::get('/faq', [UserPagesController::class, 'faq'])->name('faq');

Route::get('/faqs', [UserPagesController::class, 'faqs'])->name('faqs');
Route::get('/privacy', [UserPagesController::class, 'privacy'])->name('privacy');
Route::get('/TermsAndCondition', [UserPagesController::class, 'TermsAndCondition'])->name('TermsAndCondition');

Route::get('/bookNow', [UserPagesController::class, 'bookNow'])->name('bookNow');
Route::get('/bookNowSubmit', [UserPagesController::class, 'bookNowSubmit'])->name('bookNowSubmit');
Route::get('/orderBooked', [UserPagesController::class, 'orderBooked'])->name('orderBooked');
Route::get('/contactUs', [UserPagesController::class, 'contactUs'])->name('contactUs');
Route::get('/feedback', [UserPagesController::class, 'feedback'])->name('feedback');
Route::get('/findStore', [UserPagesController::class, 'findStore'])->name('findStore') ->middleware('auth');;
Route::get('/getAPhone', [UserPagesController::class, 'getAPhone'])->name('getAPhone');

Route::get('/checkout', [UserPagesController::class, 'checkout'])->name('checkout');
Route::get('/saveplan/{cart_item_id}/{address_id}', [PaymentController::class, 'savePlan'])->name('saveplan');
Route::get('/savePlanRepair/{Repair_id}', [PaymentController::class, 'savePlanRepair'])->name('savePlanRepair');
Route::Post('/updateQuantity', [CartController::class, 'updateQuantity'])->name('updateQuantity');
Route::get('stripe/success/{payment_id}', [CartController::class, 'handleSuccess'])->name('stripe.success');


Route::get('/login', [UserPagesController::class, 'login'])->name('login');
// Route::get('/payment', [UserPagesController::class, 'payment'])->name('payment');
Route::get('/repairtask', [UserPagesController::class, 'repairtask'])->name('repairtask');
Route::get('/Service', [UserPagesController::class, 'Service'])->name('Service');
Route::get('/Signup', [UserPagesController::class, 'Signup'])->name('Signup');
// Route::get('/register', [UserPagesController::class, 'store'])->name('register');
// Route::get('/showStore', [UserPagesController::class, 'viewStore'])->name('showStore');

Route::get('/BookRepair/{store_id}', [UserPagesController::class, 'BookRepair'])->name('BookRepair')->middleware('auth');;



Route::get('/mobile-details/{product_id}', [UserPagesController::class, 'viewMobileDetails'])->name('viewMobileDetails');
Route::get('/FixYourStuff',[UserPagesController::class, 'FixYourStuff'])->name('FixYourStuff');

// Route::get('/viewMobileDetails', [UserPagesController::class, 'viewMobileDetails'])->name('viewMobileDetails');
Route::get('/viewApprovedStores',[StoreController::class, 'viewApprovedStores'])->name('viewApprovedStores');
Route::get('/ViewRepairPhones',[StoreController::class, 'ViewRepairPhones'])->name('ViewRepairPhones');
Route::get('/viewProductCustomers',[AdminPagesController::class, 'viewProductCustomers'])->name('viewProductCustomers');

Route::get('/viewRequest',[StoreController::class, 'viewRequest'])->name('viewRequest');
Route::get('/ViewStoreRequestDetails/{id}', [StoreController::class, 'viewStoreRequestDetails'])->name('ViewStoreRequestDetails');
Route::get('/statusUpdate/{id}',[StoreController::class, 'statusUpdate'])->name('statusUpdate');
Route::get('/waiting/{userId}',[StoreController::class, 'waiting'])->name('waiting');

Route::get('/check-status/{store}', [StoreController::class, 'checkStatus'])->name('checkStatus');
Route::get('/searchStores',[StoreController::class, 'searchStores'])->name('searchStores');
Route::get('/VendorAllclaims',[StoreController::class, 'VendorAllclaims'])->name('VendorAllclaims');
Route::post('/deliverBackVendorProduct', [StoreController::class, 'deliverBackVendorProduct'])->name('deliverBackVendorProduct');

// Route::get('/view-store/{store_id}', [UserPagesController::class, 'viewStore'])->name('viewStore') ->middleware('auth');;


// Route::get('/viewProduct', [ProductController::class, 'createProduct'])->name('viewProduct');
Route::get('/createProduct', [ProductController::class, 'createProduct'])->name('createProduct');
Route::post('/storeProduct', [ProductController::class, 'storeProduct'])->name('storeProduct');
// routes/web.php
// Route::get('products/filter', [ProductController::class, 'filterByPrice'])->name('priceFilter');


Route::get('/viewProducts', [ProductController::class, 'viewProduct'])->name('viewProducts');
Route::get('/ViewProductDetails/{id}', [ProductController::class,'ViewDetails'])->name('ViewProductDetails');
Route::get('/getspecnames/{specTypeId}', [ProductController::class, 'getSpecNamesByType'])->name('getspecnames');

Route::get('/getallproducts/{sortOption?}', [ProductController::class, 'getAllProducts'] );


Route::post('/submit-repair-order', [BookRepairController::class, 'store'])->name('submit-repair-order');
Route::post('/storeSelectionsInSession',  [BookRepairController::class, 'storeSelectionsInSession']);

Route::get('/ViewRepairRequest', [BookRepairController::class, 'ViewRepairRequest'])->name('ViewRepairRequest');
Route::get('/ViewYourCustomers', [StoreController::class, 'ViewYourCustomers'])->name('ViewYourCustomers');
Route::get('/ViewStoreFeedbacks', [StoreController::class, 'ViewStoreFeedbacks'])->name('ViewStoreFeedbacks');

Route::get('/ViewDetails/{id}', [BookRepairController::class, 'ViewDetails'])->name('ViewDetails');


// Route::post('/submitOfferPrice/{repairDetail}', [BookRepairController::class, 'submitOfferPrice'])->name('submitOfferPrice');
Route::post('/submitOfferPrice/{id}',[BookRepairController::class, 'submitOfferPrice'])->name('submitOfferPrice');


//admin pages
Route::middleware(['auth', 'admin.vendor'])->group(function () {
Route::get('/dashboard', [AdminPagesController::class, 'dashboard'])->name('dashboard');
Route::get('/StoreProfile', [AdminPagesController::class, 'StoreProfile'])->name('StoreProfile');
Route::get('/VendorProfile', [AdminPagesController::class, 'VendorProfile'])->name('VendorProfile');
Route::post('/updateVendorProfile', [AdminPagesController::class, 'updateVendorProfile'])->name('updateVendorProfile');
Route::get('/requested-products', [AdminPagesController::class, 'requestedProducts'])->name('RequestedProducts');
Route::get('/Allclaims', [AdminPagesController::class, 'Allclaims'])->name('Allclaims');
Route::post('/Approveclaim', [AdminPagesController::class, 'Approveclaim'])->name('Approveclaim');
Route::post('/ReceivedAdminProduct', [AdminPagesController::class, 'ReceivedAdminProduct'])->name('ReceivedAdminProduct');
Route::post('/deliverBackAdminProduct', [AdminPagesController::class, 'deliverBackAdminProduct'])->name('deliverBackAdminProduct');
Route::get('/Addcategory', [CategoryController::class,'Addcategory'])->name('Addcategory');
Route::Post('/storeCategory', [CategoryController::class,'storeCategory'])->name('storeCategory');
Route::get('/Allcategory', [CategoryController::class,'Allcategory'])->name('Allcategory');
Route::get('/EditCategory/{id}',[CategoryController::class,'Editcategory'])->name('EditCategory');
Route::post('/updateCategory/{id}',[CategoryController::class,'updateCategory'])->name('updateCategory');
Route::get('/AddTestimonial', [TestimonialController::class,'AddTestimonial'])->name('AddTestimonial');
Route::Post('/storeTestimonial', [TestimonialController::class,'storeTestimonial'])->name('storeTestimonial');
Route::get('/AllTestimonial', [TestimonialController::class,'AllTestimonial'])->name('AllTestimonial');
Route::get('/EditTestimonial/{id}',[TestimonialController::class,'EditTestimonial'])->name('EditTestimonial');
Route::post('/updateTestimonial/{id}',[TestimonialController::class,'updateTestimonial'])->name('updateTestimonial');
});
Route::get('/getModelsByCategory/{categoryId}',[CategoryController::class, 'getModelsByCategory'])->name('');


Route::post('/Contactstore',[ContactController::class,'Contactstore'])->name('Contactstore');


Route::get('/RepairRequestStatus',[BookRepairController::class,'RepairRequestStatus'])->name('RepairRequestStatus');


Route::get('/delRequest/{id}',[BookRepairController::class,'delRequest'])->name('delRequest');

Route::get('/accept-request/{repairDetailId}', [BookRepairController::class,'acceptRequest'])->name('acceptRequest');
// routes/web.php

Route::post('/process-delivery-service', [BookRepairController::class,'acceptRequest'])
    ->name('processDeliveryService');

Route::post('/easyPost/{repairDetails_id}', [EasyPostController::class,'easyPost'])
    ->name('easyPost');
    Route::post('warranty/easyPost/{claim_id}', [EasyPostController::class,'warrantyeasyPost'])
    ->name('warrantyeasyPost');

    Route::post('/easyPostVendor/{repairDetails_id}', [EasyPostController::class,'easyPostVendor'])
->name('easyPostVendor');


    Route::get('/trackRequest/{id}', [EasyPostController::class,'trackRequest'])->name('trackRequest');


    Route::get('/track_order/{trackerId}', [EasyPostController::class,'trackOrder'])->name('track_order');

    Route::get('/viewOrders', [BookRepairController::class,'viewOrders'])->name('viewOrders');

    Route::get('/MyOrders', [ProfileController::class,'MyOrders'])->name('MyOrders');
    Route::get('/MyWallet', [WalletController::class,'MyWallet'])->name('MyWallet');
    Route::get('/VendorWallet', [WalletController::class,'VendorWallet'])->name('VendorWallet');
    Route::get('/connectstripe', [WalletController::class,'connectstripe'])->name('connectstripe');

    Route::middleware(['auth'])->group(function () {

        Route::post('/Paypocket/deposit', [DepositController::class, 'store'])->name('PayPocket.deposit');
        Route::get('/Paypocket/Shop/{cart_item_id}', [ShopController::class, 'store'])->name('PayPocket.shop');
        Route::post('/wallet/deposit', [WalletController::class, 'deposit'])->name('deposit');
        Route::post('/wallet/withdraw', [WalletController::class, 'withdraw'])->name('withdraw');
    });



    Route::put('/orders/{orderId}/complete', [ProfileController::class, 'OrderComplete'])->name('orders.complete');

    Route::get('/MyFavorites', [ProfileController::class,'MyFavorites'])->name('MyFavorites');

    Route::post('/store-user-address/{user_id}', [UserAddressController::class, 'storeUserAddress'])->name('StoreUserAddress');


//wallet
Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('processPayment');
Route::get('/connect/stripe', [PaymentController::class, 'connectToStripe'])->name('connect.stripe');

// Route for handling redirect after authorization
Route::get('/connect/stripe/callback', [PaymentController::class, 'handleStripeCallback'])->name('connect.stripe.callback');



    Route::get('/Allsales',  [AdminPagesController::class,'Allsales'])->name('Allsales');
    Route::get('/DeliverOrder/{orderId}',[AdminPagesController::class,'DeliverOrder'])->name('DeliverOrder');
    Route::post('/StoreAdminAddress/{user_id}', [UserAddressController::class, 'StoreAdminAddress'])->name('StoreAdminAddress');



    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('updateProfile');


    // Route::get('/MobileReceived', [BookRepairController::class,'MobileReceived'])->name('  MobileReceived');


    Route::get('/mobile-received/{repairDetail}', [BookRepairController::class, 'MobileReceived'])->name('MobileReceived');


    Route::get('/returnPhoneForm/{repairDetail}', [BookRepairController::class, 'retureasyPostVendornPhoneForm'])->name('returnPhoneForm');


    Route::get('/mobile-received-customer/{repairDetail}', [BookRepairController::class, 'mobileReceivedCustomer'])
    ->name('MobileReceivedCustomer');



    // Route::get('/getallproducts', 'ProductController@getAllProducts');

    // web.php
Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('addToCart');



Route::get('/get-products-by-category/{categoryId}', [ProductController::class, 'getProductsByCategory']);
Route::get('/products/filter', [ProductController::class, 'filterByPrice'])->name('products.filter');
Route::get('/get-products-by-battery-range/{batteryRange}', [ProductController::class , 'getProductsByBatteryRange'])->name('getProductsByBatteryRange');

// Route::get('/search-products', 'ProductController@search')->name('product.search');
Route::get('/search-products', [ProductController::class,'search'])->name('product.search');

Route::get('/cancelOrder/{order}', [OrderController::class,'cancelOrder'])->name('cancelOrder');
Route::post('AddTofavourtes/{product}', [ProductController::class,'addToFavorites'])->name('AddTofavourtes');
Route::post('Addfavourtes/{productId}', [ProductController::class, 'AddFavorites'])->name('Addfavourtes');
Route::post('Removefavourtes/{productId}', [ProductController::class, 'RemoveFavorites'])->name('RemoveFavorites');

// routes/web.php

Route::post('/submit-feedback', [FeedbackController::class,'store'])->name('submit-feedback');
Route::get('/viewFeedback', [FeedbackController::class,'viewFeedback'])->name('viewFeedback');
// Route::get('/AllsellerReviews', [FeedbackController::class,'AllsellerReviews'])->name('AllsellerReviews');
Route::get('/seller-reviews/{store_id}', [FeedbackController::class, 'AllsellerReviews'])->name('AllsellerReviews');

Route::delete('/Destroy/feedback/{feedback}',  [FeedbackController::class,'Destroy'])->name('DeleteFeedback');



// Route::get('/', function () {
//     return view('userPages.index');
// });


Route::get('/api/products', function () {
    $products = Product::all();
    return response()->json(['products' => $products]);
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/ViewProfile', [ProfileController::class, 'ViewProfile'])->name('ViewProfile');
    Route::get('/YourProfile', [ProfileController::class, 'YourProfile'])->name('YourProfile');
    Route::post('/updateUserProfile', [ProfileController::class, 'updateUserProfile'])->name('updateUserProfile');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('auth/google/call-back',[GoogleAuthController::class,'callbackGoogle']);


Route::get('auth/facebook',[FacebookAuthController::class,'facebookpage'])->name('facebook-auth');
Route::get('auth/facebook/call-back',[FacebookAuthController::class,'facebookredirect']);
require __DIR__.'/auth.php';


//paypal routes
Route::post('pay', [paypalController::class, 'pay'])->name('payment');
Route::post('paymentRepair/{id}', [paypalController::class, 'payRepair'])->name('paymentRepair');
Route::get('success', [paypalController::class, 'success']);
Route::get('error', [paypalController::class, 'error']);
// Route::get('ShowPaypal', [paypalController::class, 'showPaypal'])->name('ShowPaypal');
Route::get('/show-paypal/{cart_item_id}', [PaypalController::class, 'showPaypal'])->name('ShowPaypal');
Route::get('/show-paypalRepair/{Repair_id}}', [PaypalController::class, 'showPaypalRepair'])->name('ShowPaypalRepair');
Route::get('paypalSucess/{transactionId}', [paypalController::class, 'paypalSucess'])->name('paypalSucess');



Route::post('/create-checkout-session', [WalletController::class, 'createCheckoutSession']);

Route::get('/depositSuccess', [WalletController::class, 'depositSuccess'])->name('depositSuccess');

Route::post('/stripe/webhook', [WalletController::class, 'handle']);


Route::get('/payouttest',function(){

    // Creating an environment
    $clientId = env('PAYPAL_CLIENT_ID');
    $clientSecret = env('PAYPAL_CLIENT_SECRET');
    $environment = new SandboxEnvironment($clientId, $clientSecret);
    $client = new PayPalHttpClient($environment);
    $request = new PayoutsPostRequest();
    $body= json_decode(
                '{
                    "sender_batch_header":
                    {
                      "email_subject": "SDK payouts test txn"
                    },
                    "items": [
                    {
                      "recipient_type": "EMAIL",
                      "receiver": "payouts2342@paypal.com",
                      "note": "Your 1$ payout",
                      "sender_item_id": "Test_txn_12",
                      "amount":
                      {
                        "currency": "USD",
                        "value": "1.00"
                      }
                    }]
                  }',
                true);
    $request->body = $body;
    $client = PayPalClient::client();
    $response = $client->execute($request);
    print "Status Code: {$response->statusCode}\n";
    print "Status: {$response->result->batch_header->batch_status}\n";
    print "Batch ID: {$response->result->batch_header->payout_batch_id}\n";
    print "Links:\n";
    foreach($response->result->links as $link)
     {
       print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
     }
    echo json_encode($response->result, JSON_PRETTY_PRINT), "\n";
});

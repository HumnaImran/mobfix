<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\cart;
use App\Models\User;
use App\Models\Order;
use App\Models\store;
use App\Models\PSpecs;
use App\Models\product;
use App\Models\category;

use App\Models\ChMessage;
use Illuminate\View\View;
use App\Models\RepairTypes;
use App\Models\FeedbackForm;
use App\Models\ProductSpecs;
use App\Models\testimonials;
use Illuminate\Http\Request;
use App\Models\product_images;
use Illuminate\Validation\Rules;
use App\Models\RepairOrderDetails;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class UserPagesController extends Controller
{
 public function index()
    {
        $testimonials = testimonials::take(3)->get();
        return view('userPages.index',compact('testimonials'));
    }

    public function AboutUs()
    {
        return view('userPages.aboutus');
    }


    public function faq()
    {
        return view('userPages.Faq');
    }
    public function faqs()
    {
        return view('userPages.Faqs');
    }


    public function privacy()
    {
        return view('userPages.privacy');
    }
    public function TermsAndCondition()
    {
        return view('userPages.TermsAndCondition');
    }
    public function bookNow()
    {
        return view('userPages.bookNow');
    }


    public function bookNowSubmit()
    {
        return view('userPages.booksNowSubmit');
    }
    public function orderBooked()
    {
        return view('userPages.orderBooked');
    }

    public function contactUs()
    {
        return view('userPages.contactUs');
    }
    public function viewMobileDetails($id)
    {
        $products= Product::find($id);
        $productSpecs= ProductSpecs::find($id);
        $PSpecs= PSpecs::find($id);
        return view('userPages.MobileDetails', compact('products','productSpecs','PSpecs'));
    }
    public function FixYourStuff()
    {
        $repairTypes =RepairTypes::all();
        $products = product::all();
        $categories = category::all();
        return view('userpages.Fixyourstuff', compact('products','categories','repairTypes'));
    }

    public function feedback()
    {
        $storeNames=Store::where('status', 'approved')->get();
        return view('userPages.feedback',compact('storeNames'));
    }

    public function findStore(Request $request)
    {
        $products =product::all();
        // $request->session()->put('selectedBrand', $request->brand);
        // $request->session()->put('selectedModel', $request->model);
        // $request->session()->put('selectedRepairType', $request->repairType);

        $user = auth()->user();
        // $stores = RepairOrderDetails::where('user_id', $user->id)->get();

        $storesWithHighestOrderCount = Store::withCount('orders')
        ->orderByDesc('orders_count')
        ->take(2)
        ->get();

        $userCountTopStores = [];
foreach ($storesWithHighestOrderCount as $store) {
    $userCountTopStores[$store->id] = $store->orders()->distinct('user_id')->count('user_id');
}
// dd($userCountTopStores);

        $bottomStoresWithLowestOrderCount = Store::withCount('orders')
    ->orderBy('orders_count')
    ->take(2)
    ->get();

    $userCountBottomStores = [];
foreach ($bottomStoresWithLowestOrderCount as $store) {
    $userCountBottomStores[$store->id] = $store->orders()->distinct('user_id')->count('user_id');
}
// dd($userCountBottomStores);
        try {
            $repairOrders = RepairOrderDetails::where('user_id', $user->id)->get();
    $stores = [];

    foreach ($repairOrders as $repairOrder) {
        $stores[] = $repairOrder->store;
    }
        } catch (\Exception $e) {

            Log::error($e->getMessage());
            $stores = [];
        }


        $completedOrdersCountTopStores = [];
$cancelledOrdersCountTopStores = [];
foreach ($storesWithHighestOrderCount as $store) {
    $completedOrdersCount = RepairOrderDetails::where('store_id', $store->id)->where('status', 'completed')->count();
    $cancelledOrdersCount = RepairOrderDetails::where('store_id', $store->id)->where('status', 'cancelled')->count();

    $completedOrdersCountTopStores[$store->name] = $completedOrdersCount;
    $cancelledOrdersCountTopStores[$store->name] = $cancelledOrdersCount;
}
// dd($cancelledOrdersCountTopStores);
        return view('userPages.findStore',compact('stores','storesWithHighestOrderCount','bottomStoresWithLowestOrderCount','userCountTopStores','userCountBottomStores','completedOrdersCountTopStores', 'cancelledOrdersCountTopStores'));
    }

    public function getAPhone()
    {
        if (Auth::check()) {

            $user = Auth::user();

            $cartItems = $user->cart()->with('product')->get();}
            else {
                $cartItems = null;
            }
            $categories = category::all();

            $products = Product::with('reviews')->get();
            $averageRatings = [];

foreach ($products as $product) {
    $averageRating = $product->reviews->avg('rating');
    $roundedRating = round($averageRating, 0, PHP_ROUND_HALF_UP);
    $averageRatings[$product->id] = $roundedRating;
}


            return view('userPages.getAPhone', compact('products', 'categories', 'cartItems','averageRatings'));
        }
        // else {
        //     // Handle the case when the user is not authenticated
        //     // You might want to redirect them to the login page or display a message
        //     return redirect()->route('login')->with('error', 'Please log in to view your cart.');
        // }


    public function login()
    {
        return view('userPages.login');
    }
    public function payment()
    {
        return view('userPages.payment');
    }
    public function repairtask()
    {
        return view('userPages.repair-task');
    }
    public function Service()
    {
        return view('userPages.Service');
    }

    public function checkout()
    {
        if (Auth::check()) {
            // Retrieve the authenticated user
            $user = Auth::user();


            // Retrieve cart items for the authenticated user with product information
            $cartItems = $user->cart()->with('product')->get();
            $totalPrice = $cartItems->sum(function ($cartItem) {
                return $cartItem->product->price;
            });

            $categories = Category::all();
            $products = Product::all();

            return view('userPages.checkout', compact('products', 'categories', 'cartItems','totalPrice'));
        } else {
            // Handle the case when the user is not authenticated
            // You might want to redirect them to the login page or display a message
            return redirect()->route('login')->with('error', 'Please log in to view your cart.');
        }

    }    public function Signup()
    {
        return view('auth.register');
    }

//     public static function getAverageRating($storeId)
// {
//     $feedbackForms = FeedbackForm::where('store_id', $storeId)->get();
//     $totalRatings = 0;
//     $totalFeedbacks = 0;

//     foreach ($feedbackForms as $form) {
//         $ratings = json_decode($form->experience, true);
//         foreach ($ratings as $question => $rating) {
//             $totalRatings += $rating;
//             $totalFeedbacks++;
//         }
//     }

//     if ($totalFeedbacks > 0) {
//         $averageRating = $totalRatings / $totalFeedbacks;
//         return round($averageRating, 1); // Round to one decimal place
//     } else {
//         return 0; // Default rating if there are no feedbacks
//     }
// }

public function calculateAverageResponseTime($chatId)
{
    // Retrieve all messages for the given chat ID
    $messages = ChMessage::where('chat_id', $chatId)->orderBy('created_at')->get();

    $totalResponseTime = 0;
    $totalResponses = 0;

    // Iterate through the messages
    for ($i = 0; $i < count($messages) - 1; $i++) {
        $message1 = $messages[$i];
        $message2 = $messages[$i + 1];

        // Check if the messages are from different users
        if ($message1->from_id !== $message2->from_id) {
            // Calculate the time difference between messages
            $responseTime = Carbon::parse($message2->created_at)->diffInSeconds(Carbon::parse($message1->created_at));

            // Accumulate the response time
            $totalResponseTime += $responseTime;
            $totalResponses++;
        }
    }

    // Calculate the average response time

    $averageResponseTime = $totalResponses > 0 ? $totalResponseTime / $totalResponses : 0;

    return $averageResponseTime;
}
    public function viewStore($id)
    {

        $store = Store::with('images')->find($id);


    $user = $store->user;

    $receivedMessages = $user->receivedMessages;

$totalReceivedMessages = $receivedMessages->count();

$respondedMessagesCount = $receivedMessages->where('seen', 1)->count();


if ($totalReceivedMessages > 0) {
    $responseRate = ($respondedMessagesCount / $totalReceivedMessages) * 100;
} else {
    $responseRate = 0;
}

    $chatMessages = $user->chat;

    $totalResponseTime = 0;
    $totalResponses = $chatMessages->count();
        $replies=$chatMessages->where('from_id','=',$user->id);
    foreach ($chatMessages->where('from_id','!=',$user->id) as $message) {
           $responseMsg= $replies->where('to_id',$message->from_id)->first()->created_at??now();

         $responseTime = $message->created_at->diffInSeconds($responseMsg);

        $totalResponseTime += $responseTime;
    }
    $averageResponseTime = $totalResponseTime/60;
    if ($averageResponseTime < 60) {

        $averageResponseText = round($averageResponseTime) . " mins";
    } else {

        $averageResponseText = round($averageResponseTime / 60, 1) . " hours";
    }

    // $averageResponseTime = $totalResponses > 0 ? $totalResponseTime / $totalResponses / 60 : 0;
    // return $averageResponseTime;

    // $averageResponseTime = 0;
    // if ($totalResponses > 0) {
    //     $averageResponseTimeInSeconds = $totalResponseTime / $totalResponses;
    //     $averageResponseTime = $averageResponseTimeInSeconds / 3600; // Convert seconds to hours
    // }


    // $averageResponseTime = $totalResponses > 0 ? $totalResponseTime / $totalResponses : 0;
        $createdAt = Carbon::parse($store->created_at);
        $currentTime = Carbon::now();
        $timeDifference = $createdAt->diffForHumans($currentTime);
       $comments = FeedbackForm::where('store_id', $id)->take(6)->get();
       $Allcomments = FeedbackForm::where('store_id', $id)->get();

        $totalComments = $Allcomments->count();
        $averageRating = FeedbackForm::getAverageRating($id);
        // dd($store);
        // dd($averageRating);

        //recent reviews

        $Recentcomments = FeedbackForm::where('store_id', $id)->orderBy('created_at', 'desc')->take(3)->get();
        $recentCommentIds = $Recentcomments->pluck('id')->toArray();
        // $averageRatingOfRecentComments = FeedbackForm::getAverageRating($recentCommentIds);
        // foreach ($Recentcomments as $comment) {
        //     $timeElapsed = Carbon::parse($comment->created_at)->diffForHumans();
        //     $comment->timeElapsed = $timeElapsed;
        // }



        //positive/neautral/negative rating

        $feedbackForms = FeedbackForm::where('store_id', $id)->get();
        $positiveCount = 0;
        $neutralCount = 0;
        $negativeCount = 0;
$positiveCount = FeedbackForm::where('store_id', $user->store->id)
    ->where('experience->rating', '>', 4)
    ->count();
    $neutralCount = FeedbackForm::where('store_id', $user->store->id)
    ->where('experience->rating', '>=', 3)
    ->where('experience->rating', '<=', 4)
    ->count();

$negativeCount = FeedbackForm::where('store_id', $user->store->id)
    ->where('experience->rating', '<', 3)
    ->count();
//  $negativeCount= FeedbackForm::where('experience->rating', '<', 3)->count();
//  $neutralCount = FeedbackForm::where('experience->rating', '>', 3)->where('experience->rating', '<', 4)->count();
//  $positiveCount = FeedbackForm::where('experience->rating', '>', 4)->count();

// return [$negative,$medium, $high];

//  foreach ($feedbackForms as $feedbackForm) {

//             $averageRating = FeedbackForm::getAverageRating($feedbackForm->id);


//             if ($averageRating >= 4.0) {
//                 $positiveCount++;
//             } elseif ($averageRating >= 2.0 && $averageRating < 4.0) {
//                 $neutralCount++;
//             } else {
//                 $negativeCount++;
//             }
//         }


        $totalFeedbackForms = count($feedbackForms);

        if ($totalFeedbackForms != 0) {
            $positiveRate = ($positiveCount / $totalFeedbackForms) * 100;
            $neutralRate = ($neutralCount / $totalFeedbackForms) * 100;
            $negativeRate = ($negativeCount / $totalFeedbackForms) * 100;

            $positiveRate = number_format($positiveRate, 0);
            $neutralRate = number_format($neutralRate, 0);
            $negativeRate = number_format($negativeRate, 0);
        } else {
            // Set rates to zero or handle the case appropriately
            $positiveRate = 0;
            $neutralRate = 0;
            $negativeRate = 0;
        }


        return view('userPages.viewStore', compact('store','timeDifference','comments','totalComments','averageRating','averageResponseTime','Recentcomments','responseRate','positiveRate','neutralRate','negativeRate','positiveCount','neutralCount','negativeCount','totalFeedbackForms'));
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase',
            'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function BookRepair($id)
    {
        $repairTypes=RepairTypes::all();
        $store= store::find($id);
        return view('userPages.BookRepair', compact('store','repairTypes'));
    }


    public function WarrantyClaim()
{
    $products=Product::all();
    $stores=store::where('status','approved')->get();
    return view('userPages.warrantyClaim',compact('products','stores'));
}


public function ProductReview($orderId)
{
    $order=Order::find($orderId);
    $product = $order->product;
    $reviews = $product->reviews;
    $reviewscount= $reviews->count();
    $averageRating = $product->averageRating();
$positiveCount = 0;
$negativeCount = 0;
$neutralCount = 0;
foreach ($reviews as $review) {
    if ($review->rating >= 4) {
        $positiveCount++;
    } elseif ($review->rating <= 2) {
        $negativeCount++;
    } else {
        $neutralCount++;
    }
}
$totalReviews = $positiveCount + $negativeCount + $neutralCount;
$positiveRate = (int)(($positiveCount / $totalReviews) * 100);
$negativeRate = (int)(($negativeCount / $totalReviews) * 100);
$neutralRate = (int)(($neutralCount / $totalReviews) * 100);

return view('userPages.ProductReview',compact('order','reviews','reviewscount','averageRating','product','positiveRate','negativeRate','neutralRate'));

}


public function OrderHistory()
{
    $user=Auth()->user();
    $userId=$user->id;
    $orders=Order::where('user_id', $userId) ->where('status', 'completed')->get();

    return view('userPages.OrderHistory',compact('orders'));
}
}

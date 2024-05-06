<?php

namespace App\Http\Controllers;

use Stripe\Review;
use App\Models\PSpecs;
use App\Models\product;
use App\Models\category;
use App\Models\ProductSpecs;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Models\product_images;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    public function createProduct()
    {
        $spec_types = PSpecs::select(['type'])->distinct()->get();
        $categories = Category::all();
        return view('Backend.Products.Create', compact('categories', 'spec_types'));
    }
    public function storeProduct(Request $request)
    {
        $user = \Auth::user();
        // return $request->all();
        $request->validate([
            'name' => 'required|string',
            'cat_id' => 'required|integer',
            'price' => 'required|integer',
            // 'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'required|array',
        ]);



        $product = new Product([
            'category_id' => $request->input('cat_id'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'store_id' => 1,
        ]);


        // dd($request->input('cat_id'));
        $product->save();





        // if ($request->hasFile('image')) {
        //     foreach ($request->file('image') as $image) {
        //         $imagePath = $image->store('product_images', 'public');

        //         $product->images()->create(['image' => $imagePath]);
        //     }
        // }


        foreach ($request->file('images') as $image) {
            try {
                $url = $image->store('public/Product_images');
                if (substr($url, 0, 7) === "public/") {
                    // Remove "public/" from the start of the string
                    $url = substr($url, 7);
                }
                $product->images()->create(['image' => $url]);
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        }

        foreach ($request->input('spcs') as $specId => $value) {

            $productSpec = new ProductSpecs([
                'spec_id' => $specId,
                'value' => $value,
            ]);

            $product->productSpecs()->save($productSpec);
        }
        // $productSpec = new ProductSpecs([
        //     'spec_id' => $request->input('spec_id'),
        //     'value' => $request->input('value'),
        //     'product_id' => $product->id,
        // ]);



        // Save the product specification to the database
        // $productSpec->save();



        // $validatedData = $request->validate([
        //     'dimension'         => 'required',
        //     'weight'            => 'required',
        //     'sim'               => 'required',
        //     'battery'           => 'required',
        //     'os'                => 'required',
        //     'chipsit'           => 'required',
        //     'cpu'               => 'required',
        //     'gpu'               => 'required',
        //     'storage'           => 'required',
        //     'ram'               => 'required',
        //     'primary_camera'    => 'required',
        //     'secondary_camera'  => 'required',
        //     'video'             => 'required',
        //     'features'          => 'required',
        //     'entertainment'     => 'required',
        //     'hidden_features'   => 'required',
        //     'connectivity'      => 'required',
        //     'operating_frequency' => 'required',
        //     'colors'            => 'required',
        //     'sensors'           => 'required',
        //     'ringtones'         => 'required',
        //     'messaging'         => 'required',
        // ]);





        //  // Create a new ProductSpec instance and fill it with the validated data
        //  $productSpec = new ProductSpecs();
        //  $productSpec->spec_id = $validatedData['spec_id'];
        //  $productSpec->value = [
        //      'dimension' => $validatedData['dimension'],
        //      'weight'    => $validatedData['weight'],
        //      'sim'       => $validatedData['sim'],
        //      'battery'    => $validatedData['battery'],
        //      'weight'    => $validatedData['weight'],
        //      'weight'    => $validatedData['weight'],
        //      'weight'    => $validatedData['weight'],
        //      'weight'    => $validatedData['weight'],
        //      // Add other fields similarly
        //  ];

        // You can add a success message or redirect to a different page
        return redirect()->back()->with('success', 'Product added successfully.');
    }



    public function getSpecNamesByType($specTypeId)
    {
        $specNames = DB::table('p_specs')->where('type', $specTypeId)->get();

        return response()->json($specNames);
    }

    public function viewProduct()
    {
        $products = Product::with(['ProductSpecs.pspecs', 'images', 'category'])->get();

        //     $pspecs = PSpecs::all();
//     $productSpecs = [];
//     foreach ($pspecs as $pspec) {
//         $productSpecs[] = $pspec->ProductSpecs;
//     }
// dd($productSpecs);

        return view('Backend.Products.ViewProducts', compact('products'));
    }
    public function ViewDetails($id)
    {
        $product = Product::find($id);
        return view('Backend.Products.DetailView', compact('product'));
    }
    public function getAllProducts($sortOption)
    {

        try {
            $products = Product::all();
            switch ($sortOption) {
                case 'lowToHigh':
                    $products = $products->sortBy('price');
                    break;
                case 'highToLow':
                    $products = $products->sortByDesc('price');
                    break;
                // Add more cases for other sorting options if needed
            }
            $view = view('partials.product', compact('products'));
            return $view;
        } catch (\Exception $e) {

            \Log::error($e);


            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    // public function search(Request $request)
// {
//     $keywords = $request->input('keywords');

    //     // Query to search for products based on keywords
//     $products = Product::where('name', 'like', "%$keywords%")->get();

    //     return response()->json($products);
// }

    public function search(Request $request)
    {
        $keywords = $request->query('keywords');

        $products = Product::where('name', 'like', "%$keywords%")->get();
        $averageRatings = [];
        foreach ($products as $product) {
            $averageRatings[$product->id] = $product->reviews->avg('rating');
        }

        return view('partials.product', compact('products','averageRatings'));
    }


    public function getProductsByCategory($categoryId)
    {
        $category = Category::find($categoryId);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $products = $category->products()->with('reviews')->get();
        $averageRatings = [];
        foreach ($products as $product) {
            $averageRatings[$product->id] = $product->reviews->avg('rating');
        }

        return view('partials.product', compact('products','averageRatings'));
    }


    public function getProductsByBatteryRange($batteryRange)
    {
        // Retrieve products based on the provided battery range
        $products = Product::where('battery_range', $batteryRange) ->with('reviews')->get();
        // $products = Product::with('reviews')->get();
        $averageRatings = [];
        foreach ($products as $product) {
            $averageRatings[$product->id] = $product->reviews->avg('rating');
        }

        // Assuming you have a blade view for rendering products, you can return it as follows
        return view('products', compact('products','averageRatings'));
    }
    public function filterByPrice(Request $request)
    {

        $minPrice = $request->input('min_price', 0);
        $maxPrice = $request->input('max_price', 0);
        $keywords = $request->input('keywords', null);
        $category = $request->input('category', null);
        $batteryCapacity = $request->input('batteryCapacity', null);
        $RAM = $request->input('RAM', null);
        $Memory = $request->input('Memory', null);


        // Perform the filtering based on the provided price range
        $products = product::query()->with(['images']);
        if ($minPrice > 0) {
            $products->where('price', '>', $minPrice);
        }
        if ($maxPrice > 0) {
            $products->where('price', '<', $maxPrice);
        }
        if ($category > 0) {
            $products->where('category_id', $category);
        }
        if ($keywords != null) {


            $products->where('name', 'like', "%$keywords%");
        }
        if ($batteryCapacity !=='null') {


            $products->whereHas('ProductSpecs', function ($query) use ($batteryCapacity) {
                $query->where('spec_id', 4)
                      ->whereRaw('CAST(value AS UNSIGNED) >= ?', [$batteryCapacity]);
            });



        }

        if ($RAM!=='null') {

            $products->whereHas('ProductSpecs', function ($query) use ($RAM) {
                $query->where('spec_id', 10)
                      ->whereRaw('CAST(value AS UNSIGNED) >= ?', [$RAM]);
            });




        }


        if ($Memory) {
            $products->whereHas('ProductSpecs', function ($query) use ($Memory) {
                $query->where('spec_id', 11)
                      ->whereRaw('CAST(value AS UNSIGNED) >= ?', [$Memory]);
            });
        }

        // foreach ($products as $product) {
        //     $product->average_rating = $product->reviews->avg('rating');
        // }
        // $averageRatings = [];
        // foreach ($products as $product) {
        //     $averageRatings[$product->id] = $product->reviews->avg('rating');
        // }

        return $products->get();

    }

    public function addToFavorites(Product $product)
    {
        try {

            Auth::user()->favorites()->attach($product->id);
            return redirect()->back()->with('success', 'Product added to favorites successfully.');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode === 1062) {
                return redirect()->back()->with('error', 'Product is already in favorites.');
            }

        }

    }

    public function AddFavorites($product_id)
    {
        try {

            Auth::user()->favorites()->attach($product_id);
            return redirect()->back()->with('success', 'Product added to favorites successfully.');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode === 1062) {
                return redirect()->back()->with('error', 'Product is already in favorites.');
            }

        }

    }
    public function RemoveFavorites($product_id)
    {
        try {

            Auth::user()->favorites()->detach($product_id);
            return redirect()->back()->with('success', 'Product removed to favorites successfully.');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode === 1062) {
                return redirect()->back()->with('error', 'Product is already in favorites.');
            }

        }

    }


    public function addReview(Request $request)
    {

        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'comment' => 'required|string',
                'rating' => 'required|integer|min:1|max:5',
            ]);

            // Create a new review
            $review = new ProductReview();
            $review->user_id = auth()->user()->id;
            $review->product_id = $request->product_id;
            $review->comment = $request->comment;
            $review->rating = $request->rating;
            $review->save();

            return redirect()->back()->with('success', 'Review added successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to add review. Please try again.']);
        }

    }

}


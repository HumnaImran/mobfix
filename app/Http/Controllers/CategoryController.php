<?php

namespace App\Http\Controllers;

use App\Models\product;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function Addcategory()
    {
        return view('Backend.Categories.Create');
    }
    public function storeCategory(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image',
        ]);



        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('Category_images'), $imageName);

            $category = Category::create([
                'name' => $request->input('name'),
                'image' => $imageName,
            ]);

            return redirect()->back()->with('success', 'Category added successfully.');
        } else {

            return redirect()->back()->with('error', 'Please upload an image.');
        }



        // $category = Category::create([
        //     'name' => $request->input('name'),


        // ]);

        // return redirect()->back()->with('success', 'Category added successfully.');
    }

    public function Allcategory()
    {
        $Allcategorys =Category::all();
        return view('Backend.Categories.ViewCategories', compact('Allcategorys'));
    }

    public function Editcategory($id)
    {
        $categorys =Category::find($id);
        return view('Backend.Categories.Edit', compact('categorys'));
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);

        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image',
        ]);

        // Update category name
        $category->name = $request->name;

        // Check if a new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('Category_images'), $imageName);

            // Delete the old image (optional)
            // You might want to keep the old images, in that case, skip this part
            if ($category->image) {
                $oldImagePath = public_path('Category_images') . '/' . $category->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Update category image
            $category->image = $imageName;
        }

        $category->save();

        return redirect()->back()->with('success', 'Category updated successfully');
    }

    public function getModelsByCategory($categoryId)
{
    $models = Product::where('category_id', $categoryId)->get();

    return response()->json($models);
}

}

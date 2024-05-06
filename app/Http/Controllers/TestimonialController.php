<?php

namespace App\Http\Controllers;
use App\Models\testimonials;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    //

    public function AddTestimonial()
    {
        return view('Backend.Testimonials.Create');
    }
    public function StoreTestimonial(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string',
            'image' => 'image|nullable|max:2048', // Assuming max file size is 2MB and allowed image file types
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimonials', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Create and store the testimonial
        testimonials::create($validatedData);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Testimonial added successfully!');
    }



    public function AllTestimonial()
    {
        $AllTestimonials =testimonials::all();
        return view('Backend.Testimonials.ViewTestimonials', compact('AllTestimonials'));
    }



    public function EditTestimonial($id)
    {
        $Testimonial =testimonials::find($id);
        return view('Backend.Testimonials.Edit', compact('Testimonial'));
    }

    public function updateTestimonial(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string',
            'image' => 'image|nullable|max:2048', // Assuming max file size is 2MB and allowed image file types
        ]);

       // Check if validation fails
    if ($validator->fails()) {
        throw new ValidationException($validator);
    }

    // Find the testimonial by ID
    $testimonial =testimonials::findOrFail($id);

    // Handle image upload if new image is provided
    if ($request->hasFile('image')) {
        // dd($request->file('image'));
        $imagePath = $request->file('image')->store('testimonials', 'public');
        $testimonial->image = $imagePath;

        // Delete the old image if exists
        // if ($testimonial->image) {
        //     \Storage::disk('public')->delete($testimonial->image);
        // }
    }




    // Update testimonial with validated data
    $testimonial->name = $request->input('name');
    $testimonial->email = $request->input('email');
    $testimonial->rating = $request->input('rating');
    $testimonial->message = $request->input('message');
    $testimonial->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Testimonial updated successfully!');
    }

}

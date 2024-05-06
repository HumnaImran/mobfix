<?php

namespace App\Http\Controllers;

use App\Models\FeedbackForm;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    //
    public function store(Request $request)
    {

    $validatedData = $request->validate([
        'full_name' => 'required|string',
        'phone_number' => 'required|string',
        'email' => 'required|email',
        'store_id' => 'required|exists:stores,id',
        'comment' => 'nullable|string',
        'experience.*.rating' => 'required|integer|between:1,5', // Validate each experience rating
    ]);

    $overallrating=0;
    foreach($request->experience as $exp){
        $overallrating =$overallrating  +$exp['rating'];
    }
    $overallrating=($overallrating/20)*5;


    $experience=$request->experience;
    $experience['rating']= $overallrating;
    // Create a new instance of FeedbackForm model and fill it with validated data
    $feedback = new FeedbackForm();
    $feedback->full_name = $validatedData['full_name'];
    $feedback->phone_number = $validatedData['phone_number'];
    $feedback->email = $validatedData['email'];
    $feedback->store_id = $validatedData['store_id'];
    $feedback->comment = $validatedData['comment'];
    $feedback->experience = $experience;


    // Save the feedback to the database
    $feedback->save();

    // Handle experiences



    // Redirect back with success message or do any other action
    return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }


    public function viewFeedback()
    {
        $feedbacks = FeedbackForm::with('store')->get();

        return view('Backend.Feedbacks.ViewFeedbacks', compact('feedbacks'));
    }


    public function Destroy(FeedbackForm $feedback)
    {
        $feedback->delete();

        return redirect()->back()->with('success', 'Feedback deleted successfully');

    }

    public function AllsellerReviews($id)
    {
        $Allcomments = FeedbackForm::where('store_id', $id)->get();
        return view('userPages.AllsellerReviews',compact('Allcomments'));
    }




}

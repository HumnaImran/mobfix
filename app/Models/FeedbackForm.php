<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name', 'phone_number', 'email', 'store_id', 'comment', 'experience'
    ];
    protected $casts=['experience'=>'json'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }



   // Inside FeedbackForm model

// Inside FeedbackForm model

// public static function getAverageRating($storeId)
// {
//     $feedbackForms = FeedbackForm::where('store_id', $storeId)->get();
//     $totalRatings = 0;
//     $totalFeedbacks = 0;

//     if ($feedbackForms) {
//         foreach ($feedbackForms as $form) {
//             $ratings = $form->experience;
//             if (is_array($ratings)) {
//                 foreach ($ratings as $question => $rating) {
//                     if (is_numeric($rating)) {
//                         $totalRatings += $rating;
//                         $totalFeedbacks++;
//                     }
//                 }
//             }
//         }
//     }

//     if ($totalFeedbacks > 0) {
//         $averageRating = $totalRatings / $totalFeedbacks;
//         return round($averageRating, 1); // Round to one decimal place
//     } else {
//         return 0; // Default rating if there are no feedbacks
//     }
// }


public static function getAverageRating($feedbackId)
{
    // return 0;
     $feedbackForm = FeedbackForm::where('id',$feedbackId)->first();

     if($feedbackForm)
    {
        $feedbackForm->first();
        if(!$feedbackForm || !$feedbackForm?->experience){
            return 0;
        }
        $ratings = $feedbackForm->experience;
        $totalRatings = 0;
        $totalQuestions = 0;

        if ($ratings) {
            foreach ($ratings as $question) {
                if (isset($question['rating']) && is_numeric($question['rating'])) {
                    $totalRatings += $question['rating'];
                    $totalQuestions++;
                }
            }
        }

        if ($totalQuestions > 0) {
            $averageRating = $totalRatings / $totalQuestions;
            return round($averageRating, 1); // Round to one decimal place
        } else {
            return 0; // Default rating if there are no ratings
        }
    }
    return 0;


}


}

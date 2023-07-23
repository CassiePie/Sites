<?php

namespace App\Http\Controllers;

use App\Mail\NewReviewMail;
use Illuminate\Http\Request;
use App\Mail\ReviewConfirmationMail;
use Illuminate\Support\Facades\Mail;

class ReviewController extends Controller
{
    public function showReviewForm()
    {
        return view('review');
    }

    public function submitReviewForm(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'review' => 'required|min:50|max:140',
            'score' => 'required|integer|min:0|max:10',
            'privacy' => 'required',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $score = $request->input('score');
        $review = $request->input('review');
        $privacy = $request->input('privacy');

        // Send confirmation email to author of the review
        $reviewConfirmationMail = new ReviewConfirmationMail($name, $email, $score, $review);
        Mail::to($request->email)->send($reviewConfirmationMail);

        // Send email to website admin to approve the review
        $newReviewMail = new NewReviewMail($name, $email, $score, $review);
        Mail::to('ece.dupont@outlook.com')->send($newReviewMail);

        return view('emails.review_confirmation', [
            'data' => [
                'name' => $name,
                'email' => $email,
                'score' => $score,
                'review' => $review,
            ]
        ]);
        
    }

}

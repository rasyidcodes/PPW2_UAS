<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function submitReview(Request $request, $bukuId)
    {
        $this->validate($request, [
            'review' => 'required|string|max:255',
        ]);

        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            $review = new Review([
                'user_id' => $user->id,
                'buku_id' => $bukuId,
                'review' => $request->input('review'),
                'approved' => true, // Assuming reviews are approved by default
            ]);

            $review->save();

            return redirect()->back()->with('success', 'Review submitted successfully.');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to submit a review.');
        }
    }

    public function showReviews($bukuId)
    {
        $buku = Buku::find($bukuId);
        $reviews = $buku->reviews()->get();
        return view('reviews.index', compact('buku', 'reviews'));
    }

    public function deleteReview($reviewId)
    {
        $review = Review::find($reviewId);

        // Check if the user is authorized to delete the review
        if (Auth::check() && (Auth::user()->id == $review->user_id)) {
            $review->delete();
            return redirect()->back()->with('success', 'Review deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Unauthorized to delete the review.');
        }
    }
}

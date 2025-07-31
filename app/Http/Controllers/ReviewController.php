<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'watch_id' => 'required|exists:watches,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);
        $review= new Review();
        $review->user_id = $request->user_id;
        $review->watch_id = $request->watch_id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();
        return redirect()->route('reviews.index')->with('success', 'Review created successfully.');
    }

   
}

<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Resources\ReviewsResource;

class ReviewsController extends Controller
{
    public function index()
    {
        return ReviewsResource::collection(Review::all());
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        $review = [
            'content'=>$request->input('content'),
            'user_id'=>$request->input('user_id'),
            'recipe_id'=>$request->input('recipe_id'),
        ];
        return ReviewsResouce(Review::create($review)) ;
    }
    
    public function show(Review $review)
    {
        return new ReviewsResource($review);
    }

    public function edit(Review $review)
    {
        //
    }
    
    public function update(Request $request, Review $review)
    {
        //
    }
    public function destroy(Review $review)
    {   
        $review->delete;
        return "deleted successfuly";
    }
}

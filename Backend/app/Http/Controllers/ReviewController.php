<?php

namespace App\Http\Controllers;
use App\Models\review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = review::all();
        return $reviews;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $review = new review();
        $review->detail_review=$request->detail_review;
        $review->id_profile=$request->id_profile;
        $review->save();

        return $review;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $review = review::find($id);
        return $review;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $review = review::find($id);
        $review->detail_review=$request->detail_review;
        $review->id_profile=$request->id_profile;
        $review->save();

        return $review;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = review::find($id);
        $review -> delete();

        return 'Se ha eliminado';
    }
}

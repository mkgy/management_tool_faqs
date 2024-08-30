<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqQuestion;
use App\Http\Resources\FaqQuestionResource;

class FaqQuestionApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // getting only questions from FaqQuestion
        // $faqQuestion = FaqQuestion::all();
      
        // getting questions from FaqQuestion as well as getting category from FaqCategory
        $faqQuestion = FaqQuestion::with('category')->get();

        return FaqQuestionResource::collection($faqQuestion);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

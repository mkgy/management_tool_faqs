<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use App\Models\FaqQuestion;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:product-list|product-create|product-edit|product-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:product-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:product-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:product-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqQuestions = FaqQuestion::all();
        return view('products.index', compact('faqQuestions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faqCategory = FaqCategory::all();
        $faqQuestions = FaqQuestion::all();
     
        // return view('products.create', compact(['faqQuestions' =>$faqQuestions, 'faqCategory'=>  $faqCategory]));
        return view('products.create')->with('faqQuestions',$faqQuestions)->with('faqCategory',$faqCategory);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        FaqQuestion::create(['question'=> $request->input('question') , 'answer' => $request->input('answer'), 'category_id' => $request->input('category_id') ]);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faqQuestions = FaqQuestion::find($id);
        return view('products.show', compact('faqQuestions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faqQuestions = FaqQuestion::find($id);
        return view('products.edit', ["question" => $faqQuestions->question,  "answer" => $faqQuestions->answer, "id" => $faqQuestions->id]);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        // echo "<pre>";
        // echo print_r($request->all());
        // echo "</pre>";
        // die();

        $faqQuestions = FaqQuestion::find($id);
        // update all the request made by the frontend-user
        $faqQuestions->update($request->all());
        return redirect()->route('products.index')
        ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $faqQuestions = FaqQuestion::find($id);
            $faqQuestions->delete();
            return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }

    
}

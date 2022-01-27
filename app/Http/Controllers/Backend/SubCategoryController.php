<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $categories = Category::where('row_status',true)->get();
            $subcategories = SubCategory::latest()->get();
            return view('backend.sub-category.index',compact('categories','subcategories'));
        }
        catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_id'       => 'required',
            'sub_category_name' => 'required',
        ]);
        
        try{
            $subcategory    = new SubCategory();
            $subcategory->category_id = $request->category_id;
            $subcategory->sub_category_name = $request->sub_category_name;
            $subcategory->save();
    
            Toastr::success('SubCategory Successfully Added');
            return redirect()->back();
        }
        catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        
        try{
            $subcategory = SubCategory::findOrFail($id);
            return response()->json(['row_data' => $subcategory],200);
        }
        catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cat)
    {
        

        $this->validate($request,[
            'category_id'       => 'required',
            'sub_category_name' => 'required',
        ]);

        
        try{
            $subcategory = SubCategory::findOrFail($request->old_id);

            $subcategory->category_id       = $request->category_id;
            $subcategory->sub_category_name = $request->sub_category_name;
            $subcategory->row_status        = $request->row_status;
            $subcategory->update();
    
            Toastr::success('Sub Category Successfully Update');
            return redirect()->back();
        }
        catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $subcategory = SubCategory::findOrFail($id)->delete();
            Toastr::success('Sub Category Successfully Deleted');
            return redirect()->back();
        }
        catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
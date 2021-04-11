<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all()->pluck('category_name', 'id')->toArray();
        //DB::table('categories')->select('id')->get();
        return view('create',['categories'=>$categories]);
        //return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        /*$category= new Category;
        $category->category_name=$req->category_name;
        $category->save();
        return view('category.create');*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories=Category::all()->pluck('category_name')->toArray();


        $name = $request->input('category_name');
       /* DB::insert('insert into categories (category_name) values(?)',[$name]);
        //return redirect()->route('categorycreate');
        return view('categorycreate');


        $validator = Validator::make($request->all(), [
            
            'title' => 'required|unique:posts|max:255',
        ]);

        if ($validator->fails()) {

            // redirect back to post create page
            // with submitted form data
            return redirect('post')
                ->withErrors($validator)
                ->withInput();
        }*/
        if(in_array($name, $categories))

         {
            return view('categorycreate')->with('alert','Dont Open this link');
           //System.alert("Yes, design_id: $name exits in array");
           //return view('categorycreate');

          }
          else{
            DB::insert('insert into categories (category_name) values(?)',[$name]);
            return view('categorycreate');
          }
        //return $categories;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /*static function productcreate()
    {
        $categories=DB::table('categories')
        ->select('categories.*')
        ->get();

        //return view('create',['categories'=>$categories]);
        return $categories;
    
    }*/
}

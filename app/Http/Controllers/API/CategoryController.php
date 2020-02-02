<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $category = \App\Category::latest()->get();

        return response()->json([
           'category' => $category
        ]);
    }

    public function store(Request $request)
    {   
        $request->validate([
          'name' => 'required'
        ]);
        

        \App\Category::create([
          'name' => $request->name
        ]);

        return response()->json([
          'message' => 'Data submitted successfully'
        ]);
    }

    public function show($id)
    {
      $category = \App\Category::find($id);

      return response()->json([
          'category' => $category
      ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
          'name' => 'required'
        ]);
        
        $category = \App\Category::find($id);
        
        $category->update($request->all());

        return response()->json([
          'message' => 'Data submitted successfully'
        ]);
    }

    public function destroy($id)
    {
      $category = \App\Category::find($id);
      $category->delete();
      return "ok";
    }
}

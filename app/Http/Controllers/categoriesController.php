<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class categoriesController extends Controller
{
    public function create(Request $request)
    {

        // Create a new category (assuming you have a Category model)
        $category = new Category();
        $category->create ([
            'name' => $request->name,
            'created_by' => '',
            

        ]);
               // Redirect back to the admin categories page with a success message
        return redirect('/admin')->with('success', 'Category created successfully!');
    } 
      
            public function delete_category(Request $request)
    {

        // Create a new category (assuming you have a Category model)
        $category = new Category();
        $category=$category->find($request->id);
        $category->delete();
      
       // Redirect back to the admin categories page with a success message
        return redirect('/admin')->with('success', 'Category deleted successfully!');
    } 


   
}

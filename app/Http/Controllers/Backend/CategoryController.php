<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function adminViewCategories(){
        $categories = Category::latest()->get();
        return view('backend.category.view_category', compact('categories'));
    }

    public function adminStoreCategory(Request $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_fr' => 'required',
            'category_icon' => 'required',
        ],
        // customise the error message
        [
            'category_name_en.required' => 'Please input category english name ',
            'category_name_fr.required' => 'Please input category french name ',
            'category_icon.required' => 'Please input category image'
        ]);
        // dd($request);
        
        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_fr' => $request->category_name_fr,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_slug_en)),
            'category_slug_fr' => strtolower(str_replace(' ', '-', $request->category_slug_fr)),
            'category_icon' => $request->category_icon,
        ]);
        
        $notification = array(
            'message' => 'Category saved Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function adminEditCategory($id){
        $category = Category::findOrFail($id);
        return view('backend.category.edit_category', compact('category'));
    }

    public function adminUpdateCategory(Request $request){
        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_fr' => $request->category_name_fr,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_slug_en)),
            'category_slug_fr' => strtolower(str_replace(' ', '-', $request->category_slug_fr)),
            'category_icon' => $request->category_icon,
        ]);

        
        $notification = array(
            'message' => 'Category updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.categories')->with($notification);
    
    }
    
    public function adminDeleteCategory($id){
        $category = Category::findOrFail($id);

        Category::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Category deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.categories')->with($notification);
    }
}

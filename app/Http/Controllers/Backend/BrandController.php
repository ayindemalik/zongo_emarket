<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    //
    public function adminViewBrand(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }

    public function adminStoreBrand(Request $request){
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_fr' => 'required',
            'brand_image' => 'required',
        ],
        // customise the error message
        [
            'brand_name_en.required' => 'Please input brand english name ',
            'brand_name_fr.required' => 'Please input brand french name ',
            'brand_image.required' => 'Please select brand image'
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('uploads/brand_images/'.$name_gen);
        $save_url = 'uploads/brand_images/'.$name_gen;
        
        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_fr' => $request->brand_name_fr,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_fr' => str_replace(' ', '-', $request->brand_name_fr),
            'brand_image' => $save_url,
        ]);
        

        $notification = array(
            'message' => 'Brand saved Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function adminEditBrand($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brands'));
    }

    public function adminUpdateBrand(Request $request){
        $brand_id = $request->id;
        $brand_old_img = $request->old_image;

        if($request->file('brand_image')){
            unlink($brand_old_img);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('uploads/brand_images/'.$name_gen);
            $save_url = 'uploads/brand_images/'.$name_gen;
            
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_fr' => $request->brand_name_fr,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_fr' => strtolower(str_replace(' ', '-', $request->brand_name_fr)),
                'brand_image' => $save_url,
            ]);
            
        }
        else {
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_fr' => $request->brand_name_fr,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_fr' => str_replace(' ', '-', $request->brand_name_fr),
            ]);
        }

        $notification = array(
            'message' => 'Brand updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.brands')->with($notification);
    
    }
    
    public function adminDeleteBrand($id){
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);

        Brand::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Brand deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.brands')->with($notification);
    }

    

}

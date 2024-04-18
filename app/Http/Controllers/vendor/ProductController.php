<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productcategory;
use App\Models\Productbrand;

class ProductController extends Controller
{
    public function vendorproductview(){
        $product_category=Productcategory::where('parent_id',0)->get();

        $product_brands=Productbrand::select('name','id')->get();
        
        
        return view('vendors.products.add',['product_category'=>$product_category,'product_brands'=>$product_brands]);
    }


    public function handleChange(Request $request)
    {
        
       
        $product_category=Productcategory::where('parent_id',$request->selectedvalue)->get(); 

                     
                       
      

             if(json_decode($product_category)!=[]){
                $optionHtml = "<option selected>Open this select menu</option>";
             }else{
                $optionHtml = "<option selected>No Record Found</option>";
             }
        

        foreach ($product_category as $data) {
          
            $optionHtml = $optionHtml."<option value='" . $data->id . "'>" . ucwords($data->name) . "</option>";
        }

      
        

            $htmlResponse = '<div class="col-md-4" id="'.$request->selectedtext.'">
            <label for="" class="form-label"> '.$request->selectedtext.' '. 'Category</label>
            <select onchange="selectSubproductcategory(this)"  class="form-select"
                name="product_category[]" aria-label="Default select example">'
    
               .$optionHtml.
                '</select>
    
                </div>';

                return response()->json([
                    'sucess'=>true,
                    'responsehtml'=>$htmlResponse
                ],200);
        
       
    }




}

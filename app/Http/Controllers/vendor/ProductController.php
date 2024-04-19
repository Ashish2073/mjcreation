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
                $optionHtml = "<option selected disabled>Open this select menu</option>";
             }else{
                $optionHtml = "<option selected disabled>No Record Found</option>";
             }
        

        foreach ($product_category as $data) {
          
            $optionHtml = $optionHtml."<option value='" . $data->id . "'>" . ucwords($data->name) . "</option>";
        }

      
        

            $htmlResponse = '<div class="col-md-4" id="'.$request->selectedtext.'">
            <label for="" class="form-label"> '.$request->selectedtext.' '. 'Category</label>
            <select onchange="selectSubproductcategory(this)"  class="form-select"
                name="product_category[][]" aria-label="Default select example">'
    
               .$optionHtml.
                '</select>
    
                </div>';

                return response()->json([
                    'sucess'=>true,
                    'responsehtml'=>$htmlResponse
                ],200);
        
       
    }


    public function saveproduct(Request $request){

        dd($request);

    }

    public function textareaimageupload(Request $request){
        if($request->hasFile('upload')){
            $originName=$request->file('upload')->getClientOriginalName();
            $fileName=pathinfo($originName,PATHINFO_FILENAME);
            $extension=$request->file('upload')->getClientOriginalExtension();
            $fileName=$fileName.'__'.time().'.'.$extension;
            $request->file('upload')->move(public_path('textarea'),$fileName);
            $url=asset('textarea/'.$fileName);
            return response()->json([
                'fileName'=>$fileName,
                'uploaded'=>1,
                'url'=>$url,
            ]);

        }
    }




}

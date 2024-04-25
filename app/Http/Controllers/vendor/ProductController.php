<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productcategory;
use App\Models\Productbrand;
use App\Models\VendorProduct;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\VendorProductImport;
use App\Models\Productspecficationheading;

class ProductController extends Controller
{
    public function vendorproductview(){
        $product_category=Productcategory::where('parent_id',0)->get();

        $product_brands=Productbrand::select('name','id')->get();
 
        $product_specification_headings=Productspecficationheading::select('name','id')->get();
        
        
        return view('vendors.products.add',['product_category'=>$product_category,'product_brands'=>$product_brands,'product_specification_headings'=>$product_specification_headings]);
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
                name="product_category[]" aria-label="Default select example">'
    
               .$optionHtml.
                '</select>
    
                </div>';

                return response()->json([
                    'sucess'=>true,
                    'responsehtml'=>$htmlResponse
                ],200);
        
       
    }


    public function saveproduct(Request $request){

    
        

        $vendorProduct=new VendorProduct();
        $vendorProduct->vendor_id=1;

        $vendorProduct->product_category_id=$request->product_category[count($request->product_category)-1];
        $vendorProduct->product_title=$request->product_title;
        $vendorProduct->brand_id=2;
        $vendorProduct->product_quantity=$request->product_quantity;
        $vendorProduct->discription=$request->product_desc;
        $vendorProduct->product_warrenty=$request->product_warrenty;


        $vendorProduct->measurement_parameter_name=$request->product_mesurment_parameter;
       
        $vendorProduct->measurement_unit_name=$request->product_mesurment_unit;



        $vendorProduct->product_mesurment_quantity=(isset($request->product_mesurment_quantity[0]))?json_encode($request->product_mesurment_quantity):Null;

        $vendorProduct->product_quantity_price=(isset($request->product_quantity_price))?json_encode($request->product_quantity_price): Null;

        $vendorProduct->product_currency_type=(isset($request->product_currency_type))?json_encode($request->product_currency_type):Null;

        // $vendorProduct->product_other_expenditure_cost=json_encode($request->product_other_price) ?? Null;

        // $vendorProduct->product_other_expenditure_resaon=json_encode($request->product_other_expenditure_resaon)??Null;

        // $vendorProduct->product_other_expenditure_currency_type=json_encode($request->product_other_expenditure_currency_type)??Null;

        $vendorProduct->product_specification_heading=isset($request->product_specification_heading[0])?json_encode($request->product_specfication_heading):Null;
        $vendorProduct->product_specification=json_encode($request->product_specification) ?? Null;

        $vendorProduct->product_specification_details=json_encode($request->product_specification_details) ?? Null;

        // $vendorProduct->product_discount_name=json_encode($request->product_discount_name) ?? Null;

        // $vendorProduct->product_discount_percentage=json_encode($request->product_discount_percentage)?? Null;

        // $vendorProduct->product_discount_start_date= json_encode($request->product_discount_start_date)?? Null;

        // $vendorProduct->product_discount_end_date=json_encode($request->product_discount_end_date) ?? Null;

        // $vendorProduct->product_discount_detail=json_encode($request->product_discount_detail) ?? Null;
        

        if($request->hasFile('product_banner_image')){
            $originName=$request->file('product_banner_image')->getClientOriginalName();
            $fileName=pathinfo($originName,PATHINFO_FILENAME);
            $extension=$request->file('product_banner_image')->getClientOriginalExtension();
            $fileName=$fileName.'__'.time().'.'.$extension;
            $request->file('product_banner_image')->move(public_path('product/banner'),$fileName);
          
            $vendorProduct->product_banner_image=$fileName;

        }

        if($request->hasFile('product_image_gallery')){

            $product_image_file_name=[];
            foreach($request->file('product_image_gallery') as $image){
                $originName=$image->getClientOriginalName();
                $fileName=pathinfo($originName,PATHINFO_FILENAME);
                $extension=$image->getClientOriginalExtension();

                $fileName=$fileName.'__'.time().'.'.$extension;

                
                $image->move(public_path('product/gallery'),$fileName);

                array_push($product_image_file_name,$fileName);

            }


            $vendorProduct->product_image_gallery=json_encode($product_image_file_name);





        }

        if($request->hasFile('product_color_banner_image')){

            $product_color_banner_image_file_name=[];
            foreach($request->file('product_color_banner_image') as $image){
                
                $originName=$image->getClientOriginalName();
                $fileName=pathinfo($originName,PATHINFO_FILENAME);
                $extension=$image->getClientOriginalExtension();

                $fileName=$fileName.'__'.time().'.'.$extension;

                
                $image->move(public_path('product/gallery'),$fileName);

                array_push($product_color_banner_image_file_name,$fileName);

            }


            $vendorProduct->product_color_banner_image=json_encode($product_color_banner_image_file_name);





        }


        if(isset($request->product_color_image_gallery)){
            $product_color_image_gallery_file_name=[];
            foreach($request->product_color_image_gallery as $k=>$images){

                

                foreach($images as $l=>$img){

                    $originName=$img->getClientOriginalName();
                    $fileName=pathinfo($originName,PATHINFO_FILENAME);
                    $extension=$img->getClientOriginalExtension();
    
                    $fileName=$fileName.'__'.time().'.'.$extension;
    
                    
                    $img->move(public_path('product/gallery'),$fileName);
    
                    $product_color_image_gallery_file_name[$k][$l]=$fileName;


                }

            }
            $vendorProduct->product_color_image_gallery=json_encode($product_color_image_gallery_file_name);
        }

       








        $vendorProduct->save();



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


    public function bulkimport(Request $request){
        return view('vendors.products.import');

    }

    public function importproductdata(Request $request){
    
        $request->validate([
            'import_product_file' => 'required|max:2048', 
        ]);
   
        $productImport = new VendorProductImport();
        Excel::import($productImport, $request->file('import_product_file'));

        // dd($productImport->response); 
                 
        return response()->json($productImport->response);
    }






}

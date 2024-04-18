@extends('vendors.layouts.main')
@section('title', 'Vendor Add Product')
@section('content')
    <style>
        .form {
            margin: 80px 0px 20px;
            padding: 0px 50px;
        }

        .form h2 {
            text-align: center;
            color: #acacac;
            font-size: 40px;
            font-weight: 400;
        }

        .form .grid {
            margin-top: 50px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }

        .form .grid .form-element {
            width: 200px;
            height: 200px;
            box-shadow: 0px 0px 20px 5px rgba(100, 100, 100, 0.1);
        }

        .form .grid .form-element input {
            display: none;
        }

        .form .grid .form-element img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .form .grid .form-element div {
            position: relative;
            height: 40px;
            margin-top: -40px;
            background: rgba(0, 0, 0, 0.5);
            text-align: center;
            line-height: 40px;
            font-size: 13px;
            color: #f5f5f5;
            font-weight: 600;
        }

        .form .grid .form-element div span {
            font-size: 40px;
        }

        /* accordian css */
    </style>


    @include('websitelayout.loader');



    <section id="main_content">

        <div class="container py-3">


            <div class="row py-4">
                <div class="col-md-12 d-flex justify-content-between">
                    <h3>Product</h3>
                    <button class="btn btn-success btn-sm ">Add More Product</button>
                </div>
            </div>
            <form class="row g-3">

                <div class="col-md-12">
                    <div class="row" id="productcategoryelement">
                        <div class="col-md-4" id="main_product_category">
                            <label for="" class="form-label">Category</label>
                            <select name="product_category[]" onchange="selectSubproductcategory(this)" class="form-select"
                                aria-label="Default select example">

                                <option selected disabled>Open this select menu</option>
                                @foreach ($product_category as $data)
                                    <option value="{{ $data->id }}">{{ ucwords($data->name) }}</option>
                                @endforeach
                            </select>



                        </div>




                    </div>







                </div>




                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="product_title[]" class="form-control" id="inputEmail4"
                                autocomplete="off">
                        </div>
                    </div>

                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">Brand Name</label>
                            <select name="product_brandid[]" class="form-select" aria-label="Default select example">


                                <option selected disabled>Open this select menu</option>
                                @foreach ($product_brands as $data)
                                    <option value="{{ $data->id }}">{{ ucwords($data->name) }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">Product Quantity</label>
                            <input type="number" name="product_quantity[]" class="form-control" id="inputEmail4"
                                autocomplete="off">
                        </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <label for="" class="form-label">Discription</label>
                    <div class="form-floating">
                        <textarea class="form-control editor" name="product_dec[]" placeholder="Leave a comment here" id=""
                            style="height: 100px"></textarea>
                    </div>
                </div>






                <h4> Product measurment and price detail</h4>

                <div class="col-md-12 card py-4">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">Product Measurment Parameter</label>
                            <select id="inputState" name="product_mesurment_paraeter[]" class="form-select">
                                <option selected disabled> Please Select Parameter</option>
                                <option value="length">Length</option>
                                <option value="weight">Weight</option>
                                <option value="display">Display</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">Product Measurment Parameter Unit</label>
                            <select id="inputState" name="product_mesurment_unit[]" class="form-select">
                                <option selected disabled> Unit</option>
                                <option value="m">Meter</option>
                                <option value="gm">Gm</option>
                                <option value="inc">Inch</option>
                            </select>
                        </div>



                        <div class="row g-3 form-group">
                            <div class="col-md-12 card " id="productpricecontainer">
                                <div class="col-md-12 py-4 d-flex justify-content-end">
                                    <span class="btn btn-success btn-sm px-3" onclick="productpricedetail()">+</span>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 py-3">
                                        <label for="inputAddress" name="product_mesurment_quantity[][]"
                                            class="form-label">Product
                                            Measurment Quantity</label>
                                        <input type="text" class="form-control" id="" autocomplete="off">
                                    </div>
                                    <div class="col-md-3 py-3">
                                        <label for="inputAddress" name="product_quantity_price[][]"
                                            class="form-label">Price(MRP)</label>
                                        <input type="text" class="form-control" id="" autocomplete="off">
                                    </div>
                                    <div class="col-md-3 py-3">
                                        <label for="inputcurrency" class="form-label">Currency Type</label>
                                        <select id="inputcurrency" name="product_currency_type[][]" class="form-select">
                                            <option selected disabled> Unit</option>
                                            <option value="inr">INR</option>
                                            <option value="usd">USD</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

                <h4 class="mt-5">Others Expenditure Product Cost</h4>
                <div class="col-md-12 card py-4" id="otherexpendure">
                    <div class="col-md-12 px-5 d-flex justify-content-end">
                        <span class="btn btn-success btn-sm px-3" onclick="addOtherExpendureCost()">+</span>
                    </div>
                    <div class="row">
                        <div class="col-md-3 px-5">
                            <label for="inputAddress" name="product_other_expenditure[][]"
                                class="form-label">Name</label>
                            <input type="text" class="form-control" id="" autocomplete="off">
                        </div>
                        <div class="col-md-3 px-5">
                            <label for="inputAddress" class="form-label">Price</label>
                            <input type="text" class="form-control" name="product_other_price[][]" id=""
                                autocomplete="off">
                        </div>

                        <div class="col-md-3 px-5">
                            <label for="inputAddress" class="form-label">Currency Type</label>
                            <select id="inputcurrency" name="product_other_currency_type[][]" class="form-select">
                                <option selected disabled> Unit</option>
                                <option value="inr">INR</option>
                                <option value="usd">USD</option>

                            </select>
                        </div>

                        <div class="col-md-9 px-5">
                            <label for="inputAddress" class="form-label">Reason</label>
                            <div class="form-floating">
                                <textarea class="form-control editor" name="product_other_expenditure_resaon[][]" placeholder="Leave a comment here"
                                    id="floatingTextarea2" style="height: 100px"></textarea>
                            </div>
                        </div>


                    </div>


                </div>




                <h4 class="mt-5">Specification</h4>
                <div class="col-md-12 card py-4" id="productspecfictaioncontainer">
                    <div class="col-md-12 px-5 d-flex justify-content-end">
                        <span class="btn btn-success btn-sm px-3" onclick="addMoreProductSpecfiction()">+</span>
                    </div>
                    <div class="row">
                        <div class="col-md-3 px-5">
                            <label for="product_specfication" class="form-label">Name</label>
                            <input type="text" name="product_specfiction[][]" class="form-control"
                                id="product_specfication" autocomplete="off">
                        </div>
                        <div class="col-md-3 px-5">
                            <label for="product_details" class="form-label">Detail</label>
                            <input type="text" name="product_details[][]" class="form-control" id="product_details"
                                autocomplete="off">
                        </div>


                    </div>


                </div>

                <h4 class="mt-5">Discount Detail</h4>
                <div class="col-md-12 card py-4" id="product_dicount_container">
                    <div class="col-md-12 px-5 d-flex justify-content-end">
                        <span class="btn btn-success btn-sm px-3" onclick="addMoreDiscount()">+</span>
                    </div>

                    <div class="row">
                        <div class="col-md-3 px-5">
                            <label for="discountname" class="form-label">Name</label>
                            <input type="text" id="discountname" class="form-control"
                                name="product_discount_detail_name[][]" autocomplete="off">
                        </div>

                        <div class="col-md-3 px-5">
                            <label for="discountpercentage" class="form-label">Amount(in percentage)</label>
                            <input type="text" id="discountpercentage" class="form-control"
                                name="product_discount_percentage[][]" autocomplete="off">
                        </div>


                        <div class="col-md-3 px-5">
                            <label for="product_discount_start_date" class="form-label">start Date</label>
                            <input type="date" class="form-control" name="product_discount_start_date[][]"
                                id="product_discount_start_date" autocomplete="off">
                        </div>
                        <div class="col-md-3 px-5">
                            <label for="product_discount_end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" name="product_discount_end_date[][]"
                                id="product_discount_end_date" autocomplete="off">
                        </div>

                        <div class="col-md-9 px-5">
                            <label for="product_discount_detail" class="form-label">Deatls</label>
                            <div class="form-floating">
                                <textarea class="form-control editor" name="product_discount_detail[][]" placeholder="Leave a comment here"
                                    id="product_discount_detail" style="height: 100px"></textarea>
                            </div>
                        </div>

                    </div>


                </div>

                <h4 class="mt-5">Product Image</h4>


                <div class="col-md-12 card py-4">

                    <div class="col-md-12 pl-2">
                        <label for="inputAddress" class="form-label">Please select banner image of products</label>
                        <div class="form">

                            <div class="grid">
                                <div class="form-element" onclick=" previewBeforeUpload('file-banner')">
                                    <input type="file" name="product_banner_image[]" id="file-banner"
                                        accept="image/*">
                                    <label for="file-banner" id="file-banner-preview">
                                        <img src="{{ asset('img/imagepreviewupload.jpg') }}" alt="">
                                        <div>
                                            <span>+</span>
                                        </div>
                                    </label>
                                </div>


                            </div>
                        </div>
                    </div>





                    <div class="col-md-12 px-5 d-flex justify-content-end">
                        <span class="btn btn-success btn-sm px-3" onclick="addMoreImage()">+</span>
                    </div>
                    <input type="hidden" value="1" id="imageintial" />

                    <div class="row">
                        <div class="col-md-12 pl-2">
                            <label for="inputAddress" class="form-label">Please select Image</label>
                            <div class="form">

                                <div class="grid" id="product_gallery">
                                    <div class="form-element" onclick="previewBeforeUpload('file-1')">
                                        <input type="file" name="product_gallery[][]" id="file-1"
                                            accept="image/*">
                                        <label for="file-1" id="file-1-preview">
                                            <img src="{{ asset('img/imagepreviewupload.jpg') }}">
                                            <div>
                                                <span>+</span>
                                            </div>
                                        </label>
                                    </div>


                                </div>
                            </div>
                        </div>


                    </div>


                </div>


            </form>


            <div class="col-md-12 d-flex justify-content-around py-3">
                <button class="btn btn-primary btn-sm px-3">Save</button>
            </div>
        </div>

        <section>



        @endsection

        @section('page-script')
            <script src="{{ asset('ckeditor5/ckeditor.js') }}"></script>

            <script>
                function ckeditorLoad() {
                    document.addEventListener('DOMContentLoaded', function() {
                        // Get all textarea elements with class 'editor'
                        var textareas = document.querySelectorAll('.editor');

                        // Loop through each textarea element and initialize ClassicEditor
                        textareas.forEach(function(textarea) {
                            ClassicEditor
                                .create(textarea)
                                .catch(function(error) {
                                    console.error(error);
                                });
                        });
                    });
                }

                ckeditorLoad();
                // ClassicEditor
                //     .create(document.querySelector('.editor'))
                //     .catch(error => {
                //         console.error(error);
                //     });


                function previewBeforeUpload(id) {
                    document.querySelector("#" + id).addEventListener("change", function(e) {
                        if (e.target.files.length == 0) {
                            return;
                        }
                        let file = e.target.files[0];
                        let url = URL.createObjectURL(file);
                        document.querySelector("#" + id + "-preview div").innerText = file.name;
                        document.querySelector("#" + id + "-preview img").src = url;
                    });
                }



                var imageintialId = 1;

                function addMoreImage() {
                    imageintialId++;



                    let imageHTML = `<div class="form-element" onclick="previewBeforeUpload('file-${imageintialId}')">
                                        <input type="file" name="product_gallery[][]" id="file-${imageintialId}"
                                            accept="image/*">
                                        <label for="file-${imageintialId}" id="file-${imageintialId}-preview">
                                            <img src="{{ asset('img/imagepreviewupload.jpg') }}">
                                            <div>
                                                <span>+</span>
                                            </div>
                                        </label>
                                    </div>`;

                    $("#product_gallery").append(imageHTML);



                }

                var discountcontainer = 1;

                function addMoreDiscount() {
                    discountcontainer++;

                    let discontHTML = `  <div class="row" >   <div class="col-md-3 px-5">
                            <label for="discountname${discountcontainer}" class="form-label">Name</label>
                            <input type="text" id="discountname${discountcontainer}" class="form-control"
                                name="product_discount_detail_name[][]" autocomplete="off">
                        </div>

                        <div class="col-md-3 px-5">
                            <label for="discountpercentage${discountcontainer}" class="form-label">Amount(in percentage)</label>
                            <input type="text" id="discountpercentage${discountcontainer}" class="form-control"
                                name="product_discount_percentage[][]" autocomplete="off">
                        </div>


                        <div class="col-md-3 px-5">
                            <label for="product_discount_start_date${discountcontainer}" class="form-label">start Date</label>
                            <input type="date" class="form-control" name="product_discount_start_date[][]"
                                id="product_discount_start_date${discountcontainer}" autocomplete="off">
                        </div>
                        <div class="col-md-3 px-5">
                            <label for="product_discount_end_date${discountcontainer}" class="form-label">End Date</label>
                            <input type="date" class="form-control" name="product_discount_end_date[][]"
                                id="product_discount_end_date${discountcontainer}" autocomplete="off">
                        </div>

                        <div class="col-md-9 px-5">
                            <label for="inputAddress" class="form-label">Deatls</label>
                            <div class="form-floating">
                                <textarea class="form-control editor" name="product_discount_detail[][]" placeholder="Leave a comment here"
                                    id="product_discount_details_editor${discountcontainer}" style="height: 100px"></textarea>
                            </div>
                        </div></div>`;

                    $("#product_dicount_container").append(discontHTML);



                    ClassicEditor
                        .create(document.querySelector(`#product_discount_details_editor${discountcontainer}`))
                        .catch(error => {
                            console.error(error);
                        });

                }


                var productSpecfiction = 1;

                function addMoreProductSpecfiction() {
                    productSpecfiction++;

                    let specificationHTML = `  <div class="row">
                        <div class="col-md-3 px-5">
                            <label for="product_specfication${productSpecfiction}" class="form-label">Name</label>
                            <input type="text" name="product_specfiction[][]" class="form-control"
                                id="product_specfication${productSpecfiction}" autocomplete="off">
                        </div>
                        <div class="col-md-3 px-5">
                            <label for="product_details${productSpecfiction}" class="form-label">Detail</label>
                            <input type="text" name="product_details[][]" class="form-control" id="product_details${productSpecfiction}"
                                autocomplete="off">
                        </div>


                    </div>`;


                    $("#productspecfictaioncontainer").append(specificationHTML);




                }


                var productpricedetailId = 1;

                function productpricedetail() {
                    productpricedetailId++;

                    let productpricedetailHTML = `  <div class="row">
                        <div class="col-md-3 py-3">
                            <label for="product_mesurment_quantity${productpricedetailId}" name="product_mesurment_quantity[][]"
                                class="form-label">Product
                                Measurment Quantity</label>
                            <input type="text" class="form-control" id="product_mesurment_quantity${productpricedetailId}" autocomplete="off">
                        </div>
                        <div class="col-md-3 py-3">
                            <label for="inputAddress" name="product_quantity_price[][]"
                                class="form-label">Price(MRP)</label>
                            <input type="text" class="form-control" id="product_quantity_price${productpricedetailId}" autocomplete="off">
                        </div>
                        <div class="col-md-3 py-3">
                            <label for="product_currency_type${productpricedetailId}" class="form-label">Currency Type</label>
                            <select id="product_currency_type${productpricedetailId}" name="product_currency_type[][]" class="form-select">
                                <option selected disabled> Unit</option>
                                <option value="inr">INR</option>
                                <option value="usd">USD</option>

                            </select>
                        </div>
                    </div>`;


                    $("#productpricecontainer").append(productpricedetailHTML);



                }

                var otherExpendureId = 1;

                function addOtherExpendureCost() {
                    otherExpendureId++;
                    let otherExpendureHTML = ` <div class="row">
                        <div class="col-md-3 px-5">
                            <label for="inputAddress" name="product_other_expenditure[][]"
                                class="form-label">Name</label>
                            <input type="text" class="form-control" id="" autocomplete="off">
                        </div>
                        <div class="col-md-3 px-5">
                            <label for="inputAddress" class="form-label">Price</label>
                            <input type="text" class="form-control" name="product_other_price[][]" id=""
                                autocomplete="off">
                        </div>

                        <div class="col-md-3 px-5">
                            <label for="inputAddress" class="form-label">Currency Type</label>
                            <select id="inputcurrency" name="product_other_currency_type[][]" class="form-select">
                                <option selected disabled> Unit</option>
                                <option value="inr">INR</option>
                                <option value="usd">USD</option>

                            </select>
                        </div>

                        <div class="col-md-9 px-5">
                            <label for="inputAddress" class="form-label">Reason</label>
                            <div class="form-floating">
                                <textarea class="form-control" id="product_other_expenditure_resaon${otherExpendureId}" name="product_other_expenditure_resaon[][]" placeholder="Leave a comment here"
                                    id="floatingTextarea2" style="height: 100px"></textarea>
                            </div>
                        </div>


                    </div>`;




                    $("#otherexpendure").append(otherExpendureHTML);



                    ClassicEditor
                        .create(document.querySelector(`#product_other_expenditure_resaon${otherExpendureId}`))
                        .catch(error => {
                            console.error(error);
                        })




                }




                function selectSubproductcategory(selectElement) {

                    let selectedvalue = selectElement.value;
                    let selectedtext = selectElement.options[selectElement.selectedIndex].text;





                    // let containers = document.querySelectorAll('.select-container');


                    $.ajax({
                        url: "{{ route('vendors-subproduct-categories') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            selectedvalue: selectedvalue,
                            selectedtext: selectedtext,

                        },
                        beforeSend: function() {

                            $('#loader').html('<div></div>');

                            $('#main_content').attr('class',
                                'demo');

                            let selectedParentElementId = selectElement.parentElement.id;
                            let divsToRemove = $(`#${selectedParentElementId}`).nextAll('div');

                            if (divsToRemove.length > 0) {
                                // Remove all subsequent div elements
                                divsToRemove.remove();
                            }





                        },
                        success: (data) => {

                            $('#loader').html('');
                            $('#main_content').removeAttr('class',
                                'demo');

                            $('#productcategoryelement').append(data.responsehtml);





                        },
                        error: (error) => {

                        }

                    })

                }
            </script>



        @endsection
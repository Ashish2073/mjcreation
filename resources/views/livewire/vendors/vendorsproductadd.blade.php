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
</style>



<div class="container py-3">
    <div class="row py-4">
        <div class="col-md-12 d-flex justify-content-between">
            <h3>Product</h3>
            <button class="btn btn-success btn-sm ">Add More Product</button>
        </div>
    </div>
    <form class="row g-3">

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label">Category</label>
                    <input type="text" class="form-control" id="inputEmail4" autocomplete="off">
                </div>
            </div>

        </div>




        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label">Title</label>
                    <input type="text" class="form-control" id="inputEmail4" autocomplete="off">
                </div>
            </div>

        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label">Brand Name</label>
                    <input type="text" class="form-control" id="inputEmail4" autocomplete="off">
                </div>
            </div>

        </div>
        <div class="col-md-12">
            <label for="" class="form-label">Discription</label>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>
        </div>
        <h4> Product measurment and price detail</h4>

        <div class="col-md-12 card py-4">
            <div class="row">
                <div class="col-md-6">
                    <label for="inputAddress" class="form-label">Product Measurment Parameter</label>
                    <select id="inputState" class="form-select">
                        <option selected>Parameter</option>
                        <option>product 1</option>
                        <option>prduct 2</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputAddress" class="form-label">Product Measurment Parameter Unit</label>
                    <select id="inputState" class="form-select">
                        <option selected> Unit</option>
                        <option>unit 1</option>
                        <option>unit 2</option>
                    </select>
                </div>

                <form class="row g-3 form-group">
                    <div class="col-md-12 py-4 d-flex justify-content-end">
                        <button class="btn btn-success btn-sm px-3">+</button>
                    </div>
                    <div class="col-md-3 py-3">
                        <label for="inputAddress" class="form-label">Product Measurment Quantity</label>
                        <input type="text" class="form-control" id="" autocomplete="off">
                    </div>
                    <div class="col-md-3 py-3">
                        <label for="inputAddress" class="form-label">Price(MRP)</label>
                        <input type="text" class="form-control" id="" autocomplete="off">
                    </div>
                    <div class="col-md-3 py-3">
                        <label for="inputAddress" class="form-label">Currency Type</label>
                        <input type="text" class="form-control" id="" autocomplete="off">
                    </div>

                </form>
            </div>


        </div>

        <h4 class="mt-5">Others Expenditure Product Cost</h4>
        <div class="col-md-12 card py-4">
            <div class="col-md-12 px-5 d-flex justify-content-end">
                <button class="btn btn-success btn-sm px-3">+</button>
            </div>
            <div class="row">
                <div class="col-md-3 px-5">
                    <label for="inputAddress" class="form-label">Name</label>
                    <input type="text" class="form-control" id="" autocomplete="off">
                </div>
                <div class="col-md-3 px-5">
                    <label for="inputAddress" class="form-label">Price</label>
                    <input type="text" class="form-control" id="" autocomplete="off">
                </div>

                <div class="col-md-3 px-5">
                    <label for="inputAddress" class="form-label">Currency Type</label>
                    <input type="text" class="form-control" id="" autocomplete="off">
                </div>

                <div class="col-md-9 px-5">
                    <label for="inputAddress" class="form-label">Reason</label>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    </div>
                </div>


            </div>


        </div>




        <h4 class="mt-5">Specification</h4>
        <div class="col-md-12 card py-4">
            <div class="col-md-12 px-5 d-flex justify-content-end">
                <button class="btn btn-success btn-sm px-3">+</button>
            </div>
            <div class="row">
                <div class="col-md-3 px-5">
                    <label for="inputAddress" class="form-label">Name</label>
                    <input type="text" class="form-control" id="" autocomplete="off">
                </div>
                <div class="col-md-3 px-5">
                    <label for="inputAddress" class="form-label">Detail</label>
                    <input type="text" class="form-control" id="" autocomplete="off">
                </div>


            </div>


        </div>

        <h4 class="mt-5">Discount Detail</h4>
        <div class="col-md-12 card py-4">
            <div class="col-md-12 px-5 d-flex justify-content-end">
                <button class="btn btn-success btn-sm px-3">+</button>
            </div>

            <div class="row">
                <div class="col-md-3 px-5">
                    <label for="inputAddress" class="form-label">Name</label>
                    <input type="text" class="form-control" id="" autocomplete="off">
                </div>

                <div class="col-md-3 px-5">
                    <label for="inputAddress" class="form-label">Amount(in percentage)</label>
                    <input type="text" class="form-control" id="" autocomplete="off">
                </div>


                <div class="col-md-3 px-5">
                    <label for="inputAddress" class="form-label">start Date</label>
                    <input type="date" class="form-control" id="" autocomplete="off">
                </div>
                <div class="col-md-3 px-5">
                    <label for="inputAddress" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="" autocomplete="off">
                </div>

                <div class="col-md-9 px-5">
                    <label for="inputAddress" class="form-label">Deatls</label>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    </div>
                </div>

            </div>


        </div>

        <h4 class="mt-5">Product Image</h4>
        <div class="col-md-12 card py-4">
            <div class="col-md-12 px-5 d-flex justify-content-end">
                <button class="btn btn-success btn-sm px-3">+</button>
            </div>

            <div class="row">
                <div class="col-md-12 pl-2">
                    <label for="inputAddress" class="form-label">Please select Image</label>
                    <div class="form">

                        <div class="grid">
                            <div class="form-element">
                                <input type="file" id="file-1" accept="image/*">
                                <label for="file-1" id="file-1-preview">
                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                    <div>
                                        <span>+</span>
                                    </div>
                                </label>
                            </div>
                            <div class="form-element">
                                <input type="file" id="file-2" accept="image/*">
                                <label for="file-2" id="file-2-preview">
                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                    <div>
                                        <span>+</span>
                                    </div>
                                </label>
                            </div>
                            <div class="form-element">
                                <input type="file" id="file-3" accept="image/*">
                                <label for="file-3" id="file-3-preview">
                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                    <div>
                                        <span>+</span>
                                    </div>
                                </label>
                            </div>
                            <div class="form-element">
                                <input type="file" id="file-3" accept="image/*">
                                <label for="file-3" id="file-3-preview">
                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                    <div>
                                        <span>+</span>
                                    </div>
                                </label>
                            </div>

                            <div class="form-element">
                                <input type="file" id="file-3" accept="image/*">
                                <label for="file-3" id="file-3-preview">
                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                    <div>
                                        <span>+</span>
                                    </div>
                                </label>
                            </div>

                            <div class="form-element">
                                <input type="file" id="file-3" accept="image/*">
                                <label for="file-3" id="file-3-preview">
                                    <img src="https://bit.ly/3ubuq5o" alt="">
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

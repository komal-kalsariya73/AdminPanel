<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content  ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Add Orders</h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus
                                    vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#"
                                                    class="breadcrumb-link">Order</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">E-Commerce Order</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- valifation types -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">

                                <div class="card-body">
                                    <form id="validationform" data-parsley-validate="" novalidate="" class=" m-auto w-50 shadow p-4">
                                        <h2 class="text-center">Add Orders</h2>


                                        <label class="col-12 col-sm-3 m-0 p-0">Customer Name</label>
                                        <div class="form-group row">

                                            <div class="col-12 col-sm-8 col-lg-12">
                                            <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-box"></i></span>
                                                    <select id="customer" class="form-control pl-5" aria-label="Default select example" required onchange="disableCustomerSelect()">
                                                        <option value="">Select Customer Name</option>
                                                       
                                                    </select>
                                                   
                                                </div>
                                                <p id="message" style="color:red"></p>
                                            </div>
                                        </div>

                                        <label class="col-12 col-sm-3 m-0 p-0">Product Name</label>
                                        <div class="form-group row">

                                            <div class="col-12 col-sm-8 col-lg-12">
                                            <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-box"></i></span>
                                                    <select id="product" class="form-control pl-5" aria-label="Default select example">
                                                        <option value="">Select Product</option>
                                                     
                                                    </select>
                                                  
                                                </div>
                                                <p id="message1" style="color:red"></p>
                                            </div>
                                        </div>
                                        <p id="message3" style="color:red"></p>
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-12 offset-sm-1 offset-lg-0">
                                                <button type="submit" class="btn btn-space" style="background:#07193e;color:white" id="addMoreBtn">Add more</button>
                                                <!-- <button class="btn btn-space btn-secondary">Cancel</button> -->
                                            </div>
                                        </div>
                                    </form>

                                    <div class="row">
                                        <!-- ============================================================== -->
                                        <!-- basic table  -->
                                        <!-- ============================================================== -->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
                                            <div class="card">
                                                <div class="d-flex">
                                                    <h5 class="card-header p-2 flex-grow-1">Orders</h5>
                                                    <!-- <a href="addOrder.php"><button
                                                class="p-2 m-2 border-0 font-monospace btn-danger">Add
                                                Order</button></a> -->
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered first  m-auto tbldisplay" id="orderTable">
                                                            <thead class="" style="background:#0E0C28">
                                                                <tr>
                                                                    <th style="color:white">Product</th>
                                                                    <th style="color:white">Price</th>
                                                                    <th style="color:white">Qntity</th>
                                                                    <th style="color:white">Total</th>
                                                                    <th style="color:white">Action</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>






                                                            </tbody>

                                                        </table>
                                                        <div class="text-right">
                                                            <strong>Total Price:</strong> $<span id="totalPrice">0</span>
                                                        </div>
                                                        <p id="demo1"></p>
                                                    </div>
                                                    <!-- <button type="button" class="btn btn-success mt-3 float-end" id="submitOrderBtn">Submit Order</button> -->
                                                    <div class="form-group row text-right">
                                                        <div class="col col-sm-10 col-lg-12 offset-sm-1 offset-lg-0">
                                                            <button type="submit" class="btn btn-space" style="background:#07193e;color:white" id="submitOrderBtn">Submit</button>
                                                            <!-- <button class="btn btn-space btn-secondary">Cancel</button> -->
                                                        </div>
                                                    </div>
                                                    <p id="text1" style="color:red"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ============================================================== -->
                                        <!-- end basic table  -->
                                        <!-- ============================================================== -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end valifation types -->
                        <!-- ============================================================== -->
                    </div>
                </div>
            </div>

<?= $this->endSection(); ?>

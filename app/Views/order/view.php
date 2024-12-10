<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">All Orders</h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus
                                    vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Order</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">E-Commerce Order</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- basic table  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="d-flex">
                                        <h5 class="card-header p-2 flex-grow-1">Orders</h5>
                                        <a href="addOrder.php">
                                            <button class="p-2 m-2 border-0 font-monospace" style="background:#07193e;color:white">Add Order</button>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered first">
                                                <thead style="background:#0E0C28">
                                                    <tr>
                                                        <th style="color:white">Customer Name</th>
                                                        <th style="color:white">Product Name</th>
                                                        <th style="color:white">Quantity</th>
                                                        <th style="color:white">Price</th>
                                                        <th style="color:white">Pincode</th>
                                                        <th style="color:white">Address</th>
                                                        <th style="color:white">Order Date</th>
                                                        <th style="color:white">Order Status</th>
                                                        <th style="color:white">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    </tbody>
                                            </table>
                                        </div>
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
           
<?= $this->endSection(); ?>

<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>


<div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">All Customers</h2>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Customer</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="d-flex">
                    <h5 class="card-header p-2 flex-grow-1">Customer</h5>
                    <a href="addCustomer.php"><button class="p-2 m-2 border-0 font-monospace" style="background:#07193e;color:white">Add Customer</button></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-bordered first">
                            <thead class="" style="background:#0E0C28">
                                <tr>
                                    <th style="color:white">Name</th>
                                    <th style="color:white">Email</th>
                                    <th style="color:white">City</th>
                                    <th style="color:white">Pincode</th>
                                    <th style="color:white">Address</th>
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
    <!-- ============================================================== -->
    <!-- end data table  -->
    <!-- ============================================================== -->




</div>
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- end footer -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->


<?= $this->endSection(); ?>
<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content">
        <!-- Page Header -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Category</h2>
                    <p class="pageheader-text">Manage and organize product categories efficiently.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Category</a></li>
                                <li class="breadcrumb-item active" aria-current="page">E-Commerce Category</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Category Form -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="h-100">
                    <div class="card-body">
                        <form id="validationform" data-parsley-validate="" novalidate="" action="insertcategory.php" method="post" class="shadow w-50 p-4 m-auto bg-light">
                            <h2 class="text-center mb-4">Add Category</h2>
                            
                            <!-- Category Dropdown -->
                            <div class="form-group">
                                <label for="category" class="form-label">Select Parent Category</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                                    <select class="form-control" id="parent-category" name="parent_category" required>
                                        <option value="" selected disabled>Select a category</option>
                                        <!-- Example options -->
                                        <option value="electronics">Electronics</option>
                                        <option value="clothing">Clothing</option>
                                        <option value="home-appliances">Home Appliances</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Add New Category Input -->
                           
                            <!-- Submit Button -->
                            <div class="float-end">
                                <button type="submit" class="btn" style="background:#07193e;color:white">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Table -->
        <div class="row mt-4">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center">
                       
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered w-75 m-auto">
                                <thead class="text-light" style="background:#07193e;color:white">
                                    <tr>
                                        <th class="text-light">Category Name</th>
                                        <th class="text-light">Parent Category</th>
                                        <th class="text-light">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                    <!-- Dynamic rows go here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>

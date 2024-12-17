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
                        <form id="categoryForm" data-parsley-validate="" novalidate="" action="" method="post" class="shadow w-50 p-4 m-auto bg-light">
                            <h2 class="text-center mb-4">Add Category</h2>
                            <input type="hidden" id="id" name="id">
                            <!-- Category Dropdown -->
                            <div class="form-group">
                                <label for="category" class="form-label">Select Parent Category</label>
                                <div class="input-group">
                           <span class="input-group-text"><i class="fas fa-shopping-cart"></i></span>
                           <input type="text" class="form-control" id="category" name="category" placeholder="Enter product category" required>
                        </div>
                                <div id="categoryError" class="error text-danger"></div>
                            </div>

                            <!-- Add New Category Input -->
                           
                            <!-- Submit Button -->
                            <div class="float-end">
                                <button type="submit" class="btn" style="background:#07193e;color:white">Add Category</button>
                            </div>
                            <div id="response_message" class="success-message"></div>
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
                            <table class="table table-striped table-hover table-bordered w-75 m-auto" id="myTable">
                                <thead class="text-light" style="background:#07193e;color:white">
                                    <tr>
                                        <th class="text-light">Category Name</th>
                                    
                                        <th class="text-light">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function loadCategories() {
            $.get("<?= base_url('/category/fetch') ?>", function(data) {
                let rows = '';
                data.forEach(category => {
                    rows += `
                    <tr id="category-${category.id}">
                        <td>${category.category}</td>
                        <td>
                            <a href="javascript:void(0)" class="edit-btn text-primary me-3" data-id="${category.id}">
                            <i class='align-middle me-2' data-feather='edit'></i>
                            </a>
                            <a href="javascript:void(0)" class="delete-btn text-danger" data-id="${category.id}">
                            <i class='align-middle' data-feather='trash-2'></i>
                            </a>
                        </td>
                    </tr>
                `;
                });
                $('#myTable tbody').html(rows);
                feather.replace();
            });
        }

        loadCategories();

        $('#categoryForm').on('submit', function(e) {
            e.preventDefault();
            const formData = $(this).serialize();
            const action = $('#id').val() ? 'update' : 'insert';

            $.post(`<?= base_url('/category/') ?>${action}`, formData, function(response) {
                if (response.success) {
                    $('#response_message').html(`<p class="text-success">${response.message}</p>`);
                    loadCategories();
                    $('#categoryForm')[0].reset();
                } else {
                    $.each(response.errors, function(key, value) {
                        $(`#${key}Error`).html(value);
                    });
                }
            });
        });

        $('#myTable').on('click', '.edit-btn', function() {
            const id = $(this).data('id');
            $.get(`<?= base_url('/category/fetchCategory/') ?>${id}`, function(response) {
                if (response.success) {
                    $('#id').val(response.data.id);
                    $('#category').val(response.data.category);
                }
            });
        });

        $('#myTable').on('click', '.delete-btn', function() {
            const id = $(this).data('id');
            if (confirm('Are you sure you want to delete this category?')) {
                $.ajax({
                    url: `<?= base_url('/category/delete/') ?>${id}`,
                    type: 'POST',
                    success: function(response) {
                        if (response.success) {
                            $(`#category-${id}`).remove();
                        }
                    }
                });
            }
        });
    });
</script>

<?= $this->endSection(); ?>

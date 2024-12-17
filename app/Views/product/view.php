<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<style>
    .card{
        height: 600px;
    }
</style>
<div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">All Products</h2>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Products</li>
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
                    <h5 class="card-header p-2 flex-grow-1">Products</h5>
                    <a href="<?= base_url('/product/create')?>"><button class="p-2 m-2 border-0 font-monospace" style="background:#07193e;color:white">Add Product</button></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first" id="myTable">
                            <thead class="" style="background:#0E0C28">
                                <tr>
                                  
                                    <th style="color:white">Product Name</th>

                                    <th style="color:white">Price</th>
                                  
                                    <th style="color:white">Qntity</th>
                                    <th style="color:white">Stock</th>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script> 

<script>
 $(document).ready(function() {
        function loadCustomers() {
            $.ajax({
                url: "<?= site_url('product/getProducts'); ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var rows = '';
                    $.each(data, function(index, product) {

                        const profileImageUrl = product.image ? `<?= base_url('uploads/'); ?>${product.image}` : '<?= base_url('public/uploads/customers/default-avatar.jpg'); ?>';

                        rows += `
                        <tr id="product-${product.id}">
                            
                            <td>${product.name}</td>
                            <td>${product.price}</td>
                             <td>${product.quantity}</td>
                            <td>${product.stock}</td>
                           
                            <td>
                                <a href="<?= base_url('/product/display') ?>?id=${product.id}">
                                    <i class='align-middle me-2' data-feather='eye'></i>
                                </a>
                                <a href="<?= base_url('/product/create') ?>?id=${product.id}">
                                    <i class='align-middle me-2' data-feather='edit'></i>
                                </a>
                                <a href="javascript:void(0);" class="delete-btn" data-id="${product.id}">
                                    <i class='align-middle me-2' data-feather='trash-2'></i>
                                </a>
                            </td>
                        </tr>`;
                    });
                    $('#myTable tbody').html(rows);
                    feather.replace();
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data: ' + error);
                }
            });
        }

        loadCustomers();

        $('#myTable').on('click', '.delete-btn', function() {
            const productId = $(this).data('id');
            if (confirm('Are you sure you want to delete this product?')) {
                $.ajax({
                    url: `<?= site_url('product/delete'); ?>/${productId}`,
                    type: "POST",
                    success: function(response) {
                        if (response.success) {
                            $(`#product-${productId}`).remove();
                            alert(response.message);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Error deleting record: ' + error);
                    }
                });
            }
        });
    });
</script>

<?= $this->endSection(); ?>
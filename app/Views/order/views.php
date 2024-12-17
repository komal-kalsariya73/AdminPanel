<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<style>
    .card{
        height: 600px;
    }
</style>
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
                            <a href="<?= base_url('order/view')?>">
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
                                          
                                            <th style="color:white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="orderTableBody">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

<script>
    $(document).ready(function() {
        function loadOrders() {
            $.ajax({
                url: "<?= site_url('order/getOrders'); ?>", 
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var rows = '';
                    $.each(data, function(index, order) {
                        
                        rows += `
                            <tr id="order-${order.id}">
                                <td>${order.customer_name}</td>
                                <td>${order.product_name}</td>
                                <td>${order.quantity}</td>
                                <td>${order.price}</td>
                                <td>${order.pincode}</td>
                                <td>${order.address}</td>
                                <td>${order.order_date}</td>
                               
                                <td>
                                    <a href="<?= base_url('/order/details')?>?id=${order.id}">
                                        <i class='align-middle me-2' data-feather='eye'></i>
                                    </a>
                                 
                                    <a href="javascript:void(0);" class="delete-btn" data-id="${order.id}">
                                        <i class='align-middle me-2' data-feather='trash-2'></i>
                                    </a>
                                </td>
                            </tr>
                        `;
                    });
                    $('#orderTableBody').html(rows); 
                    feather.replace(); 
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data: ' + error);
                }
            });
        }

        loadOrders();

        
        $('#orderTableBody').on('click', '.delete-btn', function() {
            const orderId = $(this).data('id');
            if (confirm('Are you sure you want to delete this order?')) {
                $.ajax({
                    url: `<?= site_url('order/delete'); ?>/${orderId}`,
                    type: "POST",
                    success: function(response) {
                        if (response.success) {
                            $(`#order-${orderId}`).remove();
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

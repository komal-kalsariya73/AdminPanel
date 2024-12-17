<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<style>
    .card {
        height: auto;
    }
    .table th, .table td {
        vertical-align: middle;
    }
</style>

<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 mt-4">
                <div class="page-header">
                    <h2 class="pageheader-title">Customer Order Details</h2>
                </div>
            </div>
        </div>

        <div class="student-profile py-4">
            <div class="row">

                <!-- Customer Information -->
                <div class="col-lg-4 mt-4">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0"><i class="far fa-user pr-1"></i> Customer Information</h3>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table">
                                <tr><th>First Name</th><td id="customer-firstname"></td></tr>
                                <tr><th>Last Name</th><td id="customer-lastname"></td></tr>
                                <tr><th>Gender</th><td id="customer-gender"></td></tr>
                                <tr><th>City</th><td id="customer-city"></td></tr>
                                <tr><th>Pincode</th><td id="customer-pincode"></td></tr>
                                <tr><th>Phone</th><td id="customer-phone"></td></tr>
                                <tr><th>Address</th><td id="customer-address"></td></tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Order Information -->
                <div class="col-lg-8 mt-4">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0"><i class="far fa-list-alt pr-1"></i> Order Details</h3>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="order-details-body"></tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        const params = new URLSearchParams(window.location.search);
        const orderId = params.get('id');

        if (orderId) {
            $.ajax({
                url: `<?= site_url('order/fetchBookingDetails'); ?>/${orderId}`,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        const data = response.data;

                        // Populate Customer Information
                        $('#customer-firstname').text(data.customer_name || 'N/A');
                        $('#customer-lastname').text(data.lastname || 'N/A');
                        $('#customer-gender').text(data.gender || 'N/A');
                        $('#customer-city').text(data.city || 'N/A');
                        $('#customer-pincode').text(data.pincode || 'N/A');
                        $('#customer-phone').text(data.phone || 'N/A');
                        $('#customer-address').text(data.address || 'N/A');

                        // Populate Product Order Details
                        const productRow = `
                            <tr>
                                <td>${data.product_name}</td>
                                <td>${data.quantity}</td>
                                <td>${data.price}</td>
                                <td>${(data.price * data.quantity).toFixed(2)}</td>
                            </tr>`;
                        $('#order-details-body').html(productRow);
                    } else {
                        alert('Order not found: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching details:', xhr.responseText || error);
                }
            });
        } else {
            alert('Order ID is missing in the URL.');
        }
    });
</script>

<?= $this->endSection(); ?>

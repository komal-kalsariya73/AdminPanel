<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Add Orders</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Order</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Order</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="orderForm" class="m-auto w-50 shadow p-4">
                            <h2 class="text-center">Add Orders</h2>

                            <label class="col-12 col-sm-3 m-0 p-0">Customer Name</label>
                            <div class="form-group row">
                                <div class="col-12 col-sm-8 col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <select id="customer" class="form-control" required>
                                            <option value="">Select Customer</option>
                                            <?php foreach ($customers as $customer): ?>
                                                <option value="<?= $customer['id']; ?>"><?= $customer['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                  
                                </div>
                            </div>

                            <label class="col-12 col-sm-3 m-0 p-0">Product Name</label>
                            <div class="form-group row">
                                <div class="col-12 col-sm-8 col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-box"></i></span>
                                        <select id="product" class="form-control" required>
                                            <option value="">Select Product</option>
                                            <?php foreach ($products as $product): ?>
                                                <option value="<?= $product['id']; ?>" data-price="<?= $product['price']; ?>"><?= $product['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <p id="message1" style="color:red"></p>
                                </div>
                            </div>

                            <label class="col-12 col-sm-3 m-0 p-0">Quantity</label>
                            <div class="form-group row">
                                <div class="col-12 col-sm-8 col-lg-12">
                                    <input type="number" id="quantity" class="form-control" min="1" value="1" required>
                                </div>
                            </div>
                            <p id="message" style="color:red"></p>
                            <div class="form-group row">
                                <div class="col-12 col-sm-8 col-lg-12">
                                    <button type="button" class="btn btn-space" style="background:#07193e;color:white" id="addMoreBtn">Add More</button>
                                </div>
                            </div>
                            <div id="responseMessage"></div>
                        </form>

                        <!-- Table to display order details -->
                        <div class="table-responsive mt-5">
                            <table class="table table-striped table-bordered" id="orderTable">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>

                            <div class="text-right">
                                <strong>Total Price:</strong> $<span id="totalPrice">0</span>
                            </div>

                            <button type="button" class="btn btn-success mt-3 float-end" id="submitOrderBtn">Submit Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add jQuery (if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    let totalPrice = 0;

    // Add product to the table
    $('#addMoreBtn').click(function () {
        const customerId = $('#customer').val();
        const productId = $('#product').val();
        const quantity = $('#quantity').val();

        if (!customerId || !productId || !quantity) {
            $('#message').text('Please fill in all fields!');
            return;
        }

        const productName = $('#product option:selected').text();
        const productPrice = $('#product option:selected').data('price');
        const total = productPrice * quantity;

        // Append the product details to the table
        $('#orderTable tbody').append(`
            <tr>
                <td>${productName}</td>
                <td>${productPrice}</td>
                <td><input type="number" class="form-control" value="${quantity}" min="1" onchange="updateTotal()"></td>
                <td class="product-total">${total}</td>
                <td><button type="button" class="btn btn-danger btn-sm" onclick="removeProduct(this)">Remove</button></td>
            </tr>
        `);

        totalPrice += total;
        $('#totalPrice').text(totalPrice);
    });

    
    function removeProduct(button) {
        const row = button.closest('tr');
        const productTotal = row.querySelector('.product-total').innerText;
        totalPrice -= parseFloat(productTotal);
        $('#totalPrice').text(totalPrice);
        row.remove();
    }

    
    function updateTotal() {
        totalPrice = 0;
        $('#orderTable tbody tr').each(function () {
            const quantity = $(this).find('input').val();
            const price = $(this).find('td').eq(1).text();
            const total = price * quantity;
            $(this).find('.product-total').text(total);
            totalPrice += total;
        });
        $('#totalPrice').text(totalPrice);
    }

    // Submit the order
    $('#submitOrderBtn').click(function () {
        const orderData = {
            customer_id: $('#customer').val(),
            product_id: $('#product').val(),
            quantity: $('#quantity').val(),
            total: totalPrice
        };

        $.ajax({
            url: '<?= base_url('order/addOrder'); ?>',
            method: 'POST',
            dataType: 'json',
            data: JSON.stringify(orderData),
            contentType: 'application/json',
            success: function (response) {
                if (response.status === 'success') {
                    $("#responseMessage").html('<p class="text-success">' + response.message + '<a href="<?= base_url('/order/views')?>">View</a>' + '</p>');
                    $("#orderForm")[0].reset();
                } else {
                    alert('Failed to submit order!');
                }
            },
            error: function () {
                alert('Error submitting order!');
            }
        });
    });
</script>

<?= $this->endSection(); ?>

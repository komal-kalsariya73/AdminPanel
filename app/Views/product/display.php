<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<style>
    .card{
        height: 650px;
    }
</style>

    <div class="container-fluid dashboard-content">
        <!-- Customer Profile -->
        <div id="customer-profile-container" class="student-profile py-4" style="display: none;">
            <div class="">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent text-center">
                             <img id="customer-profile-img" class="profile_img w-75" src="" alt="Customer Image" > 
                            </div>
                            <div class="card-body">
                                <p id="customer-name" class="mb-0 text-center text-dark"></p>
                                <p id="customer-email" class="mb-0 text-center text-dark"></p>
                             <a href="<?= base_url('/product/view')?>">   <button id="back-to-list" class="btn w-100 mt-3" style="background:#07193e;color:white">Back to List</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent border-0">
                                <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Customer Information</h3>
                            </div>
                            <div class="card-body pt-0">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="30%">FirstName</th>
                                        <td width="2%">:</td>
                                        <td id="product-name"></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">description</th>
                                        <td width="2%">:</td>
                                        <td id="product-description"></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">price</th>
                                        <td width="2%">:</td>
                                        <td id="product-price"></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">stock</th>
                                        <td width="2%">:</td>
                                        <td id="product-stock"></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">quantity</th>
                                        <td width="2%">:</td>
                                        <td id="product-quantity"></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">category</th>
                                        <td width="2%">:</td>
                                        <td id="product-category_name"></td>
                                    </tr>
                                   
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
    const productId = params.get('id'); 

    if (productId) {
        $.ajax({
            url: `<?= site_url('product/details'); ?>/${productId}`,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data) {
                    $('#product-name').text(data.name || 'N/A');
                    $('#product-description').text(data.description || 'N/A');
                    $('#product-price').text(data.price || 'N/A');
                    $('#product-stock').text(data.stock || 'N/A');
                    $('#product-quantity').text(data.quantity || 'N/A');
                    $('#product-category_name').text(data.category_name || 'N/A'); 
                    
                    
                    if (data.image_url) {
                        $('#customer-profile-img').attr('src', data.image_url);
                    } else {
                        $('#customer-profile-img').attr('src', '/path/to/default/image.jpg'); // Set a default image if none is available
                    }

                    
                    $('#customer-profile-container').show();
                } else {
                    alert('No data available for the specified product.');
                }
            },
            error: function(xhr, status, error) {
                alert('Error fetching product details: ' + xhr.responseText || error);
            }
        });
    } else {
        alert('Product ID is missing in the URL.');
    }
});


</script>
<?= $this->endSection(); ?>

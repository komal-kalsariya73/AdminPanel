<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<style>
    a {
        text-decoration: none;
        color: #007bff;
        font-size: 16px;
    }
    a:hover {
        color: #0056b3;
    }
    i {
        margin-right: 5px; 
    }
    .card{
        height: 800px;
    }
</style>
<div class="container-fluid dashboard-content">
    <!-- Page header and other content remains the same... -->

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="d-flex">
                    <h5 class="card-header p-2 flex-grow-1">Customer</h5>
                    <a href="<?= base_url('/customer/create');?>">
                        <button class="p-2 m-2 border-0 font-monospace" style="background:#07193e;color:white">Add Customer</button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered first" id="myTable">
                            <thead class="" style="background:#0E0C28">
                                <tr>
                                    <th style="color:white">Name</th>
                                    <th style="color:white">Email</th>
                                    <th style="color:white">City</th>
                                  
                                    <th style="color:white">Address</th>
                                    <th style="color:white">phone</th>
                                    <th style="color:white">Action</th>
                                </tr>
                            </thead>
                            <tbody id="customer-table-body">
                                <!-- Customer data will be inserted here dynamically using AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script> 

<script>
 $(document).ready(function() {
        function loadCustomers() {
            $.ajax({
                url: "<?= site_url('customer/getCustomers'); ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var rows = '';
                    $.each(data, function(index, customer) {

                        const profileImageUrl = customer.image ? `<?= base_url('uploads/'); ?>${customer.image}` : '<?= base_url('public/uploads/customers/default-avatar.jpg'); ?>';

                        rows += `
                        <tr id="customer-${customer.id}">
                            
                            <td>${customer.name}</td>
                            <td>${customer.email}</td>
                             <td>${customer.city}</td>
                            <td>${customer.address}</td>
                            <td>${customer.phone}</td>
                            <td>
                                <a href="<?= base_url('/customer/display') ?>?id=${customer.id}">
                                    <i class='align-middle me-2' data-feather='eye'></i>
                                </a>
                                <a href="<?= base_url('/customer/create') ?>?id=${customer.id}">
                                    <i class='align-middle me-2' data-feather='edit'></i>
                                </a>
                                <a href="javascript:void(0);" class="delete-btn" data-id="${customer.id}">
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
            const customerId = $(this).data('id');
            if (confirm('Are you sure you want to delete this customer?')) {
                $.ajax({
                    url: `<?= site_url('customer/delete'); ?>/${customerId}`,
                    type: "POST",
                    success: function(response) {
                        if (response.success) {
                            $(`#customer-${customerId}`).remove();
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

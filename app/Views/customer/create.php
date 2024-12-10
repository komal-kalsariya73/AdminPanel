<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<div class="dashboard-ecommerce">
   <div class="container-fluid dashboard-content">

      <div class="row">
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
               <h2 class="pageheader-title">Customers</h2>
               <p class="pageheader-text">Manage customer details easily in your dashboard.</p>
               <div class="page-breadcrumb">
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Customers</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>

      <!-- Add Customer Form -->
      <div class="row">
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card-body">
               <form id="customerForm" class="shadow bg-light w-75 m-auto p-4" method="post" enctype="multipart/form-data">
                  <h2 class="text-center mb-4">Add Customer Details</h2>

                  <div class="row">
                     <!-- First Name -->
                     <div class="col-md-6 mb-4">
                        <label for="name" class="form-label text-dark">First Name</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="fas fa-user"></i></span>
                           <input type="text" class="form-control" id="name" name="name" placeholder="Enter First Name">
                        </div>
                        <span class="text-danger" id="nameError"></span>
                     </div>

                     <!-- Last Name -->
                     <div class="col-md-6 mb-4">
                        <label for="lastname" class="form-label text-dark">Last Name</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="fas fa-user"></i></span>
                           <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name">
                        </div>
                        <span class="text-danger" id="lastnameError"></span>
                     </div>
                  </div>

                  <div class="row">
                     <!-- Email -->
                     <div class="col-md-6 mb-4">
                        <label for="email" class="form-label text-dark">Email</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                           <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                        </div>
                        <span class="text-danger" id="emailError"></span>
                     </div>

                     <!-- Phone -->
                     <div class="col-md-6 mb-4">
                        <label for="phone" class="form-label text-dark">Phone</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="fas fa-phone"></i></span>
                           <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
                        </div>
                        <span class="text-danger" id="phoneError"></span>
                     </div>
                  </div>

                  <!-- Address -->
                  <div class="row">
                     <div class="col-md-12 mb-4">
                        <label for="address" class="form-label text-dark">Address</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="fas fa-home"></i></span>
                           <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                        </div>
                        <span class="text-danger" id="addressError"></span>
                     </div>
                  </div>

                  <!-- Gender -->
                  <div class="d-md-flex justify-content-start align-items-center py-2">
                     <label class="form-label p-2 text-dark">Gender</label>
                     <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="gender" id="gender_male" value="Male" class="custom-control-input">
                        <span class="custom-control-label">Male</span>
                     </label>
                     <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="gender" id="gender_female" value="Female" class="custom-control-input">
                        <span class="custom-control-label">Female</span>
                     </label>
                     <span class="text-danger" id="genderError"></span>
                  </div>

                  <!-- Pincode -->
                  <div class="row">
                     <div class="col-md-6 mb-4">
                        <label for="pincode" class="form-label text-dark">Pincode</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                           <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode">
                        </div>
                        <span class="text-danger" id="pincodeError"></span>
                     </div>

                     <!-- City -->
                     <div class="col-md-6 mb-4">
                        <label for="city" class="form-label text-dark">City</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="fas fa-city"></i></span>
                           <select class="form-control" id="city" name="city">
                              <option>Choose...</option>
                              <option>Surat</option>
                              <option>Mumbai</option>
                              <option>Rajkot</option>
                              <option>Mahuva</option>
                           </select>
                        </div>
                        <span class="text-danger" id="cityError"></span>
                     </div>
                  </div>

                  <!-- Profile Image -->
                  <div class="row">
                     <div class="col-md-12 mb-4">
                        <label for="image" class="form-label text-dark">Profile Image</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="fas fa-image"></i></span>
                           <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>
                        <span class="text-danger" id="imageError"></span>
                     </div>
                  </div>

                  <!-- Submit Button -->
                  <div class="row">
                     <div class="col-md-12 d-flex justify-content-end">
                        <button type="submit" class="btn" style="background:#07193e;color:white">Submit Form</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#customerForm').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        // Reset previous error messages
        $('.text-danger').text('');

        $.ajax({
            url: '<?= base_url('customer/insert') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status === 'success') {
                    alert(response.message);
                    $('#customerForm')[0].reset();
                } else if (response.status === 'error') {
                    // Display validation errors for each field
                    for (let field in response.errors) {
                        $('#' + field + 'Error').text(response.errors[field]);
                    }
                }
            },
            error: function() {
                alert('Something went wrong!');
            },
        });
    });
});
</script>

<?= $this->endSection(); ?>

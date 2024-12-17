<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<style>
   .valid {
      font-size: 18px;
   }
   .existing-image {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
   }
   .existing-image img {
      max-width: 100px;
      height: auto;
      margin-right: 10px;
   }
   .existing-image button {
      margin-left: 10px;
   }
</style>

<div class="dashboard-ecommerce">
   <div class="container-fluid dashboard-content">
      <!-- Page Header -->
      <div class="row">
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
               <h2 class="pageheader-title">Product</h2>
               <p class="pageheader-text">Manage your product details efficiently.</p>
               <div class="page-breadcrumb">
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card-body">
               <form id="validationform" class="shadow bg-light m-auto p-4 w-50" enctype="multipart/form-data">
                  <h2 class="text-center mb-4">Add Product</h2>
                  <input type="hidden" name="id" id="id">
                  
                  <!-- Product Title -->
                  <div class="mb-4">
                     <label for="name" class="form-label">Product Title</label>
                     <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-box"></i></span>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter product title">
                     </div>
                     <span class="text-danger valid" id="nameError"></span>
                  </div>

                  <!-- Description -->
                  <div class="mb-4">
                     <label for="description" class="form-label">Description</label>
                     <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-list"></i></span>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter product description" rows="3"></textarea>
                     </div>
                     <span class="text-danger valid" id="descriptionError"></span>
                  </div>

                  <!-- Existing Images -->
                  <div class="mb-4" id="existingImagesContainer">
                     <label for="existing_images" class="form-label">Existing Images</label>
                     <div id="existing_images"></div>
                  </div>

                  <!-- New Images -->
                  <div class="mb-4">
                     <label for="image" class="form-label">Add Images</label>
                     <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                        <input type="file" class="form-control" id="image" name="image[]" multiple>
                     </div>
                     <span class="text-danger valid" id="imageError"></span>
                  </div>

                  <!-- Price -->
                  <div class="mb-4">
                     <label for="price" class="form-label">Price</label>
                     <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter product price">
                     </div>
                     <span class="text-danger valid" id="priceError"></span>
                  </div>

                  <!-- Stock -->
                  <div class="mb-4">
                     <label for="stock" class="form-label">Stock</label>
                     <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-warehouse"></i></span>
                        <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter product stock">
                     </div>
                     <span class="text-danger valid" id="stockError"></span>
                  </div>

                  <!-- Quantity -->
                  <div class="mb-4">
                     <label for="quantity" class="form-label">Quantity</label>
                     <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-shopping-cart"></i></span>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter product quantity">
                     </div>
                     <span class="text-danger valid" id="quantityError"></span>
                  </div>

                  <!-- Category -->
                  <div class="mb-4">
                     <label for="category" class="form-label">Category</label>
                     <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-boxes"></i></span>
                        <select class="form-control" id="category" name="category">
                           <option selected disabled>Select Category</option>
                           <?php foreach ($categories as $category) : ?>
                              <option value="<?= $category['id'] ?>"><?= $category['category'] ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                     <span class="text-danger valid" id="categoryError"></span>
                  </div>

                  <!-- Submit Button -->
                  <div class="f-end">
                     <button type="submit" class="btn" style="background:#07193e;color:white">Save Product</button>
                  </div>
                  <div id="responseMessage"></div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        const id = getQueryParameter('id');
        if (id) fetchProductData(id);

        // Fetch product data by ID for edit
        function fetchProductData(id) {
            $.ajax({
                url: `<?= base_url('/product/fetchProduct/') ?>${id}`,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        populateForm(response.data);
                    } else {
                        alert('Failed to fetch product data: ' + response.message);
                    }
                },
                error: function() {
                    alert('An error occurred while fetching product data.');
                }
            });
        }

        // Populate form with product data
      // Populate form with product data
function populateForm(data) {
    $("#id").val(data.id);
    $("#name").val(data.name);
    $("#description").val(data.description);
    $("#price").val(data.price);
    $("#stock").val(data.stock);
    $("#quantity").val(data.quantity);
    $("#category").val(data.category_id);

    // Ensure that `data.image` is an array
    if (data.image) {
        const images = Array.isArray(data.image) ? data.image : JSON.parse(data.image);  // Parse if it's not an array

        let imageHTML = '';
        images.forEach(function(image) {
            imageHTML += `
                <div class="existing-image">
                    <img src="<?= base_url('uploads/') ?>${image}" alt="Product Image" />
                    <button type="button" class="btn btn-danger btn-sm delete-image" data-image="${image}" data-delete="false">Delete</button>
                </div>
            `;
        });
        $("#existing_images").html(imageHTML);
    }
}

        // Handle deletion of images
        $(document).on('click', '.delete-image', function() {
            const button = $(this);
            const imageName = button.data('image');
            const deleteStatus = button.data('delete');

            // Toggle the delete status
            if (deleteStatus === true) {
                button.data('delete', false); // Undo delete
                button.text('Delete');
            } else {
                button.data('delete', true); // Mark as delete
                button.text('Undo Delete');
            }
        });

        // Submit form data
        $("#validationform").on('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const deleteImages = [];
            $(".delete-image").each(function() {
                if ($(this).data('delete') === true) {
                    deleteImages.push($(this).data('image'));
                }
            });
            formData.append('delete_images', JSON.stringify(deleteImages));

            $.ajax({
                url: `<?= base_url('product/') ?>${id ? 'update' : 'addProduct'}`,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        $("#responseMessage").html('<p class="text-success">' + response.message + '<a href="<?= base_url('/product/view')?>">View</a>' + '</p>');
                        $("#validationform")[0].reset();
                    } else {
                        $.each(response.errors, function(key, value) {
                            $('#' + key + 'Error').html('<small class="text-danger">' + value + '</small>');
                        });
                    }
                },
                error: function() {
                    $("#responseMessage").html('<p class="text-danger">An error occurred while saving the product. Please try again.</p>');
                }
            });
        });

        function getQueryParameter(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }
    });
</script>
<?= $this->endSection(); ?>

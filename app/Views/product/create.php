<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

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
            <div class="">
               <div class="card-body">
                  <form id="validationform" class="shadow bg-light m-auto p-4 w-50" enctype="multipart/form-data">
                     <h2 class="text-center mb-4">Add Product</h2>
                     
                     <!-- Product Title -->
                     <div class="mb-4">
                        <label for="name" class="form-label">Product Title</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="fas fa-box"></i></span>
                           <input type="text" class="form-control" id="name" name="name" placeholder="Enter product title" required>
                        </div>
                     </div>

                     <!-- Description -->
                     <div class="mb-4">
                        <label for="description" class="form-label">Description</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="fas fa-list"></i></span>
                           <textarea class="form-control" id="description" name="description" placeholder="Enter product description" rows="3" required></textarea>
                        </div>
                     </div>

                     <!-- Image -->
                     <div class="mb-4">
                        <label for="image" class="form-label">Image</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="fas fa-image"></i></span>
                           <input type="file" class="form-control" id="image" name="image[]" multiple required>
                        </div>
                     </div>

                     <!-- Price -->
                     <div class="mb-4">
                        <label for="price" class="form-label">Price</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                           <input type="number" class="form-control" id="price" name="price" placeholder="Enter product price" required>
                        </div>
                     </div>

                     <!-- Stock -->
                     <div class="mb-4">
                        <label for="stock" class="form-label">Stock</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="fas fa-warehouse"></i></span>
                           <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter product stock" required>
                        </div>
                     </div>

                     <!-- Quantity -->
                     <div class="mb-4">
                        <label for="quantity" class="form-label">Quantity</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="fas fa-shopping-cart"></i></span>
                           <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter product quantity" required>
                        </div>
                     </div>

                     <!-- Category -->
                     <div class="mb-4">
                        <label for="category" class="form-label">Category</label>
                        <div class="input-group">
                           <span class="input-group-text"><i class="fas fa-boxes"></i></span>
                           <select class="form-control" id="category" name="category" required>
                              <option selected disabled>Select category</option>
                              <option>Electronics</option>
                              <option>Fashion</option>
                              <option>Home Appliances</option>
                              <option>Books</option>
                           </select>
                        </div>
                     </div>

                     <!-- Submit Button -->
                     <div class="f-end">
                        <button type="submit" class="btn" style="background:#07193e;color:white">Add Product</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?= $this->endSection(); ?>

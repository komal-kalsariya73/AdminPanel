<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<div class="dashboard-wrapper">
         <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content  ">
               <!-- ============================================================== -->
               <!-- pageheader  -->
               <!-- ============================================================== -->
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="page-header">
                        <h2 class="pageheader-title">Customers</h2>
                        <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus
                           vel mauris facilisis faucibus at enim quis massa lobortis rutrum.
                        </p>
                        <div class="page-breadcrumb">
                           <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="#"
                                    class="breadcrumb-link">Dashboard</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">E-Commerce Dashboard
                                    Template
                                 </li>
                              </ol>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- ============================================================== -->
               <!-- end pageheader  -->
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="card">
                        <!-- <h5 class="card-header">Add Customer Details</h5> -->
                        <div class="card-body">
                           <form id="validationform" data-parsley-validate="" novalidate=""
                              class=" w-75 shadow m-auto p-4" action="" method=""
                              enctype="multipart/form-data">
                              <h2 class="text-center">Add Customer Details</h2>
                              <section class="">
                                 <div class="container">
                                    <div class="row d-flex justify-content-center align-items-center">
                                       <div class="col">
                                          <div class="card card-registration">
                                             <div class="row g-0">
                                                <div class="col-xl-12">
                                                   <div class="card-body  text-black">
                                                      <div class="row">
                                                         <div class="col-md-6 mb-4">
                                                            <div data-mdb-input-init
                                                               class="form-outline">
                                                               <label class="form-label text-dark"
                                                                  for="form3Example1m">First
                                                               name</label>
                                                               <input type="text" id="name"
                                                                  name="name"
                                                                  class="form-control form-control-lg pl-5"
                                                                  placeholder="Enter Your FirstName" />
                                                               <i class="fas fa-user ml-3"></i>
                                                             <!-- <span id="demo1" style="color: red;">Please enter name</span>  -->
                                                             
                                                            </div>
                                                            <span id="text1" style="color: red;">please enter name</span>
                                                         </div>
                                                         <div class="col-md-6 mb-4">
                                                            <div data-mdb-input-init
                                                               class="form-outline">
                                                               <label class="form-label text-dark"
                                                                  for="form3Example1n">Last
                                                               name</label>
                                                               <input type="text" id="lastname"
                                                                  name="lastname"
                                                                  class="form-control form-control-lg pl-5"
                                                                  placeholder="Enter Your Lastname" />
                                                               <i class="fas fa-user ml-3"></i>
                                                              
                                                               <!-- <span id="demo2" style="color: red;">Please enter lastname</span> -->
                                                            </div>
                                                            <span id="demo7" style="color: red;">Please enter email</span>
                                                         </div>
                                                      </div>
                                                      <div class="row">
                                                      <div class="col-md-6 mb-4">
                                                            <div data-mdb-input-init
                                                               class="form-outline">
                                                               <label class="form-label text-dark"
                                                                  for="form3Example1n">Email
                                                               </label>
                                                               <input type="email" id="email"
                                                                  name="email"
                                                                  class="form-control form-control-lg pl-5"
                                                                  placeholder="Enter Your Email" />
                                                               <i class="fas fa-box ml-3"></i>
                                                               <!-- <span id="demo2" style="color: red;">Please enter lastname</span> -->
                                                            </div>
                                                            <span id="demo" style="color: red;">Please enter email</span>
                                                         </div>
                                                         <div class="col-md-6 mb-4">
                                                            <div data-mdb-input-init
                                                               class="form-outline">
                                                               <label class="form-label text-dark"
                                                                  for="form3Example1m">Address
                                                               </label>
                                                               <input type="text" id="address"
                                                                  name="address"
                                                                  class="form-control form-control-lg pl-5"
                                                                  placeholder="Enter Your Address" />
                                                               <i class="fas fa-home ml-3"></i>
                                                               <!-- <span id="demo1" style="color: red;">Please enter name</span> -->
                                                            </div>
                                                            <span id="demo9" style="color: red;">Please enter Address</span>
                                                         </div>
                                                        
                                                      </div>
                                                      
                                                      <div data-mdb-input-init
                                                         class="form-outline">
                                                         <label class="form-label text-dark"
                                                            for="form3Example8">Phone</label>
                                                         <input type="number" id="phone" name="phone"
                                                            class="form-control form-control-lg"
                                                            placeholder="Enter Your phone Number" />
                                                            <!-- <i class="fas fa-bus"></i> -->
                                                        
                                                      </div>
                                                      <span id="demo8" style="color: red;" class="mt=0">Please enter your Number</span> 
                                                      <div
                                                         class="d-md-flex justify-content-start align-items-center  py-2">
                                                         <label class="form-label p-2 text-dark"
                                                            for="form3Example1n">Gender</label>
                                                         <label
                                                            class="custom-control custom-radio custom-control-inline">
                                                         <input type="radio" name="gender" id="gender" value="male"
                                                            
                                                            class="custom-control-input pl-2"><span
                                                            class="custom-control-label">Male
                                                         </span>
                                                         </label>
                                                         <label
                                                            class="custom-control custom-radio custom-control-inline">
                                                         <input type="radio" name="gender" id="gender" value="female"
                                                            class="custom-control-input"><span
                                                            class="custom-control-label">Female
                                                         </span>
                                                         </label>
                                                         <span id="demo3" style="color: red;">Please select gender</span>
                                                      </div>
                                                    
                                                      <div data-mdb-input-init
                                                         class="form-outline">
                                                         <label class="form-label text-dark"
                                                            for="form3Example90">Pincode</label>
                                                         <input type="text" id="pincode"
                                                            name="pincode"
                                                            class="form-control form-control-lg"
                                                            placeholder="Enter Pincode" />
                                                         <!-- <span id="demo5" style="color: red;">Please
                                                            enter pincode</span> -->
                                                      </div>
                                                      <span id="demo10" style="color: red;">Please enter Pincode</span>
                                                      <div data-mdb-input-init
                                                         class="form-outline mb-4 mt-4">
                                                         <label class="form-label text-dark"
                                                            for="form3Example99">City</label>
                                                         <!-- <input type="text"id="course" name="course" class="form-control form-control-lg"  placeholder="Enter Your Course"/> -->
                                                         <select id="inputState"
                                                            class="form-control pl-3" id="city"
                                                            name="city">
                                                            <option> Choose...</option>
                                                            <option>Surat</option>
                                                            <option>Mumbai</option>
                                                            <option>Rajkot</option>
                                                            <option>Mahuva</option>
                                                         </select>
                                                         <!-- <i class="fas fa-home ml-3"></i>  -->
                                                         <!-- <span id="demo6" style="color: red;">Please
                                                            enter course</span> -->
                                                            <span id="demo4" style="color: red;">Please enter city</span>
                                                      </div>
                                                      <divdata-mdb-input-init
                                                         class="form-outline mb-4">
                                                      <label for="email"
                                                         class="form-label text-dark">Profile
                                                      Image<span
                                                         class="text-danger"></span></label>
                                                      <input type="file" id="image" name="image"
                                                         accept="image/*"><br>
                                                         <span id="demo11" style="color: red;">Please enter image</span>
                                                   </div>
                                                   <div id="responseMessage"></div>
                                                   <div class="d-flex justify-content-end m-2">
                                                      <button type="submit" data-mdb-button-init
                                                         data-mdb-ripple-init class="btn"
                                                         name="upload"
                                                         style="background:#07193e;color:white">Submit
                                                      form</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                        </div>
                        </section>
                        <div id="responseMessage"></div>
                        </form>
                     </div>
                  </div>
               </div>
               <!-- ============================================================== -->
               <!-- end valifation types -->
               <!-- ============================================================== -->
            </div>
          
         </div>
      
      </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
         
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        

<?= $this->endSection(); ?>

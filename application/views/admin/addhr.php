  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add HR Manager
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">HR Manager</a></li>
        <li class="active">Add HR Manager</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <?php if($this->session->flashdata('success')): ?>
          <div class="col-md-12">
            <div class="alert alert-success alert-dismissible" id='alert'>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                  <?php echo $this->session->flashdata('success'); ?>
            </div>
          </div>
        <?php elseif($this->session->flashdata('error')):?>
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>
                  <?php echo $this->session->flashdata('error'); ?>
            </div>
          </div>
        <?php endif;?> 

        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">HR Manager</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo  base_url() ?>addHRmanager" method="post" name='hrfrm' id='hrfrm'>
              <div class="box-body">
               <form id="profile_form" name="profile_form" method="post" >
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="name" >Name <span class="required-star"></span></label >
              <input type="text" class="form-control"  id="name"  name="name" placeholder="Enter name"  />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="phone" >Phone <span class="required-star"></span></label >
              <input type="tel" class="form-control" id="phone"  name="phone" placeholder="enter number"  />
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="email">Email</label><br><span></span></label>
              <input type="email" class="form-control" id="email" placeholder="Enter email address"  name="email" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
             <label for="password">Password</label><br><span></span></label>
              <input type="text" class="form-control" id="password" placeholder="Enter password "   name="password" />
            </div>
          </div>
        </div>

         <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="name" >Designation<span class="required-star"></span></label >
              <select class="form-control" name="designation"  id='designation'>
                      <option value="" selected disabled>Select</option>
                      <option value="3">Staff</option>
                     <option value="2">HR Manager</option>
                    </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
             <p align="center">
              <input type="submit" value='Register' class="btn btn-primary right" id="staffsubmit"  name="staffsubmit"/>
            </p> 
            </div>
          </div>
          </div>
        </div>
      </form>
        </div>
          </form>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js
"></script>
<script type="text/javascript">
  jQuery.validator.addMethod("match", function(value, element) {
     return this.optional(element) || /^[a-zA-Z. ]+$/i.test(value);
}, " only letters accept");

  jQuery.validator.addMethod("phonenumber", function (phone_number, element) {
        phone_number = phone_number.replace(/\s+/g, "");
        return this.optional(element) || phone_number.length > 9 && phone_number.match(/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[6789]\d{9}|(\d[ -]?){10}\d$/);
    }, "Please specify a valid phone number");

 jQuery.validator.addMethod("noSpace", function(value, element) { 
  return value.indexOf(" a") < 0 && value != ""; 
}, "No space please and don't leave it empty");

 jQuery.validator.addMethod("accept", function(value, element, param) {
        return value.match(new RegExp("^" + param + "$"));
    },'Please enter a valid email address');

  $("#hrfrm").validate({

      rules: {
          name: {
                required: true,
                 noSpace:true,
                 match:true,
                },
         phone: {
                required: true,
                 phonenumber: true,
                minlength: 10,
                maxlength: 10,
                },
        email: {
                required: true,
                 accept:"[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}" ,
                },
         password: {
                required: true,
                },
        designation: {
                required: true,
                },
        
            },

    messages: {
         name: {
               required: "Please  provide name",
               },
        email: {
                required: "Please  Enter  Email",
              },
        phone: {
               required: "Please  provide phone",
               },
        password: {
                required: "Please  Enter  password",
              },
        designation: {
               required: "Please  provide designation",
               },
             },
     });

</script>
  
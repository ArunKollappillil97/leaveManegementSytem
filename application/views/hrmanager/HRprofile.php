  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <script type="text/javascript">
       
       $( "#filephoto" ).change(function() {
       alert('value');
       });
      function  fetchcategory($value)
  {
       //alert($value);

        $.ajax({
          url: "<?php echo base_url();?>staffController/fetch_course",
          method:"POST",
          data:$value,
          dataType:"json",
          success:function(data)
          {
          $("#courseing").html(data);
           }

          });
        }
        
  </script>

    <section class="content-header">
      <h1>
        HR Manager Profile
      </h1>
       <?php $idd=$this->session->userdata('user_id');?>
     <a class="btn btn-info" href="<?php echo base_url('StaffController/HRprofileview/'."$idd".''); ?>">View Profile</a>
     <br>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">HR Manger</a></li>
        <li class="active">Manager Profile</li>
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
        <?php  
         foreach ($HR->result() as $row)  
         {  
            ?>
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo  base_url() ?>updateHR" name='registration'id='registration' method="post">
              <div class="box-body">
               
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="name" >Name <span class="required-star"></span></label >
              <input type="text" class="form-control"   id="name"  name="name" value="<?php echo $row->name?>" placeholder="Enter name"  />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="phone" >Phone <span class="required-star"></span></label >
              <input type="number" class="form-control" id="phone" name="phone" placeholder="enter the number"  />
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="email">Email</label><br><span></span></label>
              <input type="email" class="form-control" id="email"value="<?php echo $row->email?>" placeholder="Enter email address"   name="email"  />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
             <label for="password">Password</label><br><span></span></label>
              <input type="text" class="form-control" id="password" placeholder="Enter password " value="<?php echo $row->password?>"  name="password" />
            </div>
          </div>
        </div>
         <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="name" >DOJ<span class="required-star"></span></label >
              <input type="date" class="form-control" id="doj" placeholder="Pick date "   name="doj" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="name" >DOB<span class="required-star"></span></label >
               <input type="date" class="form-control" id="dob" placeholder="pick date "  name="dob" />
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
              <label for="name" >Designation<span class="required-star"></span></label >
              <input type="text" class="form-control" id="designation" value="<?php echo $row->designation?>" placeholder="enter university "  name="designation" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="name" >Address<span class="required-star"></span></label >
                <textarea  id="address"  name="address" class="form-control"  placeholder="address"></textarea>
            </div>
          </div>
        </div>
         <div class="row">
            <div class="col-md-6">
            <div class="form-group">
              <label for="name" >University<span class="required-star"></span></label >
              <input type="text" class="form-control"  id="university" placeholder="enter university "  name="university" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="name" >Stream<span class="required-star"></span></label >
                <select class="form-control" onchange="fetchcategory(this.value)" name="stream"  id='strteam' >
                      <option value="" selected disabled>Select</option>
                      <option value="Dgree">Degree</option>
                     <option value="Engineering">Engineering</option>
                    <option value="Diploma">Diploma</option>
                    </select>
            </div>
          </div>
        </div>
             <div class="row">
            <div class="col-md-6">
            <div class="form-group">
              <label for="name" >course<span class="required-star"></span></label >
              <select class="form-control" name="courseing"  id='courseing' >
                      <option value="" selected disabled>Select</option>
                    </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="name" >Institution<span class="required-star"></span></label >
               <input type="text" class="form-control"  id="institution" placeholder="enter institution"  name="institution" /> 
            </div>
          </div>
        </div>
                 <div class="row">
            <div class="col-md-6">
            <div class="form-group">
              <label for="name" >Year of Passout<span class="required-star"></span></label >
              <input type="number" class="form-control" id="yearpassout" placeholder="year of passout"   name="yearpassout" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="name" >Photo<span class="required-star" onkeyup="helo()"></span></label >
                <input type="file" class="form-control" id="filephoto"  name="filephoto" />
                <span id="photo_append"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
             <p align="center">
              <input type="submit" value='Update' class="btn btn-primary right" id="staffsubmit"  name="staffsubmit"/>
            </p> 
            </div>
          </div>
          </div>
        </div>
      </form>
        </div>
         <?php 
          }  
         ?> 
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
  $("#registration").validate({

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
          doj: {
                required: true,
                },
         dob: {
                required: true,
                },
        designation: {
                required: true,
                },
         address: {
                required: true,
               
                },
          university: {
                required: true,
                },
        stream: {
                required: true,
                },
         institution: {
                required: true,
                },
       yearpassout:{
                required: true,
                },
            },

    messages: {
         name: {
               required: "Please  provide name",
               },
        phone: {
                required: "Please  provide  phone",
                 minlength:"Must be at least 10 numbers" ,
                maxlength:"Please enter only upto 10 numbers",
              },
        email: {
               required: "Please  provide email",
               
               },

        address: {
                required: "Please  Enter address",
              },
        password: {
               required: "Please  provide password",
               },
        doj: {
                required: "Please  select  doj",
              },
        dob: {
               required: "Please  select  dob",
               },
        designation: {
                required: "Please  Enter designation",
              },
        university: {
               required: "Please  provide university",
               },
        institution: {
                required: "Please  enter institution",
              },
        stream: {
               required: "Please  provide stream",
               },
        yearpassout: {
                required: "Please  Enter yearpassout",
              },
        
             },
     });

</script>
   
  
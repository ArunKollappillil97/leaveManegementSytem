  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Qualification
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">HR Manager</a></li>
        <li class="active">Add Qualification</li>
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
              <h3 class="box-title">Qualification</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo  base_url() ?>qualificationController/AddQualification" method="post" id='qualfrm' name='qualfrm'>
              <div class="box-body">
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Stream</label>
                    <select class="form-control" name="stream"  id='strteam' required>
                      <option value="" selected disabled>Select</option>
                      <option value="Dgree">Degree</option>
                     <option value="Engineering">Engineering</option>
                    <option value="Diploma">Diploma</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Course</label>
                  <input type="text" name="course"  id="course"class="form-control" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                  <input type="submit" name="" id="course" class="btn btn-primary">
                  </div> 
                </div>
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
  $("#qualfrm").validate({

      rules: {
          stream: {
                required: true,
                },
         course: {
                required: true,
                match: true,
                },
      
        
            },

    messages: {
         stream: {
               required: "Please  provide straeam",
               },
        course: {
                required: "Please  Enter  course",
              },
        
             },
     });

</script>
  
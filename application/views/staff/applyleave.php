  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <script type="text/javascript">
    
   
var days = daysdifference('10/11/2019', '10/20/2019');
  
console.log(days);
  
function daysdifference(firstDate, secondDate){
    var startDay = new Date(firstDate);
    var endDay = new Date(secondDate);
   
    var millisBetween = startDay.getTime() - endDay.getTime();
    var days = millisBetween / (1000 * 3600 * 24);
   
    return Math.round(Math.abs(days));
}

</script>
    <section class="content-header">
      <h1>
        Staff
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Staff</a></li>
        <li class="active">Apply Leave</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <?php echo validation_errors('<div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>', '</div>
          </div>'); ?>

        <?php if($this->session->flashdata('success')): ?>
          <div class="col-md-12">
            <div class="alert alert-success alert-dismissible">
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
              <h3 class="box-title">Apply Leave</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo  base_url() ?>addapplyleave" method="post" id='leavefrm' name='leavefrm'>
              <div class="box-body">
               <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Reason</label>
                     <textarea  id="reason"  name="reason" class="form-control" required placeholder="reason"></textarea>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Leave Type</label>
                  <select class="form-control" name="leavetype"  id='leavetype'>
                      <option value="" selected disabled>Select</option>
                      <option value="Lop">LOP</option>
                     <option value="Casual Leave">Casual Leave</option>
                    </select>
                  </div>
                </div>
            </div>
             <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Leave From</label>
                    <input type="date" name="fromdate" id='fromdate'class="form-control" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Leave To</label>
                    <input type="date" id="todate" name="todate" class="form-control" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">No.of.days</label>
                    <input type="text" id="no" placeholder="no.of.days" name="no"class="form-control" >
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              </div>
            </form>
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
  $("#leavefrm").validate({

      rules: {
          reason: {
                required: true,
                match: true,
                },
         leavetype: {
                required: true,
                },
        fromdate: {
                required: true,
                },
         todate: {
                required: true,
                },
       
            },

    messages: {
         reason: {
               required: "Please  provide reason",
               },
        leavetype: {
                required: "Please  select  leavetype",
              },
        fromdate: {
               required: "Please  provide leave from date",
               },
        fromdate: {
                required: "Please  Enter leave todate",
              },
        
             },
     });

</script>
  
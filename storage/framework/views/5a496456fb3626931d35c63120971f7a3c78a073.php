<?php $__env->startSection('content'); ?>


<h3>Blog View</h3>
<br>
<br>

        <a href="<?php echo url('/'); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button></a>
     <br>
  <br>
            
                
                  <b>Name</b>
                   <br><br>
                 <?php echo e($data->sr_name); ?>

  <br> <br>

                 <b>Content</b>
                 <br><br>
                <?php echo $data->sr_desc; ?> 

              
             
           
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
  <script>

    $('#blah').hide();
    $().ready(function() {
      $("#data-info").validate();

    });

    </script>
 <?php $__env->stopSection(); ?>
  
<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/demoblog/demo/resources/views/admin/pages/view.blade.php ENDPATH**/ ?>
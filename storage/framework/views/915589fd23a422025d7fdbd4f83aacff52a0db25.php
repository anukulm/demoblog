<?php $__env->startSection('content'); ?>



<h3>Edit Blog</h3>
      
  
        <a href="<?php echo url('/'); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button></a>
    
     <br>
     <br>
   
      <?php echo $__env->make('admin/alert_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     


              <form method="post" action="<?php echo e(url('edit',$data->id)); ?>" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

              
                
                   Name
               
                    <input type="text" class="form-control <?php $__errorArgs = ['sr_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="sr_name" value="<?php echo e($data->sr_name); ?>" required>
                    <?php $__errorArgs = ['sr_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         <?php echo e($message); ?>

                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                 




                  Category

                    <br>
                
                    <select name="category" class="form-control" required>
                      <?php
  foreach($category as $value)
  {
        
if($value->id == $data->category)   
{

  ?>
   <option value='<?php echo e($value->id); ?>' selected ><?php echo e($value->sr_name); ?></option> 

   <?php
}else{
  ?>
  
  <option value='<?php echo e($value->id); ?>'><?php echo e($value->sr_name); ?></option> 

  <?php
}

}
?>


                    </select>
                    <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <strong><?php echo e($message); ?></strong>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                 

                  <br>







                 <br>
                 Content
                
                    <textarea type="sr_desc" rows='10' class="form-control <?php $__errorArgs = ['sr_desc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="input-2" name="sr_desc"><?php echo e($data->sr_desc); ?></textarea>
                   


             


                  
             
                    <a href="<?php echo url('user'); ?>"><button type="button" class="btn btn-danger">CANCEL</button></a>
                    <button type="submit" class="btn btn-success">SAVE</button>


              
              </form>
      

  <script type="text/javascript">
    $(document).ready(function() {
  $('#input-2').summernote();
});
  </script>
 <?php $__env->stopSection(); ?>
  
<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/demoblog/demo/resources/views/admin/pages/edit.blade.php ENDPATH**/ ?>
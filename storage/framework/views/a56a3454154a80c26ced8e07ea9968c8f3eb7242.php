<?php $__env->startSection('content'); ?>


    <h3>Blog Add</h3>
    <br>
        <a href="<?php echo url('/'); ?>"><button type="button" class="btn btn-primary">Back</button></a>
     
     <br>
      <br>
  
       <?php echo $__env->make('admin/alert_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     

              <form method="post" action="<?php echo e(url('add')); ?>">
                                <?php echo e(csrf_field()); ?>

              
              
               

                    Name

                    <br>
                
                    <input type="text" class="form-control <?php $__errorArgs = ['sr_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="sr_name" value="<?php echo e(old('sr_name')); ?>" required>
                    <?php $__errorArgs = ['name'];
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

                  Category

                    <br>
                
                    <select name="category" class="form-control" required>
                       <option value selected disabled>Select Blog Category</option>

                       
                      <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value='<?php echo e($value->id); ?>'><?php echo e($value->sr_name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </select>
                    <?php $__errorArgs = ['name'];
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

                 Content
                 
                    <textarea class="form-control <?php $__errorArgs = ['sr_desc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="input-2" name="sr_desc" rows='10'><?php echo e(old('sr_desc')); ?></textarea> 


                    <?php $__errorArgs = ['sr_desc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         
                             <strong><?php echo e($message); ?></strong>
                         
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      
                     <a href="<?php echo url('/'); ?>"><button type="button" class="btn btn-danger">CANCEL</button></a>
                    <button type="submit" class="btn btn-success">SAVE</button>

                
              </form>
   
        


  <script>

$(document).ready(function() {
  $('#input-2').summernote();
});

    </script>
 <?php $__env->stopSection(); ?>
  
<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/demoblog/demo/resources/views/admin/pages/add.blade.php ENDPATH**/ ?>
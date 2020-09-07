
       <form action="<?php echo url('login'); ?>" method="post">
          <?php echo csrf_field(); ?>

         Email
         <br>
          <input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Username" value="<?php echo e(old('email')); ?>" name="email">

          <br>
           <?php $__errorArgs = ['email'];
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
        Password
        <br>
          <input type="password" class="form-control" name="password" placeholder="Password">
        
         <?php echo $__env->make('admin/alert_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <br>
          <br>
       <button type="submit" class="btn btn-primary">Sign In</button>
      
       </form>
    
<?php /**PATH /opt/lampp/htdocs/demoblog/demo/resources/views/admin/pages/login.blade.php ENDPATH**/ ?>
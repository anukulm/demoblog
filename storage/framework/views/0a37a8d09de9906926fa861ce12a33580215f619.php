
<?php
use App\Category;

?>



<?php $__env->startSection('title', 'Welcome To Blog' ); ?>

<?php $__env->startSection('content'); ?>



    <?php echo $__env->make('admin/alert_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   




     <h3>Blog List</h3>
     <br>

     <a href="<?php echo url('add'); ?>"><button type="button" class="btn btn-primary">Add Blog</button></a>

   <h4>Total - <?php echo e($data->total()); ?></h4>
<br>
       
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                     <th scope="col">Category</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                     <td><?php echo e($row->sr_name); ?></td>
                       <td><?php echo e(Category::where('id',$row->category)->get()->first()->sr_name); ?></td>
                  <td>
                    <a href="<?php echo url('edit',$row->id); ?>"><button type="button" class="btn btn-success" title="Edit">Edit</button></a>
                    <a href="<?php echo url('view',$row->id); ?>"><button type="button" class="btn btn-info" title="View"> View </button></a>
                        <a href="<?php echo url('delete',$row->id); ?>"><button type="button" class="btn btn-danger" title="View"> Delete </button></a>
                  </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                </tbody>
              </table>
    

<?php echo e($data->links()); ?>


  
             


<?php $__env->stopSection(); ?>
  
<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/demoblog/demo/resources/views/admin/pages/welcome.blade.php ENDPATH**/ ?>
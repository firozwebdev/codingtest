<?php $__env->startSection('content'); ?>

  <style>

     .form-group{
        display: inline-block !important;
     }
  </style>

   <div class="container-fluid app-body settings-page">
      <h3>Recent Post sent to Buffer</h3>
      <form action="/search" method="get">
         <div class="form-group">
            
            <input class="form-control"  type="text" name="text" placeholder="search">
         </div>
         
         
         <div class="form-group">
           
           <select class="form-control" name="_id" id="">
              <option value="All Group">All Group</option>
              <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </select>
         </div>
         <div class="form-group">
           
            <button class="btn btn-primary"  type="submit">Search</button>
         </div>
      </form>
      

      <table class="table table-striped">
         <thead>
            <tr>
               <th>No.</th>
               <th>Group Name</th>
               <th>Group Type</th>
               <th>Account Name</th>
               <th>Post Text</th>
               <th>Time</th>
            </tr>
         </thead>
         <tbody>
            <?php $__currentLoopData = $buffer_postings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <tr>
                  <td><?php echo e($loop->iteration); ?></td>
                  <td><?php echo e($item->groupInfo->name); ?></td>
                  <td><?php echo e($item->groupInfo->type); ?></td>
                  <td><?php echo e($item->groupInfo->name); ?></td>
                  <td><?php echo e($item->post_text); ?></td>
                  <td><?php echo e(($item->created_at)->toDayDateTimeString()); ?></td>
               </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
            </tr>
         </tbody>
      </table>
      <?php echo e($buffer_postings->links()); ?>

   </div>


   <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
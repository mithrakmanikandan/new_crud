<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Customer Details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">   
    <div class="row">
        <div class="col">
            <h2>Customer Details</h2>
        </div>
        <div class="col text-right">
            <a class="btn btn-sm btn-success" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <input type="text" class="form-control" id="searchInput" placeholder="Search with Name/Role ">
        </div>
    </div>
    <table id="dataTable" class="table">
    <thead>
      <tr>
        <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('user_id', 'Name'));?></th>
        <th>Role</th>
        <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('dob', 'DOB'));?></th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>Is Active</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php if($details->count() == 0): ?>
        <tr>
            <td colspan="5">No data to display.</td>
        </tr>
        <?php endif; ?>
    <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($userNames[$detail->user_id]); ?></td>
            <td><?php echo e($roles[$detail->user_id]); ?></td>
            <td><?php echo e($detail->dob); ?></td>
            <td><?php echo e($detail->phone_number_1); ?></td>
            <td><?php echo e($detail->address_1); ?></td>
            <td>
            <?php if($detail->is_active == 1): ?>
                Active
            <?php else: ?>
                Inactive
            <?php endif; ?>
        </td>
            <td>
                <td><form action="<?php echo e(route('registrations.edit', $detail->id)); ?>" method="GET">
                      <?php echo csrf_field(); ?>
                      <button type="submit" class="btn btn-primary">Edit</button>
                </form></td>
                <td><form action="<?php echo e(route('registrations.destroy', $detail->id)); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form></td>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
    </tbody>
  </table> 
  <?php echo e($details->links()); ?>

</div>
<script>
    //Script for searching with name or role
$(document).ready(function(){
    $('#searchInput').keyup(function(){
        var searchText = $(this).val().toLowerCase();
        $('tbody tr').each(function(){
            var name = $(this).find('td:first').text().toLowerCase();
            var role = $(this).find('td:nth-child(2)').text().toLowerCase(); 
            if(name.includes(searchText) || role.includes(searchText)){ 
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});
</script>
</body>
</html>
<?php /**PATH /var/www/html/new_test/resources/views/register/index_user.blade.php ENDPATH**/ ?>
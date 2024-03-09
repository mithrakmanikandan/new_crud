<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <title>Update Form</title>
</head>
<body>

<div class="container">
    <h2>Update Form</h2>
    <form action="<?php echo e(route('registrations.update',$registration->id)); ?>" method="POST" enctype="multipart/form-data">
    <input name="_method" type="hidden" value="PUT">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="dob">Date of Birth<span class="required"></span>:</label>
            <input type="date" id="dob" name="dob" value=<?php echo e($registration->dob); ?> required>
        </div>

        <div class="form-group">
            <label for="phone_number_1">Phone Number1<span class="required"></span>:</label>
            <input type="text" id="phone_number_1" name="phone_number_1" value=<?php echo e($registration->phone_number_1); ?> required>
            <?php $__errorArgs = ['phone_number_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label for="phone_number_2">Phone Number2:</label>
            <input type="text" id="phone_number_2" name="phone_number_2" value=<?php echo e($registration->phone_number_2); ?>>
            <?php $__errorArgs = ['phone_number_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label for="address_1">Address1<span class="required"></span>:</label>
            <input type="text" id="address_1" name="address_1" value="<?php echo e($registration->address_1); ?>" required>
        </div>

        <div class="form-group">
            <label for="address_2">Address2:</label>
            <input type="text" id="address_2" name="address_2" value="<?php echo e($registration->address_2); ?>">
        </div>

        <div class="form-group" id="file_upload_group">
            <label for="file_path">File Upload:</label>
            <input type="file" id="file_path" name="file_path" onchange="handleFileUpload()">
            <button type="button" class="preview-button" onclick="showPreview()">Preview</button>
            <button type="button" class="close-button" onclick="hidePreview()">Close</button>
            <img id="file_preview" src="#" alt="File Preview">
        </div>

        <div class="form-group">
            <label for="is_active">Is Active:</label>
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" id="is_active_checkbox" name="is_active" value="1" <?php echo e($registration->is_active == 1 ? 'checked' : ''); ?>>
        </div>

        <div class="form-group submit-button-container">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
<?php echo $__env->make('register.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>

<?php /**PATH /var/www/html/new_test/resources/views/register/edit_user.blade.php ENDPATH**/ ?>
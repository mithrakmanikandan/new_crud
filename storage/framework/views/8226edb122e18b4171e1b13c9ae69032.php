<script>
    //script for showing the preview of the uploaded file and closing the view 
    function showPreview() {
        var fileInput = document.getElementById('file_path');
        var filePreview = document.getElementById('file_preview');
        var closeButton = document.querySelector('.close-button');

        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                filePreview.src = e.target.result;
                filePreview.style.display = 'block';
                closeButton.style.display = 'inline-block';
            }

            reader.readAsDataURL(fileInput.files[0]);
        }
    }

    function hidePreview() {
        var filePreview = document.getElementById('file_preview');
        var closeButton = document.querySelector('.close-button');

        filePreview.src = '#';
        filePreview.style.display = 'none';
        closeButton.style.display = 'none';
    }
</script><?php /**PATH /var/www/html/new_test/resources/views/register/script.blade.php ENDPATH**/ ?>
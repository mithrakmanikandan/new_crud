<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Registration Form</title>
</head>
<body>

<div class="container">
    <h2>Registration Form</h2>
    <form action="{{route('registrations.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="dob">Date of Birth<span class="required"></span>:</label>
            <input type="date" id="dob" name="dob" required>
            @error('dob')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="phone_number_1">Phone Number1<span class="required"></span>:</label>
            <input type="text" id="phone_number_1" name="phone_number_1" required>
            @error('phone_number_1')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="phone_number_2">Phone Number2:</label>
            <input type="text" id="phone_number_2" name="phone_number_2">
            @error('phone_number_2')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="address_1">Address1<span class="required"></span>:</label>
            <input type="text" id="address_1" name="address_1" required>
        </div>

        <div class="form-group">
            <label for="address_2">Address2:</label>
            <input type="text" id="address_2" name="address_2">
        </div>

        <div class="form-group" id="file_upload_group">
            <label for="file_path">File Upload:</label>
            <input type="file" id="file_path" name="file_path" onchange="handleFileUpload()">
            <button type="button" class="preview-button" onclick="showPreview()">Preview</button>
            <button type="button" class="close-button" onclick="hidePreview()">Close</button>
            <img id="file_preview" src="#" alt="File Preview">
        </div>

        <div class="form-group submit-button-container">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
@include('register.script')
</body>
</html>


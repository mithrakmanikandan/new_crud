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
            <a class="btn btn-sm btn-success" href="{{ route('dashboard') }}">Dashboard</a>
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
        <th>@sortablelink('user_id', 'Name')</th>
        <th>Role</th>
        <th>@sortablelink('dob', 'DOB')</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>Is Active</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @if ($details->count() == 0)
        <tr>
            <td colspan="5">No data to display.</td>
        </tr>
        @endif
    @foreach($details as $detail)
        <tr>
            <td>{{ $userNames[$detail->user_id] }}</td>
            <td>{{ $roles[$detail->user_id] }}</td>
            <td>{{ $detail->dob }}</td>
            <td>{{ $detail->phone_number_1 }}</td>
            <td>{{ $detail->address_1 }}</td>
            <td>
            @if($detail->is_active == 1)
                Active
            @else
                Inactive
            @endif
        </td>
            <td>
                <td><form action="{{ route('registrations.edit', $detail->id) }}" method="GET">
                      @csrf
                      <button type="submit" class="btn btn-primary">Edit</button>
                </form></td>
                <td><form action="{{ route('registrations.destroy', $detail->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form></td>
            </td>
        </tr>
    @endforeach    
    </tbody>
  </table> 
  {{ $details->links() }}
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

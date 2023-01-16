<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Update</h2>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        <form action="{{ url('album/' . $data->id) }}" method="post" enctype="multipart/form-data">
             @csrf
            @method('patch')
            <div class="form-group">
                <label for="exampleInputName">Title</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="title"
                    placeholder="Enter Title" value="{{ $data->title }}">
            </div>



            <div class="form-group">
                <label for="exampleInputName">Image_name</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="image_name"
                    placeholder="Enter Title" value="{{ $data->image_name }}">
            </div>



            <div class="form-group">
                <label for="exampleInputName">Image</label>
                <input type="file" name="image">
            </div>


            <img src="{{ url('/albums/' . $data->image) }}" width="80" height="80">
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>


</body>

</html>

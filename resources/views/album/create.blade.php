<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ session()->get('message') }}

        <a href="{{ url('/album/') }} " class='btn btn-primary m-r-1em'>show_album</a>

        <a href="{{ url('/user/logout') }}"  class='btn btn-danger m-r-1em mr-3'>Log out</a>


        <form action="{{route('album.store') }}" method="post" enctype="multipart/form-data">
             @csrf
            <div class="form-group">
                <label for="exampleInputName">Album</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="title"
                    placeholder="Enter Title" >
             </div>

            <div class="form-group">
                <label for="exampleInputName">Image</label>
                <input type="file" name="image">
            </div>
            <div class="form-group">
                <label for="exampleInputName">Imag_name</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="image_name"
                    placeholder="Enter image_name" >
             </div>



            <button type="submit" class="btn btn-primary">save</button>

        </form>




    </div>


</body>

</html>

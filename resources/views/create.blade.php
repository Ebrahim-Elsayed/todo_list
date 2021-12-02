<!DOCTYPE html>
<html lang="en">

<head>
    <title>TODO LIST</title>
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


        <h2>create task</h2>


        <form action="{{url('/task')}}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="exampleInputName">title</label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}" id="exampleInputName"
                    aria-describedby="" placeholder="Enter title">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">description</label>
                <input type="text" class="form-control" name="description" value="{{old('description')}}" 
                     placeholder="Enter description">
            </div>

            <div class="form-group">
                <label for="exampleInputName">start date</label>
                <input type="date" class="form-control" name="startdate" value="{{old('startdate')}}" id="exampleInputName"
                    aria-describedby="" placeholder="Enter start date">
            </div>


            <div class="form-group">
                <label for="exampleInputPassword">end date</label>
                <input type="date" class="form-control" name="enddate" value="{{old('enddate')}}"
                    id="exampleInputPassword1" placeholder="enddate">
            </div>

            <div class="form-group">
                <label>Image</label> <br>
                <input class="form-control" type="file" name="image" value="{{old('image')}}">
            </div>


            <button type="submit" class="btn btn-primary">create</button>
        </form>
    </div>

</body>

</html>



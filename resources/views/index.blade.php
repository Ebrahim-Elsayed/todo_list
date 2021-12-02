
<!DOCTYPE html>
<html>

<head>
    <title>TASKS</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }
        
        .m-b-1em {
            margin-bottom: 1em;
        }
        
        .m-l-1em {
            margin-left: 1em;
        }
        
        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">
 

        <div class="page-header">
            <h1>Read tasks</h1> 
            <br>
        </div>


    <a href="{{url('/task/create')}}">Add task</a> 
    {{-- return redirect(url('/task')); --}}
        <!-- PHP code to read records will be here -->



        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>description</th>
                <th>start data</th>
                <th>end data</th>
                <th>image</th>
                <th>action</th>         
            </tr>

            @foreach ($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->startdate}}</td>
                <td>{{$item->enddate}}</td>
                
                <td><img  height="100px"  class="img" src="{{url('/images/' . $item->image )}}"></td>
                <td>
                    @if ($item->enddate > now())
                        <a data-toggle="modal" data-target="#modal_single_del{{ $item->id }}"
                            class='btn btn-danger m-r-1em'>Delete</a>                    
                    @endif
                    <a href='{{url('/task/'.$item->id.'/edit')}}' class='btn btn-primary m-r-1em'>Edit</a>       
                </td>
            </tr> 
            
            <div class="modal" id="modal_single_del{{ $item->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">delete confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            Delete {{ $item->name }} !!!!
                        </div>
                        <div class="modal-footer">
                            <form action="{{ url('task/' . $item->id) }}" method="post">

                                @method('delete') {{-- <input type="hidden" value="delete" name="_method"> --}}
                                @csrf {{-- <input type="hidden" value="{{ csrf_tokken() }}" name="_token"> --}}

                                <div class="not-empty-record">
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
       
            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>










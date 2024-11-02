<!DOCTYPE html>
<html>

<head>
    @include('admin.css')


    <style>
       

        .button {
            display: inline;
            background-color: black;
            color: gray;
            border: 3px solid red;
            border-left: none;
            border-top: none;
            margin-top: 25px;
            font-size: 15px;
            padding: 5px;
            font-weight: bold;
            margin-left: 170px;

        }

        .button:hover {
            color: red;
        }

        span {
            color: red;
        }


        .notification {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: #28a745;
            color: white;
            font-size: 20px;
            padding: 10px;
            text-align: center;
            display: none;
            z-index: 1000;
        }


        .table-deg {

            position: relative;

            margin-top: 80px;

            margin-bottom: 180px;

            width: 95%;

            margin-left: 30px;

        }

        td {
            border-bottom: 3px solid red;
            padding: 10px;
            text-align: center;
            font-size: 15px;
        }

        th {
            border-bottom: 3px solid red;
            padding: 10px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }


        .image{
            width: 150px;
            height: 100px;
        }

        .author_image{
            width: 75px;
            height: 100px;
        }


    </style>

</head>

<body>
    @include('admin.header')

    @include('admin.sidebar')


    @if (session('message'))
        <div class="notification" id="notification">
            {{ session('message') }}

            <button onclick="this.parentElement.style.display = 'none'"
                style="background: none; border: none; color: black; font-size: 20px; cursor: pointer; float: right; text-align: center;">X</button>
        </div>
    @endif


    <div class="page-content">

        <div class="container-fluid">

            <div class="page-header"
                style="text-align: center; font-size: 30px; font-weight: bold; border-left: 5px solid red; border-bottom: 5px solid red">


                <h1>Create <span>Request</span></h1>


            </div>





            <div class="table-deg">

                <table>

                    <tr>
                        

                        <th>Book Title</th>

                        <th>Author Name</th>

                        <th>Description</th>

                        <th>Category</th>

                        <th>Price</th>

                        <th>Quantity</th>

                        <th>User Name</th>

                        <th>Status</th>

                        <th>Book Image</th>

                        <th>Author Image</th>

                        <th>Status Update</th>

                        <th>Edit</th>

                        <th>Remove</th>

                    </tr>



                    @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->author_name }}</td>
                            <td>{{ Str::limit($data->description, 30) }}</td>
                            <td>{{ $data->category}}</td>                            
                            <td>{{ $data->price }}</td>
                            <td>{{ $data->quantity }}</td>
                            <td>{{ $data->username }}</td>
                                               
                            <td>

                                @if ($data->status == 'Applied')

                                <span style="color: gray">{{ $data->status }}</span>
                                    
                                @endif

                                @if ($data->status == 'Approved')

                                <span style="color: green">{{ $data->status }}</span>
                                    
                                @endif

                                
                                @if ($data->status == 'Rejected')

                                <span style="color: red">{{ $data->status }}</span>
                                    
                                @endif

                                @if ($data->status == 'Published')

                                <span style="color: blue">{{ $data->status }}</span>
                                    
                                @endif
                               
                            </td> 

                           
                            <td>
                                <img  class="image" src="/createImage/{{ $data->image }}">
                            </td>

                            <td>
                                <img  class="author_image" src="/createAuthor/{{ $data->author_image }}">
                            </td>

                            <td>

                                <a style=" font-size: 13px;" class="btn btn-success" href="{{ url('create_approve', $data->id) }}">Approved</a>
                                <a style=" font-size: 13px; margin-top: 5px;" class="btn btn-danger" href="{{ url('create_reject', $data->id) }}">Rejected</a>
                                <a style=" font-size: 13px; margin-top: 5px;" class="btn btn-info" href="{{ url('create_publish', $data->id) }}">Published</a>
                               
                            </td>

                            <td><a class="btn btn-secondary" href="{{ url('create_edit', $data->id) }}">Edit</a></td>

                            <td><a class="btn btn-danger" href="{{ url('create_delete', $data->id) }}" onclick="return confirm('Are you sure you want to delete this book?')">Delete</a></td>
                        </tr>
                    @endforeach


                </table>

            </div>


        </div>
    </div>



    @include('admin.footer')


    

    <script>
        var notification = document.getElementById('notification');

        if (notification) {

            notification.style.display = 'block';

            setTimeout(function() {

                notification.style.display = 'none';

            }, 10000);

        }
    </script>



</body>

</html>

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
            padding: 5px;
            text-align: center;
            font-size: 15px;
        }

        th {
            border-bottom: 3px solid red;
            padding: 5px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }


        .image{
            width: 150px !important;
            height: 170px !important;
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


                <h1>Show <span>Books</span></h1>


            </div>





            <div class="table-deg">

                <table>

                    <tr>
                        <th>Book Title</th>

                        <th>Author Name</th>
                        
                        <th>Category</th>

                        <th>Description</th>

                        <th>Price</th>

                        <th>Quantity</th>

                        <th>Book Image</th>

                        <th>Author Image</th>

                        <th>Latest Status</th>

                        <th>Update Status</th>

                        <th>Update Book</th>

                        <th>Delete</th>
                    </tr>



                    @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->author_name }}</td>
                            <td>{{ $data->category->cat_title }}</td>
                            <td>{{ Str::limit($data->description, 20) }}</td>
                            <td>{{ $data->price }}</td>
                            <td>{{ $data->quantity}}</td>
                            <td>
                                @if ($data->featured == '0')
                                <img class="image" src="/book/{{ $data->book_img }}">
                                @endif
                                @if ($data->featured == '1')
                                <img class="image" src="/createImage/{{ $data->book_img }}">
                                @endif
                            </td>

                            <td>
                                @if ($data->featured == '0')
                                <img class="image" src="/author/{{ $data->author_img }}">  
                                @endif
                                @if ($data->featured == '1')
                                <img class="image" src="/createAuthor/{{ $data->author_img }}">  
                                @endif
                            </td>

                            <td>{{ $data->latest }}</td>


                            <td>
                                <a class="btn btn-success" style="margin-bottom: 5px;" href="{{ url('make_latest', $data->id) }}">Latest</a>
                                <a class="btn btn-danger" href="{{ url('not_latest', $data->id) }}">Not Latest</a>
                            </td>
                            
                            <td><a class="btn btn-secondary" href="{{ url('edit_book', $data->id) }}">Update</a></td>

                            <td><a class="btn btn-danger" href="{{ url('delete_book', $data->id) }}" onclick="return confirm('Are you sure you want to delete this book?')">Delete</a></td>
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

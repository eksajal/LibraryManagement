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
            height: 200px;
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


                <h1>Book <span>Request</span></h1>


            </div>





            <div class="table-deg">

                <table>

                    <tr>
                        <th>User Name</th>

                        <th>Email</th>
                        
                        <th>Phone</th>

                        <th>Book Title</th>

                        <th>Quantity</th>

                        <th>Status</th>

                        <th>Book Image</th>

                        <th>Status Update</th>

                        <th>Remove</th>
                    </tr>



                    @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->user->email }}</td>
                            <td>{{ $data->user->phone }}</td>
                            <td>{{ $data->book->title }}</td>
                            <td>{{ $data->book->quantity }}</td>


                            <td>

                                @if ($data->status == 'Approved')

                                <span style="color: green">{{ $data->status }}</span>
                                    
                                @endif

                                
                                @if ($data->status == 'Rejected')

                                <span style="color: red">{{ $data->status }}</span>
                                    
                                @endif

                                
                                @if ($data->status == 'Returned')

                                <span style="color: blue">{{ $data->status }}</span>
                                    
                                @endif

                                
                                @if ($data->status == 'Applied')

                                <span style="color: gray">{{ $data->status }}</span>
                                    
                                @endif

                            </td>

                           
                            <td>
                                <img style="margin: auto;" class="image" src="/book/{{ $data->book->book_img }}">
                            </td>

                            <td>
                                <a style=" font-size: 13px;" class="btn btn-success" href="{{ url('approve_book', $data->id) }}">Approved</a>
                                <a style=" font-size: 13px;" class="btn btn-danger" href="{{ url('reject_book', $data->id) }}">Rejected</a>
                                <a style="margin-top: 5px; font-size: 13px;" class="btn btn-info" href="{{ url('return_book', $data->id) }}">Returned</a>
                            </td>

                            <td><a class="btn btn-danger" href="{{ url('remove_book', $data->id) }}" onclick="return confirm('Are you sure you want to delete this book?')">Delete</a></td>
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

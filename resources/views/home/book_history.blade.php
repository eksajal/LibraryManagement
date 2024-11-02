<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">

    @include('home.css')




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
            color: blue;
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
            border-bottom: 2px solid blue;
            padding: 10px;
            text-align: center;
            font-size: 15px;
            color: white;
        }

        th {
            border-bottom: 2px solid blue;
            padding: 10px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: white;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }


        .image {
            width: 150px;
            height: 200px;
        }


        .title {
            text-align: center;
            margin: auto;
            font-size: 50px;
            margin-top: 50px !important;
        }
    </style>




</head>

<body>


    @include('home.header')


    @if (session('message'))
        <div class="notification" id="notification">
            {{ session('message') }}

            <button onclick="this.parentElement.style.display = 'none'"
                style="background: none; border: none; color: black; font-size: 20px; cursor: pointer; float: right; text-align: center;">X</button>
        </div>
    @endif




    <div class="currently-market">
        <div class="container">
            <div class="row">




                <div class="title">
                    <h1>Borrow <span>History</span></h1>
                </div>


                <div class="table-deg">

                    <table>

                        <tr>

                            <th>Book Name</th>

                            <th>Author</th>

                            <th>Borrow Status</th>

                            <th>Image</th>

                            <th>Cancel Request</th>

                        </tr>



                        @foreach ($data as $data)
                            <tr>

                                <td>{{ $data->book->title }}</td>

                                <td>{{ $data->book->author_name }}</td>

                                <td>

                                    @if ($data->status == 'Approved')
                                        <span style="color: rgb(57, 217, 57)">{{ $data->status }}</span>
                                    @endif

                                    @if ($data->status == 'Rejected')
                                        <span style="color: red">{{ $data->status }}</span>
                                    @endif

                                    @if ($data->status == 'Returned')
                                        <span style="color: rgb(94, 94, 245)">{{ $data->status }}</span>
                                    @endif

                                    @if ($data->status == 'Applied')
                                        <span style="color: white">{{ $data->status }}</span>
                                    @endif

                                </td>


                                <td>
                                    @if ($data->book->featured == '0')
                                    <img style="margin: auto;" class="image" src="/book/{{ $data->book->book_img }}"> 
                                    @endif

                                    @if ($data->book->featured == '1')
                                    <img style="margin: auto;" class="image" src="/createImage/{{ $data->book->book_img }}"> 
                                    @endif                 
                                </td>

                                <td>


                                    @if ($data->status == 'Applied')
                                        <a class="btn btn-danger" href="{{ url('cancel_req', $data->id) }}"
                                            onclick="return confirm('Are you sure you want to cancel this request?')">Cancel</a>
                                    @else
                                        <a class="btn btn-danger">Not Allowed</a>
                                    @endif


                                </td>


                            </tr>
                        @endforeach

                    </table>

                </div>


                <div class="title">
                    <h1>Create <span>History</span></h1>
                </div>


                <div class="table-deg">

                    <table>

                        <tr>

                            <th>Book Title</th>

                            <th>Create Status</th>

                            <th>Image</th>

                            <th>Cancel Request</th>

                        </tr>



                        @foreach ($data2 as $data2)
                            <tr>

                                <td>{{ $data2->title }}</td>


                                <td>

                                    @if ($data2->status == 'Approved')
                                        <span style="color: rgb(57, 217, 57)">{{ $data2->status }}</span>
                                    @endif

                                    @if ($data2->status == 'Rejected')
                                        <span style="color: red">{{ $data2->status }}</span>
                                    @endif

                                    @if ($data2->status == 'Applied')
                                        <span style="color: white">{{ $data2->status }}</span>
                                    @endif

                                    @if ($data2->status == 'Published')
                                        <span style="color: blue">{{ $data2->status }}</span>
                                    @endif

                                </td>


                                <td>
                                    <img style="margin: auto;" class="image" src="/createImage/{{ $data2->image }}">
                                </td>

                                <td>


                                    @if ($data2->status == 'Applied')
                                        <a class="btn btn-danger" href="{{ url('cancel_create', $data2->id) }}"
                                            onclick="return confirm('Are you sure you want to cancel this request?')">Cancel</a>
                                    @else
                                        <a class="btn btn-danger">Not Allowed</a>
                                    @endif


                                </td>


                            </tr>
                        @endforeach


                    </table>

                </div>











            </div>
        </div>

    </div>
    </div>
    </div>





    @include('home.footer')



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

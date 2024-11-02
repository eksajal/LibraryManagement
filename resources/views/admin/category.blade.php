<!DOCTYPE html>
<html>

<head>
    @include('admin.css')


    <style>
        .form-deg {
            margin-left: 345px;
            margin-top: 80px;
            display: inline-block;
            border: 5px solid red;
            border-top: none;
            border-bottom: none;
            padding: 30px;
            margin-bottom: 120px;

        }

        .form-deg label {
            font-size: 20px;
        }

        input[type='text'] {
            width: 300px;
            height: 35px;
            background-color: rgb(42, 38, 38);
            margin-bottom: 45px;
        }

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

            left: 250px;


            margin-bottom: 80px;

        }

        td {
            border-bottom: 3px solid red;
            padding: 15px;
            text-align: center;
        }

        th {
            border-bottom: 3px solid red;
            padding: 15px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            width: 60%;
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


                <h1>Add <span>Category</span></h1>


            </div>




            <div class="form-deg">

                <form action="{{ url('add_category') }}" method="POST">
                    @csrf
                    <label for="">Category Name</label>
                    <input type="text" name="category">
                    <br>
                    <input class="button" type="submit" value="Add Category">

                </form>





                <script>
                    var notification = document.getElementById('notification');

                    if (notification) {

                        notification.style.display = 'block';

                        setTimeout(function() {

                            notification.style.display = 'none';

                        }, 10000);

                    }
                </script>

            </div>

            <div class="table-deg">

                <table>

                    <tr>
                        <th>Category Name</th>

                        <th>Update</th>
                        
                        <th>Remove</th>
                    </tr>



                    @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->cat_title }}</td>
                            
                            <td><a class="btn btn-secondary" href="{{ url('edit_category', $data->id) }}">Update</a></td>

                            <td><a class="btn btn-danger" href="{{ url('delete_category', $data->id) }}" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a></td>
                        </tr>
                    @endforeach


                </table>

            </div>


        </div>
    </div>



    @include('admin.footer')


    





</body>

</html>

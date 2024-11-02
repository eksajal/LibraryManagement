<!DOCTYPE html>
<html>

<head>

    <base href="/public">
    @include('admin.css')


    <style>
        .form-deg {
            margin-left: 345px;
            margin-top: 80px;
            display: inline-block;
            border: 5px solid red;
            border-top: none;
            border-bottom: none;
            margin-bottom: 120px;
            padding: 20px;
        }

        .form-element{
            padding: 15px;
        }

        .form-element label {
           width: 120px;
           font-size: 15px;
        }

        .form-element input{
            width: 300px;
            height: 35px;
            background-color: rgb(42, 38, 38);
        }

        textarea{
            background-color: rgb(42, 38, 38) !important;
            width: 300px;
            height: 65px;
        }

        select{
            background-color: rgb(42, 38, 38) !important;
            width: 300px;
            height: 45px;
        }

        input [type='file']{
            background-color: rgb(42, 38, 38) !important;
        }

        input [type='number']{
            background-color: rgb(42, 38, 38) !important;
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
            margin-left: 180px;

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


        .image{

            width: 250px;
            height: 150px;

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


                <h1>Update <span>Create</span></h1>


            </div>




            <div class="form-deg">

                <form action="{{ url('create_update', $data->id) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-element">
                        <label for="">Book Title</label>
                        <input type="text" name="book_name" value="{{ $data->title }}">
                    </div>

                    <div class="form-element">
                        <label for="">Author Name</label>
                        <input type="text" name="author_name" value="{{ $data->author_name }}">
                    </div>


                    <div class="form-element">
                        <label for="">Category</label>
                        <select name="category" required>

                            <option value="">Select a Category</option>
                          
                            @foreach ($category as $category)
                                
                            <option value="{{ $category->id }}">{{ $category->cat_title }}</option>

                            @endforeach
                                                                    
                        </select>
                    </div>


                   
                    <div class="form-element">
                        <label for="">Description</label>
                        <textarea name="description">{{ $data->description }}</textarea>
                    </div>

                    <div class="form-element">
                        <label for="">Price</label>
                        <input type="number" name="price" value="{{ $data->price }}">
                    </div>

                    <div class="form-element">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" value="{{ $data->quantity }}">
                    </div>

                    <div class="form-element">
                        <label for="">Current Book Image</label>
                        <img class="image" src="/createImage/{{ $data->image }}" alt="">                      
                    </div>

                    <div class="form-element">
                        <label for="">Change Book Image</label>
                        <input type="file" name="book_img">
                    </div>


                    <div class="form-element">
                        <label for="">Current Author Image</label>
                        <img class="image" src="/createAuthor/{{ $data->author_image }}" alt="">
                    </div>


                    <div class="form-element">
                        <label for="">Change Author Image</label>
                        <input type="file" name="author_img">
                    </div>
                    
                    <div>
                        <input class="button" type="submit" value="Update Book">
                    </div>
                    

                </form>





               

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

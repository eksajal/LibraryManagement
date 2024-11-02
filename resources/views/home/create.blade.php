<!DOCTYPE html>
<html lang="en">

<head>

    @include('home.css')



    <style>
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
    </style>



</head>

<body>


    @if (session('message'))
        <div class="notification" id="notification">
            {{ session('message') }}

            <button onclick="this.parentElement.style.display = 'none'"
                style="background: none; border: none; color: black; font-size: 20px; cursor: pointer; float: right; text-align: center;">X</button>
        </div>
    @endif


    @include('home.header')


    <div class="item-details-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2>Apply For <em>Your Item</em> Here.</h2>
                    </div>
                </div>
                <div class="col-lg-8" style="margin: auto;" >

                    <form id="contact" action="{{ url('createyours') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="title">Item Title</label>
                                    <input type="text" name="title" id="title" placeholder="Item title"
                                        autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="description">Description For Item</label>
                                    <input type="text" name="description" id="description"
                                        placeholder="Write a brief description" autocomplete="on" required>
                                </fieldset>
                            </div>


                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="author_name">Author Name</label>
                                    <input type="text" name="author_name" id="author_name" placeholder="Enter Author's Name"
                                        autocomplete="on" required>
                                </fieldset>
                            </div>

                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="price">Price Of Item</label>
                                    <input type="number" name="price" id="price" placeholder="Item price"
                                        autocomplete="on" required>
                                </fieldset>
                            </div>

                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="quantity" id="price" placeholder="Enter quantity of Item"
                                        autocomplete="on" required>
                                </fieldset>
                            </div>


                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="username">Your Username</label>
                                    <input type="text" name="username" id="username" placeholder="Your username"
                                        autocomplete="on" required>
                                </fieldset>
                            </div>
                            
                           
                            <div class="col-lg-4">
                                <fieldset>
                                    <label for="file">Item Image</label>
                                    <input type="file" id="file" name="image" />
                                </fieldset>
                            </div>


                            <div class="col-lg-4">
                                <fieldset>
                                    <label for="file">Author Image</label>
                                    <input type="file" id="file" name="author_image" />
                                </fieldset>
                            </div>


                            <div class="col-lg-8">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="orange-button">Submit Your
                                        Applying</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>


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

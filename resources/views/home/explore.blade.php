<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">

    @include('home.css')


    <style>
        .button {

            border: 2px solid blue;
            text-decoration: none;
            color: gray;
            background-color: black;
            padding: 2px;
            border-top: none;
            border-left: none;

        }

        .book_image_home {
            border-radius: 20px !important;
            width: 200px !important;
            /* Fixed width */
            height: 300px !important;
            /* Fixed height */
            object-fit: cover !important;
            /* Ensures the image fits within the dimensions without distortion */
            display: block !important;
            /* Ensures the image is treated as a block element */
            max-width: none !important;
            /* Prevent any max-width properties from affecting the image */
            max-height: none !important;
            /* Prevent any max-height properties from affecting the image */
        }
    </style>

</head>

<body>


    @include('home.header')



    <div class="currently-market">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2><em>Items</em> Currently In The Market.</h2>
                    </div>
                </div>




                <div class="col-lg-6" style="margin: auto; margin-top: 100px; margin-bottom: 120px;">

                    <div class="filters" style="text-align: center;">

                        <ul
                            style="display: flex; justify-content: center; align-items: center; padding-left: 0; margin-bottom: 0;">

                            <li style="margin-right: 15px; white-space: nowrap;" data-filter="*" class="active">All
                                Books</li>

                            @foreach ($category as $category)
                                <li style="margin-right: 5px; white-space: nowrap;" data-filter=".msc">

                                  <a style="color: white;" href="{{ url('cat_search', $category->id) }}">{{ $category->cat_title }}</a>  

                                </li>
                            @endforeach

                        </ul>

                    </div>

                </div>



                <form action="{{ url('search') }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-md-6" style="margin-bottom: 50px; position: relative;">
                            <input class="form-control" type="search" name="search"
                                placeholder="Search for book title , author name"
                                style="padding-right: 40px; width: 100%; border: 3px solid blue; border-left: none; border-top: none;">
                            <!-- Input styled as a button with an icon -->
                            <input type="submit" value="&#128269;" class="form-control"
                                style="position: absolute; right: 0; top: 0; height: 100%; width: 40px; border: none; margin-right: 20px; background-color: transparent; text-align: center; font-size: 18px;">
                        </div>
                    </div>
                </form>


                <div class="col-lg-12">
                    <div class="row grid">
                        @foreach ($data as $book)
                            <div class="col-lg-6 currently-market-item all msc">
                                <div class="item">
                                    <div class="left-image">

                                        @if ($book->featured == '0')
                                            <img class="book_image_home" src="book/{{ $book->book_img }}" alt=""
                                            style="">
                                        @endif

                                        @if ($book->featured == '1')
                                        <img class="book_image_home" src="createImage/{{ $book->book_img }}" alt=""
                                        style="">
                                        @endif
                                        
                                    </div>
                                    <div class="right-content">
                                        <h4>{{ $book->title }}</h4>
                                        <span class="author">

                                            @if ($book->featured == '0')
                                                <img src="author/{{ $book->author_img }}" alt=""
                                                style="width: 50px; height: 50px; border-radius: 50%;">
                                            @endif

                                            @if ($book->featured == '1')
                                            <img src="createAuthor/{{ $book->author_img }}" alt=""
                                            style="width: 50px; height: 50px; border-radius: 50%;">
                                            @endif
                                            
                                            <h6>{{ $book->author_name }}</h6>
                                        </span>
                                        <div class="line-dec"></div>
                                        <span class="bid">
                                            Current Available<br><strong>{{ $book->quantity }}</strong><br>
                                        </span>

                                        <div class="text-button">
                                            <a href="{{ url('book_details', $book->id) }}">View Item Details</a>
                                        </div>

                                        <!-- Apply to Borrow Button -->
                                        <div style="margin-top: 30px;">
                                            @if ($book->quantity > 0)
                                                <a class="button" href="{{ url('/borrow_books/' . $book->id) }}">
                                                    Apply to Borrow
                                                </a>
                                            @else
                                                <a class="button" href="#"
                                                    onclick="showNotification(event, '{{ $book->id }}')">
                                                    Apply to Borrow
                                                </a>
                                            @endif
                                        </div>

                                        <!-- Display Messages -->
                                        @if (session('message') && session('book_id') == $book->id)
                                            <div id="message-{{ $book->id }}" class="message"
                                                style="color: white; text-align: center; margin-top: 5px;
                                                 background-color: {{ $book->quantity > 0 ? 'green' : 'red' }};">
                                                {{ session('message') }}
                                                <button onclick="this.parentElement.style.display='none'"
                                                    style="float: right; color: white; background: transparent; border: none;">X</button>
                                            </div>
                                            <script>
                                                // Hide the message after 10 seconds
                                                setTimeout(() => {
                                                    document.getElementById('message-{{ $book->id }}').style.display = 'none';
                                                }, 10000);
                                            </script>
                                        @endif

                                        <!-- Notification Div -->
                                        <div id="notification-{{ $book->id }}" class="notification"
                                            style="display: none; background-color: red; color: white; text-align: center; margin-top: 5px;">
                                            Book '{{ $book->title }}' is not available right now!
                                            <button onclick="this.parentElement.style.display='none'"
                                                style="float: right; color: white; background: transparent; border: none;">X</button>
                                        </div>
                                        <!-- End Notification Div -->

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination Links -->
                <div class="pagination-links" style="text-align: center; margin-top: 20px;">
                    {{ $data->links('pagination::bootstrap-4') }}
                </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function showNotification(event, bookId) {
            event.preventDefault(); // Prevent the default action of the link

            var notification = document.getElementById('notification-' + bookId);
            if (notification) {
                notification.style.display = 'block';
                setTimeout(() => {
                    notification.style.display = 'none';
                }, 3000); // Display for 3 seconds
            }
        }
    </script>



    @include('home.footer')


</body>

</html>

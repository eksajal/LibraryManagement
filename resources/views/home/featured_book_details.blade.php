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

        .book_details_image {
            border-radius: 20px !important;
            width: 300px !important; /* Increase width */
            height: 500px !important; /* Increase height */
            object-fit: cover !important;
            display: block !important;
        }

        .book_description {
            height: 200px !important; /* Increase height */
            overflow-y: auto;
            font-size: 15px;
            text-align: left;
            border: 1px solid blue;
            border-top: none;
            border-bottom: none;
            background: rgb(64, 58, 58);
            padding: 10px; /* Increase padding */
            box-sizing: border-box;
        }

        .author-info {
            margin-bottom: 50px; /* Space below author info */
            margin-left: 350px;
        }

      
        /* Centering the block using flexbox */
        .currently-market-item-container {
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: flex-start; /* Align items to the start */
            padding: 20px;
        }

        .currently-market-item {
            width: 100%;
            max-width: 1100px; /* Increased max-width */
            display: flex;
            justify-content: flex-start; /* Align items to the start */
            align-items: flex-start;
            padding: 20px;
            border-radius: 15px; /* Optional: Rounded corners */
        }

        .item {
            display: flex;
            align-items: flex-start;
            width: 100%;
        }

        .right-content {
            margin-left: 20px; /* Adjust space between image and content */
            flex: 1;
        }
    </style>
</head>

<body>
    @include('home.header')

    <div class="currently-market">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Flex container to center content -->
                    <div class="currently-market-item-container">
                        <div class="currently-market-item all msc">
                            <div class="item">
                                <div class="left-image">
                                    <img class="book_details_image" src="createImage/{{ $book->image }}" alt="">
                                </div>
                                <div class="right-content">
                                    <h1 style="font-size: 40px;">{{ $book->title }}</h1>
                                    <div class="author-info">
                                        <span class="author">
                                            <img src="createAuthor/{{ $book->author_image }}" alt=""
                                                style="width: 85px; height: 85px; border-radius: 50%;">
                                            <h6>Author:</h6>
                                            <h5 style="font-size: 18px;">{{ $book->author_name }}</h5>
                                        </span>
                                    </div>
                                    <div class="line-dec"></div>
                                    <span class="bid">
                                        Current Available<br><strong>{{ $book->quantity }}</strong><br>
                                    </span>
                                    <br>
                                    <span class="bid">
                                        Category: <strong>{{ $book->category }}</strong>
                                    </span>

                                    <div class="text-button">
                                        <h5>Storyline</h5>
                                        <p class="book_description">{{ $book->description }}</p>
                                    </div>

                                    <div style="margin-top: 30px;">
                                        @if ($book->quantity > 0)
                                            <a class="button" href="{{ url('borrow_books' , $book->id) }}">
                                                Apply to Borrow
                                            </a>
                                        @else
                                            <a class="button" href="#"
                                                onclick="showNotification(event, '{{ $book->id }}')">
                                                Apply to Borrow
                                            </a>
                                        @endif
                                    </div>

                                    @if (session('message') && session('book_id') == $book->id)
                                        <div id="message-{{ $book->id }}" class="message"
                                            style="color: white; text-align: center; margin-top: 5px;
                                            background-color: {{ $book->quantity > 0 ? 'green' : 'red' }};">
                                            {{ session('message') }}
                                            <button onclick="this.parentElement.style.display='none'"
                                                style="float: right; color: white; background: transparent; border: none;">X</button>
                                        </div>
                                        <script>
                                            setTimeout(() => {
                                                document.getElementById('message-{{ $book->id }}').style.display = 'none';
                                            }, 10000);
                                        </script>
                                    @endif

                                    <div id="notification-{{ $book->id }}" class="notification"
                                        style="display: none; background-color: red; color: white; text-align: center; margin-top: 5px;">
                                        Book '{{ $book->title }}' is not available right now!
                                        <button onclick="this.parentElement.style.display='none'"
                                            style="float: right; color: white; background: transparent; border: none;">X</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

    <script>
        function showNotification(event, bookId) {
            event.preventDefault();
            var notification = document.getElementById('notification-' + bookId);
            if (notification) {
                notification.style.display = 'block';
                setTimeout(() => {
                    notification.style.display = 'none';
                }, 3000);
            }
        }
    </script>

    @include('home.footer')
</body>

</html>

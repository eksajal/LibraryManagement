<div class="currently-market">
    <div class="container">
        <div class="row">
            <!-- Section Heading -->
            <div class="col-lg-6">
                <div class="section-heading">
                    <div class="line-dec"></div>
                    <h2><em>Items</em> Currently In The Market.</h2>
                </div>
            </div>

            <!-- Filter Section -->
            <div class="col-lg-6">
                <div class="filters">
                    <ul>
                        <li data-filter="*" class="active">All Books</li>
                        <li data-filter=".msc">Featured</li>
                        <li data-filter=".dig">Latest</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="row grid">
                    @foreach ($data1 as $book)
                        <div class="col-lg-6 currently-market-item all">
                            <div class="item">
                                @if ($book->featured == '0')
                                    <div class="left-image">
                                        <img class="book_image_home" src="book/{{ $book->book_img }}" alt="">
                                    </div>
                                @endif

                                @if ($book->featured == '1')
                                    <img class="book_image_featured" src="createImage/{{ $book->book_img }}"
                                        alt="">
                                @endif

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
                                            <a class="button" href="{{ url('/borrow_books/' . $book->id) }}">Apply to
                                                Borrow</a>
                                        @else
                                            <a class="button" href="#"
                                                onclick="showNotification(event, '{{ $book->id }}')">Apply to
                                                Borrow</a>
                                        @endif
                                    </div>

                                    <!-- Display Messages -->
                                    @if (session('message') && session('book_id') == $book->id)
                                        <div id="message-{{ $book->id }}" class="message"
                                            style="color: white; text-align: center; margin-top: 5px; background-color: {{ $book->quantity > 0 ? 'green' : 'red' }};">
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

                                    <!-- Notification Div -->
                                    <div id="notification-{{ $book->id }}" class="notification"
                                        style="display: none; background-color: red; color: white; text-align: center; margin-top: 5px;">
                                        Book '{{ $book->title }}' is not available right now!
                                        <button onclick="this.parentElement.style.display='none'"
                                            style="float: right; color: white; background: transparent; border: none;">X</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>



                <div class="row grid">
                    @foreach ($data2 as $book)
                        <div class="col-lg-6 currently-market-item all msc">
                            <div class="item">
                                @if ($book->featured == '0')
                                    <div class="left-image">
                                        <img class="book_image_home" src="book/{{ $book->book_img }}" alt="">
                                    </div>
                                @endif

                                @if ($book->featured == '1')
                                    <img class="book_image_featured" src="createImage/{{ $book->book_img }}"
                                        alt="">
                                @endif

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
                                            <a class="button" href="{{ url('/borrow_books/' . $book->id) }}">Apply to
                                                Borrow</a>
                                        @else
                                            <a class="button" href="#"
                                                onclick="showNotification(event, '{{ $book->id }}')">Apply to
                                                Borrow</a>
                                        @endif
                                    </div>

                                    <!-- Display Messages -->
                                    @if (session('message') && session('book_id') == $book->id)
                                        <div id="message-{{ $book->id }}" class="message"
                                            style="color: white; text-align: center; margin-top: 5px; background-color: {{ $book->quantity > 0 ? 'green' : 'red' }};">
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

                                    <!-- Notification Div -->
                                    <div id="notification-{{ $book->id }}" class="notification"
                                        style="display: none; background-color: red; color: white; text-align: center; margin-top: 5px;">
                                        Book '{{ $book->title }}' is not available right now!
                                        <button onclick="this.parentElement.style.display='none'"
                                            style="float: right; color: white; background: transparent; border: none;">X</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                
                <div class="row grid">
                    @foreach ($data3 as $book)
                        <div class="col-lg-6 currently-market-item all dig">
                            <div class="item">
                                @if ($book->featured == '0')
                                    <div class="left-image">
                                        <img class="book_image_home" src="book/{{ $book->book_img }}" alt="">
                                    </div>
                                @endif

                                @if ($book->featured == '1')
                                    <img class="book_image_featured" src="createImage/{{ $book->book_img }}"
                                        alt="">
                                @endif

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
                                            <a class="button" href="{{ url('/borrow_books/' . $book->id) }}">Apply to
                                                Borrow</a>
                                        @else
                                            <a class="button" href="#"
                                                onclick="showNotification(event, '{{ $book->id }}')">Apply to
                                                Borrow</a>
                                        @endif
                                    </div>

                                    <!-- Display Messages -->
                                    @if (session('message') && session('book_id') == $book->id)
                                        <div id="message-{{ $book->id }}" class="message"
                                            style="color: white; text-align: center; margin-top: 5px; background-color: {{ $book->quantity > 0 ? 'green' : 'red' }};">
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

                                    <!-- Notification Div -->
                                    <div id="notification-{{ $book->id }}" class="notification"
                                        style="display: none; background-color: red; color: white; text-align: center; margin-top: 5px;">
                                        Book '{{ $book->title }}' is not available right now!
                                        <button onclick="this.parentElement.style.display='none'"
                                            style="float: right; color: white; background: transparent; border: none;">X</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


          <!-- Pagination Links -->
    <div class="pagination-links" style="text-align: center; margin-top: 20px;">
        {{ $data1->links('pagination::bootstrap-4') }}
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

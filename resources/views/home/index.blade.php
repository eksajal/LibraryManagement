<!DOCTYPE html>
<html lang="en">

<head>


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


        .book_image_featured{
            border-radius: 20px !important;
            width: 350px !important;
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

    @include('home.main_banner')

    @include('home.category')

    @include('home.book')

    @include('home.footer')


</body>

</html>

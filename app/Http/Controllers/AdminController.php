<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use App\Models\Create;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{


    public function index()
    {

        if (Auth::id()) {

            $usertype = Auth::user()->usertype;

            if ($usertype == 'admin') {

                $user = User::all()->count();

                $book = Book::all()->count();

                $borrow = Borrow::where('status', 'Approved')->count();

                $return = Borrow::where('status', 'Returned')->count();

                return view('admin.index', compact('user', 'book', 'borrow', 'return'));
            } elseif ($usertype == 'user') {


                $data1 = Book::where('featured', 0)->paginate(2);

                $data2 = Book::where('featured', 1)->paginate(2);

                $data3 = Book::where('latest', 1)->paginate(2);


                return view('home.index', compact('data1', 'data2', 'data3'));
            }
        } else {
            return redirect()->back();
        }
    }


    public function category_page()
    {

        $data = Category::all();

        return view('admin.category', compact('data'));
    }



    public function add_category(Request $request)
    {

        $data = new Category();

        $data->cat_title = $request->category;

        $data->save();



        return redirect()->back()->with('message', 'Category added successfully!');
    }



    public function delete_category($id)
    {

        $data = Category::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Category deleted successfully!');
    }

    public function edit_category($id)
    {

        $data = Category::find($id);

        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {

        $data = Category::find($id);

        $data->cat_title = $request->category;

        $data->save();

        return redirect('/category_page')->with('message', 'Category updated successfully!');
    }

    public function add_book()
    {

        $data = Category::all();

        return view('admin.add_book', compact('data'));
    }

    public function store_book(Request $request)
    {

        $data = new Book();

        $data->title = $request->book_name;
        $data->author_name = $request->author_name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category_id = $request->category;


        $book_image = $request->book_img;

        $author_image = $request->author_img;

        if ($book_image) {

            $book_image_name = time() . '.' . $book_image->getClientOriginalExtension();

            $request->book_img->move('book', $book_image_name);

            $data->book_img = $book_image_name;
        }

        if ($author_image) {

            $author_image_name = time() . '.' . $author_image->getClientOriginalExtension();

            $request->author_img->move('author', $author_image_name);

            $data->author_img = $author_image_name;
        }



        $data->save();

        return redirect()->back()->with('message', 'Book added successfully!');
    }


    public function show_book()
    {

        $data = Book::all();

        return view('admin.show_book', compact('data'));
    }

    public function edit_book($id)
    {

        $data = Book::find($id);

        $category = Category::all();

        return view('admin.update_book', compact('data', 'category'));
    }

    public function delete_book($id)
    {

        $data = Book::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Book deleted successfully!');
    }

    public function update_book(Request $request, $id)
    {

        $data = Book::find($id);

        $data->title = $request->book_name;
        $data->author_name = $request->author_name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category_id = $request->category;

        $book_image = $request->book_img;

        $author_image = $request->author_img;

        if ($book_image) {

            $book_image_name = time() . '.' . $book_image->getClientOriginalExtension();

            $request->book_img->move('book', $book_image_name);

            $data->book_img = $book_image_name;
        }

        if ($author_image) {

            $author_image_name = time() . '.' . $author_image->getClientOriginalExtension();

            $request->author_img->move('author', $author_image_name);

            $data->author_img = $author_image_name;
        }

        $data->save();

        return redirect('/show_book')->with('message', 'Book updated successfully!');
    }


    public function borrow_request()
    {

        $data = Borrow::all();

        return view('admin.borrow_request', compact('data'));
    }

    public function approve_book($id)
    {



        $data = Borrow::find($id);

        $status = $data->status;



        if ($status == 'Approved') {

            return redirect()->back()->with('message', 'The book has approved already!');
        } else {

            $data->status = 'Approved';

            $data->save();

            $bookid = $data->book_id;

            $book = Book::find($bookid);

            $book_qty = $book->quantity - '1';

            $book->quantity = $book_qty;

            $book->save();

            return redirect()->back();
        }
    }



    public function return_book($id)
    {



        $data = Borrow::find($id);

        $status = $data->status;



        if ($status == 'Returned') {

            return redirect()->back()->with('message', 'The book has returned already!');
        } else {

            $data->status = 'Returned';

            $data->save();

            $bookid = $data->book_id;

            $book = Book::find($bookid);

            $book_qty = $book->quantity + '1';

            $book->quantity = $book_qty;

            $book->save();

            return redirect()->back();
        }
    }



    public function reject_book($id)
    {

        $data = Borrow::find($id);

        $data->status = 'Rejected';

        $data->save();

        return redirect()->back();
    }

    public function remove_book($id)
    {

        $data = Borrow::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Book has removed successfully!');
    }


    public function create_request()
    {

        $data = Create::all();

        return view('admin.create_request', compact('data'));
    }

    public function create_approve($id)
    {

        $data = Create::find($id);

        $data->status = 'Approved';

        $data->save();

        return redirect()->back();
    }

    public function create_reject($id)
    {

        $data = Create::find($id);

        $data->status = 'Rejected';

        $data->save();

        return redirect()->back();
    }





    public function create_publish($id)
    {
        DB::transaction(function () use ($id) {
            // Find the book in the create table
            $createBook = Create::find($id);

            if ($createBook) {
                // Create a new entry in the Book table
                $book = new Book();
                $book->title = $createBook->title;
                $book->author_name = $createBook->author_name;
                $book->description = $createBook->description;
                $book->category_id = $createBook->category; // Ensure this column exists in the Book table
                $book->price = $createBook->price;
                $book->quantity = $createBook->quantity;
                $book->book_img = $createBook->image;
                $book->author_img = $createBook->author_image;
                $book->featured = true;       // Mark the book as featured
                $book->save();

                // Update the status of the original book in the create table
                $createBook->status = 'Published';
                $createBook->save();

                // Redirect back with a success message

            }
        });

        return redirect()->back()->with('message', 'Book published successfully and added to the homepage!');
    }






    public function create_edit($id)
    {


        $data = Create::find($id);

        $category = Category::all();

        return view('admin.create_update', compact('data', 'category'));
    }



    public function create_update(Request $request, $id)
    {

        $data = Create::find($id);

        $data->title = $request->book_name;
        $data->author_name = $request->author_name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $book_image = $request->book_img;

        $author_image = $request->author_img;

        if ($book_image) {

            $book_image_name = time() . '.' . $book_image->getClientOriginalExtension();

            $request->book_img->move('createImage', $book_image_name);

            $data->image = $book_image_name;
        }

        if ($author_image) {

            $author_image_name = time() . '.' . $author_image->getClientOriginalExtension();

            $request->author_img->move('createAuthor', $author_image_name);

            $data->author_image = $author_image_name;
        }

        $data->save();

        return redirect('/create_request')->with('message', 'Data updated successfully!');
    }



    public function create_delete($id){


        $data = Create::find($id);


        $data->delete();


        return redirect()->back()->with('message', 'Book deleted successfully!');


    }



    public function make_latest($id)
    {

        $data = Book::find($id);

        $data->latest = '1';

        $data->save();

        return redirect()->back();
    }

    public function not_latest($id)
    {

        $data = Book::find($id);

        $data->latest = '0';

        $data->save();

        return redirect()->back();
    }
}

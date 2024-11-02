<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use App\Models\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\Configuration\Merger;

class HomeController extends Controller
{
    
    public function index()
    {
              
        $data1 = Book::where('featured', 0)->paginate(2);

        $data2 = Book::where('featured', 1)->paginate(2);

        $data3 = Book::where('latest', 1)->paginate(2);


        return view('home.index', compact('data1', 'data2', 'data3'));
    }

   
    public function book_details($id)
    {
        
        $book = Book::find($id);
      
        return view('home.book_details', compact('book'));
    }


    public function featured_book_details($id){
        
        
        $book = Create::find($id);

      
        return view('home.featured_book_details', compact('book'));


    }

  
    public function borrow_books($id)
    {
        
        $book = Book::find($id);
      
        $quantity = $book->quantity;

       
        if ($quantity >= 1) {
            
            if (Auth::check()) {
             
                $user_id = Auth::id();

               
                $borrow = new Borrow();
                $borrow->book_id = $id;
                $borrow->user_id = $user_id;
                $borrow->status = 'Applied';
                $borrow->save();

               
                return redirect()->back()->with([
                    'message' => 'Book borrowing request has been sent to admin successfully!',
                    'book_id' => $id
                ]);
            } else {
                
                return redirect('/login')->with('message', 'You need to log in first.');
            }
        } else {
            
            return redirect()->back()->with([
                'message' => 'This book is not available right now!',
                'book_id' => $id
            ]);
        }
    }

    public function book_history()
    {


        if (Auth::id()) {

            $userid = Auth::user()->id;

            $data = Borrow::where('user_id', '=', $userid)->get();

            $data2 = Create::where('user_id', '=', $userid)->get();

            return view('home.book_history', compact('data', 'data2'));
        }

        
    }


    public function cancel_req($id)
    {

        $data = Borrow::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Book borrowed request cancelled successfully!');
    }

    public function explore()
    {

        $data = Book::paginate(4);

        $category = Category::all();

        return view('home.explore', compact('data', 'category'));
    }


    public function search(Request $request)
    {

        $category = Category::all();

        $search = $request->search;

        $data = Book::where('title', 'LIKE', '%' . $search . '%')
            ->orWhere('author_name', 'LIKE', '%' . $search . '%')->paginate(4);

        return view('home.explore', compact('data', 'category'));
    }



    public function cat_search($id)
    {

        $category = Category::all();

        $data = Book::where('category_id', $id)->paginate(4);

        return view('home.explore', compact('data', 'category'));
    }



    public function create()
    {

        if (Auth::id()) {

            return view('home.create');
        } else {

            return redirect('login');
        }
    }


    public function createyours(Request $request)
    {

        $create = new Create();

        $create->user_id = Auth::user()->id;

        $create->title = $request->title;

        $create->description = $request->description;

        $create->author_name = $request->author_name;

        $create->price = $request->price;

        $create->quantity = $request->quantity;

        $create->username = $request->username;

        $image = $request->image;

        $author_img = $request->author_image;

        if ($image) {

            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('createImage', $imagename);

            $create->image = $imagename;
        }

        if ($author_img) {

            $author_imagename = time().'.'.$author_img->getClientOriginalExtension();

            $request->author_image->move('createAuthor', $author_imagename);

            $create->author_image = $author_imagename;
        }




        $create->save();

        return redirect()->back()->with('message', 'Your Applying request has sent to admin Successfully!');
    }


    public function cancel_create($id)
    {

        $data = Create::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Book Creation request cancelled Successfully!');
    }


}

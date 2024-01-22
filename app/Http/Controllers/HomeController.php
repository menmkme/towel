<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Reply;
use Session;
use Stripe;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function redirect() {
        $usertype = Auth::user()->usertype;
        if($usertype == '1') {

            $total_product = product::all()->count();
            $total_order = order::all()->count();
            $total_customers = user::all()->count();

            $order = order::all();

            $total_revenue = 0;

            foreach($order as $order) {
                $total_revenue = $total_revenue + $order->price;
            }

            $order_delivered = order::where('delivery_status', '=', 'delivered')->get()->count();
            $order_on_process = order::where('delivery_status', '=', 'Processing')->get()->count();


            return view('admin.home', compact('total_product','total_order','total_customers',
                                             'total_revenue','order_delivered','order_on_process'));

        } else {
            $product = product::paginate(6);

            $comment = comment::all();
            $comment = comment::orderby('id', 'desc')->get();
            $reply = reply::all();
            // $reply = reply::orderby('id', 'desc')->get();
        return view('home.userpage', compact('product', 'comment', 'reply'));
        }
    }

    public function index() {

        $product = product::paginate(6);
        $comment = comment::all();
        $comment = comment::orderby('id', 'desc')->get();
        $reply = reply::all();
        // $reply = reply::orderby('id', 'desc')->get();
        return view('home.userpage', compact('product', 'comment', 'reply'));
    }

    public function product_details($id) {

        $product = product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_to_cart(Request $request, $id) {

        if(Auth::id()) {

            $user = Auth::user();
            $userid = $user->id;
            $product = product::find($id);

            $product_exist_id = cart::where('product_id', '=', $id)->where('user_id', '=', $userid)
                                            ->get('id')->first();


            if($product_exist_id) {

                $cart = cart::find($product_exist_id)->first();

                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;

                if($product->discount_price !=null) {
                    $cart->price = $product->discount_price * $cart->quantity;
                } else {
                    $cart->price = $product->price * $cart->quantity;
                }

                $cart->save();

                Alert::success('Product Added Successfully', 'We have added product to the cart');

                return redirect()->back();
                // ->with('message', 'Product added successful');
            }
            else {

                $cart = new cart;

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;
            $cart->quantity = $request->quantity;

            if($product->discount_price !=null) {
                $cart->price = $product->discount_price * $request->quantity;
            } else {
                $cart->price = $product->price * $request->quantity;
            }

            $cart->image = $product->image;
            $cart->product_id = $product->id;

            $cart->save();

            Alert::success('Product Added Successfully', 'We have added product to the cart');
            return redirect()->back();
            // ->with('message', 'Product added successful');
            }

        } else {

            return redirect('login');
        }
    }

    public function show_cart() {

        if(Auth::id()) {
             $id = Auth::user()->id;
        $cart = cart::where('user_id', '=', $id)->get();
        return view('home.show_cart', compact('cart'));
        } else {
            return redirect('login');
        }


    }

    public function delete_cart($id) {

        $cart = cart::find($id);
        $cart->delete();

        Alert::success('Product deleted Successfully', 'We have deleted this product from cart');
        return redirect()->back();
        // ->with('message', 'Product deleted successfully from cart');

    }

    public function cash_order(Request $request) {

        $cart = 'carts';
        $isEmpty = DB::table($cart)->count() === 0;

        if($isEmpty) {

            Alert::info('No Data Found', 'No data in the cart table you have to go and place order...');
            return redirect()->back();

        }
        else {

            $user = Auth::user();

        $userid = $user->id;

        $data = cart::where('user_id', '=', $userid)->get();

        foreach($data as $data) {

            $order = new order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'Processing';

            $order->save();

            $cart_id = $data->id;

            $cart = cart::find($cart_id);
            $cart->delete();
        }

        Alert::success('Order place Successful', 'We have Received your Order. We will connect with you soon...');
        return redirect()->back();
        // ->with('message', 'We have Received your Order. We will connect with you soon...');

        }


    }

    public function stripe($totalprice) {

        $cart = 'carts';
        $isEmpty = DB::table($cart)->count() ===0;

        if($isEmpty) {

            Alert::info('No Data Found', 'No data in the cart table you have to go and place order...');
            return redirect()->back();
        }
        else {

            return view('home.stripe', compact('totalprice'));
        }


    }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for Payment."
        ]);

        $user = Auth::user();

        $userid = $user->id;

        $data = cart::where('user_id', '=', $userid)->get();

        foreach($data as $data) {

            $order = new order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'Paid';
            $order->delivery_status = 'Processing';

            $order->save();

            $cart_id = $data->id;

            $cart = cart::find($cart_id);
            $cart->delete();
        }

        Alert::success('Success', 'Payment Done Successful...');
        // Session::flash('success', 'Payment successful!');

        return back();
    }

    public function show_order() {

        if(Auth::id()) {

            $user = Auth::user();
            $userid = $user->id;

            $order = order::where('user_id', '=', $userid)->get();
            return view('home.order', compact('order'));
        }
        else {
            return redirect('login');
        }
    }

    public function cancel_order($id) {

        $order = order::find($id);

        $order->delivery_status = "Canceled";
        $order->save();

        Alert::success('Order Canceled Successfully', 'We have cancel this order');
        return redirect()->back();

    }

    public function add_comment(Request $request) {

        if(Auth::id()) {
            $comment = new comment;

            $comment->name = Auth::user()->name;
            $comment->user_id = Auth::user()->id;

            $comment->comment = $request->comment;

            $comment->save();

            return redirect()->back();
        }
        else {
            return redirect('login');
        }
    }

    public function add_reply(Request $request) {

        if(Auth::id()) {
            $reply = new reply;

            $reply->name = Auth::user()->name;
            $reply->user_id = Auth::user()->id;

            $reply->comment_id = $request->commentId;
            $reply->reply = $request->reply;

            $reply->save();

            return redirect()->back();
        }
        else {
            return redirect('login');
        }

    }

    public function product_search(Request $request) {

        $comment = comment::orderby('id', 'desc')->get();
        $reply = reply::all();

        $searct_text = $request->search;

        $product = product::where('title', 'LIKE', "%$searct_text%")->orWhere('catagory', 'LIKE', "%$searct_text%")
                            ->orWhere('price', 'LIKE', "%$searct_text%")->paginate(6);

       return view('home.userpage', compact('product','comment','reply'));
        // return redirect()->back();
    }

    public function all_product() {

        $product = product::paginate(6);
        return view('home.all_product', compact('product'));
    }

    public function search_product(Request $request) {

        $comment = comment::orderby('id', 'desc')->get();
        $reply = reply::all();

        $searct_text = $request->search;

        $product = product::where('title', 'LIKE', "%$searct_text%")->orWhere('catagory', 'LIKE', "%$searct_text%")
                            ->orWhere('price', 'LIKE', "%$searct_text%")->paginate(6);

       return view('home.all_product', compact('product','comment','reply'));
        // return redirect()->back();
    }
}

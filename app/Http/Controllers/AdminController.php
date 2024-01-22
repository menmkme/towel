<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;
use PDF;
use Notification;
use App\Notifications\SendEmailNotification;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Notifications\Notification as NotificationsNotification;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function view_category() {

        if(Auth::id()) {
            $data = catagory::all();
        return view('admin.category', compact('data'));
        }
        else {

            return redirect('login');
        }

    }
    public function add_catagory(Request $request) {

        $data = new catagory;
        $data->catagory_name = $request->catagory;

        $data->save();

        Alert::success('Catagory Added Successfully', 'You added new Catagory');
        return redirect()->back();
        // ->with('message', 'Catagory added successfully');

    }

    public function delete_catagory($id) {

        $data = catagory::find($id);
        $data->delete();

        Alert::success('Catagory', 'Catagory deleted Successful');
        return redirect()->back();
        // ->with('message', 'Catagory deleted successfully');
    }

    public function view_product() {

        $catagory =catagory::all();
        return view('admin.product', compact('catagory'));
    }

    public function add_product(Request $request) {

        $product = new product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->quantity = $request->quantity;
        $product->catagory = $request->catagory;
        $image = $request->image;

        $imagename = time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);

        $product->image = $imagename;

        $product->save();

        Alert::success('Product', 'Product added successfully');
        return redirect()->back();
        //return redirect()->back()->with('message', 'Product added successfully');
    }

    public function show_product() {
        $product = product::all();

        return view('admin.show_product', compact('product'));
    }

    public function delete_product($id) {

        $data = product::find($id);
        $data->delete();

        Alert::success('Product ', 'Product deleted successfully');
        return redirect()->back();
        // ->with('message', 'Product deleted successfully');
    }

    public function edit_product($id) {

        $product = product::find($id);
        $catagory = catagory::all();
        return view('admin.edit_product', compact('product', 'catagory'));
    }

    public function update_product_confirm(Request $request,$id) {

        $product = product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->quantity = $request->quantity;
        $product->catagory = $request->catagory;
        $image = $request->image;

        if($image) {

            $imagename = time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);

        $product->image = $imagename;

        }




        $product->save();

        Alert::success('Product ', 'Product editted successfully');
        return redirect()->back();
        // ->with('message', 'Product editted successfully');
    }

    public function view_order() {

        $order = order::all();

        return view('admin.order', compact('order'));
    }

    public function delivered($id) {

        $order = order::find($id);

        $order->delivery_status = "delivered";
        $order->payment_status = "Paid";
        $order->save();

        return redirect()->back();
    }

    public function print_order($id) {

        $order = order::find($id);

        $pdf = FacadePdf::loadView('admin.pdf', compact('order'));

        return $pdf->download('order_details.pdf');
    }

    public function send_email($id) {

        $order = order::find($id);

        return view('admin.email_info', compact('order'));
    }

    public function send_user_email(Request $request, $id) {

        $order = order::find($id);

        $details = [

            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];

        FacadesNotification::send($order, new sendEmailNotification($details));

        Alert::success('Email ', 'Email send successfully');
        return redirect('/view_order');
    }

    public function search(Request $request) {

        $searchText = $request->search;

        $order = order::where('name', 'LIKE', "%$searchText%")->orWhere('phone', 'LIKE', "%$searchText%")->orWhere
                             ('product_title', 'LIKE', "%$searchText%")->orWhere('email', 'LIKE', "%$searchText%")->get();

        return view('admin.order', compact('order'));
    }
}

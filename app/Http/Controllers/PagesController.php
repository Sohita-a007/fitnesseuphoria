<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Classes;
use App\Models\Contacts;
use App\Models\Gallerys;
use App\Models\Orders;
use App\Models\Products;
use App\Models\SelectPlan;
use App\Models\ShippingAddress;
use App\Models\Trainers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    //
    public function index()
    {
        $blog = Blogs::all();
        $trainers = Trainers::take(6)->latest()->get();
        $class = Classes::take(6)->latest()->get();
        $gallerys = Gallerys::take(6)->latest()->get();
        $suggest_product = Products::take(6)->orderBy('price', 'desc')->latest()->get();
        // dd($suggest_product);
        $user_id = Auth::guard('user')->user();
        // dd($user_id);
        $user = User::where('id', $user_id)->first();
        $select_plan = SelectPlan::all();
        // dd($select_plan);


        return view('frontend.pages.index', compact('blog', 'trainers', 'class', 'gallerys', 'user', 'select_plan', 'suggest_product'));
    }
    public function selectplan(Request $request)
    {
        // dd('here');
        // if ($request->user_id == null) {
        //     toastr()->error('Login to select plan!');
        //     return redirect()->back();
        // } else {

        $select_plan = new SelectPlan();
        $select_plan->selected_plan = $request->selected_plan;
        $select_plan->user_id = $request->user_id;
        // dd($select_plan);
        toastr()->success('Select Plan has been saved successfully!');
        $select_plan->save();
        return redirect()->back();
        // }
    }
    public function upgradeplan(Request $request, $id)
    {
        $select_plan = SelectPlan::find($id);
        $select_plan->user_id = $request->user_id;
        $select_plan->selected_plan = $request->selected_plan;
        toastr()->success('Select Plan has been saved successfully!');
        $select_plan->save();
        return redirect()->back();
    }
    public function planerror()
    {
        toastr()->error('Login to select plan!');
        return redirect()->back();
    }
    public function about()
    {
        return view('frontend.pages.about');
    }
    public function tour()
    {
        return view('frontend.pages.tour');
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }
    public function services()
    {
        return view('frontend.pages.services');
    }
    public function team()
    {
        return view('frontend.pages.team');
    }
    public function product()
    {
        $product = Products::take(6)->latest()->get();
        return view('frontend.pages.product', compact('product'));
    }
    public function classes()
    {
        $class = Classes::take(6)->latest()->get();
        return view('frontend.pages.classes', compact('class'));
    }
    public function classes_single($id)
    {
        $class = Classes::find($id);
        return view('frontend.pages.classsingle', compact('class'));
    }
    public function product_single($id)
    {
        $product = Products::find($id);
        return view('frontend.pages.productsingle', compact('product'));
    }
    public function blog_single($id)
    {
        $blog_single = Blogs::find($id);
        return view('frontend.pages.favourite-places', compact('blog_single'));
    }
    public function contact_store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',

            'email' => 'required',
            'number' => 'required',

            'message' => 'required',
        ]);

        $contact = Contacts::create([
            'name' => $request->name,

            'email' => $request->email,
            'number' => $request->number,

            'message' => $request->message,


        ]);
        toastr()->success('Appointment sent successfully!');
        $contact->save();
        return redirect()->back();
    }






    public function cart()
    {
        return view('frontend.pages.cart');
    }



    public function addToCart($id)
    {
        $product = Products::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_name" => $product->title,
                "photo" => $product->image,
                "price" => $product->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }


    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function checkout(Request $request)
    {
        return view('frontend.pages.checkout');
    }

    public function place_order(Request $request)
    {

        $userId = Auth::guard('user')->user()->id;
        $buy_product = new Orders();
        $buy_product->user_id = $request->user_id;
        $buy_product->product = json_encode(session('cart'));
        $buy_product->price = $request->price;

        // dd($buy_product);
        $buy_product->save();

        // dd($buy_product);



        $order = new ShippingAddress();
        $order->order_id = $buy_product->id;
        $order->firstname = $request->firstname;
        $order->lastname = $request->lastname;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->city = $request->city;
        $order->save();
        return redirect()->route('stripe');
    }

    public function stripe()
    {
        return view('frontend.pages.stripe');
    }
    public function select1()
    {
        return view('frontend.pages.selectpackage1');
    }
    public function select2()
    {
        return view('frontend.pages.selectpackage2');
    }
    public function select3()
    {
        return view('frontend.pages.selectpackage3');
    }
}

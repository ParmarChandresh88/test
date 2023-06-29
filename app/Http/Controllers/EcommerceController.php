<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin_user;
use App\Models\Cart;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\UserDetail;
use Illuminate\Support\Facades\DB;
use mysqli;

class EcommerceController extends Controller
{
    public function login_admin(Request $request)
    {
        // $admin = DB::table('admin_users')->where([
        $admin = Admin_user::where([
            ['username', '=', $request->username],
            ['password', '=', $request->password]
        ])->first();
        if ($admin) {
            session()->put('admin_id', $admin->id);
            session()->put('admin_name', $admin->username);

            return redirect('category');
        } else {
            return redirect()->back();
        }
    }
    public function logout(Request $request)
    {
        session()->pull('admin_id');
        session()->pull('admin_name');
        return redirect('/admin');
    }


    // --------------------------------Category-----------------------------------------------------------
    public function v_category(Request $request)
    {
        $cat = Category::all();
        return view('admin.category', compact('cat'));
    }
    public function v_addcategory()
    {
        return view('admin.addcategory');
    }
    public function addcategory(Request $request)
    {
        $add = new Category;
        $check = Category::where("category", '=', $request->category)->exists();

        if ($check) {
            return redirect()->back()->with('fail', 'category already exits');
        } else {
            $add->category = $request->category;
            $add->status = 1;
            $add->save();

            return redirect('category')->with('success', 'Category Inserted Successfully');
        }
    }
    public function delete_category(Request $request, $id)
    {
        $del = Category::find($id);
        $del->delete();
        return redirect()->back()->with('delete', 'Category Deleted Successfully');
    }
    public function update_status(Request $request, $id, $status)
    {
        $cat = Category::find($id);
        $cat->status = $status;
        //  dd($cat);
        //  die;
        $cat->update();
        return redirect()->back();
    }
    public function v_editcategory($id)
    {
        $edit = Category::find($id);

        return view('admin.editcategory', compact('edit'));
    }
    public function update_category(Request $request, $id)
    {
        $up = Category::find($id);
        $check = Category::where("category", '=', $request->category)->exists();

        if ($check) {
            return redirect()->back();
        } else {
            $up->category = $request->category;
            $up->status = 1;
            $up->update();

            return redirect('category')->with('edit', 'Category Updated Successfully');
        }
    }

    // --------------------------------Contact Us-----------------------------------------------------------    
    public function v_contactus()
    {
        $contact = ContactUs::all();
        return view('admin.contact', compact('contact'));
    }
    public function delete_contact($id)
    {
        $del1 = ContactUs::find($id);
        $del1->delete();
        return redirect()->back()->with('delete', 'Data Deleted Successfully');
    }

    // --------------------------------Product-----------------------------------------------------------
    public function v_product()
    {
        $pro = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.category')
            // ->orderBy('name','asc')
            ->get();
        $project = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.category')
            // ->orderBy('name','asc')
            ->get();
        return view('admin.product', compact('pro', 'project'));
    }
    public function delete_product($id)
    {
        $dele = Product::find($id);
        $dele->delete();
        return redirect()->back()->with('delete', 'Product Deleted Successfully');
    }
    public function updated_status(Request $request, $id, $status)
    {
        $pro = Product::find($request->id);
        $pro->status = $request->status;
        $pro->update();
        return redirect()->back();
    }
    public function v_addproduct()
    {
        $catshow = Category::all();
        return view('admin.addproduct', compact('catshow'));
    }
    public function add_product(Request $request)
    {
        $addpro = new Product;
        $addpro->category_id = $request->category_id;
        $addpro->name = $request->name;
        $addpro->mrp = $request->mrp;
        $addpro->price = $request->price;
        $addpro->qty = $request->qty;
        // $addpro->image = $request->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/', $filename);
            $addpro->image = $filename;
        }
        $addpro->short_desc = $request->short_desc;
        $addpro->description = $request->description;
        $addpro->meta_title = $request->meta_title;
        $addpro->meta_desc = $request->meta_desc;
        $addpro->meta_keyword = $request->meta_keyword;
        $addpro->status = 1;
        $addpro->save();
        return redirect('v_product')->with('success', 'Product Inserted Successfully');
    }
    public function v_editproduct($id)
    {
        $edit1 = Product::find($id);
        $c = Category::all();
        return view('admin.editproduct', compact('edit1', 'c'));
    }
    public function update_product(Request $request, $id)
    {
        $up1 = Product::find($id);
        $up1->category_id = $request->category_id;
        $up1->name = $request->name;
        $up1->mrp = $request->mrp;
        $up1->price = $request->price;
        $up1->qty = $request->qty;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/', $filename);
            $up1->image = $filename;
        }
        $up1->short_desc = $request->short_desc;
        $up1->description = $request->description;
        $up1->meta_title = $request->meta_title;
        $up1->meta_desc = $request->meta_desc;
        $up1->meta_keyword = $request->meta_keyword;
        $up1->status = 1;
        $up1->update();
        return redirect('v_product')->with('edit', 'Product Updated Successfully');
    }

    // -------------------------------------User Detail-------------------------------------------------

    public function v_userdata()
    {
        $user = UserDetail::all();
        return view('admin.user', compact('user'));
    }
    public function delete_userdata($id)
    {
        $usdel = UserDetail::find($id);
        $usdel->delete();
        return redirect()->back()->with('delete', 'Data Deleted Successfully');
    }
    // -------------------------------------User Side----------------------------------------------------------------------------------------------
    //---------------------------------User Side->login/register---------------------------------------------------------
    public function register_login()
    {
        $cate = Category::all();
        $cartdata = Cart::all()->where('user_id', session()->get('user_id'))->count();
        return view('frontend.userlogin', compact('cate', 'cartdata'));
    }
    public function user_register(Request $request)
    {
        $register =  new UserDetail;
        $test = UserDetail::where("email", '=', $request->email)->exists();

        if ($test) {
            return redirect()->back()->with('fail', 'Email Already Register ');
        } else {
            $register->name = $request->name;
            $register->email = $request->email;
            $register->password = $request->password;
            $register->mobile = $request->mobile;
            $register->save();
            return redirect()->back()->with('ok', 'Data Register Successfully');
        }
    }
    public function user_login(Request $request)
    {
        $login = UserDetail::where([
            ['email', '=', $request->email],
            ['password', '=', $request->password]
        ])->first();
        if ($login) {
            session()->put('user_id', $login->id);
            session()->put('user_name', $login->name);
            // dd(session()->get('user_id'));
            return redirect()->back()->with('login', 'Login Successfully');
        } else {
            return redirect()->back()->with('failed', 'Enter Valied Login Detail');
        }
    }
    public function user_logout(Request $request)
    {
        session()->pull('user_id');
        session()->pull('user_name');
        return redirect('register')->with('log', 'Logout Successfully');
    }
    //---------------------------------User Side->view---------------------------------------------------------
    public function view_category()
    {
        $products = Product::all();
        $cate = Category::all();
        $cartdata = Cart::all()->where('user_id', session()->get('user_id'))->count();
        // dd($cartdata);
        return view('frontend.index', compact('products', 'cate', 'cartdata'));
    }
    public function category_detail(Request $request, $id)
    {
        $cartdata = Cart::all()->where('user_id', session()->get('user_id'))->count();
        $cate = Category::all();
        $products = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.category')
            ->where('categories.id', '=', $id)->get();

        return view('frontend.categories', compact('cate', 'products', 'cartdata'));
    }

    public function product_detail(Request $request, $id)
    {
        $cartdata = Cart::all()->where('user_id', session()->get('user_id'))->count();
        $cate = Category::all();
        $pro = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.category')
            ->where('products.id', '=', $id)->get();

        return view('frontend.product', compact('cate', 'pro', 'cartdata'));
    }

    // -------------------------------------contact_us-------------------------------------------------

    public function contact_us()
    {
        $cartdata = Cart::all()->where('user_id', session()->get('user_id'))->count();
        $cate = Category::all();
        return view('frontend.contactus', compact('cate', 'cartdata'));
    }
    public function contact_detail(Request $request)
    {
        $cate = Category::all();
        $cartdata = Cart::all()->count();
        $user_add =  new ContactUs;
        $user_add->name = $request->name;
        $user_add->email = $request->email;
        $user_add->mobile = $request->mobile;
        $user_add->comment = $request->comment;
        $user_add->save();
        return view('frontend.contactus', compact('cate', 'cartdata'))->with('insert', 'Your Detail submit Successfully');
    }

    //------------------------------------Add To Cart---------------------------------------------------------------------

    public function view_cart(Request $request, $id)
    {
        $cate = Category::all();
        $cartdata = Cart::all()->where('user_id', $id)->count();
        $cartadd = Cart::all()->where('user_id', $id);
        return view('frontend.cart', compact('cate', 'cartdata', 'cartadd'));
    }
    public function add_cart(Request $request, $id)
    {
        $cart =  Product::find($id);
        $addcart =  new Cart;

        $addcart->user_id = session()->get('user_id');
        $addcart->name = $cart->name;
        $addcart->mrp = $cart->mrp;
        $addcart->price = $cart->price;
        $addcart->qty = $request->qty;
        $addcart->image = $cart->image;
        $addcart->total = ($cart->price * $request->qty);
        $addcart->save();
        return redirect()->back()->with('cart_add', 'Cart Added Successfully');
    }
    public function delete_cart(Request $request, $id)
    {
        $cartdata = Cart::find($id);
        $cartdata->delete();
        return redirect()->back();
    }
    // -------------------------------------CheckOut-------------------------------------------------

    public function view_checkout(Request $request, $id)
    {
        $cate = Category::all();
        $cartdata = Cart::all()->where('user_id', session()->get('user_id'))->count();
        $cartadd = Cart::all()->where('user_id', $id);
        $cartcount = Cart::all()->where('user_id', $id)->count();
        return view('frontend.checkout', compact('cate', 'cartdata', 'cartadd', 'cartcount'));
    }
    public function delete_checkout(Request $request, $id)
    {
        $cartdata = Cart::find($id);
        $cartdata->delete();
        return redirect()->back()->with('delete', 'Cart Deleted Successfully');;
    }
    public function form_checkout(Request $request)
    {
        $order = new Order;
        
        $order->user_id = session()->get('user_id');
        $order->address = $request->address;
        $order->city = $request->city;
        $order->pincode = $request->pincode;
        $order->payment_type = $request->payment_type;
        $order->total_price = session()->get('g_total');
        $order->order_status = "Pending";
        $order->payment_id = "";
        $order->payment_request_id = "";
        $order->payu_status = "";
        $order->payment_status = "success";
        $order->save();
        if ($order->payment_type == 'cod') {
            return redirect()->back()->with('ok', 'Order Payment Checkout Successfully');
        } 
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    "X-Api-Key:test_e31e9e24d997fa3465e94182424",
                    "X-Auth-Token:test_afe73751e3b23363fd388cdebb5"
                )
            );
            $payload = array(
                'purpose' => 'Shopping Price',
                'amount' => session()->get('g_total'),
                'phone' => '9999999999',
                'buyer_name' => 'Chandresh',
                'redirect_url' =>url('payment_update/' . $order->id),
                'send_email' => true,
                'webhook' => 'http://www.example.com/webhook/',
                'send_sms' => true,
                'email' => 'foo@example.com',
                'allow_repeated_payments' => false
            );
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
            $response = curl_exec($ch);
            curl_close($ch);

            $response = json_decode($response);
            return redirect($response->payment_request->longurl);
        
    }

    public function payment_update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->payment_status = "success";
        $order->payment_id = $_GET['payment_id'];
        $order->payment_request_id = $_GET['payment_request_id'];
        $order->payu_status = $_GET['payment_status'];
        $order->update();
        return redirect()->back()->with('ok', 'Order Payment Checkout Successfully');
    }
}

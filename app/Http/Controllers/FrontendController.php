<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\PostTag;
use App\Models\PostCategory;
use App\Models\Post;
use App\Models\Cart;
use App\Models\Brand;
use App\Models\Reward;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{

    public function index(Request $request)
    {
        return redirect()->route($request->user()->role);
    }

    public function aboutUs()
    {
        return view('frontend.pages.about');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    // Login
    public function login()
    {
        return view('auth.login');
    }
    public function loginSubmit(Request $request)
    {
        $data = $request->all();
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 'active'])) {
            Session::put('user', $data['email']);
            request()->session()->flash('success', 'Successfully login');
            return redirect()->route('home');
        } else {
            request()->session()->flash('error', 'Invalid email and password pleas try again!');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success', 'Logout successfully');
        return back();
    }

    public function register()
    {
        return view('frontend.pages.register');
    }
    public function registerSubmit(Request $request)
    {
        // Display the entire request payload for debugging
        // dd($request->all());

        // Validation rules// Define the validation rules
        $rules = [
            'name' => 'string|required|min:2',
            'phone' => 'string|required',
            'gender' => 'string|required',
            'address' => 'string|required',
            'email' => 'string|required|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ];

        // Create the validator instance
        $validator = Validator::make($request->all(), $rules);

        // Check if the validation fails
        if ($validator->fails()) {
            // Redirect back with input and errors, appending the hash fragment
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->withFragment('register');
        }

        // Get all request data
        $data = $request->all();

        // Create the user
        $check = $this->create($data);

        // Store the user's email in the session
        Session::put('user', $data['email']);

        // Handle post-creation actions
        if ($check) {
            request()->session()->flash('success', 'Successfully registered');
            return redirect()->route('home');
        } else {
            request()->session()->flash('error', 'Please try again!');
            return redirect()->to(url()->previous() . '#register');
        }
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 'active',
            'role' => 'user',
        ]);
    }

    // Reset password
    public function showResetForm()
    {
        return view('auth.passwords.old-reset');
    }

    function productLists()
    {
        $res = Product::with(['cat_info'])->where('status', 'active')->orderBy('id', 'desc')->get();
        $products = [];
        foreach ($res as $key => $value) {
            $value->cat_title = $value->cat_info->title;
            $products[] = $value;
        }
        return view('frontend.pages.product')->with('products', $products)->with('categories', array_column($products, 'cat_title', 'cat_id'));
    }

    function rewardLists()
    {
        $res = Reward::where('status', 'active')->where('stock', '>', 0)->orderBy('name', 'asc')->get();
        return view('frontend.pages.reward')->with('rewards', $res);
    }

    function pickupForm()
    {
        $products = Product::where('status', 'active')->orderBy('id', 'desc')->get();
        return view('frontend.pages.pickup')->with('products', $products);
    }
}

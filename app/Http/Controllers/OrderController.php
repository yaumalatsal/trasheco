<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderedProduct;
use App\Models\Product;
use App\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $orders = Order::orderBy('id', 'DESC')->paginate(10);
        }
        if (auth()->user()->role == 'admin_cabang') {
            $orders = Order::orderBy('orders.id', 'DESC')->select('orders.*')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->where('faculty_id', auth()->user()->faculty_id)
                ->paginate(10);
        }
        return view('backend.order.index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role == 'admin') {
            $users = User::where('role', 'user')->get();
        }
        if (auth()->user()->role == 'admin_cabang') {
            $users = User::where('role', 'user')
                ->where('faculty_id', auth()->user()->faculty_id)
                ->paginate(10);
        }
        $products = Product::getAllProduct();

        return view('backend.order.create')->with('products', $products)->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required|array',
            'qty' => 'required|array',
            'adjusted_price' => 'required|array',
            'total_amount' => 'required',
            'subtotal' => 'required|array',
        ]);

        $order = new Order();
        $order->order_number = 'ORD-' . strtoupper(Str::random(10));
        $order->user_id = $request->user_id;
        $order->total_amount = intval($this->clearRp($request->total_amount));
        $order->save();

        $user = User::find($request->user_id);
        // Update user's balance using update method
        $user->update(['balance' => ($user->balance ?? 0) + $order->total_amount]);

        foreach ($request->product_id as $index => $productId) {
            if ($productId) {
                $orderedProduct = new OrderedProduct();
                $orderedProduct->order_id = $order->id;
                $orderedProduct->product_id = $productId;
                $orderedProduct->qty = $request->qty[$index];
                $orderedProduct->price = $request->adjusted_price[$index];
                $orderedProduct->save();
            }
        }

        return redirect()->route('order.index')->with('success', 'Order created successfully.');
    }

    function clearRp($val)
    {
        // Remove currency symbol, space, and thousands separator
        $cleanedString = preg_replace('/[^\d,]+/', '', $val);

        // Replace comma with dot for decimal point and remove thousand separators
        $cleanedString = str_replace(',', '.', $cleanedString);

        // Convert to float (since it has decimal points) and then to integer
        $integerValue = (int) floatval($cleanedString);

        return $integerValue;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        // return $order;
        return view('backend.order.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        if (auth()->user()->role == 'admin') {
            $users = User::where('role', 'user')->get();
        }
        if (auth()->user()->role == 'admin_cabang') {
            $users = User::where('role', 'user')
                ->where('faculty_id', auth()->user()->faculty_id)
                ->paginate(10);
        }
        $products = Product::getAllProduct();

        // Load the view with order details and related data
        return view('backend.order.edit', compact('order', 'users', 'products'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required|array',
            'qty' => 'required|array',
            'adjusted_price' => 'required|array',
            'total_amount' => 'required',
            'subtotal' => 'required|array',
        ]);

        $order = Order::findOrFail($id);

        // Update user's balance using update method
        $newBalance = $order->total_amount;

        $order->user_id = $request->user_id;
        $order->total_amount = intval($this->clearRp($request->total_amount));

        $newBalance = $order->total_amount - $newBalance;
        $order->save();

        $user = User::find($request->user_id);
        $user->update(['balance' => ($user->balance ?? 0) + $newBalance]);

        // Delete existing ordered products
        OrderedProduct::where('order_id', $order->id)->delete();

        // Insert updated ordered products
        foreach ($request->product_id as $index => $productId) {
            if ($productId) {
                $orderedProduct = new OrderedProduct();
                $orderedProduct->order_id = $order->id;
                $orderedProduct->product_id = $productId;
                $orderedProduct->qty = $request->qty[$index];
                $orderedProduct->price = $request->adjusted_price[$index];
                $orderedProduct->save();
            }
        }

        return redirect()->route('order.index')->with('success', 'Order updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $user = User::find($order->user_id);
        // Update user's balance using update method
        $user->update(['balance' => ($user->balance ?? 0) - $order->total_amount]);
        $order->delete();

        return redirect()->route('order.index')->with('success', 'Order deleted successfully.');
    }

    public function exportPdf()
    {
        // Fetch the orders with related user data
        $orders = Order::with('user')->get();

        // Share data with the view
        $pdf = Pdf::loadView('backend.order.pdf', compact('orders'));

        // Return the PDF file as a download
        return $pdf->download('order.pdf');
    }
}

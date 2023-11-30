<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Cart;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Order;
use App\Models\OrderDetail;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Cart $cart)
    {

        return view('fe.cart.listCart',compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add(Request $request,Cart $cart) {
        
        $product=Product::find($request->id);
        if($request->quantity == ''){
            $quantity = 1;
        }else{
            $quantity=$request->quantity;
        }
        $cart->add($product,$quantity);

        return redirect()->route('cart.index');
    }

    public function update(Request $request) {

        $cart = new Cart();
        $cart->update($request->id, $request->qty);

        $total_price = number_format($cart->getToTalPrice());
        $subtotal = number_format($cart->list()[$request->id]['price'] * $request->qty);
        $totalQuantity = number_format($cart->getToTalQuantity());

        return response()->json([
            'data' => $cart, 
            'total_price' => $total_price, 
            'subtotal' => $subtotal, 
            'totalQuantity' => $totalQuantity
        ]);
    }

    public function delete($id)  {

        $cart = new Cart();
        $cart->delete($id);

        $total_price = number_format($cart->getToTalPrice());
        $totalQuantity = number_format($cart->getToTalQuantity());

        alert()->success('success', 'Xóa sản phẩm thành công');
        return response()->json([
            'data' => $cart, 
            'total_price' => $total_price, 
            'totalQuantity' => $totalQuantity
        ]);
    }

    public function clear() {
        $cart = new Cart();
        $cart->clear();

        $total_price = number_format($cart->getToTalPrice());
        $totalQuantity = number_format($cart->getToTalQuantity());

        alert()->success('success', 'Xóa tất cả thành công');
        return redirect()->route('cart.index');
    }

    public function addDb(Request $request,Cart $cart){
        try{
            $order = Order::create($request->all());
            $array1 = ['order_id'=>$order->id];
            foreach ($cart->list() as $key => $value) {
                $array2 = ['order_detail_price'=>$value['price']];
                $valuene = array_merge($array1,$value);
                $valuenew = array_merge($valuene,$array2);
                $add = OrderDetail::create($valuenew);
            }

            $request->session()->forget('cart');
            alert()->success('success', 'Đặt hàng thành công');
            return redirect()->route('checkout.checkoutSuccess');
        }catch (\Throwable $th){
            dd($th);
            alert()->error('error', 'Đặt hàng thất bại');
            return redirect()->back();
        }
    }
    
}

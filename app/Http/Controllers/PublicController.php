<?php

namespace App\Http\Controllers;
use   Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use Illuminate\Http\Request;
use App\Models\{Product,Category,Order,OrderItem,Coupon,Address};
use Illuminate\Support\Facades\Auth;
class PublicController extends Controller
{
    public function index(Request $request,$cat_id=NULL){
        $data['products']=Product::all();
        if($request->has("find")){
            $search=$request->search;
            $data['products']= Product::where("title","LIKE","%$search%")->get();
        }
        elseif($cat_id != NULL){
            $data['products']=Product::where("category_id",$cat_id)->get();
        }
        $data['categorys']=Category::all();
        return view('public.home',$data);
    }
    public function catSearch(){
        $data['products']=Product::all();
        $data['categorys']=Category::all();
        return view('public.home',$data);
    }
    public function viewProduct($p_id){
        $data['categorys']=Category::all();
        $data['product']=Product::find($p_id);
        return view('public.viewProduct',$data);
    }
    public function cart(){
        $data['order']=Order::where([['ordered',false],["user_id",Auth::id()]])->first();
        return view('public.cart',$data);
    }
    public function checkout(){
        $data['address']=Address::where('user_id',Auth::id())->get();
        return view('public.checkout',$data);
    }
    
    static public function assignAddress($id){
        $address = Address::findOrFail($id);
        $order=get_order();
        $order->address_id=$address->id;
        $order->save();
        return redirect()->router('checlout');
    }
    public function addToCart(Request $request,$p_id){
        $product=Product::find($p_id);
        $user=Auth::user();
        if($product){
            $order=Order::where([['ordered',false],["user_id",Auth::id()]])->first();
            if($order){
                // $orderItem=orderItem::where([['ordered',false],['order_id',$order->id],['product_id',$product->id]])->first();
                $orderItem=get_order();
                if($orderItem){
                    $orderItem->qty +=1;
                    $orderItem->save();
                }
                else{
                    $oi=new OrderItem();
                    $oi->ordered=false;
                    $oi->order_id=$order->id;
                    $oi->product_id=$product->id;
                    $oi->save();
                }
            }
            else{
                $ord=new Order();
                $ord->ordered=false;
                $ord->user_id=$user->id;
                $ord->save();
    
                $oi=new OrderItem();
                $oi->ordered=false; 
                $oi->product_id=$product->id;
                $oi->order_id=$ord->id;
                $oi->save();
            }
        }
        return redirect()->route("cart");
    }
    public function removeFromCart(Request $request,$p_id){
        $product=Product::find($p_id);
        $user=Auth::user();
        if($product){
            $order=Order::where([['ordered',false],['user_id',$user->id]])->first();
            if($order){
                $orderItem=OrderItem::where([['ordered',false],['order_id',$order->id],['product_id',$product->id]])->first();
                if($orderItem){
                    if($orderItem->qty >1){
                        $orderItem->qty -=1 ;
                        $orderItem ->save();
                    }
                    else{
                        $orderItem->delete();
                    }
                }
            }
        }
        return redirect()->route('cart');
    }
    public function removeItemFromCart(Request $request,$p_id){
        $product=Product::find($p_id);
        $user=Auth::user();
        if($product){
            $order=Order::where([['ordered',false],['user_id',$user->id]])->first();
            if($order){
                $orderItem=OrderItem::where([['ordered',false],['order_id',$order->id],['product_id',$product->id]])->first();
                if($orderItem){
                    $orderItem->delete();
                }
            }
        }
        return redirect()->route('cart');
    }
    private function CheckCode($code){
        $coupon = Coupon::where([['code',$code],["status",1]])->first();
        return  $coupon;
    }
    public function applyCoupon(Request $req){
        $req->validate([
            'code'=>'required'
        ]);
        if($coupon = $this->CheckCode($req->code)){
            $order= Order::where([['ordered',false],['user_id', Auth::id()]])->first();
            $order->coupon_id=$coupon->id;
            $order->save();
            return redirect()->route('cart');
        }
        else{
            return redirect()->route('cart')->with('msg','invalid Coupon');
        }
    }
    public function removeCoupon(){
        $order = Order::where([['ordered',false],['user_id',Auth::id()]])->first();
        $order->coupon_id=null;
        $order->save();
        return redirect()->route('cart');
    }
    public function order()
    {
        $payment = PaytmWallet::with('receive');
        $payment->prepare([
          'order' =>uniqid(),
          'user' => Auth::id(),
          'mobile_number' => '9117685337',
          'email' => 'ayush91176@gmail.com',
          'amount' =>7000,
          'callback_url' => 'http://127.0.0.1:8000/payment/call-back'
        ]);
        return $payment->receive();
    }

    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');
        
        $response = $transaction->response(); // To get raw response as array
        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm
        
        if($transaction->isSuccessful()){
          //Transaction Successful
          print_r('Transaction Successful');
        }else if($transaction->isFailed()){
          //Transaction Failed
        }else if($transaction->isOpen()){
          //Transaction Open/Processing
        }
        $transaction->getResponseMessage(); //Get Response Message If Available
        //get important parameters via public methods
        $transaction->getOrderId(); // Get order id
        $transaction->getTransactionId(); // Get transaction id
    }  
}

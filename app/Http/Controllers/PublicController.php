<?php

namespace App\Http\Controllers;
use   Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use Illuminate\Http\Request;
use App\Models\{Product,Category,Order,OrderItem};
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
        return view('public.checkout');
    }
    public function addToCart(Request $request,$p_id){
        $product=Product::find($p_id);
        $user=Auth::user();
        if($product){
            $order=Order::where([['ordered',false],["user_id",Auth::id()]])->first();
            if($order){
                $orderItem=orderItem::where([['ordered',false],['order_id',$order->id],['product_id',$product->id]])->first();
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
    public function order()
    {
        $payment = PaytmWallet::with('receive');
        $payment->prepare([
          'order' =>'123451216789',
          'user' => '1',
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

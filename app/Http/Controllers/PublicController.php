<?php

namespace App\Http\Controllers;
use   Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use Illuminate\Http\Request;
use App\Models\{Product,Category,Order,OrderItem,Coupons,Address,Payment};
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
        $order = get_order();
        $order->address_id = $address->id;
        $order->save();
        return redirect()->route("checkout");

    }
    public function addToCart(Request $request,$p_id){
        $product=Product::find($p_id);
        $user=Auth::user();
        if($product){
            $order=Order::where([['ordered',false],["user_id",Auth::id()]])->first();
            if($order){
                $orderItem=orderItem::where([['ordered',false],['order_id',$order->id],['product_id',$product->id]])->first();
                // $orderItem=get_order();
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
        $Coupons = Coupons::where([['code',$code],["status",1]])->first();
        return  $Coupons;
    }
    public function applyCoupons(Request $req){
        $req->validate([
            'code' => 'required'
        ]);

        if($Coupons = $this->CheckCode($req->code)){
            $order = Order::where([['ordered',false],['user_id',Auth::id()]])->first();
            $order->Coupons_id = $Coupons->id;
            $order->save();
            return redirect()->route("cart");
        }
        else{
            return redirect()->route("cart")->with("msg","Invalid Coupons");
        }
    }
    public function removeCoupons(){
            $order = Order::where([['ordered',false],['user_id',Auth::id()]])->first();
            $order->Coupons_id = null;
            $order->save();
            return redirect()->route("cart");
    }

    public function order(Request $req)
    {
        // dd($req);die;
        $payment = PaytmWallet::with('receive');
        $order = Order::where([['ordered',false],['user_id',Auth::id()]])->first();
        // $order = get_order();
        $order->address_id = $req->address_id;
        $order->save();

        $user = Auth::user();
        $pay = new Payment();
        
        $pay->order_id = $order->id;
        $pay->status = 0;
        $pay->amount = $req->amount;
        dd($pay);die;
        $pay->save();

        $payment->prepare([
            
          'order' => uniqid(),
          'user' => Auth::id(),
          'mobile_number' => $user->contact,
          'email' => $user->email,
          'amount' => $req->amount,
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
          print_r($response);
          $pay = Payment::where("order_id",get_order()->id)->first();
          $pay->txn_id = $response['TXNID'];
          $pay->bank_name = $response['BANKNAME'];
          $pay->mode = $response["PAYMENTMODE"];
          $pay->dateofpayment = $response["TXNDATE"];
          $pay->status = 1;
          $pay->save();
         
          
          $order = get_order();
          $order->ordered = true;
          foreach($order->orderItem as $item){
              $item->ordered = true;
              $item->save();
          }
          $order->save();

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

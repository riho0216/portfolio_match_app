<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Cart;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class CartController extends Controller
{
    private $cart;
    private $post;

    public function __construct(Cart $cart,Post $post)
    {
        $this->cart = $cart;
        $this->post = $post;
    }

    // public function index()
    // {
    //     $carts = $this->cart->all();
    //     return view('users.cart.index')
    //             ->with('carts', $carts);
    // }


    public function store(Request $request, $post_id)
    {
        $this->cart->user_id = Auth::user()->id;
        $this->cart->post_id = $post_id;
        $this->cart->save();

        return redirect()->back();
    }

    public function destroy($cart_id)
    {
        $this->cart->where('user_id', Auth::user()->id)->where('post_id', $post_id)->delete();

        return redirect()->back();
    }

    public function calculate(Request $request)
    {
        $cartData = [];
        $total = [];
        $totalAmount = 0;
        for($i =0;$i < count($request->quantity);$i++)
        {
            $total[$i] = $request->quantity[$i] * $request->price[$i];
            $post = $this->post->findOrFail($request->post_id[$i]);
            if($post->price_1 == $request->price[$i])
            {
                $days_add = 2;
            }elseif($post->price_2 == $request->price[$i])
            {
                $days_add = 6;
            }elseif($post->price_3 == $request->price[$i])
            {
                $days_add = 13;
            }else
            {
                $days_add = 0;
            }

            // $return_date = date("Y-m-d", strtotime("+ $days_add".daysToAdd , strtotime($request->rental_start)));
            $return_date = Carbon::createFromFormat('Y-m-d',$request->rental_start)->addDays($days_add);
            
            $cartData[$i] = 
            [
                'post' => $post,
                'quantity' => $request->quantity[$i],
                'price' => $request->price[$i],
                'total' => $total[$i],
                'rental_start' =>  $request->rental_start,
                'return_date' =>  $return_date,
            ];
            $totalAmount +=  $total[$i];
        }
        
        // $userPromotionDays = $request->rental_start;
        // $addDay[] =
        // [
        //     '$cart->posts->price_1' => date("Y-m-d", strtotime('+2'.daysToAdd , strtotime($userPromotionDays))),
        //     '$cart->posts->price_2' => date("Y-m-d", strtotime('+6'.daysToAdd , strtotime($userPromotionDays))),
        //     '$cart->posts->price_3' => date("Y-m-d", strtotime('+13'.daysToAdd , strtotime($userPromotionDays)))
        // ];
        
        return view('users.cart.calculate')
                ->with('cartData',$cartData)
                ->with('totalAmount',$totalAmount)
                ->with('return_date', $return_date);
            
        // dd($cartData);

    }
            // foreach($cartData as $index => $sessionData){

            //     dd($index, $sessionData);

                // if ($sessionData['post_id'] === $cartData['post_id']) {
                //     $isSameProductId = true;
                //     $quantity = $sessionData['session_quantity'] + $cartData['session_quantity'];
                
                //     $request->session()->put('cartData.' . $index . 'session_quantity', $quantity);
                // } 
        // }

        // $quantity = $_SESSION['quantity'];
        // $price = $_POST['price'];
        // $max=count($cart);

        // foreach($cart as $key => $val)
        // {
        //     $rec=$stmt->fetch(PDO::FETCH_ASSOC);
  
	    //     $cart->posts->name[]=$rec['name'];
        //     $price[]=$rec['price'];
        // }


    //     $this->quantity = $request->input('quantity');
    //     $this->price =  $request->input('price');

    //     $data['quantity'] = $request->input('quantity');
    //     $data['price'] = $request->input('price');

    //     $data['total'] =  $data['quantity'] . '*' . $data['price'];

    //     return view('users.cart.calculate')->with($quantity,$price);
    // }

}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;
use Session;
use Exception;

class HomeController extends Controller
{
    
    public function index(){
        return view('index');
    }

    public function home(){

        $conn = new ConnectController();

        $data = [
          'count_products' => count($conn->woocommerce->get('products',array('per_page'=>99))),
          'count_orders' => count($conn->woocommerce->get('orders')),
          'sales' => $conn->woocommerce->get('reports/sales'),
          'count_coupons' => count($conn->woocommerce->get('coupons'))

        ];

        return view('home')->with($data);
        
    }

    public function logout(){
        Session::put('my_host',null);
        Session::put('my_key',null);
        Session::put('my_secret',null);
        return redirect('/');
    }

    
    public function connection(Request $request){
        
        try{
            /**/$woocommerce = new Client(
                $request->host, 
                $request->key, 
                $request->secret,
                [
                    'wp_api' => true,
                    'version' => 'wc/v3',
                    'verify_ssl' => false,
                    'query_string_auth' => true            ]
            );
            $conn = new ConnectController();
            
            Session::put('my_host',$request->host);
            Session::put('my_key',$request->key);
            Session::put('my_secret',$request->secret);
            Session::save();
            
            $products = $woocommerce->get("products");
            
            return redirect('/home');

        }catch(Exception  $ex){

            return redirect('/')->with('msg', 'Error !! please try again!');
        }
    }

    
}

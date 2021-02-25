<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ConnectController;
use Automattic\WooCommerce\Client;
use Excel;
use Session;
use DateTime;
class ProductController extends Controller
{

    public function index(){

        $conn = new ConnectController();
        $this->woocommerce = $conn->woocommerce;
        $data = array('products' => $this->woocommerce->get('products' , array('per_page'=>99)) );
        return view('products.index')->with($data);
    }

    public function create(){

      $conn = new ConnectController();

      $data = [
        'categories' => $conn->woocommerce->get('products/categories')
      ];

    return view('products.add')->with($data);
   }

     public function add(Request $request){
       $conn = new ConnectController();
      $this->woocommerce = $conn->woocommerce;

      $data = [
        'name' => $request->name,
        'type' => $request->type,
        'regular_price' => $request->price,
        'description' => $request->description,
        'short_description' => $request->short_description,
        'categories' => [
            [
                'id' => $request->categorie
            ]
        ],
        'images' => [
            [
                'src' => $request->image
            ]
        ]
    ];
        /*$data*/ 
  $this->woocommerce->post("products", $data );
        return redirect('/products');
    }


    public function edit($id)
    {
      $conn = new ConnectController();
      $this->woocommerce = $conn->woocommerce;

      $data = [
        'product' => $this->woocommerce->get('products/'.$id),
        'categories' => $this->woocommerce->get('products/categories')
      ];
   
      return view('products.edit')->with($data);
    }

    public function update(Request $request)
    {
      $conn = new ConnectController();
      $this->woocommerce = $conn->woocommerce;

      $data = [
        'name' => $request->name,
        'type' => $request->type,
        'regular_price' => $request->price,
        'description' => $request->description,
        'short_description' => $request->short_description,
        'categories' => [
          [
              'id' => $request->categorie
          ]
        ],
        'images' => [
            [
                'src' => $request->image
            ]
        ]
      ];

      $this->woocommerce->put("products/".$request->id , $data);
        return redirect('/products');
    }
  

    // Deleting Product
    public function delete(Request $request){
      $conn = new ConnectController();
      $this->woocommerce = $conn->woocommerce;
      $this->woocommerce->delete("products/".$request->id);
      return redirect()->back();
    }
    
    public function excel(){

      $conn = new ConnectController();
      $this->woocommerce = $conn->woocommerce;

      $date = new DateTime('now');

        $products = $this->woocommerce->get("products", array('per_page'=>100,'page'=>1));
        $file[]=array('id','product','price','regular price','on Sale');
        foreach ($products as $product)
        {
            $file[]=array(
                'id'=>$product->id,
                'product'=>$product->name,
                'price'=>$product->price,
                'regular price'=>$product->regular_price,
                'On Sale'=>$product->on_sale
            );
        }
        return Excel::download(new ImportData($file),'product_data_'.$date->format('Y-m-d H:i:s').'.xlsx');
      }
    
}

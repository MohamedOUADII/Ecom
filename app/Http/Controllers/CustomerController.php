<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ConnectController;
use Automattic\WooCommerce\Client;
use Session;
use DateTime;
use Excel;

class CustomerController extends Controller
{
    public function index(){

        $conn = new ConnectController();
        $this->woocommerce = $conn->woocommerce;
        $data = array('customers' => $this->woocommerce->get('customers' , array('per_page'=>99)) );
        return view('customers.index')->with($data);
    }

    public function create(){

    return view('customers.add');
   }

     public function add(Request $request){
       $conn = new ConnectController();
      $this->woocommerce = $conn->woocommerce;

      $data = [
        'email' => $request->email,
        'password' => $request->password,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'username' => $request->username,
        'billing' => [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company' => '',
            'address_1' => $request->address,
            'address_2' => '',
            'city' => $request->city,
            'state' => $request->state,
            'postcode' => $request->zipcode,
            'country' => $request->country,
            'email' => $request->email,
            'phone' =>  $request->phone
        ],
        'shipping' => [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company' => '',
            'address_1' => $request->address,
            'address_2' => '',
            'city' => $request->city,
            'state' => $request->state,
            'postcode' => $request->zipcode,
            'country' => $request->country
        ]
    ];
        
  $this->woocommerce->post("customers", $data );
        return redirect('/customers');
    }


    public function edit($id)
    {
      $conn = new ConnectController();
      $this->woocommerce = $conn->woocommerce;

      $data = [
        'customer' => $this->woocommerce->get('customers/'.$id)
      ];
   
      return view('customers.edit')->with($data);
    }

    public function update(Request $request)
    {
      $conn = new ConnectController();
      $this->woocommerce = $conn->woocommerce;

      $data = [
        'email' => $request->email,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'username' => $request->username,
        'billing' => [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company' => '',
            'address_1' => $request->address,
            'address_2' => '',
            'city' => $request->city,
            'state' => $request->state,
            'postcode' => $request->zipcode,
            'country' => $request->country,
            'email' => $request->email,
            'phone' =>  $request->phone
        ],
        'shipping' => [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company' => '',
            'address_1' => $request->address,
            'address_2' => '',
            'city' => $request->city,
            'state' => $request->state,
            'postcode' => $request->zipcode,
            'country' => $request->country
        ]
    ];

      $this->woocommerce->put("customers/".$request->id , $data);
        return redirect('/customers');
    }
  

    
    public function delete(Request $request){
      $conn = new ConnectController();
      $this->woocommerce = $conn->woocommerce;
      $this->woocommerce->delete("customers/".$request->id, ['force' => true]);
      return redirect('/customers');
    }/**/

    public function excel(){

      $conn = new ConnectController();
      $this->woocommerce = $conn->woocommerce;

      $date = new DateTime('now');

        $customers = $this->woocommerce->get("customers", array('per_page'=>100,'page'=>1));
        $file[]=array('ID','Email','Last Name','First Name','Billing Phone','Billing Country','Billing City','Billing Address');
        foreach ($customers as $customer)
        {
            $file[]=array(
                'ID'=>$customer->id,
                'Email'=>$customer->email,
                'Last Name'=>$customer->last_name,
                'First Name'=>$customer->first_name,
                'Billing Phone'=>$customer->billing->phone,
                'Billing Country'=>$customer->billing->country,
                'Billing City'=>$customer->billing->city,
                'Billing Address'=>$customer->billing->address_1
    
            );
        }
        return Excel::download(new ImportData($file),'customer_data_'.$date->format('Y-m-d H:i:s').'.xlsx');
      }

}

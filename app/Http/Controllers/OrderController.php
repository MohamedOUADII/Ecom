<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use DateTime;

class OrderController extends Controller
{
    public function index(){
        
        $conn = new ConnectController();
        $this->woocommerce = $conn->woocommerce;

        $data = [
          'orders' => $this->woocommerce->get('orders',array('per_page'=>99))
        ];

        return view('orders.index')->with($data);
    }


    public function edit($id)
    {
      
      $conn = new ConnectController();
      $this->woocommerce = $conn->woocommerce;

      $data = [
        'order' => $this->woocommerce->get('orders/'.$id)
      ];
   
      return view('orders.edit')->with($data);
         
    }

    public function update(Request $request)
    {
      $conn = new ConnectController();
      $this->woocommerce = $conn->woocommerce;

      $data = [
        'status' => $request->status
      ];

      $this->woocommerce->put("orders/".$request->id , $data);
        return redirect('/orders');
    }

    public function excel(){

      $conn = new ConnectController();
      $this->woocommerce = $conn->woocommerce;

      $date = new DateTime('now');

        $orders = $this->woocommerce->get("orders", array('per_page'=>100,'page'=>1));
        $file[]=array('ID','Orders Number','Status','Currency','Date_created','Billing Name','Shipping Name');
        foreach ($orders as $order)
        {
            $file[]=array(
                'ID'=>$order->id,
                'Orders Number'=>$order->number,
                'Status'=>$order->status,
                'Currency'=>$order->currency,
                'Date_created'=>$order->date_created,
                'Billing Name'=>$order->billing->first_name.' '.$order->billing->last_name,
                'Shipping Name'=>$order->shipping->first_name.' '.$order->shipping->last_name
                
            );
        }
        return Excel::download(new ImportData($file),'order_data_'.$date->format('Y-m-d H:i:s').'.xlsx');
      }
}

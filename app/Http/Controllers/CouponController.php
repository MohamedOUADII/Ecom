<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use Excel;


class CouponController extends Controller
{

    public function index(){

        $conn = new ConnectController();
        $this->woocommerce = $conn->woocommerce;

        $data = [
          'coupons' => $this->woocommerce->get('coupons',array('per_page'=>99))
        ];

        return view('coupons.index')->with($data);
    }

    public function create(){
     
      return view('coupons.add');
    }

     public function add(Request $request){
        $conn = new ConnectController();
        $this->woocommerce = $conn->woocommerce;
       

        $data = [
          'code' => $request->code,
          'discount_type' => 'percent',
          'amount' => $request->amount,
          'description' => $request->description,
          'individual_use' => true,
          'exclude_sale_items' => true,
          'minimum_amount' => '100.00'
        ];
     
        $this->woocommerce->post("coupons",$data);
        return redirect('/coupons');
    }

    public function edit($id)
    {
      
      $conn = new ConnectController();
      $this->woocommerce = $conn->woocommerce;

      $data = [
        'coupon' => $this->woocommerce->get('coupons/'.$id),
      ];
   
      return view('coupons.edit')->with($data);
         
    }

    public function update(Request $request)
    {
      $conn = new ConnectController();
      $this->woocommerce = $conn->woocommerce;

      $data = [
            'code' => $request->code,
          'amount' => $request->amount,
          'description' => $request->description
      ];

      $this->woocommerce->put("coupons/".$request->id , $data);
       return redirect('/coupons');
    }
  

    public function delete(Request $request){
        $conn = new ConnectController();
        $this->woocommerce = $conn->woocommerce;
        $this->woocommerce->delete("coupons/".$request->id, ['force' => true]);
        return redirect('/coupons');
    }
    public function excel(){

      $conn = new ConnectController();
      $this->woocommerce = $conn->woocommerce;

      $date = new DateTime('now');

        $coupons = $this->woocommerce->get("coupons", array('per_page'=>100,'page'=>1));
        $file[]=array('ID','Code','Amount','Description','Date_created','Date_expires');
        foreach ($coupons as $coupon)
        {
            $file[]=array(
               'ID'=>$coupon->id,
               'Code'=>$coupon->code,
               'Amount'=>$coupon->amount,
               'Description'=>$coupon->description,
               'Date_created'=>$coupon->date_created,
               'Date_expires'=>$coupon->date_expires
    
            );
        }
        return Excel::download(new ImportData($file),'coupon_data_'.$date->format('Y-m-d H:i:s').'.xlsx');
      }
}

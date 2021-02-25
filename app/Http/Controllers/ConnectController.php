<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;
use Session;

class ConnectController extends Controller
{
    public $woocommerce;

    public function __construct(){
        
        $this->woocommerce = new Client(
              Session::get('my_host'),
              Session::get('my_key'),
              Session::get('my_secret'),
              [
                  'wp_api' => true,
                  'version' => 'wc/v3',
                  'verify_ssl' => false,
                  'query_string_auth' => true 
              ]
          );
    }
    
}

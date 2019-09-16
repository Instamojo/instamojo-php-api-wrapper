<?php

require_once __DIR__ . '/vendor/autoload.php';

    $instaobj = Instamojo\Instamojo::init('app',[
        "client_id" =>  $_ENV["CLIENT_ID"],
        "client_secret" => $_ENV["CLIENT_SECRET"]
       
    ],true);
 
    
 

    $payment_request = $instaobj->createPaymentRequest([
        'amount'=>10,
        'purpose'=>"Test script"
        ]);
        var_dump($payment_request['id']);
        try{
    $gateway_order = $instaobj->createGatewayOrderForPaymentRequest(
        "292e38e570794fa592ccf74cc84c8fda",
        [
        "name" => "XYZ",
        "email" => "foo@Foo.com",
        "phone" => "9999999988",
  
    ]);
        
    var_dump(json_encode($gateway_order));
    }catch(Exception $e){
            print('Error: ' . $e->getMessage());
        }

?>
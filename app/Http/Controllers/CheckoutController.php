<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\OrderMenu;
use App\Models\Order;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function paymentMoMo(Request $request)
    {
        //include "../common/helper.php";
        $validated = $request->validate([
            'firstName' => ['required'],
            'lastName' => ['required'],
            'email' => ['required', 'email'],
            'phoneNumber' => ['required'],
            'address' => ['required'],
            'country' => ['required'],
        ]);

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

        //Information
        $info = $request->all();
        $cart = $request->session()->get('Cart');
       // dd($cart, $info);
        $orderInfo =  "First Name: ".$info['firstName'].", Phone Number: ".$info['phoneNumber'].", Address: ".$info['address'].", Email: ".$info['email'].", Country: ".$info['country'].", Description: ".$info['description'].", Delivery: ".$info['delivery'].", Total quantiy: ".$info['totalQuantity'].", subTotalPriceUSD: ".$info['subTotalPriceUSD']." USD, Total Price USD: ".$info['totalPriceUSD']." USD, Total price: ".$info['totalPrice']." VND" ;

        //Business logic
        foreach($cart->products as $key=>$value)
        {
            $quantity = Menu::where('id', $key)->first()->quantity;
            $newQuantity = $quantity - $value['quantity'];
            Menu::where('id', $key)->update(['quantity' => $newQuantity]);
        }
        //Order
        $orderRecord = Order::create([
            'first_name' => $info['firstName'],
            'last_name' => $info['lastName'],
            'address' => $info['address'],
            'country' => $info['country'],
            'email' => $info['email'],
            'phone_number' => $info['phoneNumber'],
            'delivery' => $info['delivery'],
            'description' => $info['description'],
            'date' => Carbon::now(),
            'total_quantity' => $info['totalQuantity'],
            'total_price_usd' => $info['subTotalPriceUSD'],
            'total_price' => $info['totalPrice'],
            'is_online' => '1',
        ]);
       
        //Order Menu
        foreach($cart->products as $key=>$value)
        {
            OrderMenu::create([
                'order_quantity' => $value['quantity'],
                'order_price' => $value['price'],
                'menu_id' => $key,
                'order_id' => $orderRecord->id,
            ]);
        }

        $amount = $request->input('totalPrice');
        $orderId = time() . "";
        $redirectUrl = "http://localhost:8000";
        $ipnUrl = "http://localhost:8000";
        $extraData = "";

        $requestId = time() . "";
        $requestType = "payWithATM";
        //$extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        //Just a example, please check more in there
        //dd($result);
       // header('Location: ' . $jsonResult['payUrl']);
        return redirect()->to($jsonResult['payUrl']);
    }

    public function checkOut(Request $request)
    {
        return view('cart.checkout');
    }
}
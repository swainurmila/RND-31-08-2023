<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use App\Models\PhdSupervisor;
use App\Models\Student;
use App\Models\StudentQualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
class PayController extends Controller
{
    public function stu_payment(Request $request)
    {

        $student = DB::table('phd_application_info')->where('id', $request->appl_id)->first();
        DB::table('phd_application_info')->where('id',$request->appl_id)->update([
            'stu_payment_status' =>  1,
            'draft_status' =>  3,
        ]);

       $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
       $length = 22;
       $rand_chars = substr( str_shuffle( $chars ), 0, $length );
       $rand_chars = 'PAY'.$rand_chars;
       $paymentstatus = "success";
       $date = Carbon::now()->format('Y-m-d');


        DB::table('transaction_history')->insert([
            'appl_id' => $request->appl_id,
            //'user_id' => $student->stud_id,
            //'name' => $student->name,
            'type' => 'application fee',
            'transaction_id' => $rand_chars,
            'transaction_date' => $date,
            'transaction_response' => $paymentstatus ,
            'amount' => 10000,
        ]);

        return redirect()->route('student.view', [$request->appl_id]);

    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'https://sandbox.cashfree.com/pg/orders',
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'POST',
    //         CURLOPT_POSTFIELDS => '{
    //             "customer_details": {
    //                 "customer_name": "santosh choudhury",
    //                 "customer_id": "7112AAA812234",
    //                 "customer_email": "santoshchoudhury5@gmail.com",
    //                 "customer_phone": "7978240211"
    //             },"order_meta": {
    //                 "notify_url": "https://webhook.site/0578a7fd-a0c0-4d47-956c-d02a061e36d3",
    //                 "payment_methods": "cc"
    //             },
    //             "order_amount": 10000.00,
    //             "order_currency": "INR"
    //         }',
    //         CURLOPT_HTTPHEADER => array(
    //             'Accept: application/json',
    //             'x-api-version: 2022-01-01',
    //             'Content-Type: application/json',
    //             'x-client-id: 233990f2d6fa19919132a0d548099332',
    //             'x-client-secret: b7668681d5dbc03586a53be42c48daa93657ef34',
    //         ),
    //     ));

    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);
    //     curl_close($curl);
    //     if ($err) {
    //         return "cURL Error #:" . $err;
    //     } else {
    //         $response = json_decode($response);
    //         dd($response);
    //         // if ($response->{'status'} == "OK") {
    //         //     return $response->{'status'};
    //         // }
    //         $order_token = $response->order_token;
    //        return $paymentResponse = $this->orderPay($order_token);
    //         $redirect_url = $paymentResponse->data->url;
    //         //return  $response;
    //         return redirect($redirect_url);
    //     }

    //     exit;

        //OLD CODE instamojo
        //return $request;
        //$ses = session()->all();
        //$user_id = session('userdata')['userID'];
        //$user_id = $user_data['userID'];
        $request->session()->put('userdata.appl_id', $request->appl_id);
        $student = DB::table('phd_application_info')->where('id', $request->appl_id)->first();
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //     "X-Api-Key:test_9ae75375856232bcaf2bba842cf",
        //     "X-Auth-Token:test_b894c3e94b9d130450ff9a01e77"
        // ));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Api-Key:test_3860c802d488fc9a1977d65556f", "X-Auth-Token:test_957de964463eba880b94ad461e2"));
        //return Request::root();
        //return $redirecturl = Request::root().'/phdstudent/instamojo_redirect';
        //$redirecturl = 'http://127.0.0.1:8000/phdstudent/instamojo_redirect';
        $payload = array(
            'purpose' => 'Application Fee for Phd Student',
            'amount' => '10000',
            'buyer_name' => $student->name,
            'email' => $student->email,
            'phone' => '8888888888',
            'redirect_url' => 'http://127.0.0.1:8000/phdstudent/instamojo_redirect',
            'send_email' => 'False',
            'send_sms' => 'False',
            //'webhook' => 'http://www.example.com/webhook/',
            'allow_repeated_payments' => 'False',
        );

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);
        //die();
        $response = json_decode($response);
        //echo '<pre>';
        //return $response;
        $response = $response->payment_request;
        //return    $response->longurl;

        return redirect($response->longurl);
    }

    public function orderPay($order_token){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sandbox.cashfree.com/pg/orders/pay',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',

            CURLOPT_POSTFIELDS => '{
                "payment_method": {"card": {
                        "card_number": "4111111111111111",
                        "card_holder_name": "Tushar Gupta",
                        "card_expiry_mm": "05",
                        "card_expiry_yy": "27",
                        "card_cvv": "111",
                        "channel": "link"
                    }},
                "order_token": "'. $order_token.'"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'x-api-version: 2022-01-01',
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response = json_decode($response);
        }
    }


    function instamojo_redirect(Request $request)
    {   //return $request;
        //$request->all();
        $date = Carbon::now()->format('Y-m-d');;

        //$ses = session()->all();
        //$user_data = $request->session()->get('userdata');
        //$user_id = $user_data['userID'];
        $appl_id = session('userdata')['appl_id'];

        $payment_id = $request->payment_id;
        $payment_status = $request->payment_status;
        $payment_request_id = $request->payment_request_id;



        $student = DB::table('phd_application_info')->where('id', $appl_id)->first();

        if ($payment_status == 'Credit') {
            $transaction_history = DB::table('transaction_history')->insert([
                //'student_id'           => $student->id,
                'appl_id'              => $appl_id,
                'transaction_id'       => $payment_id,
                'transaction_response' => $payment_status,
                'payment_request_id'   => $payment_request_id,
                'transaction_date'     => $date,
                'amount'               => 10000,
            ]);
        }
            // $student->update([
            //     'stu_payment_status' => 1,
            //     'draft_status' => 3
// tudent_final_preview', compact('payment_id', 'payment_status', 'payment_request_id'))->with('success', 'your payment has been done successfully');
        return redirect()->route('student.view', [$appl_id]);
    }

    
    public function semister_reg_pay(Request $request, $id){
     // return $request->sut_reg_fee;
      $semi_id = DB::table('phd_semister_registration')->orderBy('semister_reg_id','DESC')->where('stud_id',$id)->first();
      $semi_id =  $semi_id->semister_reg_id;
      //return $semi_id ;
       $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
       $length = 22;
       $rand_chars = substr( str_shuffle( $chars ), 0, $length );
       $rand_chars = 'PAY'.$rand_chars;
       $paymentstatus = "success";
       $date = Carbon::now()->format('Y-m-d');


        DB::table('transaction_history')->insert([
            'appl_id' => $semi_id,
            //'user_id' => $student->stud_id,
            //'name' => $student->name,

            'transaction_id' => $rand_chars,
            'type' => 'semester fee',
            'transaction_date' => $date,
            'transaction_response' => $paymentstatus ,
            'amount' => $request->sut_reg_fee,
        ]);

        //return redirect()->route('semister.invoice',[$id]);
        return redirect()->route('semister.nodal',[$id]);
    }
}

<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function send(){
       // $eamil = request()->email;
        $email = 'lan-en@163.com';
        
        $code = rand(100000,999999);
       // $message = "您正在注册全国最大珠宝商会员，验证码是：".$code;
        
        //发送邮件
        $this->sendemail($email,$code);
    }
    
    public function sendemail($email,$code){
        \Mail::send('index.login.email' , ['code'=>$code] ,function($message)use($email){
        //设置主题
            $message->subject("欢迎注册滕浩有限公司");
        //设置接收方
            $message->to($email);
        });
}
    
    
//    public function sendemail($email,$message){
//        \Mail::raw($message ,function($message)use($email){
//        //设置主题
//            $message->subject("欢迎注册滕浩有限公司");
//        //设置接收方
//            $message->to($email);
//        });
//    }    



      public function pay($orderId){
         
            require_once app_path().'/libs/alipay/wappay/service/AlipayTradeService.php';
            require_once app_path().'/libs/alipay/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php';
            $config = config('alipay');
           // dd($config);
           // if (!empty($_POST['WIDout_trade_no'])&& trim($_POST['WIDout_trade_no'])!=""){
           // 
           // 根据订单id获取订单编号和付款金额
                $order = \DB::table('order_info')->where('order_id',$orderId)->first();
                
                //商户订单号，商户网站订单系统中唯一订单号，必填
                $out_trade_no = $order->order_sn;

                //订单名称，必填
                $subject = '粉红珍珠';

                //付款金额，必填
                $total_amount = $order->order_price;

                //商品描述，可空
                $body = '';

                //超时时间
                $timeout_express="1m";

                $payRequestBuilder = new \AlipayTradeWapPayContentBuilder();
                $payRequestBuilder->setBody($body);
                $payRequestBuilder->setSubject($subject);
                $payRequestBuilder->setOutTradeNo($out_trade_no);
                $payRequestBuilder->setTotalAmount($total_amount);
                $payRequestBuilder->setTimeExpress($timeout_express);

                $payResponse = new \AlipayTradeService($config);
                $result=$payResponse->wapPay($payRequestBuilder,$config['return_url'],$config['notify_url']);

                return ;
          
            }
    
         public function return_url(){
            $config = config('alipay');
            require_once app_path().'/libs/alipay/wappay/service/AlipayTradeService.php';


            $arr=$_GET;
            $alipaySevice = new \AlipayTradeService($config); 
            $result = $alipaySevice->check($arr);

            /* 实际验证过程建议商户添加以下校验。
            1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
            2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
            3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
            4、验证app_id是否为该商户本身。
            */
            if($result) {//验证成功
                    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    //请在这里加上商户的业务逻辑程序代码

                    //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
                //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

                    //商户订单号

                    $out_trade_no = htmlspecialchars($_GET['out_trade_no']);

                    //支付宝交易号

                    $trade_no = htmlspecialchars($_GET['trade_no']);

                    echo "验证成功<br />外部订单号：".$out_trade_no;

                    //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

                    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            }
            else {
                //验证失败
                echo "验证失败";
            }
         }   
    
}

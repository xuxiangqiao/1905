<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016091900549697",

		//商户私钥，您的原始格式RSA私钥
		
		'merchant_private_key' =>  "MIIEogIBAAKCAQEAoahe6owmKMV1NEvwGQ1x5fZ5w30a5N/tsl8Zq0OT9fZ+k42RJTi00ZCVQacs9li0m5+8WZJCaPM3BE87t8h259dc0Ue6zWhWPIOjIX/vNK8VfNiufICP8X6PQvefGFUz2vrYHcM5KlXl/8th/WeqidvqTRlZm9YRq+cSkoDTKbYdlvDRd6iAl1llk6SCP4WL9tUFXresy36PGxn6X8K2/Nw5V5kvju9BJ2XybRNSMLyXj7qGXNcRw7vf4K2oX5mfKoTQNW1hAcA4Q7pD3ILwIEjuspcYnTdI674ht1JMdNz1OIIphaeq8xdcEjhUnXx7uhrweo3e7m2bVKKT0bf50wIDAQABAoIBABVtiv9OCnTXD50Z/75iYNmZnTRDbgAuioRdRLrF32P4A3kth7LGXHl2z8H/Fd+ljHMgbkf1MiZVLtK8ae8HfHNowZ3gAyvdC6lDzajQG3YBSzjcQ+yu4eWh3/2Bcy43hQMewuzXBsnMzwrj+54qUpmpc9o6ZP1aF8eQfo660sKxcifPH6WYQbfOjK3kjIwwArrctBhZcUb1dYM6w+D4QvlCOb8X8m6B/seqLuVP8NXG25Nm/9uc6Ge/cJT0/YSSIuWi30H8FwlAAi92BbK++yAhDLoV3ix1k+75EG2GJBBSoMdwChsq0eqvL2BBiirciY6pSk5d88adAHkcmC9+m4ECgYEA1PjtXkEOIK6WrZY1I+Qez4z/vWwDKGpdOZWMdFZKy4xJwgUDBXPQI1b5bDLL/qAe8SaNOTmunZiFy5lztREQUdQ0PBHp9AwfV7MHxcqKI2iN4xGLW+gNxl6q+6LEBl1rCA/6DMsVRopYfDH8fI109I4ivkdcEUyXPlI+zM2TERMCgYEAwlFqG5RvqhTl1PH+hH+Dpdf6B9I+WytizQ71yGjiznxLiIX17J6Z4I61WyD/rqIovB9APg96u0nVnczDtJvnS6J4ZRSXdtJaMmrLJ1HAwLhuyHbqqjiDpSG/YpfLnJIEW0D3lCHkuh7c7nNCOfKoPcmL5bUtFX2+dg4Ov+lVTEECgYAH/1UCjhTWu1ejKxnRwDY7+wJ7fXvc36miiPAeSkNCw4DdjUygvsmZGiIBoyKv7BldWuJAvN7Gwjx7+cYzjXF8cSiI/O85H99pbqqjDckELV/un/EIwX0K7vEiw+jyiD2Frvvn0RR6cqWB/GqLztAOguvhE1Lsv2CKkZIUJMAaCwKBgB6gKEIKhgLfYk3Kihul4UDNJln/N9a0otDAz9nzNfPnQRxWSKkvYf8zXr/rFoEWi6cCoeRmGijUfTduo1We0Lhp9eGweiK/CnoxvK0IxIFbUBKGM3v6hj0LcZd/ZxbZKJidR6fwI5V18cofHkv1w7BhSIw+nslpVRBULNzwUIJBAoGAMTB45SNDEY9e12i+devMYnBYPyKX61SPb+D61vOu/s+XQT+h9lq/N7fOup9Eq1Bc82AGrdhura3bZ4gL0XfNI039OtaIOiGqxLnYgFJprc2QY6G2wo6RnyPlDHU0xcr23i5e8dZ4thCsHYnykStmEknJbU8hC3bxf4UbB2qe7Io=",

		//异步通知地址
		'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://localhost/alipay/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",


		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		//'alipay_public_key' => "",
		'alipay_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA0QC5/O5zZT6DvbCjI7QVUAxqwA+Kh4y8tdz5Vpti/IoCL+aWdLL1Z8iXDwywUpbKR6rCeSEegIklzze2dCl1H4TaI3rFBdyzBB1UV1WNhLTMhssKxQ9c4lcB3U32SoBu4+/0wOb78YXViwYIterrxRPis8T73WKTi2hB1cB/FHxtZ3Huzbc1S1yc1KAgt9vUNR4Wb/3jyUi7SCnP6EMf/l1F+/mqhaRgq8d1zh7P388I57eDWZCdMB8lUq6n8Bn9+uDhJhvpp79YnyJsORSfsxDL+NZ2J8ziuETNhQxX/v2zFp6I75nDIUqynpGCe40/0L9KMtkv2Tn2l24AwnxU7QIDAQAB',//是支付宝公钥，不是应用公钥,  公钥要写成一行,不要换行
	

		
	
);
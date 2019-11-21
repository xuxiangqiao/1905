<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <b style="color:red">{{session('msg')}}</b>
        <form action="{{url('/exam/dologin')}}" method="post">
           <!-- @csrf -->
            <!-- {{csrf_field()}} -->
            <input type="hidden" name="_token" value="{{csrf_token()}} ">
            <input type="text" name="admin_name" value="" placeholder="请输入用户名">
            <input type="password" name="pwd" value="" placeholder="请输入密码">
            <button>登录</button>
        </form>
    </body>
</html>

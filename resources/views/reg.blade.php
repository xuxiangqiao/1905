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
        {{session('msg')}}
        <form action="{{url('/doReg')}}" method="post">
            @csrf 
            <!-- {{csrf_field()}} -->
          
            <input type="text" name="name" value="" placeholder="请输入用户名">
            <input type="email" name="email" value="" placeholder="请输入邮箱">
            <input type="password" name="password" value="" placeholder="请输入密码">
            <input type="repassword" name="repassword" value="" placeholder="请输入确认密码">
            <button>注册</button>
        </form>
    </body>
</html>

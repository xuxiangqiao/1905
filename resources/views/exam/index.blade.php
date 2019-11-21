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
        <h1>后台主页</h1><hr/>
        @if( session('admin')->priv!=2)
        <p>
            <a href="{{url('/exam/admin')}}">管理员管理</a>
        </p>
        @endif
         <p>
            <a href="{{url('/exam/goods')}}">货物管理</a>
        </p>
         <p>
            <a href="{{url('/exam/log')}}">出入记录管理</a>
        </p>
    </body>
</html>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
        <title></title>
    </head>
    <body>
        <h2>管理员列表</h2> <a href="{{url('/exam/admin/create')}}">添加</a><hr/>
        {{session('msg')}}
        <form action="">
            <input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入品牌名称关键字">
            <input type="text" name="desc" value="{{$query['desc']??''}}" placeholder="请输入备注">
            <button>搜索</button>
        </form>    
        
        <table class="table">
	
	<thead>
		<tr>
			<th>ID</th>
                       	<th>用户名称</th>
                        <th>用户身份</th>
			<th>操作th>
		</tr>
	</thead>
	<tbody>
            @php $i=1 @endphp
            @foreach ( $data as $v)
		<tr @if($i%2==0) class="active" @else class="success" @endif>
			<td>{{$v->admin_id}}</td>
                        <td>{{$v->admin_name}}</td>
			<td>@if ($v->priv==1)库存主管@endif @if ($v->priv==2)库管员@endif</td>
			
			<td><a href="" class="btn btn-primary">禁用</a>||
                            <a href="" class="btn btn-danger">升级为主管</a></td>
		</tr>
                @php $i++ @endphp
            @endforeach    

		
	</tbody>
</table>
      
    </body>
</html>

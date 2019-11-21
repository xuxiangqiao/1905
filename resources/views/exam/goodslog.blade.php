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
        <h2>出入记录列表</h2> <a href="{{url('/exam/goods/create')}}">添加</a><hr/>
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
                       	<th>操作人</th>
                        <th>商品</th>
			<th>操作<th>
                        <th>时间<th>
		</tr>
	</thead>
	<tbody>
            @php $i=1 @endphp
            @foreach ( $data as $v)
		<tr @if($i%2==0) class="active" @else class="success" @endif>
			<td>{{$v->log_id}}</td>
                        <td>{{$v->admin_name}}</td>
			<td>{{$v->goods_name}}</td>
                        <td>@if($v->option==1)入库@endif @if($v->option==2)出库@endif</td>
			
			<td>@php echo date('Y-m-d H:i:s',$v->add_time) @endphp</td>
		</tr>
                @php $i++ @endphp
            @endforeach    

		
	</tbody>
</table>
      
    </body>
</html>

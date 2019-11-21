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
        <h2>货物列表</h2> <a href="{{url('/exam/goods/create')}}">添加</a><hr/>
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
                       	<th>商品名</th>
                        <th>商品库存</th>
                        
			<th>操作<th>
		</tr>
	</thead>
	<tbody>
            @php $i=1 @endphp
            @foreach ( $data as $v)
		<tr @if($i%2==0) class="active" @else class="success" @endif>
			<td>{{$v->goods_id}}</td>
                        <td>{{$v->goods_name}}</td>
			<td>{{$v->goods_number}}</td>
			
			<td><a href="{{url('/exam/goods/2/'.$v->goods_id)}}" class="btn btn-primary">出库</a>||
                            <a href="{{url('/exam/goods/1/'.$v->goods_id)}}" class="btn btn-danger">入库</a></td>
		</tr>
                @php $i++ @endphp
            @endforeach    

		
	</tbody>
</table>
      
    </body>
</html>

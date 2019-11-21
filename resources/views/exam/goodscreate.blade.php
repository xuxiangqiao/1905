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
        <script src="{{asset('/static/admin/js/jquery-3.2.1.min.js')}}"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <h2>添加货品</h2><hr/>
<!--        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
        </div>
        @endif-->
        
    <b style="color:red">{{session('msg')}}</b>
        <form action="{{url('/exam/goods/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
            @csrf
	<div class="form-group ">
		<label for="firstname" class="col-sm-2 control-label">名称</label>
		<div class="col-sm-10">
			<input type="text"  name="goods_name" class="form-control" id="firstname" placeholder="请输入品牌名称">
                        <b style="color:red">@php echo $errors->first('brand_name'); @endphp</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">库存</label>
		<div class="col-sm-10">
			<input type="text" name="goods_number" class="form-control" id="brand_url"  placeholder="请输入品牌网址">
                        <b style="color:red">@php echo $errors->first('brand_url'); @endphp</b>
		</div>
	</div>
      <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">图片</label>
		<div class="col-sm-10">
			<input type="file" name="goods_img" class="form-control" id="brand_url"  placeholder="请输入品牌网址">
                        <b style="color:red">@php echo $errors->first('brand_url'); @endphp</b>
		</div>
	</div>
        

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" class="btn btn-default" value="提交">
		</div>
	</div>
</form>
    </body>

    
    
</html>

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
        <h2>编辑商品品牌</h2><hr/>
<!--        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
        </div>
        @endif-->
        
       
        <form action="{{url('/brand/update/'.$data->brand_id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
            @csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-10">
			<input type="text" name="brand_name" value="{{$data->brand_name}}" class="form-control" id="firstname" placeholder="请输入品牌名称">
                        <b style="color:red">@php echo $errors->first('brand_name'); @endphp</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">品牌网址</label>
		<div class="col-sm-10">
			<input type="text" name="brand_url"  value="{{$data->brand_url}}" class="form-control" id="lastname"  placeholder="请输入品牌网址">
                        <b style="color:red">@php echo $errors->first('brand_url'); @endphp</b>
		</div>
	</div>
       <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">品牌LOGO</label>
		<div class="col-sm-10">
                    <img src="{{env('UPLOAD_URL')}}{{$data->brand_logo}}" width="100">
                    
			<input type="file" name="brand_logo" class="form-control" id="lastname" >
		</div>
	</div>
        <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">品牌描述</label>
		<div class="col-sm-10">
			<textarea class="form-control" name="brand_desc" rows="3" placeholder="请输入品牌描述">{{$data->brand_desc}}</textarea>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">提交</button>
		</div>
	</div>
</form>
    </body>
</html>

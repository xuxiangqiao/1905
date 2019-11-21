<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Brand;
use \App\Http\Requests\StoreBrandPost;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     * 展示列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $user = \Auth::user();
//        $id = \Auth::id();
//        dd($id);
       // getAll();
       // session的使用
       // 设置session
        //session(['user'=>'zhangsan']);
        //request()->session()->put('username', 'lisi');
        
       //获取
        //echo session('user');
       // echo request()->session()->get('username');
        //删除
        //session(['user'=>null]);
        //echo request()->session()->pull('username');//先获取再删除
        
       // request()->session()->forget('username');//删除单个
//        request()->session()->flush();//删除所有
//        dump(session('user'));
//        dd(session('username'));
        
        //DB
        //$data = DB::table('brand')->get();
        //ORM
       // $data = Brand::all();
        
        $page =  request()->page??1;
        $word =  request()->word??'';
        
        //echo 'data_'.$page.'_'.$word;
        //$data = Cache::get('data_'.$page.'_'.$word);
        $data = Redis::get('data_'.$page.'_'.$word);
        //dump($data);
        if(!$data){
           //echo "db===";
            $pageSize = config('app.pageSize');
            //搜索品牌名称
            $word = request()->word;
            $where = [];
            if( $word ){
                $where[] = ['brand_name','like',"%$word%"];
            }
            //搜索品牌备注
            $desc = request()->desc;
            if( $desc ){
                $where[] = ['brand_desc','like',"%$desc%"];
            }
            //DB::connection()->enableQueryLog();
            $data = Brand::where($where)->paginate($pageSize);


            //Cache::put('data_'.$page.'_'.$word, $data, 60);
            $data = serialize($data);
            Redis::set('data_'.$page.'_'.$word, $data, 60);
        }
        $data = unserialize($data);
//        $logs = DB::getQueryLog();
//        dump($logs);
        $query = request()->all();
        //dump($query);
        return view('admin.brand.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     * //显示添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //第二种验证
    //public function store(\App\Http\Requests\StoreBrandPost $request)
    public function store(Request $request)
    {   
        //第一种验证
//        $request->validate([
//            'brand_name' => 'required|unique:brand',
//            'brand_url' => 'required',
//        ],[
//            'brand_name.required'=>'品牌名称必填',
//            'brand_name.unique'=>'品牌名称已经存在',
//            'brand_url.required'=>'品牌网址必填'
//        ]);
        
        
        
        
        //接收排除_token的值
        $post = $request->except('_token'); 
        
        $validator = \Validator::make($post, [
             'brand_name' => 'required|unique:brand',
             'brand_url' => 'required',
        ],[
            'brand_name.required'=>'品牌名称必填',
            'brand_name.unique'=>'品牌名称已经存在',
            'brand_url.required'=>'品牌网址必填'
        ]);
        if ($validator->fails()) {
            return redirect('brand/create')
                ->withErrors($validator)
                ->withInput();
        }
        
        
        //只接收某个字段的值
        //$post = $request->only(['brand_name','brand_url']); 
        //dump($post);
       // unset($post['_token']);
        
        //文件上传
        if($request->hasFile('brand_logo')){
            $post['brand_logo'] = $this->upload('brand_logo');
        }
        
        //dd($post);
        //DB添加
       // $res = DB::table('brand')->insert($post);//返回布尔值
       // $res = DB::table('brand')->insertGetId($post);//返回自增id
        //dd($res);
        
        //ORM 添加
        $brand = Brand::create($post);
        //echo $brand->brand_id;
        
//        $brand = new Brand;
//        $brand->brand_name = $post['brand_name'];
//        $brand->brand_url = $post['brand_url'];
//        $brand->brand_logo = $post['brand_logo'];
//        $brand->brand_desc = $post['brand_desc'];
//        $brand->save();
        
        if( $brand->brand_id ){
            return redirect('/brand/index')->with('msg','添加成功！');
        }
    }
    
    
    public function upload($filename){
        
        if (request()->file($filename)->isValid()) {
            $photo = request()->file($filename);
            $store_result = $photo->store('upload');
            return $store_result;
        }
            exit('未获取到上传文件或上传过程出错');
        
    }

    /**
     * Display the specified resource.
     * 展示单条详情
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *编辑页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$id){
            return;
        }
        //DB 单条查询
        //$data = DB::table('brand')->where('brand_id',$id)->first();
        //ORM 单条
       // $data = Brand::find($id);
        $data = Brand::where('brand_id',$id)->first();
        //dd($data);
        return view('admin.brand.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *执行编辑
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBrandPost $request, $id)
    {
        //验证、
        //接值
        $post  = $request->except('_token');
       
        //判断有无文件上传 有 文件上传
         if($request->hasFile('brand_logo')){
            $post['brand_logo'] = $this->upload('brand_logo');
        }
        //更新入库
       Brand::where('brand_id',$id)->update($post);
       
       return redirect('/brand/index');
    }

    /**
     * Remove the specified resource from storage.
     *执行删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$id){
            abort(404);
        }
        
        //DB 删除
       //$res = DB::table('brand')->where('brand_id',$id)->delete();
       //ORM 删除
       //$res =Brand::destroy($id);
       $res = Brand::where('brand_id',$id)->delete();
        if( $res ){
            return redirect('/brand/index');
        }
    }
    
    
    public function checkOnly(){
        $brand_name = request()->brand_name;
        
        $count = Brand::where('brand_name',$brand_name)->count();
        echo $count;
    }
}

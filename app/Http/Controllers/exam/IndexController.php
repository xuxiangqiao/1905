<?php

namespace App\Http\Controllers\exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    public function dologin(Request $request){
        $post = $request->except('_token');
        $res = DB::table('admin')->where(['admin_name'=>$post['admin_name']])->first();
        
        if($post['pwd']!= decrypt($res->pwd)){
            return redirect('/exam/login')->with('msg','密码错误');
        }
        
        session(['admin'=>$res]);
        return redirect('/exam');
    }  
    
    public function index(){
       
        return view('exam.index');
    }
    public function create(){
        return view('exam.create');
    }
    
    public function store(Request $request){
        $post = $request->except('_token');
        
        if( $post['pwd']!= $post['repwd'] ){
            return redirect('/exam/admin/create')->with('msg','两次密码不一致');
        }
        unset($post['repwd']);
        
        $post['pwd'] = encrypt($post['pwd']);
        $res = DB::table('admin')->insert($post);
        //dd($res);
        if( $res ){
            return redirect('/exam');
        }
        
    }
    
    
   public function lists(){
       
       $admin = DB::table('admin')->get();
       //dd($admin);
        return view('exam.list',['data'=>$admin]);
    }
    
    
   public function goodscreate(){
        return view('exam.goodscreate');
    }
   public function goodsstore(Request $request){
        $post = $request->except('_token');
         //文件上传
        if(request()->hasFile('goods_img')){
            $post['goods_img'] = $this->upload('goods_img');
        }
        $post['add_time'] = time();
        $goods_id = DB::table('goods')->insertGetId($post);
       // dd($goods_id);
        if( $goods_id ){
            //添加日志记录
            $data = [
                'admin_id'=>session('admin')->admin_id,
                'goods_id'=>$goods_id,
                'option'=>1,
                'add_time'=>time()
            ];
            DB::table('log')->insert($data);
            return redirect('/exam/goods');
        }
        
    }
    
     public function goodslists(){
       
       $admin = DB::table('goods')->get();
       //dd($admin);
        return view('exam.goodslist',['data'=>$admin]);
    }  
    
    
        /**
     * 文件上传
     */
    public function upload($file){
        if ( request()->file($file)->isValid()) {
            $photo = request()->file($file);
            $store_result = $photo->store('uploads');
           
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
    }
    
    public function output($option,$goods_id){
      
       $goods = DB::table('goods')->where('goods_id',$goods_id)->first();
       //dd($goods);
        return view('exam.goodsoption',['data'=>$goods,'option'=>$option]);
    }  
    
    public function update($option,$goods_id){
     
      $post = request()->except('_token');
      //dd($post);
      if( $option==1){
          $res = DB::table('goods')->where('goods_id',$goods_id)->increment('goods_number', $post['goods_number']); 
      }
      if( $option==2){
          $res = DB::table('goods')->where('goods_id',$goods_id)->decrement('goods_number', $post['goods_number']); 
      }
      
      if($res){
        $data = [
                  'admin_id'=>session('admin')->admin_id,
                  'goods_id'=>$goods_id,
                  'option'=>$option,
                  'add_time'=>time()
        ];
        DB::table('log')->insert($data); 
      }
      return redirect('/exam/goods');
      
    }  
    
    
    
    public function log(){
       $admin = session('admin'); 
       $where = [];
       if($admin->priv==2){
          $where['log.admin_id'] = $admin->admin_id;
       }
      
       $data = DB::table('log')
               ->leftJoin('admin', 'log.admin_id', '=', 'admin.admin_id')
               ->leftJoin('goods', 'log.goods_id', '=', 'goods.goods_id')
               ->where($where)->get();
      // dd($data);
       return view('exam.goodslog',['data'=>$data]);
        
    }
    
    
    
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Mir_text;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\AccountModel;
class SourceController extends Controller
{
    protected $middleware = ['App\Http\Middleware\Authenticate'=>[]];
    //文本素材列表
    public function text_list(Request $req){
        $acc = AccountModel::where('uid',$req->user()->uid)->first();
        $text_list = Mir_text::where('aid',$acc->aid)->orderBy('mid','desc')->paginate(10);
        $data['text_list'] = $text_list;
        $data['acc_name'] = $acc->acc_name;
        $data['name'] = $req->user()->name;
        return view('admin/mir_text',$data);
    }

    //文本素材增加路由
    public function posttext_list(Request $req){
        $acc = AccountModel::where('uid',$req->user()->uid)->first();
        $id = $acc->aid;
        $text_list = new Mir_text();
        $text_list->content = $req->add_con;
        $text_list->aid = $id;
        $res = $text_list->save();
        if($res){
            return response()->json(['error'=>0,'msg'=>'添加成功!','id'=>$res]);
        }else{
            return response()->json(['error'=>1,'msg'=>'添加失败!']);
        }
    }

    //文本素材删除路由
    public function postDelText_list(Request $req){
        $id = $req->del_con;
        //判断此素材是否存在
        $acc = AccountModel::where('uid',$req->user()->uid)->first();
        $text = Mir_text::where(['aid'=>$acc->aid,'mid'=>$id]);
        if(!$text){
            return response()->json(['error'=>1,'msg'=>'没找到该项目!']);
        }
        $res = $text->delete();
        if($res){
            return response()->json(['error'=>0,'msg'=>'删除成功!']);
        }else{
            return response()->json(['error'=>2,'msg'=>'删除失败!']);
        }
    }
    //批量删除文本素材路由
    public function postDelText_list_arr(Request $req){
        //相关公众号信息
        $acc = AccountModel::where('uid',$req->user()->uid)->first();
        //将数据处理成数组
        $arr = explode(',',$req->del_con);
        foreach($arr as $v){
            $text = Mir_text::where(['aid'=>$acc->aid,'mid'=>$v]);
            if(!$text){
                return response()->json(['error'=>1,'msg'=>'参数错误!']);
            }
            $res = $text->delete();
            if(!$res){
                return response()->json(['error'=>2,'msg'=>'删除错误!']);
            }
        }
        return response()->json(['error'=>0,'msg'=>'删除成功!']);
    }

    //修改文本素材
    public function postEditText_list_arr(Request $req){
        $acc = AccountModel::where('uid',$req->user()->uid)->first();
        $id = $req->edit_id;
        $text = Mir_text::where(['aid'=>$acc->aid,'mid'=>$id])->first();
        if(!$text){
            return response()->json(['error'=>1,'msg'=>'参数错误!']);
        }
        $text->content = $req->edit_con;
        $res = $text->save();
        if($res){
            return response()->json(['error'=>0,'msg'=>'修改成功!']);
        }else{
            return response()->json(['error'=>2,'msg'=>'修改出错!']);
        }
    }
}

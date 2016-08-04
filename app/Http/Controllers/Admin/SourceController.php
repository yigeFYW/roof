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
    //文本素材列表
    public function text_list(){

        return view('admin/mir_text');
    }

    public function posttext_list(Request $req){
        $acc = AccountModel::where('uid',$req->user()->uid)->first();
        $id = $acc->aid;
        $text_list = new Mir_text();
        $text_list->content = $req->add_con;
        $text_list->aid = $id;
        $res = $text_list->save();
        if($res){
            return response()->json(['error'=>0,'msg'=>'添加成功!']);
        }else{
            return response()->json(['error'=>1,'msg'=>'添加失败!']);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Keyword;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\AccountModel;
use App\Mir_text;
class BaseController extends Controller
{
    /**
     * keywords设置
     * kid:主键
     * aid:公众号id
     * mid:素材列表id
     * key_cat:关键字类型{
     *      0:文本回复关键字
     *      1:关注回复类型
     *      2:默认回复类型
     * }
     * rescat:回复信息类型{
     *      0:text
     *      1:image
     *      2:...
     * }
     */
    protected $middleware = ['App\Http\Middleware\Authenticate'=>[]];
    //欢迎语设置(get)
    public function wel_list(Request $req){
        $acc = AccountModel::where('uid',$req->user()->uid)->first();
        $data['name'] = $req->user()->name;
        $key = Keyword::where('aid',$acc->aid)->where('key_cat',1)->first();
        $data['wel'] = [];
        if($key){
            if($key->rescat == 0){
                //如果是文本去查相应素材
                $con = Mir_text::find($key->mid);
                $data['wel']['text_con'] = $con->content;
            }
        }
        dd($data);
        return view('admin/wel_list',$data);
    }
}

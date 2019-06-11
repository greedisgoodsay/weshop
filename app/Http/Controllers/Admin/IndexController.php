<?php
/**
 * Created by PhpStorm.
 * User: lixinyuan
 * Date: 2019/6/10
 * Time: 11:21
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Check
{
    public function index(){
        $res = DB::table('address')->select()->get();

        return view("admin.index.index")->with(['data'=>$res]);
    }

}

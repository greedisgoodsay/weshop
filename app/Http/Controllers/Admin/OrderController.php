<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orderList()
    {
        $start = isset($_GET['start'])?strtotime($_GET['start']):'25200';
        $end = isset($_GET['end'])?strtotime($_GET['end']):'2147483647';
        $contrller = isset($_GET['contrller'])?[$_GET['contrller']]:[1,2,3,4,5,6];
        $username = isset($_GET['username'])?$_GET['username']:'';
        $between = [$start,$end];
        $orderList = Db::table('order')
                        ->leftJoin('status','order.o_status','=','status.s_id')
                        ->leftJoin('address','order.a_id','=','address.a_id')
                        ->whereBetween('order.o_addtime',$between)
//                        ->where('order.o_addtime','>',$start)
//                        ->where('order.o_addtime','<',$end)
                        ->whereIn('order.o_status',$contrller)
                        ->where('order.o_num','like',"%$username%")
                        ->orderBy('order.o_addtime','desc')
                        ->select()
                        ->paginate(5);
//        echo "<pre>";
//        var_dump($orderList);die;
        $statusList = Db::table('status')->select()->get();
        return view('admin/order/order',['orderList' => $orderList ,'statusList' => $statusList]);
    }
    public function orderDel()
    {
        $o_id = $_GET['id'];
        $res = Db::table('order')->where('o_id', '=', "$o_id")->delete();
        if($res){
            echo json_encode(['msg' => 1]);
        }else{
            echo json_encode(['msg' => 0]);
        }
    }
    public function orderDelall()
    {
        $ids = $_GET['ids'];
        $res = Db::table('order')->whereIn('o_id',$ids)->delete();
        if($res){
            echo json_encode(['msg' => 1]);
        }else{
            echo json_encode(['msg' => 0]);
        }
    }
    public function orderDesc()
    {
        $id = $_GET['id'];
        $orderDesc = Db::table('order')
                        ->leftJoin('status','order.o_status','=','status.s_id')
                        ->leftJoin('address','order.a_id','=','address.a_id')
                        ->where('o_id','=',"$id")
                        ->orderBy('order.o_addtime','desc')
                        ->select()
                        ->get();
        echo "<pre>";
        var_dump($orderDesc);die;
    }
}

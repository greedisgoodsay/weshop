<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/6/20
 * Time: 14:30
 */
namespace App\Http\Controllers;

class OrderController extends Controller
{

    public function orderShow()
    {
            return view('index.order.order');
    }


}
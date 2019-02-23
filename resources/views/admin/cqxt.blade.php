@extends('admin/public/public')
@section('function')

    $(function() {

    });
@endsection
    <style type="text/css">
    body {
        background: rgba(0, 0, 0, 0.5);
    }
    </style>
@section('content')
    <!--退出系统-->
    <div class="tcxt">
        <div class="tcxt_h">
            <span>提示</span>
        </div>
        <div class="tcxt_m">
            确定重启MCU？
        </div>
        <div class="tcxt_f">
            <a href="" class="btn_bg btn_h">返回</a>
            <a href="" class="btn_bg">保存</a>
        </div>
    </div>
    <!--退出系统-->
@endsection
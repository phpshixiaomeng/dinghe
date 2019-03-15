
@extends('Home/show/head')
@section('content')

    <!--Checkout Area Start-->
    <div class="checkout-area section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Checkout Form Start-->
                    {{-- <form action="#" class="checkout-form"> --}}
                       <div class="row row-40">

                           <div class="col-lg-7">

                               <!-- Billing Address -->
                               <div id="billing-form" class="mb-10">
                                   <h4 class="checkout-title">游戏展示</h4>
                                    <div class="game-image-gallery-wrap">
                            {{-- 大图片轮播 --}}
                            <div class="game-image-large">

                              @foreach($game_img as $key=>$value)
                                <div class="game-image img-full">
                                    <img src="/uploads/{{ $value->game_img }}" alt="">
                                </div>
                              @endforeach

                            </div>
                            {{-- 小图片轮播 --}}
                            <div class="game-image-thumbs">

                              @foreach($game_pic as $k=>$v)
                                <div class="sm-image"><img src="/uploads/{{ $v->game_pic }}" alt="product image thumb"></div>
                              @endforeach

                            </div>
                            <div class="game-description mb-45">
                               <p>游戏价格:<span style="color:red"> ￥{{ $gameslist->game_jg }}</span></p>
                               <h3 style="color:blue">{{ $gameslist->name }}</h3>
                               <p>{!! $gameslist->game_xq !!}</p>
                           </div>
                        </div>
                               </div>

                               <!-- Shipping Address -->
                               <div id="shipping-form">
                                   <h4 class="checkout-title">Shipping Address</h4>



                               </div>

                           </div>

                           <div class="col-lg-5">
                               <div class="row">

                                   <!-- Cart Total -->
                                   <div class="col-12 mb-60">

                                       <h4 class="checkout-title">商品总价</h4>

                                       <div class="checkout-cart-total">

                                           <h4>商品 <span style="padding-right: 10px;">合计</span></h4>

                                           <ul>
                                                {{-- 遍历购物车 --}}

                                                @foreach($shop as $k=>$v)
                                               <li><input name="item" type="checkbox" value="{{ $v->id }}" style="position: relative;top:3px;">{{ $v->name }}<span>￥{{ $v->game_jg }}<button type="button" style="margin-left: 5px;" onclick="shan({{ $v->id }},this)"><img src="/assets/images/cart/timg.jpg" style="width:8px;height:8px;"></button></span></li>
                                                @endforeach

                                           </ul>

                                           <p>小计 <span id="xj">00.00</span></p>
                                           <p>优惠 <span id="yh">00.00</span></p>
                                           <p style="font-size: 18px;">总计<span id="zj">￥00.00</span></p>
                                           <p style="font-size: 18px;">清空购物车<span><button onclick="qing()" class="btn btn-info btn-sm">清空</button></span></p>
                                           <h4><input id="quan" type="checkbox">全选<span><a href="/home/games">继续购物</a></span></h4>
                                       </div>

                                   </div>

                                   <!-- Payment Method -->
                                   <div class="col-12">
                                      <form action="/home/order" mothod="post">
                                       <h4 class="checkout-title">支付方式</h4>

                                       <div class="checkout-payment-method">

                                           <div class="single-method">
                                               <input type="radio" id="payment_check" name="payment-method" value="check">
                                               <label for="payment_check">支票支付</label>
                                               <p data-method="check">请将支票寄到商店名称，包括商店街道、商店镇、商店状态、商店邮政编码、商店国家.</p>
                                           </div>

                                           <div class="single-method">
                                               <input type="radio" id="payment_bank" name="payment-method" value="bank">
                                               <label for="payment_bank">直接银行转账</label>
                                               <p data-method="bank">请将支票寄到商店名称，包括商店街道、商店镇、商店状态、商店邮政编码、商店国家.</p>
                                           </div>

                                           <div class="single-method">
                                               <input type="radio" id="payment_cash" name="payment-method" value="cash">
                                               <label for="payment_cash">货到付款</label>
                                               <p data-method="cash">请将支票寄到商店名称，包括商店街道、商店镇、商店状态、商店邮政编码、商店国家</p>
                                           </div>

                                           <div class="single-method">
                                               <input type="radio" id="payment_paypal" name="payment-method" value="paypal">
                                               <label for="payment_paypal">贝宝</label>
                                               <p data-method="paypal">请将支票寄到商店名称，包括商店街道、商店镇、商店状态、商店邮政编码、商店国家</p>
                                           </div>

                                           <div class="single-method">
                                               <input type="radio" id="payment_payoneer" name="payment-method" value="payoneer">
                                               <label for="payment_payoneer">支付宝</label>
                                               <p data-method="payoneer">请将支票寄到商店名称，包括商店街道、商店镇、商店状态、商店邮政编码、商店国家</p>
                                           </div>

                                           <div class="single-method">
                                               <input type="checkbox" id="accept_terms">
                                               <label for="accept_terms">我已阅读并接受条款和条件</label>
                                           </div>

                                       </div>

                                       <!-- <a id="xia" type="/home/order" class="place-order df-btn">付款</a> -->
                                       <button id="btn" type="submit" class="place-order df-btn">付款</button>
                                        <div style="width:1226;height:150px;"></div>
                                      </form>
                                   </div>

                               </div>
                           </div>

                       </div>
                    {{-- </form> --}}
                    <!-- Checkout Form End-->
                </div>
            </div>
        </div>
    </div>


    <!--Checkout Area End-->
    <script type="text/javascript">
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function shan(cid,obj){
              var url = '/home/zhifu/fu/'+cid;
                $.get(url,function(data){
                    // console.log(data.msg);
                    if(data.msg == 'yes'){
                        $(obj).parent().parent().remove();
                        if($(obj).parent().prev().is(':checked')){
                         var qian = parseInt($('#xj').text());
                         var jian = parseInt(data.qian);
                         var zong = qian-jian;
                         $('#xj').text(zong);
                         $('#yh').text(Math.floor(0.1*zong*100)/100 );
                         $('#zj').text(Math.floor(0.9*zong*100)/100 );
                        }
                    }

                },'json');
            }

            $('#quan').click(function(){
              if($(this).is(':checked')){
                $(':checkbox[name=item]').prop('checked',true);
                $(':checkbox[name=item]').attr('disabled',true);
                if($(':checkbox[name=item]').is(':checked')){
                  var qx = $(':checkbox[name=item]').val();
                  var url = '/home/zhifu/qx/'+qx;
                  var sum = 0;
                  $.get(url,function(msg){
                    // console.log(msg);
                    $.each(msg,function(index,value){
                       sum += parseFloat(value);
                    })
                    $('#xj').text(sum);
                    $('#yh').text(sum/10);
                    $('#zj').text(0.9*sum);
                  },'json');
                }
              }else{
                $(':checkbox[name=item]').prop('checked',false);
                $(':checkbox[name=item]').attr('disabled',false);
                    $('#xj').text('00.00');
                    $('#yh').text('00.00');
                    $('#zj').text('00.00');
                var url = '/home/zhifu/qu';
                $.get(url,function(){

                });
              }

            })

            $(':checkbox[name=item]').click(function(){
              if($(this).is(':checked')){
                var bid = $(this).val();
                var url = '/home/zhifu/heji/'+bid;
                // alert(url);
                $.get(url,function(res){
                var qian = parseInt($('#xj').text());
                var jia = parseInt(res);
                var zng = qian+jia;
                var zong = parseInt(zng);
                $('#xj').text(zong);
                $('#yh').text(Math.floor(0.1*zong * 100) / 100 );
                $('#zj').text(Math.floor(0.9*zong*100)/100 );
                });
              }else{
                var bid =$(this).val();
                var url = '/home/zhifu/heji/'+bid;
                // alert(url);
                $.get(url,function(res){
                  var qian = parseInt($('#xj').text());
                  var jian = parseInt(res);
                  var zong = qian-jian;
                  $('#xj').text(zong);
                  $('#yh').text(Math.floor(0.1*zong * 100) / 100 );
                  $('#zj').text(Math.floor(0.9*zong*100)/100 );

                });
              }
            })

           // 试验田
           $(':checkbox[name=item]').click(function(){
              if($(this).is(':checked')){
                  var gid = $(this).val();
                  var url = '/home/zhifu/jia/'+gid;
                  $.get(url,function(rem){

                  });
              }else{
                  var gid = $(this).val();
                  var url = '/home/zhifu/jian/'+gid;
                  $.get(url,function(rem){
                    $(':checkbox[name=item]').attr('disable',true);
                  });
              }
           })

           $('#btn').click(function(){
              if(!$(':checkbox[name=item]').is(':checked')){
                alert('请选择想付款的游戏');
                return false;
              }
           })

            if(!window.name){
              var url = '/home/zhifu/shua';
                  $.get(url,function(sss){
                  });
            }else{
              var url = '/home/zhifu/shua';
                  $.get(url,function(sss){
                  });
            }

            function qing(){
              var url = '/home/zhifu/qing';
              $.get(url,function(biu){
                if(biu == 1){
                  $(':checkbox[name=item]').parent().parent().remove();
                }
              });
            }

    </script>
   @endsection
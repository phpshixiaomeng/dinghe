
@extends('Home/show/head')
@section('content')
    <!--Checkout Area Start-->
    <div class="checkout-area section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Checkout Form Start-->
                    <form action="#" class="checkout-form">
                       <div class="row row-40">

                           <div class="col-lg-7">

                               <!-- Billing Address -->
                               <div id="billing-form" class="mb-10">
                                   <h4 class="checkout-title">帐单地址</h4>

                                   <div class="row">

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>第一个名字*</label>
                                           <input type="text" placeholder="First Name">
                                       </div>

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>最后一个名字*</label>
                                           <input type="text" placeholder="Last Name">
                                       </div>

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>邮箱地址*</label>
                                           <input type="email" placeholder="Email Address">
                                       </div>

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>电话号*</label>
                                           <input type="text" placeholder="Phone number">
                                       </div>

                                       <div class="col-12 mb-20">
                                           <label>公司名字</label>
                                           <input type="text" placeholder="Company Name">
                                       </div>

                                       <div class="col-12 mb-20">
                                           <label>地址*</label>
                                           <input type="text" placeholder="Address line 1">
                                           <input type="text" placeholder="Address line 2">
                                       </div>

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>国家*</label>
                                           <select class="nice-select">
                                                <option>Bangladesh</option>
                                                <option>中国</option>
                                                <option>country</option>
                                                <option>印度</option>
                                                <option>日本</option>
                                           </select>
                                       </div>

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>城市*</label>
                                           <input type="text" placeholder="Town/City">
                                       </div>

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>街道*</label>
                                           <input type="text" placeholder="State">
                                       </div>

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>门牌号*</label>
                                           <input type="text" placeholder="Zip Code">
                                       </div>

                                       <div class="col-12 mb-20">
                                           <div class="check-box">
                                               <input type="checkbox" id="create_account">
                                               <label for="create_account">创建帐户?</label>
                                           </div>
                                           <div class="check-box">
                                               <input type="checkbox" id="shiping_address" data-shipping>
                                               <label for="shiping_address">送货地址不同</label>
                                           </div>
                                       </div>

                                   </div>

                               </div>

                               <!-- Shipping Address -->
                               <div id="shipping-form">
                                   <h4 class="checkout-title">Shipping Address</h4>

                                   <div class="row">

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>First Name*</label>
                                           <input type="text" placeholder="First Name">
                                       </div>

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>Last Name*</label>
                                           <input type="text" placeholder="Last Name">
                                       </div>

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>Email Address*</label>
                                           <input type="email" placeholder="Email Address">
                                       </div>

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>Phone no*</label>
                                           <input type="text" placeholder="Phone number">
                                       </div>

                                       <div class="col-12 mb-20">
                                           <label>Company Name</label>
                                           <input type="text" placeholder="Company Name">
                                       </div>

                                       <div class="col-12 mb-20">
                                           <label>Address*</label>
                                           <input type="text" placeholder="Address line 1">
                                           <input type="text" placeholder="Address line 2">
                                       </div>

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>Country*</label>
                                           <select class="nice-select">
                                                <option>Bangladesh</option>
                                                <option>China</option>
                                                <option>country</option>
                                                <option>India</option>
                                                <option>Japan</option>
                                           </select>
                                       </div>

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>Town/City*</label>
                                           <input type="text" placeholder="Town/City">
                                       </div>

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>State*</label>
                                           <input type="text" placeholder="State">
                                       </div>

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>Zip Code*</label>
                                           <input type="text" placeholder="Zip Code">
                                       </div>

                                   </div>

                               </div>

                           </div>

                           <div class="col-lg-5">
                               <div class="row">

                                   <!-- Cart Total -->
                                   <div class="col-12 mb-60">

                                       <h4 class="checkout-title">商品总价</h4>

                                       <div class="checkout-cart-total">

                                           <h4>商品 <span>合计</span></h4>

                                           <ul>
                                               <li>Teritory Quentily X 01 <span>$35.00</span></li>
                                               <li>Adurite Silocone X 02 <span>$59.00</span></li>
                                               <li>Baizidale Momone X 01 <span>$78.00</span></li>
                                               <li>Makorone Cicile X 01 <span>$65.00</span></li>
                                           </ul>

                                           <p>小计 <span>$296.00</span></p>
                                           <p>运费 <span>$00.00</span></p>

                                           <h4>总计 <span>$296.00</span></h4>

                                       </div>

                                   </div>

                                   <!-- Payment Method -->
                                   <div class="col-12">

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

                                       <button class="place-order df-btn">定单</button>

                                   </div>

                               </div>
                           </div>

                       </div>
                    </form>
                    <!-- Checkout Form End-->
                </div>
            </div>
        </div>
    </div>
    <!--Checkout Area End-->

   @endsection
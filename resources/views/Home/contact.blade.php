@extends('Home/show/head')
@section('content')

    <!--Contact Section Start-->
    <div class="contact-section section pt-10 pt-lg-10 pt-md-10 pt-sm-10 pt-xs-20 pb-xs-45">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="contact-address-wrap">
                        <h2>了解更多信息 <br> 你可以和我们联系</h2>
                        <div class="contact-address">
                            <div class="contact-information">
                                <h4>地址</h4>
                                <p>256主斯特伦，南角12fg硅别墅，新尤克，美国</p>
                            </div>
                            <div class="contact-information">
                                <h4>电话号</h4>
                                <p><a href="tel:01234567890">01234 567 890</a><a href="tel:01234567891">01234 567 891</a></p>
                            </div>
                            <div class="contact-information">
                                <h4>网站</h4>
                                <p><a href="mailto:info@example.com">info@example.com</a><a href="#">www.example.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="contact-form mt-90 mt-lg-70 mt-md-60 mt-sm-50 mt-xs-20">
                        <h4>留言</h4>
                        <form action="#" class="comment-form">
                            <div class="row">
                                <div class="col-md-6 col-12 mb-30">
                                    <input type="text" name="name" placeholder="Name">
                                </div>

                                <div class="col-md-6 col-12 mb-30">
                                    <input type="email" name="email" placeholder="Email">
                                </div>

                                <div class="col-12 mb-30">
                                    <textarea name="message" placeholder="Message"></textarea>
                                </div>

                                <div class="col-12">
                                    <input type="submit" value="send now">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Contact Section End-->

    @endsection
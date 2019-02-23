@extends('Home/show/head')
@section('content')

    <!--Games Area Start-->
    <div class="games-area section pt-85 pt-lg-65 pt-md-55 pt-sm-55 pt-xs-45">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--Game Toolbar Start-->
                    <div class="game-topbar-wrapper d-md-flex justify-content-md-between align-items-center">
                        <div class="game-search-box">
                            <h3>游戏 搜索</h3>
                            <input type="text" name="game_search" placeholder="Enter games name">
                            <button><i class="icofont-search-2"></i></button>
                        </div>
                         <!--Toolbar Short Area Start-->
                         <div class="toolbar-short-area d-md-flex align-items-center">
                             <div class="toolbar-shorter">
                                <h3>类别</h3>
                                 <select class="wide">
                                     <option data-display="Select">全平台</option>
                                     <option value="Relevance">关联</option>
                                     <option value="Name, A to Z">名字, A to Z</option>
                                     <option value="Name, Z to A">名字, Z to A</option>
                                     <option value="Price, low to high">价格, 从低到高</option>
                                     <option value="Price, high to low">价格, 从高到低</option>
                                 </select>
                             </div>
                             <div class="toolbar-shorter">
                                <h3>平台</h3>
                                 <select class="wide">
                                     <option data-display="Select">All Platform</option>
                                     <option value="Relevance">Relevance</option>
                                     <option value="Name, A to Z">Name, A to Z</option>
                                     <option value="Name, Z to A">Name, Z to A</option>
                                     <option value="Price, low to high">Price, low to high</option>
                                     <option value="Price, high to low">Price, high to low</option>
                                 </select>
                             </div>
                         </div>
                         <!--Toolbar Short Area End-->
                    </div>
                    <!--Game Toolbar End-->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game1.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">the elder scroll</a></h4>
                            <span>pc/xbox/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
                <div class="col-lg-4 col-md-6">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game2.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">蝙蝠侠归来</a></h4>
                            <span>pc/xbox</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
                <div class="col-lg-4 col-md-6">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game3.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">使命召唤</a></h4>
                            <span>pc/xbox/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
                <div class="col-lg-4 col-md-6">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game4.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">Assassins Cred</a></h4>
                            <span>pc/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
                <div class="col-lg-4 col-md-6">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game5.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">spiderman return</a></h4>
                            <span>xbox/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
                <div class="col-lg-4 col-md-6">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game6.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">Age of ampires</a></h4>
                            <span>pc/xbox/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
                <div class="col-lg-4 col-md-6">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game7.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">angry birds</a></h4>
                            <span>pc/xbox/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
                <div class="col-lg-4 col-md-6">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game8.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">need for speed</a></h4>
                            <span>pc/xbox</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
                <div class="col-lg-4 col-md-6">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game9.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">the witcher 3</a></h4>
                            <span>pc/xbox/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
                <div class="col-lg-4 col-md-6">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game10.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">battle field 4</a></h4>
                            <span>pc/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
                <div class="col-lg-4 col-md-6">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game11.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">the magician</a></h4>
                            <span>xbox/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
                <div class="col-lg-4 col-md-6">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="assets/images/game/game12.jpg" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">secret group</a></h4>
                            <span>pc/xbox/ps4</span>
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="blog-pagination text-center">
                        <ul class="page-pagination">
                            <li><a href="#"><i class="icofont-long-arrow-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#"><i class="icofont-long-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Games Area End-->

    @endsection
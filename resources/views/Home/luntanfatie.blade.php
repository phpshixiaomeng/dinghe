@extends('Home/show/head')
@section('content')
    <!--Forum Create Area Start-->
    <div class="Forum-create-area section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45 pb-xs-45">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="forum-form">
                        <form action="#">
                            <div class="row">
                                <div class="col-12">
                                    <!--Single Forum Start-->
                                    <div class="single-input mb-50 mb-sm-30 mb-xs-20">
                                       <label>主题标题</label>
                                       <input name="title" type="text" placeholder="Enter topic title here">
                                    </div>
                                    <!--Single Forum End-->
                                </div>
                                <div class="col-12">
                                    <!--Single Forum Start-->
                                    <div class="single-input mb-50 mb-sm-30 mb-xs-20">
                                       <label>话题话题e</label>
                                       <input name="type" type="text" placeholder="Enter topic title here">
                                    </div>
                                    <!--Single Forum End-->
                                </div>
                                <div class="col-12">
                                    <!--Single Forum Start-->
                                    <div class="single-input mb-50 mb-sm-30 mb-xs-20">
                                       <label>话题内容</label>
                                        <textarea id="summernote" name="editordata"></textarea>
                                    </div>
                                    <!--Single Forum End-->
                                </div>
                                <div class="col-12">
                                    <!--Single Forum Start-->
                                    <div class="file-input mb-50 mb-sm-30 mb-xs-20">
                                       <input type="file" name="myFile" id="customfile" class="sr-only">
                                       <label for="customfile"><i class="fa fa-paperclip"></i>附加文件</label>
                                       <button class="save-btn">保存到草案/button>
                                    </div>
                                    <!--Single Forum End-->
                                </div>
                                <div class="col-12">
                                    <!--Single Forum Start-->
                                    <div class="group-input">
                                       <div class="row">
                                           <div class="col-md-4">
                                                <!--Single Forum Start-->
                                                <div class="single-input mb-50">
                                                   <label>类别</label>
                                                   <select class="wide">
                                                       <option value="Select category">选择类别</option>
                                                       <option value="ps4">ps4</option>
                                                       <option value="ps4">Xbox</option>
                                                       <option value="ps4">Sony</option>
                                                   </select>
                                                </div>
                                                <!--Single Forum End-->
                                           </div>
                                           <div class="col-md-8">
                                                <!--Single Forum Start-->
                                                <div class="single-input mb-50 mt-xs-20">
                                                   <label>标签</label>
                                                   <input name="tag" type="text" placeholder="Use comma to separate tags">
                                                </div>
                                                <!--Single Forum End-->
                                           </div>
                                       </div>
                                    </div>
                                    <!--Single Forum End-->
                                </div>
                                <div class="col-12">
                                    <div class="forum-post">
                                        <input name="radio" type="radio">
                                        <label>启用回复</label>
                                        <button class="df-btn">创建帖子</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Forum Create Area End-->

    @endsection
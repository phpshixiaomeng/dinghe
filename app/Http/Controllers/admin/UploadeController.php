<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadeController extends Controller
{

 public function upload($photo)

    {

        $file_ex = $photo->getClientOriginalExtension();

        if (!in_array($file_ex, array('jpg', 'gif', 'png', 'jpeg'))) {

            echo "<script>alert('文件格式错误,仅支持 jpg ,gif,png,jpeg');location.href='/apply'</script>";

        }

        $newname = date('Ymdhis') . rand(1, 999) . "." . $file_ex;

        $savepath = config('constants.img_uf') .'Uploads/Apply/';

        $path = $photo->move($savepath, $newname);

        $filepath = "UF/Uploads/Apply/" . $newname;

        return $filepath;

    }

}

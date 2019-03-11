<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
</head>
<body>
    <div style="width: 700px;margin: auto;">
        <table class="table table-hover" style="text-align: center">
    <tr>
      <th>游戏名称</th>
      <th>游戏价格</th>
      <th>游戏图片</th>
      <th>游戏发布时间</th>
      <th>下载地址</th>
    </tr>
    @foreach($games as $k=>$v)
    <tr>
      <td>{{ $v->name }}</td>
      <td>{{ $v->game_jg }}</td>
      <td><img src="/uploads/{{ $v->game_img }}" style="width:50px;height:50px;"></td>
      <td>{{ $v->game_time }}</td>
      <td><a class="btn btn-primary btn-sm" href="{{ $v->download }}">下载游戏</a></td>
    </tr>
    @endforeach
      </table>

    </div>
</body>
</html>


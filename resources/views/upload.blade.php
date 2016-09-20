<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>上传测试</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <input type="file" name="pic[]">
    <input type="file" name="pic[]">
    <input type="file" name="pic[]">
    <input type="submit" value="提交">
</form>
</body>
</html>
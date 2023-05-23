<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/jabatan/simpan" id="form1" method="POST">
        @csrf
        <input type="text" name="nama_jabatan" value="jabatan 1">
        <input type="text" name="metode" value="insert" hidden>
    </form>
    <script>
        document.querySelector('#form1').submit()
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('frontend.test') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div>
            <img src="{{}}" alt="">
        </div>
        <input type="file" name="image" required>
        <button type="submit">Upload</button>
    </form>
    
</body>
</html>
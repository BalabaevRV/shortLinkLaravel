<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route ('getShortLink')}}" method="POST">
        @csrf
        <h2>Введите ссылку</h2>
        <input type="text" placeholder="Ваша ссылка" name="fullLink" id="fullLink" value="{{(old('fullLink')) ? old('fullLink') : ''}}">
        @if ($errors->has("fullLink"))
            <p>{{$errors->first("fullLink")}}</p>
        @endif
        <button>Получить ссылку</button>
    </form>
    <hr>
    <hr>
    <hr>
    <h3>Ваша ссылка</h3>
    @if (isset($shortLink))
        <a href="{{route ('goToFullLink', $shortLink)}}" target="_blank">{{$shortLink}}</a>
    @endif
</body>
</html>

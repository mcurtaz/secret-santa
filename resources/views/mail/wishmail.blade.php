<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wish Mail</title>
    <style>
        p{
            font-size: 18px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div style="text-align: center; padding: 15px; background: radial-gradient(circle, rgba(252,246,186,1) 50%, rgba(191,149,63,1) 100%);">
        <img style="width: 350px;" src="{{$message->embed(public_path() . '/img/title.png')}}" alt="">
    </div>
    <div style="padding: 15px 35px;">
        @if($wish -> author == $wish -> target)
            @if ($wish -> action == 'delete')
                <h2 style="color: #be0a26;">Attenzione:</h2>
                <p><strong>{{$wish -> a_name}}</strong> ha cancellato il desiderio <strong style="color: #be0a26;">{{$wish -> name}}</strong>.</p>
                <p>L'avevi già preso? Regalaglielo lo stesso, ma ricordati di metterci lo scontrino così lo può restituire e prendersi qualcos'altro!</p>
                <p style="width: 100%; text-align:center;"><a style="color: #be0a26; text-decoration: none;"href="http://nataleacasacurtaz.it/home">Vai alla tua Home</a></p>
            @else
                <h2 style="color: #3F5907;">Comunicazione:</h2>
                <p><strong>{{$wish -> a_name}}</strong> ha espresso un nuovo desiderio: <strong style="color: #be0a26;">{{$wish -> name}}</strong>.</p>
                <p>Ricordati che se hai già fatto questo regalo puoi fare un annuncio. Così la smettono di esprimere desideri o darti suggerimenti e io la smetto di darti fastidio con queste mail.</p>
                <p style="width: 100%; text-align:center;"><a style="color: #be0a26; text-decoration: none;"href="http://nataleacasacurtaz.it/home">Vai alla tua Home</a></p>
            @endif
        @else
            @if ($wish -> action == 'delete')
                <h2 style="color: #be0a26;">Attenzione:</h2>
                <p><strong>{{$wish -> a_name}}</strong> ti aveva suggerito di prendere <strong style="color: #be0a26;">{{$wish -> name}}</strong> per <strong>{{$wish -> t_name}}</strong>.</p>
                <p>Adesso ha deciso di <strong>cancellare</strong> questo suggerimento. Non si sa perchè.</p>
                <p>L'avevi già preso? Regalaglielo lo stesso, ma ricordati di metterci lo scontrino così lo può restituire e prendersi qualcos'altro!</p>
                <p style="width: 100%; text-align:center;"><a style="color: #be0a26; text-decoration: none;"href="http://nataleacasacurtaz.it/home">Vai alla tua Home</a></p>
            @else 
                <h2 style="color:  #3F5907;">Comunicazione:</h2>
                <p><strong>{{$wish -> a_name}}</strong> vuole suggerire un regalo per <strong>{{$wish -> t_name}}</strong>: <strong style="color: #be0a26;">{{$wish -> name}}</strong>.</p>
                <p>Ricordati che se hai già fatto questo regalo puoi fare un annuncio. Così la smettono di esprimere desideri o darti suggerimenti e io la smetto di darti fastidio con queste mail.</p>
                <p style="width: 100%; text-align:center;"><a style="color: #be0a26; text-decoration: none;"href="http://nataleacasacurtaz.it/home">Vai alla tua Home</a></p>
            @endif
        @endif 
    </div>
</body>
</html>
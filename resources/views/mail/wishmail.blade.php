<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wish Mail</title>
</head>
<body>
    @if($wish -> author == $wish -> target)
        @if ($wish -> action == 'delete')
            <h1>Attenzione {{$wish -> a_name}} ha cancellato il desiderio {{$wish -> name}}</h1>
        @else
            <h1>{{$wish -> a_name}} ha espresso un nuovo desiderio: {{$wish -> name}}</h1>  
        @endif
    @else
        @if ($wish -> action == 'delete')
            <h1>Attenzione {{$wish -> a_name}} ha cancellato il suggerimento {{$wish -> name}} per {{$wish -> t_name}} </h1>
        @else 
            <h1>{{$wish -> a_name}} vuole suggerire un regalo per {{$wish -> t_name}}: {{$wish -> name}}</h1> 
        @endif
    @endif 
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        @if ($annunciazione == 'aMonte')
            <h2 style="color: #be0a26;">Attenzione:</h2>
            <p>C'era una probabilità, rara ma c'era, che l'estrazione andasse per il verso storto. Che producesse degli incastri per cui l'ultimo a pescare avrebbe potuto soltanto pescare se stesso quindi sarebbe stato tutto da rifare.</p>
            <p>Sfortuna vuole che sia proprio questo il caso. Per cui vi comunico che l'estrazione è da rifare. In altre parole <strong style="color: #be0a26;">RIFA! A MONTE! ANNULLATO TUTTO! SI RIFA!</strong></p>
            <p>Fortunatamente il caso era previsto perciò è come se tutti i biglietti fossero tornati nel cappello. Rientrate nel sito e vi dirà "scopri a chi devi fare il regalo" e si riestrae da capo.</p>
            <p>Se è la quinta o sesta volta che leggete questa e-mail la cosa più probabile è che il Michi ha sbagliato qualcosa. Portate pazienza e fate il regalo a chi c#!^! vi pare.</p>
            <p style="width: 100%; text-align:center;"><a style="color: #be0a26; text-decoration: none;"href="https://nataleacasacurtaz.it/home">Vai alla tua Home</a></p>
        @elseif($annunciazione == 'estrazioneOk')
            <h2 style="color:  #3F5907;">Comunicazione:</h2>
            <p>C'era una probabilità, rara ma c'era, che l'estrazione andasse per il verso storto. Che producesse degli incastri per cui l'ultimo a pescare avrebbe potuto soltanto pescare se stesso quindi sarebbe stato tutto da rifare.</p>
            <p>Fortuna vuole che non sia questo il caso. Per cui vi comunico che l'estrazione è andata a buon fine. In altre parole <strong style="color: #3F5907;">A TUTTI &Egrave; STATO ASSEGNATO A CHI FARE IL REGALO. VAI DI REGALI! SOTTO COI DESIDERI! AVANTI COI SUGGERIMENTI!</strong></p>
            <p style="width: 100%; text-align:center;"><a style="color: #be0a26; text-decoration: none;"href="https://nataleacasacurtaz.it/home">Vai alla tua Home</a></p>
        @elseif($annunciazione == 'regaloOk')
            <h2 style="color: #be0a26;">Comunicazione:</h2> 
            <p>Si comunica che il regalo per {{ $name }} è stato fatto. Non si sa da chi ma è stato fatto (o almeno così dichiara chi è incaricato di fare il regalo a {{ $name }}).</p>
            <p style="color: #3F5907;">Buona ansia da <em>sono in ritardo, devo ancora fare il regalo</em> a tutti.</p>
            <p style="width: 100%; text-align:center;"><a style="color: #be0a26; text-decoration: none;"href="https://nataleacasacurtaz.it/home">Vai alla tua Home</a></p>
        @elseif($annunciazione == 'allDone')
            <h2 style="color: #be0a26;">Annunciazione Annunciazione:</h2>
            <p>Tutti i regali sono stati fatti. Ripeto: <strong style="color: #3F5907;">TUTTI I REGALI SONO STATI FATTI</strong></p>
            <p>Grazie a tutti.</p>
            <p>Questa mail è stata scritta il 29 Novembre del 2020. Chissà quando verrà spedita &#58440;</p>
        @endif
    </div> 
</body>
</html>
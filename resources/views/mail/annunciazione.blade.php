<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if ($annunciazione == 'aMonte')
        <h1>Attenzione: l'estrazione è da rifare. RIFA! A MONTE! ANNULLATO TUTTO! SI RIFA!</h1>
    @elseif($annunciazione == 'estrazioneOk')
        <h1>Si comunica che tutti a tutti i membri della famiglia è stato assegnato un destinatario del regalo. L'estrazione è andata a buon fine. Buoni regali a tutti!</h1>
    @elseif($annunciazione == 'regaloOk')
        <h1>Annunciazione Annunciazione: Si comunica che il regalo per {{ $name }} è stato fatto. Non si sa da chi ma è stato fatto. Buona ansia da "sono in ritardo. Devo ancora fare il regalo" a tutti. </h1>
    @elseif($annunciazione == 'allDone')
        <h1>Annunciazione Annunciazione: tutti i regali sono stati fatti. Lo staff di Natale a Casa Curtaz ringrazia tutti. Buon Natale!</h1>
    @endif
</body>
</html>
@extends('layouts.main-layout')
@section('content')
<div class="container py-5 margin-top">
    <div class="row ">
        <div class="col-12">
            <h4>IMPORTANTE:</h4>
            <p>Alcune operazioni, per esempio l'invio di mail, richiedono diverso tempo per essere processate. A volte premerete un tasto e sembrerà che non stia succedendo niente, in realtà il sito sta facendo tutti i suoi calcoli. Per evitare il classico: "non sta facendo niente. Provo a ri-clickare" che non fa altro che aggiungere calcoli su calcoli rallentando ancora di più il tutto (e se sta mandando una mail ne manda un'altra) ho disattivato tutti i tasti e i link mentre calcola.</p>
            <p><strong>All'atto pratico a voi cosa interessa?</strong> A volte premerete un tasto e sembrerà che si disattiva l'intera pagina. Abbiate fede. Aspettate. E vedrete che si risolve tutto e va tutto come deve andare. Questione di secondi.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h4>Registrazione</h4>
            <p>Una volta collegati al sito premere su register. Compilare il form di registrazione inserendo una mail e una password. La mail verrà usata per diverse comunicazioni quindi <strong>inserire una mail valida</strong>. Verrà chiesto di identificarsi. Sono già stati inseriti tutti i membri della famiglia c'è solo da scegliere il vostro nome. Nel caso del Michi e della Barbara dovranno scegliere anche un bambino di cui far le veci.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h4>Estrazione</h4>
            <p>L'estrazione avviene in automatico. Una volta registrati e fatto il login andrete sulla vostra home. Lì ci sarà il tasto "scopri a chi fare il regalo". In quel momento verrà estratto a caso un altro membro della famiglia a cui fare il regalo. è possibile che per una serie di incastri sfortunati l'ultimo a dover estrarre sarà anche l'ultimo DA estrarre. In quel caso l'estrazione viene annullata. <strong>Vi arriverà una mail e si ricominceranno le estrazioni da capo</strong>. Vista questa evenienza è prevista anche una mail di conferma di andata a buon fine dell'estrazione quando tutti avranno estratto.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h4>Home</h4>
            <p>Dopo aver estratto nella tua home vedrai tutti i desideri che quella persona ha espresso e tutti i suggerimenti fatti da altri per il regalo a quella persona. In più ci sarà un tasto "Annuncia". Una volta fatto il regalo puoi annunciare agli altri che hai fatto il tuo. Così la gente può smettere di suggerirti cose o esprimere desideri. In più il bello è mettere una certa pressione agli altri. Tutti sapranno a chi è già stato fatto il regalo ma <strong>nessuno saprà da chi</strong>.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h4>Desideri/Suggerimeti</h4>
            <p>Dalla pagina desideri/suggerimenti ognuno può esprimere dei desideri. L'unica cosa obbligatoria è inserire il nome del desiderio. Poi si può specificare altri dettagli come una breve descrizione, il prezzo o mettere un link per facilitare il povero malcapitato che deve farvi il regalo. &Egrave; possibile anche dare un suggerimento. Ad esempio so che ad Annalisa piace un libro creo un suggerimento specificando il nome e se voglio altri dettagli e scegliendo come destinatario Zia Annalisa. Nella pagina Desideri/Suggerimenti vedrai l'elenco dei desideri e suggerimenti che hai creato, così se non ti ricordi se hai già espresso quel desiderio o dato quel suggerimento puoi controllare.</p><p> Attenzione: scopri che la Zia Annalisa ha già acquistato quel libro che hai suggerito? <strong>Cancella il suggerimento!</strong> e chi di dovere verrà avvisato. (senza andare in giro a chiedere ma chi deve fare il regalo alla Zia Annalisa?)</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h4>Problemi vari</h4>
            <p>Qualche problema salterà sicuramente fuori. Qualcosa si può sistemare in corso d'opera. Qualcosa si può aggiungere se manca. Qualcosa si può togliere se è di troppo. Per ogni evenienza: <a href="mailto:mcurtaz@gmail.com">Scrivimi</a></p>
        </div>
    </div>
</div>
@endsection
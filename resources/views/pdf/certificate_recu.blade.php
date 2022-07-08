

<html>
<head>
    <meta charset="utf-8">
    <title>RECU DE PAIEMENT</title>
    <link rel="stylesheet" href="{{ public_path('/pdf/design.css') }}">
    <script src="{{ public_path('/pdf/script.js') }}"></script>
</head>

<body class="recu">

<header>

    <address >
        <p style="font-variant-caps: all-small-caps">Ministere de la Justice </p>
        <p>--------------</p>
        <p style="font-size: smaller;font-variant-caps: all-small-caps">TRIBUNAL DE PREMIERE INSTANCE</p>
        <p><img width="150" src="{{ public_path('/pdf/justice.png') }}"></p>
    </address>

    <rep >
        <p style="font-variant-caps: all-small-caps">République de Côte d'Ivoire</p>
        <p>--------------</p>
        <p style="font-size: smaller;font-variant-caps: all-small-caps">Union-Discipline-Travail</p>
        <p><img width="150" src="{{ public_path('/pdf/Armoiries_de_la_Côte_dIvoire_de_1964.png') }}"></p>
    </rep>

</header>


<h1 style="text-decoration-line: underline; font-size: large; font-family:'Arial Black' ">RECU DE PAIEMENT</h1>
<article>





    <table class="inventory">

        <tbody>
        <tr><td><span class='recus'></span>NUMERO TRANSACTION : <b>{{ $paiement->reference }} </b></td></tr>
        <tr><td><span class='recus'></span>MONTANT :  <strong> {{ $type_document->montant }} FCFA </strong></td></tr>
        <tr><td><span class='recus'></span>TYPE DE DEMANDE : ETABLISSEMENT D'UN {{ strtoupper($type_document->intitule) ?? 'CERTIFICAT DE NATIONALITE' }}</td></tr>
        <tr><td><span class='recus'></span>DEMANDEUR :<strong>{{ ucfirst(auth()->user()->fullName)  }}</strong> </td></tr>
        <tr><td><span class='recus'></span>DATE NAISSANCE :<strong></strong> {{ auth()->user()->date_naissance }} </td></tr>
        <tr><td><span class='recus'></span>LIEU DE NAISSANCE :<strong>{{ auth()->user()->date_naissance }} </strong></td></tr>
        <tr><td><span class='recus'></span>DATE DE LA DEMANDE :<strong>{{ \Carbon\Carbon::make($demande->created_at)->format('d/m/y')  }} </strong>  </td></tr>


        </tbody>
    </table>


</article>

<div align="center" class="qr_code">
    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($paiement->reference)) !!} " style=" position: relative">
</div>



</body>
</html>

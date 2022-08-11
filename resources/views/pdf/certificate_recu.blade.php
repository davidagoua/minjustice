<html>
<head>
    <meta charset="utf-8">
    <title>CERTIFICAT DE NATIONALITE</title>
    <link rel="stylesheet" href="{{ public_path('/pdf/design.css') }}">
    <link rel="license" href="https://www.opensource.org/licenses/mit-license/">
    <style>
        body{
            background: url("{{ public_path('/pdf/bg.jpg') }}") no-repeat center center fixed;
        }
    </style>
</head>
<body>





<h1 style="font-family: Impact; text-decoration: underline; font-weight: bold; position: absolute; top: 20%; left: 40% ">RECU DE PAIEMENT</h1>

<article>





    <table class="inventory" style="position: absolute; top: 30%; font-weight: bold">

        <tbody>
        <tr><td><span class='recus'></span>NUMERO TRANSACTION : <b>{{ (int) $paiement->reference * (int) $nbCopie }} </b></td></tr>
        <tr><td><span class='recus'></span>MONTANT :  <strong> {{ $type_document->montant }} FCFA </strong></td></tr>
        <tr><td><span class='recus'></span>TYPE DE DEMANDE : ETABLISSEMENT D'UN {{ strtoupper($type_document->intitule) ?? 'CERTIFICAT DE NATIONALITE' }}</td></tr>
        <tr><td><span class='recus'></span>DEMANDEUR :<strong>{{ ucfirst(auth()->user()->fullName)  }}</strong> </td></tr>
        <tr><td><span class='recus'></span>DATE NAISSANCE :<strong></strong> {{ auth()->user()->date_naissance }} </td></tr>
        <tr><td><span class='recus'></span>LIEU DE NAISSANCE :<strong>{{ auth()->user()->date_naissance }} </strong></td></tr>
        <tr><td><span class='recus'></span>DATE DE LA DEMANDE :<strong>{{ \Carbon\Carbon::make($demande->created_at)->format('d/m/y')  }} </strong>  </td></tr>

        </tbody>
    </table>


</article>



</body>
</html>

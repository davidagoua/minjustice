

<html>
<head>
    <meta charset="utf-8">
    <title>CERTIFICAT DE NATIONALITE</title>
    <link rel="stylesheet" href="{{ public_path('/pdf/design.css') }}">
    <script src="{{ public_path('/pdf/script.js') }}"></script>
</head>
<div class="orange">	</div>
<div class="vert">	</div>
<body>

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


<h1 style="text-decoration-line: underline; font-style: unset; font-family: Impact ">CERTIFICAT DE NATIONALITE IVOIRIENNE</h1>
<article>





    <table class="inventory">

        <tbody>
        <tr><td><span class='filler'></span>N°<b>{{ $registre }} </b>du régistre d'ordre</td></tr>
        <tr><td><span class='filler'></span>Le Président du Tribunal de Première Instance de <strong>{{ $juridiction }} </strong> </td></tr>
        <tr><td><span class='filler'></span>OU </td></tr>
        <tr><td><span class='filler'></span>Le Juge de la Section de <strong>{{ $juridiction }}</strong> </td></tr>
        <tr><td><span class='filler'></span>Certifie, au vu des pièces produites </td></tr>
        <tr><td><span class='filler'></span>que <strong>{Monsieur} {{ $user->fullName }}</strong> </strong>  </td></tr>
        <tr><td><span class='filler'></span>demeurant à <strong>{{ $user->quartier }}</strong>  </td></tr>
        <tr><td><span class='filler'></span>né(e) à <strong>{{ $user->lieu_naissance }}</strong>  le <strong>{{ $user->date_naissance }}</strong> </td></tr>
        <tr><td><span class='filler'></span>de <strong>{{ $user->last_name_pere.' '.$user->first_name_pere }}  né(e) à <strong>{{ $user->lieu_naissance_pere }} </strong>le <strong>{{ $user->date_naissance_pere }}</strong> </td></tr>
        <tr><td><span class='filler'></span>et de <strong>{{ $user->last_name_mere.' '.$user->first_name_mere }}  né(e) à <strong>{{ $user->lieu_naissance_mere }} le <strong>{{ $user->date_naissance_mere }}</strong> </td></tr>
        <tr><td><span class='filler'></span>est de nationalité <strong> Ivoirienne </strong> </td></tr>
        </tbody>
    </table>


</article>

<div align="center" class="qr_code">
    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($document->id)) !!} " style=" position: relative">
</div>

<footer class="pieds">
    <p style="background-color: #aaaaaa;width: 900px; margin-left: -50px; font-variant: all-small-caps"> 00000000000000 REPUBLIQUE DE COTE D'IVOIRE - ministere de la justice - Juridiction de Dabou -07072022 </p>
</footer >

</body>
</html>

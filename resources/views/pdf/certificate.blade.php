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





<h1 style="font-family: Impact; text-decoration: underline; font-weight: bold; position: absolute; top: 20%; left: 25% ">CERTIFICAT DE NATIONALITE IVOIRIENNE</h1>

<article>





    <table class="inventory" style="position: absolute; top: 30%; font-weight: bold">

        <tbody>
        <tr><td><span class='filler'></span>N°<b>{{ $registre }} </b>du régistre d'ordre</td></tr>
        <tr><td><span class='filler'></span>Le Président du Tribunal de Première Instance de <strong>{{ $juridiction }}</td></tr>
        <tr><td><span class='filler'></span>OU </td></tr>
        <tr><td><span class='filler'></span>Le Juge de la Section de <strong>{{ $juridiction }}</strong> </td></tr>
        <tr><td><span class='filler'></span>Certifie, au vu des pièces produites </td></tr>
        <tr><td><span class='filler'></span>que <strong>{{ $user->fullName }}</strong>  </td></tr>
        <tr><td><span class='filler'></span>demeurant à <strong>{{ $user->quartier }}</strong>  </td></tr>
        <tr><td><span class='filler'></span>né(e) à <strong>{{ $user->lieu_naissance }}</strong>  le <strong>{{ $user->date_naissance }}</strong> </td></tr>
        <tr><td><span class='filler'></span>de <strong>{{ $user->last_name_pere.' '.$user->first_name_pere }}  né(e) à <strong>{{ $user->lieu_naissance_pere }}  </strong>le <strong>{{ $user->date_naissance }}</strong> </td></tr>
        <tr><td><span class='filler'></span>et de <strong>{{ $user->last_name_mere.' '.$user->first_name_mere }}  né(e) à <strong>{{ $user->lieu_naissance_mere }}  le <strong>{{ $user->date_naissance_mere }}</strong> </td></tr>
        <tr><td><span class='filler'></span>est <strong>Ivoirienne </strong> </td></tr>
        </tbody>
    </table>


</article>

<div align="center" class="qr_code" style="position: absolute; top: 70%; left: 40%">
    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($document->id)) !!} " >
</div>


</body>
</html>

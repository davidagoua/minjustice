

<html>
<head>
    <meta charset="utf-8">
    <title>CERTIFICAT DE NATIONALITE</title>
    <link rel="stylesheet" href="{{ public_path('/pdf/design.css') }}">
    <link rel="license" href="https://www.opensource.org/licenses/mit-license/">

</head>
<div class="orange">	</div>
<div class="vert">	</div>
<body>

<table style="margin-top: 10px; margin-bottom: 40px">
    <tr>
        <td style="text-align: center">
            <p style="font-variant-caps: all-small-caps">Ministere de la Justice </p>
            <p>--------------</p>
            <p style="font-size: smaller;font-variant-caps: all-small-caps">TRIBUNAL DE PREMIERE INSTANDE DE {{ $juridiction }}</p>
            <p style="font-size: smaller;font-variant-caps: all-small-caps">SECTION DE {{ $juridiction }}</p>
            <p><img style="width: 100px;" src="{{ public_path('/pdf/justice.png') }}"></p>
        </td>
        <td></td>
        <td style="text-align: center">
            <p style="font-variant-caps: all-small-caps">République de Côte d'Ivoire</p>
            <p>--------------</p>
            <p style="font-size: smaller;font-variant-caps: all-small-caps">Union-Discipline-Travail</p>
            <p><img style="width: 100px;" src="{{ public_path('/pdf/Armoiries_de_la_Côte_dIvoire_de_1964.png') }}"></p>
        </td>
    </tr>
</table>

<h1 style="font-family: Impact; text-decoration: underline; font-weight: bold">BULLETIN N°3 DU CASIER JUDICIAIRE</h1>

<article>





    <table class="inventory">

        <tbody>
        <tr><td><span class='filler'></span>N°<b>{{ $registre }} </b>du régistre d'ordre</td></tr>

        <tr><td><span class='filler'></span>Le Nommé <strong>{{ $user->fullName }}</strong> </strong>  </td></tr>
        <tr><td><span class='filler'></span>de <strong>{{ $user->last_name_pere.' '.$user->first_name_pere }}  né(e) à <strong>{{ $user->lieu_naissance_pere }} </strong>le <strong>{{ $user->date_naissance_pere }}</strong> </td></tr>
        <tr><td><span class='filler'></span>et de <strong>{{ $user->last_name_mere.' '.$user->first_name_mere }}  né(e) à <strong>{{ $user->lieu_naissance_mere }} le <strong>{{ $user->date_naissance_mere }}</strong> </td></tr>
        <tr><td><span class='filler'></span>Domicilié à <strong>{{ $user->quartier }}</strong>  </td></tr>
        <tr><td><span class='filler'></span>né(e) à <strong>{{ $user->lieu_naissance }}</strong>  le <strong>{{ $user->date_naissance }}</strong> </td></tr>
        </tbody>
    </table>

    <table>
<thead>
<tr>
    <td>Dates des Condamnations</td>
    <td>Cours ou tribunaux</td>
    <td>Nature des crimes au délits</td>
    <td>Dates précise des crimes ou délits</td>
    <td>Nature et quantum des pieces </td>
    <td>Date de mandat de dépot </td>
    <td>Observations</td>
</tr>
</thead>
        <tbody>

        <td>nenant</td>
        <td>nenant</td>
        <td>nenant</td>
        <td>nenant</td>
        <td>nenant</td>
        <td>nenant</td>
        <td>nenant</td>
        </tbody>
    </table>

</article>

<div align="center" class="qr_code">
    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($document->id)) !!} " >
</div>

<footer class="pieds">
    <p style="font-variant: all-small-caps"> REPUBLIQUE DE COTE D'IVOIRE - ministere de la justice - Juridiction de {{ $juridiction }} - {{ now() }} </p>
</footer >

</body>
</html>

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
            <p style="font-size: smaller;font-variant-caps: all-small-caps">{Juridiction}</p>
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

<h1 style="font-family: Impact; text-decoration: underline; font-weight: bold">CERTIFICAT DE NATIONALITE</h1>

<article>





    <table class="inventory">

        <tbody>
        <tr><td><span class='filler'></span>N°<b>{N°Registre} </b>du régistre d'ordre</td></tr>
        <tr><td><span class='filler'></span>Le Président du Tribunal de Première Instance de <strong>{Juridiction}</strong> </td></tr>
        <tr><td><span class='filler'></span>OU </td></tr>
        <tr><td><span class='filler'></span>Le Juge de la Section de <strong>{Juridiction}</strong> </td></tr>
        <tr><td><span class='filler'></span>Certifie, au vu des pièces produites </td></tr>
        <tr><td><span class='filler'></span>que <strong> {Nom & Prénoms}</strong> </strong>  </td></tr>
        <tr><td><span class='filler'></span>demeurant à <strong>{Lieu habitation}</strong>  </td></tr>
        <tr><td><span class='filler'></span>né(e) à <strong>{Lieu de naissance}</strong>  le <strong>{Lieu de naissance}</strong> </td></tr>
        <tr><td><span class='filler'></span>de <strong>{Nom & prénoms père}  né(e) à <strong>{Lieu de naissance père} </strong>le <strong>{Date de naissance père}</strong> </td></tr>
        <tr><td><span class='filler'></span>et de <strong>{Nom & prénoms de la mère}  né(e) à <strong>{Lieu de naissance de la mère} le <strong>{Date de naissance de la mère}</strong> </td></tr>
        <tr><td><span class='filler'></span>est de nationalité <strong> Ivoirienne </strong> </td></tr>
        </tbody>
    </table>


</article>

<div align="center" class="qr_code">
    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate("Identifiant du document")) !!} " >
</div>

<footer class="pieds">
    <p style="font-variant: all-small-caps"> REPUBLIQUE DE COTE D'IVOIRE - ministere de la justice - Juridiction de {Juridiction} - {Date du jour} </p>
</footer >

</body>
</html>

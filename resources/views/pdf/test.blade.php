

<html>
<head>
    <meta charset="utf-8">
    <title>CERTIFICAT DE NATIONALITE</title>
    <link rel="stylesheet" href="{{ public_path('pdf/design1.css') }}">
    <script src="{{ public_path('pdf/script.js') }}"></script>
</head>

<body>
<div class="orange">	</div>
<div class="vert">	</div>


<table>
    <tr>
        <header style="margin-bottom: 0px; box-sizing: content-box;overflow: auto; z-index: 10">

            <address>
                <p style="font-variant-caps: all-small-caps">Ministere de la Justice </p>
                <p>--------------</p>
                <p style="font-size: smaller;font-variant-caps: all-small-caps">TRIBUNAL DE PREMIERE INSTANCE</p>
                <p><img width="150" style="z-index: 10" src="{{ public_path('/pdf/justice.png') }}"></p>
            </address>

            <rep  >
                <p style="font-variant-caps: all-small-caps">République de Côte d'Ivoire</p>
                <p>--------------</p>
                <p style="font-size: smaller;font-variant-caps: all-small-caps">Union-Discipline-Travail</p>
                <p><img width="150"  style="z-index: 10" src="{{ public_path('/pdf/Armoiries_de_la_Côte_dIvoire_de_1964.png') }}"></p>
            </rep>

        </header>
    </tr>
    <tr>
        <h1 style="text-decoration-line: underline; font-style: unset; font-family: Impact; margin-top: -25% ">CERTIFICAT DE NATIONALITE IVOIRIENNE</h1>
    </tr>
    <tr>
        <article>





            <table class="inventory" style="margin: 0px 20px">

                <tbody>
                <tr><td><span class='filler'></span>N°<b>{000} </b>du régistre d'ordre</td></tr>
                <tr><td><span class='filler'></span>Le Président du Tribunal de Première Instance de <strong>{Abidjan}</td></tr>
                <tr><td><span class='filler'></span>OU </td></tr>
                <tr><td><span class='filler'></span>Le Juge de la Section de <strong>{Dabou}</strong> </td></tr>
                <tr><td><span class='filler'></span>Certifie, au vu des pièces produites </td></tr>
                <tr><td><span class='filler'></span>que <strong>{Monsieur} {OGAH SERGE }</strong> </strong>  </td></tr>
                <tr><td><span class='filler'></span>demeurant à <strong>{Lieu d'habitation }</strong>  </td></tr>
                <tr><td><span class='filler'></span>né(e) à <strong>{Yopougon}</strong>  le <strong>{20 Janvier 1900}</strong> </td></tr>
                <tr><td><span class='filler'></span>de <strong>{Papa de OGAH}  né(e) à <strong>{ Agboville } </strong>le <strong>{01 Janvier 1900 }</strong> </td></tr>
                <tr><td><span class='filler'></span>et de <strong>{maman de OGAH}  né(e) à <strong>{ Agboville } le <strong>{01 Janvier 1900 }</strong> </td></tr>
                <tr><td><span class='filler'></span>est <strong>{Ivoirien} /  {Ivoirienne} </strong> </td></tr>
                </tbody>
            </table>


        </article>
    </tr>
    <tr>
        <div align="center" class="qr_code">
            <img src="{{ public_path('/pdf/qr.jpg') }}" width="140" height="auto">
        </div>

        <footer class="pieds">
            <p style="background-color: #aaaaaa;width: 900px; margin-left: -50px; font-variant: all-small-caps"> 00000000000000 REPUBLIQUE DE COTE D'IVOIRE - ministere de la justice - Juridiction de Dabou -07072022 </p>
        </footer >
    </tr>
</table>








</body>
</html>

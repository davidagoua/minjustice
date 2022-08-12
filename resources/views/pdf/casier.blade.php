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





<h1 style="font-family: Impact; text-decoration: underline; font-weight: bold; position: absolute; top: 20%; left: 40% ">CASIER JUDICIAIRE</h1>

<article style="position: absolute; top: 30%; font-weight: bold">

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

    <table class="table w-full" style="width: 680px;" border="1">
        <tr>
            <td>Dates des Condamnations</td>
            <td>Cours ou tribunaux</td>
            <td>Nature des crimes au délits</td>
            <td>Dates précise des crimes ou délits</td>
            <td>Nature et quantum des pieces </td>
            <td>Date de mandat de dépot </td>
            <td>Observations</td>
        </tr>
        @foreach($sentences as $s)
            <tr>
                <td>{{ substr($s['sentence_at'], 0, 10)  }}</td>
                <td>{{ $s['tribunal'] }}</td>
                <td>{{ $s['crime'] }}</td>
                <td>{{ substr($s['crime_at'], 0, 10)  }}</td>
                <td>{{ $s['quantum'] }}</td>
                <td>{{ substr($s['deposit_at'], 0, 10)  }}</td>
                <td>{{ $s['observations'] }}</td>
            </tr>
        @endforeach
    </table>

</article>

<div align="center" class="qr_code" style="position: absolute; top: 70%; left: 40%">
    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($document->id)) !!} " >
</div>


</body>
</html>

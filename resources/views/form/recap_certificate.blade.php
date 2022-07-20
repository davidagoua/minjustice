<div>

    <div class="row ">

        <div class="w-8/12 p-4 border-2 border-blue-200">
            <table class="table w-full table-borderless">
                <tr>
                    <th style="border-width: 0px">Nom & présnoms</th>
                    <td style="border-width: 0px">
                        {{ $user->fullName }}
                    </td>
                </tr>
                <tr>
                    <th style="border-width: 0px">Date & lieu de naissance</th>
                    <td style="border-width: 0px">
                        {{ $user->date_naissance }} à {{ $user->lieu_naissance }}
                    </td>
                </tr>
                <tr >
                    <th  style="border-width: 0px">Type de naturalisation</th>
                    <td style="border-width: 0px"> {{ strtoupper($type_naturalisation) }}</td>
                </tr>
                <tr>
                    <th style="border-width: 0px">Date de la demande</th>
                    <td style="border-width: 0px">{{ now() }}</td>
                </tr>
                <tr>
                    <th style="border-width: 0px">Documents requis</th>
                    <td style="border-width: 0px">
                        <ul>

                        @foreach($requireds as $req)
                        <li>{{ $req }}</li>
                        @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th style="border-width: 0px">Juridiction</th>
                    <td style="border-width: 0px">{{ $user->ville }}</td>
                </tr>
                <tr >
                    <td columnspan="2" class="text-xl text-green-800">
                        Montant: {{ $document->montant }} FCFA
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

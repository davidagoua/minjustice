<div>

    <div class="row ">

        <div class="w-10/12 p-4 border-2 shadow">
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
                <tr>
                    <th style="border-width: 0px">Nom & prénoms du père</th>
                    <td style="border-width: 0px">
                        {{ $user->first_name_pere }}  {{ $user->last_name_pere }}
                    </td>
                </tr>
                <tr>
                    <th style="border-width: 0px">Date et lieu naissance du père</th>
                    <td style="border-width: 0px">
                        {{ $user->date_naissance_pere }} à {{ $user->lieu_naissance_pere }}
                    </td>
                </tr>
                <tr>
                    <th style="border-width: 0px">Nom & prénoms de la mère</th>
                    <td style="border-width: 0px">
                        {{ $user->first_name_mere }}  {{ $user->last_name_mere }}
                    </td>
                </tr>
                <tr>
                    <th style="border-width: 0px">Date et lieu naissance de la mère</th>
                    <td style="border-width: 0px">
                        {{ $user->date_naissance_mere }} à {{ $user->lieu_naissance_mere }}
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
                    <td style="border-width: 0px">{{ $user->juridiction->nom ?? '' }}</td>
                </tr>
                <tr columnspan="2">
                    <td columnspan="2" class="text-xl text-green-800">
                        Montant: {{ (int) $nbCopies * (int) $document->montant }} FCFA
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

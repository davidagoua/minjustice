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
        <tr>
            <th>Date des condamnantions</th>
            <th>Cour ou tribunaux</th>
            <th>Nature du crimes ou delits</th>
            <th>Date precise de crime ou delit</th>
            <th>Nature et quantum des pièces</th>
            <th>Date du mandat de depot</th>
            <th>Observation</th>
        </tr>
        @foreach($sentences as $s)
            <tr>
                <td>{{ $s->sentence_at }}</td>
                <td>{{ $s->tribunal }}</td>
                <td>{{ $s->crime }}</td>
                <td>{{ $s->crime_at }}</td>
                <td>{{ $s->quantum }}</td>
                <td>{{ $s->deposit_at }}</td>
                <td>{{ $s->observations }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</article>

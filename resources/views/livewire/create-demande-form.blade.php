<div>

    <div>
        @if($isPaided)
            <h3>Votre document a été soumis veuillez vous rendre dans votre juridiction de naissance avec les originaux</h3>
        @else
        <form wire:submit.prevent="save">
            {{ $this->form }}


        </form>

        @endif
    </div>

</div>

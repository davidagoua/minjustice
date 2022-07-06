<div>

    <div>
        <form wire:submit.prevent="save">
            {{ $this->form }}

            <p class="text-right">
                <button type="submit" class="button h-button is-primary float-right is-raised">Soumettre</button>
            </p>
        </form>
    </div>

</div>

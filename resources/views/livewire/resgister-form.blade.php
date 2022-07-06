<div>

    <form wire:submit.prevent="save" >
        {{ $this->form }}
        <p class="text-right">
            <button type="submit" wire:click.prevent="save"  class="button h-button is-primary float-right is-raised">S'inscrire</button>
        </p>
    </form>
</div>

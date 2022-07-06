<div>
    @foreach($typeCertificates as $key => $type)
        <div>
            <input type="radio" name="type" wire:model="$selected_typeCertificate" value="{{ $key }}">
            <span>{{ $type }}</span>
        </div>
    @endforeach
</div>

<div class="bg-gray-100 p-3 rounded">
    <h1 class="text-2xl font-bold">Document requis pour : {{ $document->intitule }}</h1>
    <div class="mt-4">
        @forelse($document->docs as $doc)
            <li>{{ $doc }}</li>
        @empty
            <span>Aucun document requis</span>
        @endforelse
    </div>
</div>

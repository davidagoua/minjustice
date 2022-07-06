<?php

namespace App\Http\Livewire;

use App\Models\TypeDemande;
use App\Models\TypeDocument;
use Livewire\Component;

class TypeDocumentList extends Component
{
    public $search;
    protected $queryString = ['search'];
    protected  $typeDocuments;

    public function __construct(public $typeDemande)
    {
        $this->typeDocuments = TypeDocument::query();
        parent::__construct();
    }

    public function render()
    {
        return view('livewire.type-document-list', [
            'type_documents' => $this->typeDocuments
                ->where('intitule', 'like', '%'.$this->search.'%')
                ->get()
        ]);
    }
}

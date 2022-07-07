<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function download(Document $document)
    {
        $url = Storage::disk('s3')->temporaryUrl($document->path, now()->addDays(5));

        return redirect($url);
    }
}

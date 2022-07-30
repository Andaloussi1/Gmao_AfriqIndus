<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentsController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('file');
        $file->store('document/' . $request->user()->id . '/' . now()->format('Y') . now()->format('m'), 'public');
        $document = Document::create([

            'filename' => $file->hashName(),
            'type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'user_id' => $request->user()->id,
        ]);
        return response()->json([
            'id' => $document->id
        ]);
    }

    public function destroy(Document $document)
    {
        Storage::disk('public')
            ->delete('document/' . $document->user_id . '/' . now()->format('Y') . now()->format('m') . '/' . $document->filename);
        $document->delete();
        return response()->json([
            'message' => 'ok'
        ]);
    }
}

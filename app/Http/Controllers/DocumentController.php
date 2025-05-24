<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('users.documents-show', compact('documents'));
    }


    public function create()
    {
        return view('users.documents'); // Make sure this Blade view file exists
    }

    public function store(Request $request)
    {
        $request->validate([
            'documents.*' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:51200',
        ]);

        foreach ($request->file('documents') as $file) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/documents', $filename, 'public');

            Document::create([
                'user_id'       => Auth::id(), // assumes user is logged in
                'filename'      => $filePath,
                'original_name' => $file->getClientOriginalName(),
                'mime_type'     => $file->getClientMimeType(),
                'size'          => $file->getSize(),
            ]);
        }

        return back()->with('success', 'Documents uploaded successfully.');
    }
}

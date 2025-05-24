<!-- resources/views/documents/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto p-4">
                        <h2 class="text-2xl font-bold mb-4">Uploaded Documents</h2>

                        <a href="{{ route('documents.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Upload New Document
                        </a>

                        @if($documents->count())
                            <ul class="space-y-3">
                                @foreach($documents as $doc)
                                    <li class="flex justify-between items-center bg-gray-100 p-2 rounded">
                                        <span>{{ $doc->original_name }}</span>

                                        <div class="flex items-center space-x-2">
                                            <!-- Download -->
                                            {{-- {{  '../storage/app/public/' . $doc->filename }} --}}
                                            {{-- <a href="{{ asset('storage/app/public/' . $doc->filename) }}" target="_blank" class="text-blue-600 hover:underline">
                                                View
                                            </a> --}}
                                            <a href="{{ asset('storage/' . $doc->filename) }}" target="_blank" class="text-blue-600 hover:underline">
                                                View
                                            </a>
                                            {{-- <iframe class="pdf" alt="pdf" src="{{ asset('storage/app/public/'. $doc->filename) }}" width="100%" height="600px" style="border: none;"></iframe> --}}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>No documents uploaded yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- @extends('layouts.app')

@section('content')

@endsection --}}



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
                        <h1 class="text-2xl font-bold mb-4">Registered Users</h1>
                        <div class="flex justify-end mb-4">
                            <a href="{{ route('documents.index') }}" class="text-blue-600 text-white px-4 py-2 rounded hover:underline"
                            style="background-color:rgb(5, 5, 5);">
                                View Uploaded Documents
                            </a>
                            <a href="{{ route('documents.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
                            style="background-color:rgb(5, 5, 5);">
                                + Add Document
                            </a>
                        </div>

                        @if(session('success'))
                            <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2">Name</th>
                                    <th class="border px-4 py-2">Email</th>
                                    <th class="border px-4 py-2">Phone</th>
                                    <th class="border px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="border px-4 py-2">{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td class="border px-4 py-2">{{ $user->email }}</td>
                                    <td class="border px-4 py-2">{{ $user->phone }}</td>
                                    <td class="border px-4 py-2">
                                        <a
                                            href="{{ route('users.edit', $user->id) }}"
                                            class="ms-3 rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:hover:text-white/80 dark:focus-visible:ring-white"
                                            style="background-color:rgb(5, 5, 5);"
                                        >
                                            Edit
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                            @csrf @method('DELETE')
                                            {{-- <button type="submit" class="text-red-600">Delete</button> --}}
                                            <x-primary-button class="ms-3">
                                                {{ __('Delete') }}
                                            </x-primary-button>
                                        </form>
                                        {{-- <a href="{{ route('users.edit', $user->id) }}" class="text-blue-600 px-4 py-2 rounded" style="background-color:rgb(38, 140, 248);">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" style="background-color:rgb(190, 51, 9);" class="text-red-600 text-white px-4 py-2 rounded">Delete</button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

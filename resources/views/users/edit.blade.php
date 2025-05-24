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

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit User</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- First Name -->
        <div class="mb-4">
            <label for="first_name" class="block font-medium">First Name</label>
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}" required class="w-full p-2 border rounded">
        </div>

        <!-- Last Name -->
        <div class="mb-4">
            <label for="last_name" class="block font-medium">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}" required class="w-full p-2 border rounded">
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required class="w-full p-2 border rounded">
        </div>

        <!-- Phone -->
        <div class="mb-4">
            <label for="phone" class="block font-medium">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" required class="w-full p-2 border rounded" maxlength="10">
        </div>

        <!-- Address -->
        <div class="mb-4">
            <label for="address" class="block font-medium">Address</label>
            <input type="text" name="address" id="address" value="{{ old('address', $user->address) }}" required class="w-full p-2 border rounded">
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('users.index') }}" class="text-blue-600 px-4 py-2 rounded hover:underline" style="background-color:rgb(116, 113, 113);">← Back</a>
            <button type="submit" class="bg-blue-600 px-4 py-2 rounded hover:bg-primary/80" style="background-color: #007bff;">Update</button>
        </div>
    </form>
</div>
</x-app-layout>


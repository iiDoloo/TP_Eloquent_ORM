@extends('contact_app.layout')
@section('title', 'Add New Company')

@section('content')
<div class="bg-red-400 rounded p-5 flex justify-between">
    <h1 class="text-white font-bold text-xl">Add New Company</h1>
</div>

<div class="mt-5 md:max-w-md mx-auto">
    <form action="{{ route('companies.store') }}" method="POST" class="">
        @csrf
        <div class="grid gap-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" id="address" name="address" class="mt-1 p-2 w-full border rounded" value="{{ old('address') }}">
                @error('address')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                <input type="text" id="website" name="website" class="mt-1 p-2 w-full border rounded" value="{{ old('website') }}">
                @error('website')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>


            <div class="mt-5">
                <button type="submit" class="w-full bg-red-400 text-white py-3 mb-10 rounded-md hover:bg-red-300 focus:ring-3 focus:outline-hidden">Add Company</button>
            </div>
        </div>
    </form>
</div>
@endsection
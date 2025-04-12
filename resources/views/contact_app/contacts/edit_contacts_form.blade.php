@extends('contact_app.layout')
@section('title', 'Add New Contact')

@section('content')
<div class="bg-red-400 rounded p-5 flex justify-between">
    <h1 class="text-white font-bold text-xl">Edit Contact</h1>
</div>

<div class="mt-5 md:max-w-md mx-auto">
    <form action="{{ route('contacts.update',$contact->id) }}" method="POST" class="">
        @method('PUT')
        @csrf
        <div class="grid gap-4">
            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" id="first_name" name="first_name" class="mt-1 p-2 w-full border rounded" value="{{$contact->first_name}}" required>
                @error('first_name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="mt-1 p-2 w-full border rounded" value="{{$contact->last_name}}" required>
                @error('last_name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" id="phone" name="phone" class="mt-1 p-2 w-full border rounded" value="{{$contact->phone}}" required>
                @error('phone')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded" value="{{$contact->email}}" required>
                @error('email')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" id="address" name="address" class="mt-1 p-2 w-full border rounded" value="{{$contact->address}}">
                @error('address')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="company_id" class="block text-sm font-medium text-gray-700">Company</label>
                <select id="company_id" name="company_id" class="mt-1 p-2 w-full border rounded" required>
                    <option value="{{$contact->company->id}}">{{$contact->company->name}}</option>
                    @foreach ($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>
                @error('company_id')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-5">
                <button type="submit" class="w-full bg-red-400 text-white py-3 mb-10 rounded-md hover:bg-red-300 focus:ring-3 focus:outline-hidden">Update Contact</button>
            </div>
        </div>
    </form>
</div>
@endsection
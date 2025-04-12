@extends('contact_app.layout')
@section('title', 'Contacts')

@section('content')
<div class="bg-red-400 rounded p-5 flex justify-between">
    <h1 class="text-white font-bold text-xl">Trashed Contacts</H1>
</div>
<div class="overflow-x-auto">
    <table class="min-w-full divide-y-2 divide-gray-200">
      <thead class="ltr:text-left rtl:text-right">
        <tr class="*:font-medium *:text-gray-900 *:first:sticky *:first:left-0 *:first:bg-white">
          <th class="px-3 py-2 whitespace-nowrap">ID</th>
          <th class="px-3 py-2 whitespace-nowrap">First Name</th>
          <th class="px-3 py-2 whitespace-nowrap">Last Name </th>
          <th class="px-3 py-2 whitespace-nowrap">Phone</th>
          <th class="px-3 py-2 whitespace-nowrap">Email </th>
          <th class="px-3 py-2 whitespace-nowrap">Address </th>
          <th class="px-3 py-2 whitespace-nowrap">Company Name </th>
          <th class="px-3 py-2 whitespace-nowrap">Actions</th>
        </tr>
      </thead>
  
      <tbody class="divide-y divide-gray-200">
        @foreach ($contacts as $contact)
        <tr
        class="*:text-gray-900 *:first:sticky *:first:left-0 *:first:bg-white *:first:font-medium"
      >
        <td class="px-3 py-2 whitespace-nowrap">{{$contact->id}}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{$contact->first_name}}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{$contact->last_name}}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{$contact->phone}}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{$contact->email}}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{$contact->address}}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{$contact->company->name}}</td>
        <td class="px-3 py-2 whitespace-nowrap">
            <span class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">
                <form action="{{route('restore_trashed',$contact->id)}}" method="POST">
                    @csrf
                  <button type="submit" class="px-3 py-1.5 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900 focus:relative" aria-label="Delete">
                    <svg
      xmlns="http://www.w3.org/2000/svg"
      fill="none"
      viewBox="0 0 24 24"
      stroke-width="1.5"
      stroke="currentColor"
      class="size-4"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
      />
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
      />
    </svg>
                  </button>
                </form>
            <form action="{{route('destroy_trashed',$contact->id)}}" method="POST">
              @csrf
              @method('DELETE')
            <button type="submit" class="px-3 py-1.5 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900 focus:relative" aria-label="Delete">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4" >
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
              </svg>
            </button>
          </form>
          </span></td>
      </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
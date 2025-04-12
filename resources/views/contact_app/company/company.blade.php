@extends('contact_app.layout')
@section('title', 'companies')

@section('content')
<div class="bg-red-400 rounded p-5 flex justify-between">
    <h1 class="text-white font-bold text-xl">All companies</H1>
<div class="flex">
    <form action="{{ route('companies.index') }}" method="GET">
        <input type="hidden" name="take" value="3">
        <button class="inline-block rounded-sm border w-25 mr-5 bg-white border-red-600 py-3 text-sm font-medium text-red-400 hover:bg-red-200 hover:text-white focus:ring-3 focus:outline-hidden" href="#">
            3 Premiers
        </button>
    </form>

    <form action="{{ route('companies.index') }}" method="GET">
        <input type="hidden" name="skip" value="5">
        <button class="inline-block rounded-sm border w-25 bg-white border-red-600 py-3 text-sm font-medium text-red-400 hover:bg-red-200 hover:text-white focus:ring-3 focus:outline-hidden" href="#">
            3->5 Premiers
        </button>
    </form>
</div>
</div>
<div class=" mt-5 flex items-center gap-4">
  <div class="flex-grow">
    <form action="{{ route('companies.index') }}" method="GET">
      <label for="search" class="block text-sm font-medium text-gray-700 sr-only">Search Companies</label>
      <div class="relative rounded-md shadow-sm">
          <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
              <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
              </svg>
          </div>
          <input type="text" name="search_query" id="search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="Search contacts...">
      </div>
  </div>

  <div>
      <select id="company_filter" name="company_filter" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm">
          <option value="">All Companies</option>
          @foreach($companies as $company){
            <option value="{{$company->id}}">{{$company->name}}</option>
          }
          @endforeach
        </select>
      </div>

      <div>
        <button class="inline-block rounded-sm border text-s h-10 w-25 bg-white border-red-600 text-sm font-medium text-red-400 hover:bg-red-200 hover:text-white focus:ring-3 focus:outline-hidden" href="#">
            Search
        </button>
    </form>
    </div>

  </div>
<a href="{{route('companies.create')}}" class="inline-block mt-5 mb-5 rounded-sm border px-6 w-25 bg-white border-red-600 py-3 text-sm font-medium text-red-400 hover:bg-red-200 hover:text-white focus:ring-3 focus:outline-hidden" href="#">
            Ajouter
</a>
<div class="overflow-x-auto">
    <table class="min-w-full divide-y-2 divide-gray-200">
      <thead class="ltr:text-left rtl:text-right">
        <tr class="*:font-medium *:text-gray-900 *:first:sticky *:first:left-0 *:first:bg-white">
          <th class="px-3 py-2 whitespace-nowrap">ID</th>
          <th class="px-3 py-2 whitespace-nowrap">Name</th>
          <th class="px-3 py-2 whitespace-nowrap">Address </th>
          <th class="px-3 py-2 whitespace-nowrap">Website</th>
          <th class="px-3 py-2 whitespace-nowrap">Email </th>
          <th class="px-3 py-2 whitespace-nowrap">Actions</th>
        </tr>
      </thead>
  
      <tbody class="divide-y divide-gray-200">
        @foreach ($companies as $company)
        <tr
        class="*:text-gray-900 *:first:sticky *:first:left-0 *:first:bg-white *:first:font-medium"
      >
        <td class="px-3 py-2 whitespace-nowrap">{{$company->id}}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{$company->name}}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{$company->address}}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{$company->website}}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{$company->email}}</td>
        <td class="px-3 py-2 whitespace-nowrap">
            <span class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm">
            <a href="{{route('companies.edit',$company->id)}}" class="px-3 py-1.5 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900 focus:relative" aria-label="Edit">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"/>
              </svg>
            </a>
            <form action="{{route('companies.destroy',$company->id)}}" method="POST">
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
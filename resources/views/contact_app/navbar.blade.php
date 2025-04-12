<nav class="bg-white border-b border-gray-200 px-4 py-2 flex items-center justify-between">
    <div class="flex items-center space-x-6">
        <a href="#" class="text-red-600 font-bold text-xl">CONTACT APP</a>

        <a href="{{route('companies.index')}}" class="text-gray-700 hover:text-blue-600">Companies</a>
        <a href="{{route('contacts.index')}}" class="text-gray-700 hover:text-blue-600">Contacts</a>

        <div class="relative group">
            <button class="text-gray-700 hover:text-blue-600 focus:outline-none">
                Trush <span class="ml-1">▼</span>
            </button>

            <div class="absolute hidden group-hover:block bg-white shadow-lg rounded mt-2 z-10">
                <a href="{{route('trashed_companies')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Companies</a>
                <a href="{{route('trashed')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Contacts</a>
            </div>
        </div>
    </div>
</nav>

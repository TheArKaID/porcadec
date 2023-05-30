<x-app-layout>
    <x-slot name="header">
        <button type="button" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-small rounded-lg text-sm px-2 py-2 text-center inline-flex items-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
            <svg aria-hidden="true" class="w-5 h-5 ml-1 -mr-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            &nbsp; Back
        </button>
    </x-slot>
    <div class="py-12 bg-white md:flex md:items-center md:justify-between shadow rounded-lg p-4 md:p-6 xl:p-8 my-6 mx-4">
        <div class="w-full mx-auto sm:px-8 lg:px-10 space-y-6">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Patient: {{ $patient->name }}</h2>
            <div class="grid md:grid-cols-2 md:gap-4">
                <div class="grid md:gap-2">
                    <div class="relative z-0 w-full group">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Patient Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->name }}" disabled readonly />
                    </div>
                    <div class="relative z-0 w-full group">
                        <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->phone }}" disabled readonly />
                    </div>
                    <div class="relative z-0 w-full group">
                        <label for="origin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Origin</label>
                        <input type="text" name="origin" id="origin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->origin }}" disabled readonly />
                    </div>
                    <div class="relative z-0 w-full group">
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Travel History</label>
                        <input type="text" name="brand" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ 'Perjalanan' }}" disabled readonly />
                    </div>
                </div>
                
                <div class="grid">
                    <div class="sm:col-span-2">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                        <input type="text" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ \Carbon\Carbon::createFromFormat('Y-m-d', $patient->birth_day)->locale('id_ID')->format('l, d F Y') }}" disabled readonly />
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gejala</label>
                        <textarea id="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-50" disabled readonly>adqwdsadasd</textarea>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <div>
                    <a href="{{ route('patient.edit', $patient->id) }}" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-700">
                        Ubah Data
                    </a>
                </div>
                <div>
                    <a href="#" class="text-white bg-green-700 border border-green-700 hover:bg-white hover:text-green-700 hover:border-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-sm text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Test Baru
                    </a>
                </div>
            </div> 
        </div>
    </div>
</x-app-layout>

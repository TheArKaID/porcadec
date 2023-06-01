<x-app-layout>
    <x-slot name="header">
        @php
            $url = explode('/', Request::url());
            array_pop($url);
            $url = implode('/', $url);
        @endphp
        <a href="{{ $url }}" class="text-yellow-700 hover:text-white border border-yellow-700 hover:bg-yellow-700 focus:ring-2 focus:outline-none focus:ring-yellow-300 font-small rounded-lg text-sm px-1 py-1 text-center mr-3 mb-3">
            <svg class="w-5 h-5 inline-block align-middle" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.707 4.293a1 1 0 010 1.414L7.414 9H16a1 1 0 110 2H7.414l3.293 3.293a1 1 0 01-1.414 1.414l-5-5a1 1 0 010-1.414l5-5a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            <span class="inline-block align-middle">Back</span>
        </a>
    </x-slot>
    <div class="py-12 bg-white md:flex md:items-center md:justify-between shadow rounded-lg p-4 md:p-6 xl:p-8 my-6 mx-4">
        <div class="w-full mx-auto sm:px-8 lg:px-10 space-y-6">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Patient: {{ $patient->name }}</h2>
            <form action="" method="post">
                @csrf
                @method('patch')
                <div class="grid md:grid-cols-2 md:gap-4">
                    <div class="grid md:gap-2">
                        <div class="relative z-0 w-full group">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Patient Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->name }}" required/>
                        </div>
                        <div class="relative z-0 w-full group">
                            <label for="mrn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Patient MRN</label>
                            <input type="text" name="mrn" id="mrn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->mrn }}" required/>
                        </div>
                        <div class="relative z-0 w-full group">
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->phone }}" required/>
                        </div>
                        <div class="relative z-0 w-full group">
                            <label for="sex" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                            <select id="sex" name="sex" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="M" {{ $patient->sex == 'M' ? 'selected' : ''}}>Male</option>
                                <option value="F" {{ $patient->sex == 'F' ? 'selected' : ''}}>Female</option>
                            </select>

                        </div>
                    </div>
                    
                    <div class="grid md:gap-2">
                        <div class="relative z-0 w-full group">
                            <label for="birth_place" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birth Place</label>
                            <input type="text" name="birth_place" id="birth_place" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->origin }}" required/>
                        </div>
                        <div class="relative z-0 w-full group">
                            <label for="birth_day" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birth Date</label>
                            <input type="date" name="birth_day" id="birth_day" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->birth_day }}" required/>
                        </div>
                        <div class="relative z-0 w-full group">
                            <label for="origin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Origin</label>
                            <input type="text" name="origin" id="origin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->origin }}" required/>
                        </div>
                        <div class="relative z-0 w-full group">
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                            <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->address }}" required/>
                        </div>
                    </div>
                </div>
                <div class="grid mt-5">
                    <div class="flex">
                        <div class="flex w-full justify-end items-end">
                            <button type="submit" class="text-white text-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-sm text-sm w-full md:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

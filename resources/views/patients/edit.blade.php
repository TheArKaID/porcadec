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
            <form action="" method="post">
                <div class="grid md:grid-cols-2 md:gap-4">
                    <div class="grid md:gap-2">
                        <div class="relative z-0 w-full group">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Patient Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->name }}" required/>
                        </div>
                        <div class="relative z-0 w-full group">
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->phone }}" required/>
                        </div>
                        <div class="relative z-0 w-full group">
                            <label for="origin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Origin</label>
                            <input type="text" name="origin" id="origin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->origin }}" required/>
                        </div>
                        <div class="relative z-0 w-full group">
                            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Travel History</label>
                            <input type="text" name="brand" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ 'Perjalanan' }}" required/>
                        </div>
                    </div>
                    
                    <div class="grid">
                        <div class="sm:col-span-2">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                            <input type="text" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ \Carbon\Carbon::createFromFormat('Y-m-d', $patient->birth_day)->locale('id_ID')->format('l, d F Y') }}" required/>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gejala</label>
                            <textarea id="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-50" required>adqwdsadasd</textarea>
                        </div>
                    </div>
                </div>

                <hr class="mt-4 mb-3">
                <div class="grid md:grid-cols-2 md:gap-4">
                    <div class="relative z-0 h-max w-full group">
                        <label for="scan_image" class="sr-only">Pilih Model Scan</label>
                        <select id="scan_image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option selected hidden value disabled>Pilih Model Scan</option>
                            <option value="CT-Scan">CT-Scan</option>
                            <option value="X-Ray">X-Ray</option>
                        </select>
                    </div>
                    <div class="relative z-0 h-max w-full group">
                        <label for="model_detection" class="sr-only">Pilih Model Detection</label>
                        <select id="model_detection" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option selected hidden value disabled>Pilih Model Detection</option>
                            <option value="VGG16">VGG16</option>
                            <option value="ResNet50">ResNet50</option>
                            <option value="MobileNet">MobileNet</option>
                            <option value="LeNet">LeNet</option>
                        </select>
                    </div>
                </div>
                <hr class="mt-4 mb-3">
                <div class="grid md:grid-cols-2 md:gap-4">
                    <div class="flex z-0 h-max w-full group">
                        <div class="w-3/4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload File Scan</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG or JPG</p>
                        </div>
                        <div class="flex w-1/4 justify-center items-center">
                            <button type="submit" class="text-white text-right bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 mb-2 font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Upload</button>
                        </div>
                    </div>
                    <div class="flex mb-1 p-2 justify-end items-center">
                        <div class="flex w-1/4">
                            <button type="submit" class="text-white text-right bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Mulai Detection</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

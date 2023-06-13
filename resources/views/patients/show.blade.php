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
            <div class="grid md:grid-cols-2 md:gap-4">
                <div class="grid md:gap-2">
                    <div class="relative z-0 w-full group">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Patient Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->name }}" disabled readonly />
                    </div>
                    <div class="relative z-0 w-full group">
                        <label for="mrn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Patient MRN</label>
                        <input type="text" name="mrn" id="mrn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->mrn }}" disabled readonly />
                    </div>
                    <div class="relative z-0 w-full group">
                        <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->phone }}" disabled readonly />
                    </div>
                    <div class="relative z-0 w-full group">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                        <input type="text" name="gender" id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->sext == 'M' ? 'Male' : 'Female' }}" disabled readonly />
                    </div>
                </div>
                
                <div class="grid md:gap-2">
                    <div class="relative z-0 w-full group">
                        <label for="birth_place" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birth Place</label>
                        <input type="text" name="birth_place" id="birth_place" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->birth_place }}" disabled readonly />
                    </div>
                    <div class="relative z-0 w-full group">
                        <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birth Date</label>
                        <input type="text" name="birth_date" id="birth_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ \Carbon\Carbon::createFromFormat('Y-m-d', $patient->birth_day)->locale('id_ID')->format('l, d F Y') }}" disabled readonly />
                    </div>
                    <div class="relative z-0 w-full group">
                        <label for="origin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Origin</label>
                        <input type="text" name="origin" id="origin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->origin }}" disabled readonly />
                    </div>
                    <div class="relative z-0 w-full group">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $patient->address }}" disabled readonly />
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <div>
                    <a href="{{ route('patient.edit', $patient->id) }}" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-700">
                        Ubah Data
                    </a>
                    <button data-modal-target="create-new-test-modal" data-modal-toggle="create-new-test-modal" class="text-white bg-green-700 border border-green-700 hover:bg-white hover:text-green-700 hover:border-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-sm text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">
                        Test Baru
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12 bg-white md:flex md:items-center md:justify-between shadow rounded-lg p-4 md:p-6 xl:p-8 my-6 mx-4">
        <div class="w-full mx-auto sm:px-8 lg:px-10 space-y-6">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Test History</h2>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Test Result
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Scan Model
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Detection Model
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($patient->patientTests as $pt)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100">
                                            {{ $pt->result == 'null' ? 'Processing' : $pt->getReadableTestResult() }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{-- Format with time --}}
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $pt->created_at)->locale('id_ID')->isoFormat('LLLL') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $pt->scan_model }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $pt->detection_model }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-sm px-1 py-1 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-700" onclick="return document.getElementById('hidden-button-{{ $loop->iteration }}').click()">
                                            Detail
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                                            <h2 id="accordion-flush-heading-{{ $loop->iteration }}" hidden>
                                                <button type="button" id="hidden-button-{{ $loop->iteration }}" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-{{ $loop->iteration }}" aria-expanded="false" aria-controls="accordion-flush-body-{{ $loop->iteration }}"></button>
                                            </h2>
                                            <div id="accordion-flush-body-{{ $loop->iteration }}" class="hidden" aria-labelledby="accordion-flush-heading-{{ $loop->iteration }}">
                                                <div class="flex">
                                                    <div class="grid md:grid-cols-2 gap-4 w-3/4 mx-auto">
                                                        <div class="relative z-0 w-full group">
                                                            <div class="sm:col-span-2">
                                                                <label for="travel_history" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Travel History</label>
                                                                <textarea id="travel_history" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-50" readonly disabled>{{ $pt->travel_history }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="relative z-0 w-full group">
                                                            <div class="sm:col-span-2">
                                                                <label for="symptoms" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Symptoms</label>
                                                                <textarea id="symptoms" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-50" readonly disabled>{{ $pt->symptoms }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <div class="grid w-3/4 mx-auto">
                                                        <div class="relative z-0 w-full group">
                                                            <div class="sm:col-span-2">
                                                                <label for="result" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                                                                <div class="flex flex-col">
                                                                    <div class="flex flex-col">
                                                                        <div class="relative">
                                                                            <img src="{{ route('patient.test.image', [$pt->patient_id, $pt->id]) }}" alt="Image" class="w-full h-96 object-cover rounded-lg" loading="lazy">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <td class="px-6 py-4 text-center whitespace-nowrap dark:text-white" colspan="5">
                                    <span class="text-sm font-medium">No Test Exists</span>
                                </td>
                            @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</x-app-layout>

<x-modal :title="'Create a New Test'" :id="'create-new-test-modal'">
    <div class="p-6 space-y-6">
        <h4 class="text-xl font-bold text-gray-900 dark:text-white">Patient: {{ $patient->name }}</h4>
        <form action="{{ route('patient.test.create', $patient->id) }}" method="post" accept="image/png,image/jpg,image/jpeg" enctype="multipart/form-data">
            @csrf
            <hr class="mt-4 mb-3">
            <div class="grid md:grid-cols-2 gap-4">
                <div class="grid md:gap-2">
                    <div class="sm:col-span-2">
                        <label for="travel_history" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Travel History</label>
                        <textarea id="travel_history" name="travel_history" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-50"></textarea>
                    </div>
                </div>
                <div class="grid md:gap-2">
                    <div class="sm:col-span-2">
                        <label for="symptoms" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Symptoms</label>
                        <textarea id="symptoms" name="symptoms" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-50"></textarea>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-3">
            <div class="grid md:grid-cols-2 md:gap-4">
                <div class="relative z-0 h-max w-full group">
                    <label for="scan_model" class="sr-only">Pilih Model Scan</label>
                    <select id="scan_model" name="scan_model" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option selected hidden value disabled>Pilih Model Scan</option>
                        @foreach ($scanModel as $sm)
                            <option value="{{ $sm->code }}">{{ $sm->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="relative z-0 h-max w-full group">
                    <label for="detection_model" class="sr-only">Pilih Model Detection</label>
                    <select id="detection_model" name="detection_model" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option selected hidden value disabled>Pilih Model Detection</option>
                        @foreach ($detectionModel as $dm)
                            <option value="{{ $dm->code }}">{{ $dm->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr class="mt-4 mb-3">
            <div class="grid md:grid-cols-2 md:gap-4">
                <div class="flex z-0 h-max w-full group">
                    <div class="w-3/4">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="scan_image">Upload File Scan</label>
                        <input id="scan_image" type="file" name="scan_image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="scan_image_help" required>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="scan_image_help">PNG or JPG</p>
                    </div>
                </div>
                <div class="flex mb-1 p-2 justify-end items-center">
                    <div class="flex w-1/4">
                        <button type="submit" class="text-white text-right bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Start Detection</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-modal>
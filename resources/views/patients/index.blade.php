<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Patient
        </h2>
    </x-slot>
    <div class="py-12 bg-white md:flex md:items-center md:justify-between shadow rounded-lg p-4 md:p-6 xl:p-8 my-6 mx-4">
        <div class="w-full mx-auto sm:px-8 lg:px-10 space-y-6">
            <div class="flex justify-end">
                <button data-modal-target="create-modal" data-modal-toggle="create-modal" type="button" class="text-white text-right bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-sm text-sm sm:w-auto px-4 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add</button>
            </div>
            <table class="divide-y divide-gray-300" id="dataTable">
                <thead class="text-left">
                    <tr>
                        <th class="px-6 py-2 text-semi-bold">
                            No
                        </th>
                        <th class="px-6 py-2 text-semi-bold">
                            Name
                        </th>
                        <th class="px-6 py-2 text-semi-bold">
                            City
                        </th>
                        <th class="px-6 py-2 text-semi-bold">
                            Phone
                        </th>
                        <th class="px-6 py-2 text-semi-bold">
                            Gender
                        </th>
                        <th class="px-6 py-2 text-semi-bold">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-300">
                    {{-- AlpineJs foreach --}}
                    @foreach ($patients as $patient)
                        <tr class="whitespace-nowrap">
                            <td class="px-3 py-2 text-sm text-gray-900 text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-3 py-2">
                                <div class="text-sm text-gray-900">
                                    {{ $patient->name }}
                                </div>
                            </td>
                            <td class="px-3 py-2">
                                <div class="text-sm text-gray-900">{{ $patient->origin }}</div>
                            </td>
                            <td class="px-3 py-2 text-sm text-gray-900">
                                {{ $patient->phone }}
                            </td>
                            <td class="px-3 py-2 text-sm text-gray-900">
                                {{ $patient->sex == 'M' ? 'Male' : 'Female' }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <form  action="{{ route('patient.destroy', $patient->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('patient.show', $patient->id) }}" type="button" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-sm text-sm px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Detail</a>
                                    <button type="submit" onclick="return confirm('Delete Patient? All Patient Test History will be deleted')" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-sm text-sm px-2 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @push('styles')
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    @endpush
    @push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                ordering: false,
                searching: false,
                pageLength: 10,
                lengthMenu: [ 10, 25, 50, 100 ],
                dom: 'itpl'
            });
        });
    </script>
    @endpush
</x-app-layout>

<x-modal :title="'Add Patient'" :id="'create-modal'" :width="'7xl'">
    <div class="p-6 space-y-6">
        <div class="grid gap-6">
            <form action="" method="post">
                @csrf
                <div class="w-full mx-auto sm:px-8 lg:px-10 space-y-6">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Add Patient</h2>
                    <div class="grid md:grid-cols-2 md:gap-4">
                        <div class="grid md:gap-2">
                            <div class="relative z-0 w-full group">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Patient Name</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('name') }}" placeholder="Full Name" required/>
                            </div>
                            <div class="relative z-0 w-full group">
                                <label for="mrn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Patient MRN</label>
                                <input type="text" name="mrn" id="mrn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('mrn') }}" placeholder="Medical Record Number (Opsional)"/>
                            </div>
                            <div class="relative z-0 w-full group">
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                                <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('phone') }}" placeholder="Patient Phone Number" required/>
                            </div>
                            <div class="relative z-0 w-full group">
                                <label for="sex" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sex</label>
                                <select name="sex" id="sex" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected disabled hidden>Select</option>
                                    <option value="F">Female</option>
                                    <option value="M">Male</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="grid md:gap-2">
                            <div class="relative z-0 w-full group">
                                <label for="birth_place" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birth Place</label>
                                <input type="text" name="birth_place" id="birth_place" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('birth_place') }}" placeholder="Birth Place" required/>
                            </div>
                            <div class="relative z-0 w-full group">
                                <label for="birth_day" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birth Date</label>
                                <input type="date" name="birth_day" id="birth_day" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('birth_day')}}" placeholder="Birth Date" required/>
                            </div>
                            <div class="relative z-0 w-full group">
                                <label for="origin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Origin</label>
                                <input type="text" name="origin" id="origin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('origin') }}" placeholder="Patient Origin" required/>
                            </div>
                            <div class="relative z-0 w-full group">
                                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('address') }}" placeholder="Full Address" required/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="text-white text-right bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-sm text-sm w-full sm:w-auto px-4 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add</button>
                </div>
            </form>
        </div>
    </div>
</x-modal>

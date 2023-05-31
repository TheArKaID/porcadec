<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Patient
        </h2>
    </x-slot>
    <div class="py-12 bg-white md:flex md:items-center md:justify-between shadow rounded-lg p-4 md:p-6 xl:p-8 my-6 mx-4">
        <div class="w-full mx-auto sm:px-8 lg:px-10 space-y-6">
            {{-- <x-patient-table/> --}}
            <table class="divide-y divide-gray-300" id="dataTable">
                <thead class="">
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
                                <a href="{{ route('patient.show', $patient->id) }}" type="button" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-sm text-sm px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Detail</a>
                                {{-- <a href="#" type="button" class="text-black border border-yellow-300 font-medium rounded-sm text-sm text-center px-2 py-2 hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-yellow-400 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">Ubahh Status</a> --}}
                                <a href="#" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-sm text-sm px-2 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</a>
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

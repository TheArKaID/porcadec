<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Doctor
        </h2>
    </x-slot>
    <div class="py-12 bg-white md:flex md:items-center md:justify-between shadow rounded-lg p-4 md:p-6 xl:p-8 my-6 mx-4">
        <div class="w-full mx-auto sm:px-8 lg:px-10 space-y-6">
            <div class="flex justify-end">
                <button data-modal-target="create-modal" data-modal-toggle="create-modal" type="button" class="text-white text-right bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-sm text-sm sm:w-auto px-4 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add</button>
            </div>
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
                            Email
                        </th>
                        <th class="px-6 py-2 text-semi-bold">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-300">
                    @foreach ($users as $u)
                        <tr class="whitespace-nowrap">
                            <td class="px-3 py-2 text-sm text-gray-900 text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-3 py-2 text-center">
                                <div class="text-sm text-gray-900">
                                    {{ $u->name }}
                                </div>
                            </td>
                            <td class="px-3 py-2 text-center">
                                <div class="text-sm text-gray-900">{{ $u->email }}</div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="#" type="button" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-sm text-sm px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</a>
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

<x-modal :title="'Add Doctor'" :id="'create-modal'" :width="'xl'">
    <div class="p-6 space-y-6">
        <div class="grid gap-6">
            <form action="" method="post">
                @csrf
                <div class="flex flex-col">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Name
                    </label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm dark:bg-gray-700 dark:text-gray-400" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="flex flex-col">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Email
                    </label>
                    <div class="mt-1">
                        <input type="email" name="email" id="email" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm dark:bg-gray-700 dark:text-gray-400" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="flex flex-col">
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Password
                    </label>
                    <div class="mt-1">
                        <input type="password" name="password" id="password" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm dark:bg-gray-700 dark:text-gray-400">
                    </div>
                </div>
                <div class="flex flex-col">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Re-Password
                    </label>
                    <div class="mt-1">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm dark:bg-gray-700 dark:text-gray-400">
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="text-white text-right bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-sm text-sm w-full sm:w-auto px-4 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add</button>
                </div>
            </form>
        </div>
    </div>
</x-modal>

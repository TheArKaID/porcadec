<x-app-layout>
    <div class="py-12 bg-white md:flex md:items-center md:justify-between shadow rounded-lg p-4 md:p-6 xl:p-8 my-6 mx-4">
        <div class="w-full mx-auto sm:px-8 lg:px-10 space-y-6">
            <div class="grid md:grid-cols-2 md:gap-4">
                <div class="md:gap-2">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Scan Model </h2>
                    <div class="flex justify-start">
                        <button data-modal-target="create-new-scan-modal" data-modal-toggle="create-new-scan-modal" type="button" class="text-white text-right bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-sm text-sm sm:w-auto px-4 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add</button>
                    </div>
                    <div class="relative z-0">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-center whitespace-nowrap dark:text-white">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-center whitespace-nowrap dark:text-white">
                                        Code
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-center whitespace-nowrap dark:text-white">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($scanModels as $sm)
                                    <tr>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="px-6 py-4 text-center whitespace-nowrap dark:text-white">
                                            <span class="text-sm font-semibold">{{ $sm->name }}</span>
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap dark:text-white">
                                            <span class="text-sm font-semibold">{{ $sm->code }}</span>
                                        </td>
                                        <td>
                                            <div class="flex justify-center">
                                                <form action="{{ route('setting.sm.delete', $sm->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Delete Scan Model?')" class="text-white text-right bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-sm text-sm sm:w-auto px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <td class="px-6 py-4 text-center whitespace-nowrap dark:text-white" colspan="5">
                                        <span class="text-sm font-medium">No Model Exists</span>
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="md:gap-2">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Detection Model </h2>
                    <div class="flex justify-start">
                        <button data-modal-target="create-new-detection-modal" data-modal-toggle="create-new-detection-modal" type="button" class="text-white text-right bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-sm text-sm sm:w-auto px-4 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add</button>
                    </div>
                    <div class="relative z-0">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-center whitespace-nowrap dark:text-white">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-center whitespace-nowrap dark:text-white">
                                        Code
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-center whitespace-nowrap dark:text-white">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($detectionModels as $dm)
                                    <tr>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="px-6 py-4 text-center whitespace-nowrap dark:text-white">
                                            <span class="text-sm font-semibold">{{ $dm->code }}</span>
                                        </td>
                                        <td>
                                            <div class="flex justify-center">
                                                <form action="{{ route('setting.dm.delete', $dm->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Delete Scan Model?')" class="text-white text-right bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-sm text-sm sm:w-auto px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <td class="px-6 py-4 text-center whitespace-nowrap dark:text-white" colspan="5">
                                        <span class="text-sm font-medium">No Model Exists</span>
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-modal :title="'Add Scan Model'" :id="'create-new-scan-modal'" :width="'xl'">
    <div class="p-6 space-y-6">
        <div class="grid gap-6">
            <form action="" method="post">
                @csrf
                <input type="hidden" name="type" value="Scan">
                <div class="flex flex-col">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Name
                    </label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm dark:bg-gray-700 dark:text-gray-400">
                    </div>
                </div>
                <div class="flex flex-col">
                    <label for="code" class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Code
                    </label>
                    <div class="mt-1">
                        <input type="text" name="code" id="name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm dark:bg-gray-700 dark:text-gray-400">
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="text-white text-right bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-sm text-sm w-full sm:w-auto px-4 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add</button>
                </div>
            </form>
        </div>
    </div>
</x-modal>

<x-modal :title="'Add Detection Model'" :id="'create-new-detection-modal'" :width="'xl'">
    <div class="p-6 space-y-6">
        <div class="grid gap-6">
            <form action="" method="post">
                @csrf
                <input type="hidden" name="type" value="Detection">
                <div class="flex flex-col">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Name
                    </label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm dark:bg-gray-700 dark:text-gray-400">
                    </div>
                </div>
                <div class="flex flex-col">
                    <label for="code" class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Code
                    </label>
                    <div class="mt-1">
                        <input type="text" name="code" id="name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm dark:bg-gray-700 dark:text-gray-400">
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="text-white text-right bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-sm text-sm w-full sm:w-auto px-4 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add</button>
                </div>
            </form>
        </div>
    </div>
</x-modal>
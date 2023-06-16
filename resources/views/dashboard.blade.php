<x-app-layout>
    <div class="pt-6 px-4">
        <div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  2xl:col-span-2">

                <div class="flex items-center justify-between mb-4">
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">Covid Test</span>
                        <h3 class="text-base font-normal text-gray-500">For The Last 30 Days</h3>
                    </div>
                    <div class="grid">
                        <div class="flex items-center justify-end flex-1 text-red-500 text-base font-bold">
                            <span class="text-black">Positive &nbsp;</span>
                            <span id="positive-percentage"></span>
                        </div>
                        <div class="flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                            <span class="text-black">Negative &nbsp;</span>
                            <span id="negative-percentage"></span>
                        </div>
                    </div>
                </div>
                <div id="main-chart"></div>

            </div>

            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">

                <!-- Card Title -->
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Latest Covid Test</h3>
                        <span class="text-base font-normal text-gray-500">This is a list of latest Test</span>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="{{ route('patient.index') }}" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg p-2">View all Patient</a>
                    </div>
                </div>
                <!-- Table -->
                <div class="flex flex-col mt-8">
                    <div class="overflow-x-auto rounded-lg">
                        <div class="align-middle inline-block min-w-full">
                            <div class="shadow overflow-hidden sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Patient Name
                                            </th>
                                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Test Date
                                            </th>
                                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Result
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @foreach ($latestTests as $lt)
                                            <tr>
                                                <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                    {{ $lt->patient->name }}
                                                </td>
                                                <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                                    {{ \Carbon\Carbon::parse($lt->created_at)->locale('id_ID')->format('l, d F Y') }}
                                                </td>
                                                <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                                    <span class="font-semibold">{{ json_decode($lt->result)->class_label }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">

                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $totalPatientTest }}</span>
                        <h3 class="text-base font-normal text-gray-500">Total Test</h3>
                    </div>
                    <div class="ml-5 w-0 flex items-center justify-end flex-1 text-black text-base font-bold">
                        100%
                    </div>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $totalPatientPositiveTest }}</span>
                        <h3 class="text-base font-normal text-gray-500">Positive Test Result</h3>
                    </div>
                    <div class="ml-5 w-0 flex items-center justify-end flex-1 text-red-500 text-base font-bold">
                        {{ number_format(($totalPatientPositiveTest / $totalPatientTest) * 100, 2) }}%
                    </div>
                </div>

            </div>


            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">

                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $totalPatientNegativeTest }}</span>
                        <h3 class="text-base font-normal text-gray-500">Negative Test Result</h3>
                    </div>
                    <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                        {{ number_format(($totalPatientNegativeTest / $totalPatientTest) * 100, 2) }}%
                    </div>
                </div>

            </div>

        </div>
        <div class="grid grid-cols-1 xl:gap-4 my-4">
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                <!-- Card Title -->
                <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">PKU Muhammadiyah Hospitals</h3>
                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                    Name
                                </th>
                                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                    Location
                                </th>
                                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                    Contact
                                </th>
                                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                    More Info
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="text-gray-500">
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    RS PKU Muhammadiyah Yogyakarta
                                </th>
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                                    <a href="https://goo.gl/maps/7uuER7jFTEWiqKqV9">
                                        Jl. KH. Ahmad Dahlan No.20, Ngupasan, Kec. Gondomanan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55122
                                    </a>
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    (0274) 512653
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                    <a href="http://www.rspkujogja.com/" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-small rounded-sm text-sm px-1 py-1" target="_blank">
                                        www.rspkujogja.com
                                    </a>
                                </td>
                            </tr>
                            <tr class="text-gray-500">
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    RS PKU Muhammadiyah Gamping
                                </th>
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                                    <a href="https://goo.gl/maps/6UvAPfpjvqUqx5Bc9">
                                        Jl. Wates, Jl. Nasional III KM.5,5, Bodeh, Ambarketawang, Kec. Gamping, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55294
                                    </a>
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    (0274) 6499704
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                    <a href="https://pkugamping.com/" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-small rounded-sm text-sm px-1 py-1" target="_blank">
                                        pkugamping.com
                                    </a>
                                </td>
                            </tr>
                            <tr class="text-gray-500">
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    RS PKU Muhammadiyah Nanggulan
                                </th>
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                                    <a href="https://goo.gl/maps/CWL1G3roGz15FWYE7">
                                        Ngemplak, Jl. Ngapak - Kentheng, Ngemplak, Kembang, Kec. Nanggulan, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55671
                                    </a>
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    (0274) 2820136
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                    <a href="http://pkunanggulan.id/" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-small rounded-sm text-sm px-1 py-1" target="_blank">
                                        pkunanggulan.id
                                    </a>
                                </td>
                            </tr>
                            <tr class="text-gray-500">
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    RSU PKU Muhammadiyah Bantul
                                </th>
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                                    <a href="https://goo.gl/maps/kVoXfY4E4gSHtW768">
                                        Jl. Jend. Sudirman No.124, Nyangkringan, Bantul, Kec. Bantul, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55711
                                    </a>
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    (0274) 367437
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                    <a href="http://www.pkubantul.com/" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-small rounded-sm text-sm px-1 py-1" target="_blank">
                                        www.pkubantul.com
                                    </a>
                                </td>
                            </tr>
                            <tr class="text-gray-500">
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    RSKIA PKU Muhammadiyah Kotagede
                                </th>
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                                    <a href="https://goo.gl/maps/hdr7qytmnSMd6eXGA">
                                        Jl. Kemasan No.30, Purbayan, Kec. Kotagede, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55173
                                    </a>
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    (0274) 371201
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                    <a href="https://pkukotagede.co.id/" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-small rounded-sm text-sm px-1 py-1" target="_blank">
                                        pkukotagede.co.id
                                    </a>
                                </td>
                            </tr>
                            <tr class="text-gray-500">
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    RS. PKU Muhammadiyah Wonosari
                                </th>
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                                    <a href="https://goo.gl/maps/uQxtPv3cFWuhck1d6">
                                        Jl. Lkr. Utara, kemorosari II, Piyaman, Kec. Wonosari, Kabupaten Gunung Kidul, Daerah Istimewa Yogyakarta 55851
                                    </a>
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    (0274) 393379
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                    <a href="https://pku.pdmgk.org/" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-small rounded-sm text-sm px-1 py-1" target="_blank">
                                        pku.pdmgk.org
                                    </a>
                                </td>
                            </tr>
                            <tr class="text-gray-500">
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    Klinik PKU Muhammadiyah Pakem
                                </th>
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                                    <a href="https://goo.gl/maps/r9z2cW3LEsfvmy146">
                                        Jalan Pakem - Cangkringan KM 0.4, Pakembinangun, Pakem, Area Sawah, Pakembinangun, Kec. Pakem, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55582
                                    </a>
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    (0274) 896779
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                    <a href="https://www.instagram.com/pkupakem/?hl=en" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-small rounded-sm text-sm px-1 py-1" target="_blank">
                                        instagram - pkupakem
                                    </a>
                                </td>
                            </tr>
                            <tr class="text-gray-500">
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    PKU Muhammadiyah Jatinom
                                </th>
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                                    <a href="https://goo.gl/maps/6TBAmH6WFEKNuWnS6">
                                        Jl. Raya Jatinom No.Km. 01, Surobayan, Gedaren, Kec. Jatinom, Kabupaten Klaten, Jawa Tengah 57481
                                    </a>
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    (0272) 337334
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                    <a href="http://pku-jatinom.com/" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-small rounded-sm text-sm px-1 py-1" target="_blank">
                                        pku-jatinom.com
                                    </a>
                                </td>
                            </tr>
                            <tr class="text-gray-500">
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    RSU PKU Muhammadiyah Prambanan
                                </th>
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                                    <a href="https://goo.gl/maps/aHgLn9ye8Sd34ryQ8">
                                        Jalan Raya Batas No.Km.46, Sawah, Sanggrahan, Kec. Prambanan, Kabupaten Klaten, Jawa Tengah 57454
                                    </a>
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    (0274) 512653
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                    <a href="https://pkuprambanan.com/" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-small rounded-sm text-sm px-1 py-1" target="_blank">
                                        pkuprambanan.com
                                    </a>
                                </td>
                            </tr>
                            <tr class="text-gray-500">
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    Rs Pku Muhammdiyah Sleman
                                </th>
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                                    <a href="https://goo.gl/maps/N2yqNKfk2GMMxdrY7">
                                        Jl. Pendowoharjo, Sawahan, Pandowoharjo, Kec. Sleman, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55512
                                    </a>
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    -
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                    <a href="#" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-small rounded-sm text-sm px-1 py-1" target="_blank">
                                        -
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                const data = JSON.parse(`{!! $data !!}`)

                const groupedData = data.reduce((acc, item) => {
                        acc[item.date] = {
                            Positive:  item.Positive,
                            Negative:  item.Negative
                        };

                    return acc;
                }, {});

                const dates = Object.keys(groupedData);

                const series = Object.values(groupedData).map(item => [item.Positive, item.Negative]);

                const options = {
                    chart: {
                        type: 'line',
                    },
                    colors: ['#e30015', '#00E396'],
                    series: [
                        {
                            name: 'Positive',
                            data: series.map(item => item[0]),
                        },
                        {
                            name: 'Negative',
                            data: series.map(item => item[1]),
                        },
                    ],
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                            opacity: 0.5
                        },
                    },
                    xaxis: {
                        categories: dates,
                    },
                };

                (new window.ApexCharts(document.getElementById('main-chart'), options)).render()
                
                // get percentage of the difference between the first and last values of Positive
                const firstPositive = series[0][0]+1;
                const lastPositive = series[series.length - 1][0]+1;
                const positiveDiff = lastPositive - firstPositive;
                const positivePercentage = (positiveDiff / firstPositive) * 100;

                document.getElementById('positive-percentage').innerText = positivePercentage.toFixed(2) + '%';

                // get percentage of the difference between the first and last values of Negative
                const firstNegative = series[0][1];
                const lastNegative = series[series.length - 1][1];
                const negativeDiff = lastNegative - firstNegative;
                const negativePercentage = (negativeDiff / firstNegative) * 100;
                document.getElementById('negative-percentage').innerText = negativePercentage.toFixed(2) + '%';

                
            });
        </script>
    @endpush
</x-app-layout>


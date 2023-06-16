import ApexCharts from 'apexcharts';

export default ApexCharts

// if (document.getElementById('main-chart')) {
// 	function generateDayWiseTimeSeries(baseval, count, yrange) {
// 		var i = 0;
// 		var series = [];
// 		while (i < count) {
// 			var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

// 			series.push([baseval, y]);
// 			baseval += 86400000;
// 			i++;
// 		}
// 		return series;
// 	}
// console.log("{{ $data }}")
// 	// Data contoh
// 	const data = [
// 		{ tanggal: '1 Jan' },
// 		{ tanggal: '2 Jan' },
// 		{ tanggal: '3 Jan' },
// 		{ tanggal: '4 Jan' },
// 		{ tanggal: '5 Jan' },
// 		{ tanggal: '6 Jan' },
// 		{ tanggal: '7 Jan' },
// 		{ tanggal: '8 Jan' },
// 		{ tanggal: '9 Jan' },
// 		{ tanggal: '10 Jan' },
// 		{ tanggal: '11 Jan' },
// 		{ tanggal: '12 Jan' },
// 		{ tanggal: '13 Jan' },
// 		{ tanggal: '14 Jan' },
// 	];

// 	// Mengelompokkan data berdasarkan tanggal dan menghitung jumlahnya
// 	const groupedData = data.reduce((acc, item) => {
// 		if (!acc[item.tanggal]) {
// 			acc[item.tanggal] = {
// 				Positive:  Math.floor(Math.random() * (10 - 50) + 49),
// 				Negative:  Math.floor(Math.random() * (10 - 50) + 49)
// 			};
// 		} else {
// 			acc[item.tanggal].Positive += Math.floor(Math.random() * (10 - 50) + 49);
// 			acc[item.tanggal].Negative += Math.floor(Math.random() * (10 - 50) + 49);
// 		}

// 		return acc;
// 	}, {});

// 	// Membuat array untuk sumbu X (tanggal)
// 	const dates = Object.keys(groupedData);

// 	// Membuat array untuk sumbu Y (jumlah positif dan negatif)
// 	const series = Object.values(groupedData).map(item => [item.Positive, item.Negative]);

// 	// Membuat grafik menggunakan ApexCharts
// 	const options = {
// 		chart: {
// 			type: 'line',
// 		},
// 		series: [
// 			{
// 				name: 'Positive',
// 				data: series.map(item => item[0]),
// 			},
// 			{
// 				name: 'Negative',
// 				data: series.map(item => item[1]),
// 			},
// 		],
// 		xaxis: {
// 			categories: dates,
// 		},
// 	};


// 	var chart = new ApexCharts(document.getElementById('main-chart'), options);
// 	chart.render();
// }

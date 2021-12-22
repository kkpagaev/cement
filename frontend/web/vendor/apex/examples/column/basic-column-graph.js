var options = {
	chart: {
		height: 175,
		type: 'bar',
		dropShadow: {
			enabled: true,
			opacity: 0.1,
			blur: 5,
			left: -10,
			top: 10
		},
	},
	plotOptions: {
		bar: {
			horizontal: false,
			endingShape: 'rounded',
			columnWidth: '35%',
		},
	},
	dataLabels: {
		enabled: false
	},
	stroke: {
		show: true,
		width: 2,
		colors: ['transparent']
	},
	series: [{
		name: 'ПЦ 500',
		data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
	}, {
		name: 'ПЦ2АШ400',
		data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
	}, {
		name: 'ПЦБШ2',
		data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
	}],
	xaxis: {
		categories: ['Бер', 'Квіт', 'Трав', 'Чер', 'Лип', 'Сер', 'Вер', 'Жов', 'Лист'],
	},
	yaxis: {
		title: {
			text: ' Кількість тон'
		}
	},
	fill: {
		opacity: 1
	},
	tooltip: {
		y: {
			formatter: function(val) {
				return "" + val + " "
			}
		}
	},
	grid: {
    borderColor: '#ced1e0',
    strokeDashArray: 5,
    xaxis: {
      lines: {
        show: true
      }
    },   
    yaxis: {
      lines: {
        show: false,
      } 
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 0,
      left: 0
    }, 
  },
	colors: ['#007ae1', '#ff3e3e', '#00bb42', '#ffbf05'],
}
var chart = new ApexCharts(
	document.querySelector("#basic-column-graph"),
	options
);
chart.render();

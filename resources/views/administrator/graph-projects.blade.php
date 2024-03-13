<script src="https://code.highcharts.com/highcharts.js"></script>

@vite('resources/css/administrator/dashboard.css')

<div class="w-auto h-56 shadow-lg hover:shadow-2xl transition duration-200 ease-in-out bg-white rounded-sm relative">
    <a class="group w-full p-5 flex flex-col" href="">
    <div id="container-projects" class="w-full h-full min-h-[224px]"></div>
      <div class="bg-blue-400 group-hover:bg-blue-600 h-full w-4 absolute top-0 left-0"></div>
    </a>
  </div>


  <script>
    Highcharts.chart('container-projects', {
        credits: {
        enabled: false // Deshabilita los créditos (enlace) debajo de la gráfica
        },
        chart: {
            plotBorderWidth: 0,
            plotShadow: false,
        },
        title: {
            text: '79 <br> Proyectos',
            align: 'center',
            verticalAlign: 'middle',
            y: 30,
            style: {
                color: '#000',
                fontSize: '16px',
                fontWeight: 'bold',
                textAlign: 'center',
            }
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -35,
                    style: {
                        fontWeight: 'bold',
                        color: 'white',
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '70%'],
                size: '130%'
            }
        },
        series: [{
            type: 'pie',
            name: 'Datos',
            innerSize: '60%',
            data: [
            { name: 'Nuevos', y: 54, color: '#22C55E' },
            { name: 'En desarrollo', y: 12, color: '#eab308' },
            { name: 'Finalizados', y: 13, color: '#9ca3af' },
            { name: 'Rechazados', y: 21, color: '#f87171' },
            ]
        }]
    });
    </script>

<script src="https://code.highcharts.com/highcharts.js"></script>

@vite('resources/css/administrator/dashboard.css')

<div class="border-t-16 border-green-ut w-auto h-56 shadow-lg hover:shadow-2xl transition duration-200 ease-in-out bg-white rounded-sm relative">
    <a class="group w-full p-5 flex flex-col" href="proyectos">
    <div id="container-projects" class="w-full h-full min-h-[224px]"></div>
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
                fontFamily: 'Poppins, sans-serif',
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
                    distance: -28,
                    style: {
                        fontWeight: 'bold',
                        color: '#f0f0f0',
                        fontFamily: 'Poppins, sans-serif',
                        fontSize: '9.5px',
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
            { name: 'Completados', y:{{$enDesarrolloCount}}, color: '#22C55E' },
            { name: 'En desarrollo', y: {{$reprobadosCount}}, color: '#eab308' },
            { name: 'Reprobados', y: {{$completadosCount}}, color: '#9ca3af' },
            ]
        }]
    });
</script>

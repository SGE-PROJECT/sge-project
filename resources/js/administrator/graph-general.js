import Highcharts from 'highcharts';

Highcharts.chart('order-chart', {
    credits: {
        enabled: false // Deshabilita los créditos (enlace) debajo de la gráfica
    },
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        },
        width: 900, // Ancho fijo de 600px
        height: 600 // Alto fijo de 400px
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            depth: 45,
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.percentage:.1f}%'
            }
        }
    },
    series: [{
        name: 'Recursos',
        colorByPoint: true,
        data: [
            { name: 'Proyectos', y: 137, color: '#3b82f6' },
            { name: 'Equipos', y: 135, color: '#f43f5e' },
            { name: 'Asesores académicos', y: 73, color: '#f97316' },
            { name: 'Asesores empresariales', y: 82, color: '#a855f7' },
            { name: 'Estudiantes', y: 532, color: '#22c55e' },
            { name: 'Libros', y: 654, color: '#06b6d4' },
            { name: 'Empresas', y: 124, color: '#ec4899' }
        ]
    }]
});

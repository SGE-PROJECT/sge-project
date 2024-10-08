import Highcharts from 'highcharts';

Highcharts.chart('container-users', {
    credits: {
    enabled: false // Deshabilita los créditos (enlace) debajo de la gráfica
    },
    chart: {
        plotBorderWidth: 0,
        plotShadow: false,
    },
    title: {
        text: `${totalUsers} <br> Usuarios`,
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
                    fontSize: '8px',
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
        data: usersData,
    }]
});

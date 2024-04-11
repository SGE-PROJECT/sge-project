import Highcharts from 'highcharts';

Highcharts.chart('container-students', {
    credits: {
        enabled: false
    },
    chart: {
        plotBorderWidth: 0,
        plotShadow: false,
    },
    title: {
        text: `${totalStudentsInDivision} <br> Estudiantes`,
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
        data: programData.map((item, index) => {
            const colors = ['#f56565', '#4299e1', '#48bb78', '#ecc94b', '#9f7aea']; // Colores correspondientes a Tailwind
            return {
                name: item.name, // Asegúrate de que 'name' exista en tu 'programData'
                y: item.y, // Asegúrate de que 'y' exista en tu 'programData' (puede representar un valor como el porcentaje)
                color: colors[index % colors.length] // Cicla a través de los colores para cada punto de datos
            };
        }),
    }]
});

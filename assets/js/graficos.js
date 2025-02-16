    // Gráfico 1: Producción de Peces (toneladas)
    var ctx1 = document.getElementById('chart1').getContext('2d');
    var chart1 = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
            datasets: [{
                label: 'Producción de Peces',
                data: [50, 65, 80, 95, 110, 125], // Toneladas producidas cada mes
                backgroundColor: 'rgba(33, 150, 243, 0.6)', // Azul, representando agua
                borderColor: 'rgba(33, 150, 243, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Gráfico 2: Consumo de Alimento para Peces (toneladas)
    var ctx2 = document.getElementById('chart2').getContext('2d');
    var chart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
            datasets: [{
                label: 'Consumo de Alimento',
                data: [40, 50, 60, 70, 80, 90], // Cantidad de alimento consumido
                fill: false,
                borderColor: 'rgba(255, 99, 132, 1)', // Rojo, como el color del alimento
                tension: 0.1 // curbade la linea
            }]
        }
    });

    // Gráfico 3: Número de Peces por Especie
    var ctx3 = document.getElementById('chart3').getContext('2d');
    var chart3 = new Chart(ctx3, {
        type: 'pie',
        data: {
            labels: ['Trucha', 'Salmón', 'Delfines','Atun', 'Otras Especies'],
            datasets: [{
                data: [300, 500, 200, 40, 50], // Número de peces por especie
                backgroundColor: ['#00bcd4', '#ff5722', '#4caf50', '#9e9e9e'], // Colores representativos
            }]
        }
    });

    // Gráfico 4: Ventas mensuales de pescado (en unidades)
    var ctx4 = document.getElementById('chart4').getContext('2d');
    var chart4 = new Chart(ctx4, {
        type: 'doughnut',
        data: {
            labels: ['Pescado Fresco', 'Pescado Congelado', 'Huevas'],
            datasets: [{
                data: [400, 300, 100], // Ventas mensuales de cada tipo de pescado
                backgroundColor: ['#ff9800', '#00bcd4', '#8bc34a'] // Colores representando tipos de pescado
            }]
        }
    });
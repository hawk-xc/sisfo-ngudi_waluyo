import Chart from 'chart.js/auto';

const ctx = document.getElementById('lansiaChart').getContext('2d');

const dataLansia = {
    labels: ['Laki-laki', 'Perempuan'],
    datasets: [{
        label: 'Jumlah Lansia',
        data: [120, 150], // Contoh data jumlah lansia laki-laki dan perempuan
        backgroundColor: ['#36A2EB', '#FF6384'],
        hoverOffset: 4
    }]
};

new Chart(ctx, {
    type: 'doughnut',
    data: dataLansia,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top'
            }
        }
    }
});
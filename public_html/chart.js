const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      datasets: [{
        label: 'Viewer',
        data: [12, 19, 23, 19, 27, 12, 13],
        backgroundColor: [
            'rgba(85,85,85,1)'
        ],
        borderColor: [
            'rgb(41,155,99)'
        ],
        borderWidth: 1
      }]
    },
    options: {
        responsive: true
    }
  });
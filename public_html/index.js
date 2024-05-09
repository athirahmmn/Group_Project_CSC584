const ctx2 = document.getElementById('doughnut').getContext('2d');

  new Chart(ctx2, {
    type: 'doughnut',
    data: {
      labels: ['ayam gepuk', 'zus coffee', 'nasi tomyam', 'ayam gunting', 'puasa'],
      datasets: [{
        label: 'Favourite meal',
        data: [5, 1, 2, 2, 1],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
    }
  });
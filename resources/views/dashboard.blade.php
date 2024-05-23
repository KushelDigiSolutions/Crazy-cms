<x-admin>
    @section('title')
        {{ 'Dashboard' }}
    @endsection
    <div>
  
</div>
 
    <x-dashboard />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
   
    data: {
        datasets: [{
            type: 'line',
            label: 'Plan Purchase Users',
            data: [10, 26, 39, 46,56,62,76,84,93,108,110,120],
            backgroundColor:"#456DD9"
        }, {
            type: 'line',
            label: 'Monthly Users',
            data: [15, 50, 60, 80,76,90,54,56,68,98,112,122],
            backgroundColor:"#0F3D5F"
        }],
        labels: ['Jan', 'Feb', 'Mar', 'April','May','June','July','Aug','Sept','Oct','Nov','Dec']
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
</x-admin>

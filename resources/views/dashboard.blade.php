<x-admin>
    @section('title')
        {{ 'Dashboard' }}
    @endsection
    <div>
  
</div>
 
    <x-dashboard />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script>
  // Get the canvas element by ID
  const ctx = document.getElementById('myChart');

  // Convert PHP arrays to JavaScript arrays using json_encode
  const paidUserCount = @json($paidUserCount);
  const userCount = @json($userCount);

  // Create the chart with the data
  new Chart(ctx, {
    data: {
        datasets: [{
            type: 'line',
            label: 'Plan Purchase Users',
            data: paidUserCount,
            backgroundColor: "#456DD9"
        }, {
            type: 'line',
            label: 'Monthly Users',
            data: userCount,
            backgroundColor: "#0F3D5F"
        }],
        labels: ['Jan', 'Feb', 'Mar', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec']
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

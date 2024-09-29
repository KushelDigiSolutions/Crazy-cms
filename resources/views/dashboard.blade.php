<x-admin>

<form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
@if (!$user->hasVerifiedEmail())
    <div>
        <p class="text-sm mt-2 text-gray-800">
            {{ __('Your email address is unverified.') }}

            <button form="send-verification"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Click here to re-send the verification email.') }}
            </button>
        </p>

        @if (session('status') === 'verification-link-sent')
            <p class="mt-2 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to your email address.') }}
            </p>
        @endif
    </div>
@endif

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

<section>
    <div class="card canting">
        <div class="card-header">
            <h3 class="card-title cd_tit">Email Statistics Table</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="emailTable">
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>Email Address</th>
                        <th>Opened</th>
                        <th>Purchased</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                    $i = 1
                    @endphp
                    @if(!empty($referrals))
                    @foreach ($referrals as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->opened ? 'Yes' : 'No' }}</td>
                            <td>{{ $item->purchased ? 'Yes' : 'No' }}</td>
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    @section('js')
        <script>
            $(function() {
                $('#emailTable').DataTable({
                    "paging": true, // Enable pagination
                    "searching": true, // Enable search functionality
                    "ordering": true, // Enable column sorting
                    "responsive": true, // Make the table responsive
                });
            });
        </script>
    @endsection
</section>

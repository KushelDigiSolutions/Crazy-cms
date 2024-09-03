<x-admin>
    @section('title', 'Orders')
    <div class="card canting">
        <div class="card-header">
            <h3 class="card-title cd_tit">Order Table</h3>
            <!--<div class="card-tools"><a href="{{ route('admin.subscription.create') }}" class="btn btn-sm btn-primary">Add</a></div>-->
        </div>
        <div class="card-body">
            <table class="table table-striped" id="itemTable">
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>Order ID</th>
                        <th>Website(Url)</th>
                        <th>Subscription start</th>
                        <th>Transaction ID</th>
                        <th>End Date</th>
                        <!-- <th>Action</th>
                        <th></th>
                        <th></th> -->
                    </tr>
                </thead>
                <tbody>
                    @php 
                    $i = 1
                    @endphp

                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>
                            #MCC{{ date('Y') }}{{ $item->id }}
                            </td>
                            <td>{{ $item->url }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->transactionId }}</td>
                            <td> {{ $item->end_date }}</td>
                            <!-- <td>
                                <a href="{{ route('admin.subscription.edit', encrypt($item->id)) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                            </td> -->
                            <!-- <td>
                                <a href="{{ route('admin.subscription.edit', encrypt($item->id)) }}"
                                    class="btn btn-sm btn-primary">Login</a>
                            </td> -->
                            <!-- <td>
                                <form action="{{ route('admin.subscription.destroy', encrypt($item->id)) }}" method="POST"
                                    onsubmit="return confirm('Are sure want to delete?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td> -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @section('js')
        <script>
            $(function() {
                $('#itemTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });
        </script>
    @endsection
</x-admin>

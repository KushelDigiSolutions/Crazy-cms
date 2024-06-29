<x-admin>
    @section('title', 'Orders')
    <div class="card canting">
        <div class="card-header">
            <h3 class="card-title cd_tit">Order Table</h3>
            <div class="card-tools"><a href="{{ route('admin.subscription.create') }}" class="btn btn-sm btn-primary">Add</a></div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="itemTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Plan</th>
                        <th>Subscription start</th>
                        <th>Created</th>
                        <th>Action</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.subscription.edit', encrypt($item->id)) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.subscription.edit', encrypt($item->id)) }}"
                                    class="btn btn-sm btn-primary">Login</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.subscription.destroy', encrypt($item->id)) }}" method="POST"
                                    onsubmit="return confirm('Are sure want to delete?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
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

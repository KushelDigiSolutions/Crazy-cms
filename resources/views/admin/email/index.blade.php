<x-admin>
    @section('title')
        {{ 'Permission' }}
    @endsection
    <div class="card canting">
        <div class="card-header">
            <h3 class="card-title">Permission</h3>
            <div class="card-tools">
                <a href="{{ route('admin.email.create') }}" class="btn btn-sm btn-primary">Add</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="collectionTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $rs)
                        <tr>
                            <td>{{ $rs->name }}</td>
                            <td>{{ $rs->email }}</td>
                            <td>{{ $rs->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.email.edit', encrypt($rs->id)) }}"
                                    class="btn btn-sm btn-secondary">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.email.destroy', encrypt($rs->id)) }}"
                                    method="POST" onclick="confirm('Are you sure')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center bg-danger">Permission not created</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @section('js')
        <script>
            $(function() {
                $('#collectionTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });
        </script>
    @endsection
</x-admin>

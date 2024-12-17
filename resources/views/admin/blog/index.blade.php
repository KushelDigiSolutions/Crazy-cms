<x-admin>
    @section('title')
        {{ 'Knowledge Base' }}
    @endsection
    <div class="card canting">
        <div class="card-header">
            <h3 class="card-title">Knowledge Base</h3>
            <div class="card-tools">
                <a href="{{ route('admin.blog.create') }}" class="btn btn-sm btn-primary">Add New</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="collectionTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Detail</th>
                        <th>Created</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $rs)
                        <tr>
                            <td>{{ $rs->id }}</td>
                            <td><img src="{{ url('/').'/'.$rs->image }}" height="100" width="100"></td>
                            <td>{{ $rs->name }}</td>
                            <td>{{ $rs->description }}</td>
                            <td>{{ $rs->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.blog.edit', encrypt($rs->id)) }}"
                                    class="btn btn-sm btn-secondary">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.blog.destroy', encrypt($rs->id)) }}"
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

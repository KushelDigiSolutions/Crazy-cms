<x-admin>
    @section('title', 'Customer')
    <div class="card canting">
        <div class="card-header">
            <h3 class="card-title cd_tit">Customer Table</h3>
            <!-- <div class="card-tools"><a href="{{ route('admin.enquiry.create') }}" class="btn btn-sm btn-primary">Add</a></div> -->
        </div>
        <div class="card-body">
            <div class="row">
            <div class="col-md-3">
            <select name="status" id="status" class="form-control" required>
            <option value="">Show All</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>
        <div class="col-md-9"></div>
        </div>
            <table class="table table-striped" id="enquiryTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Website Address</th>
                        <th>Website Url</th>
                        <th>Location</th>
                        <th>Created</th>
                        <th>Statu</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->url }}</td>
                            <td>{{ $item->location }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->status == 1 ? 'Active User' : 'Lead' }}</td>
                            <td>{{ $item->user ? $item->user->name : 'No User' }}</td>
                            <td>
                                <form action="{{ route('admin.enquiry.destroy', encrypt($item->id)) }}" method="POST"
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
    $(document).ready(function() {
        $('#enquiryTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });

});
    </script>
    <style>
        td {
    max-width: 300px; /* Set your desired width */
    word-wrap: break-word;
    overflow-wrap: break-word;
    white-space: normal;
}
    </style>
    @endsection
</x-admin>

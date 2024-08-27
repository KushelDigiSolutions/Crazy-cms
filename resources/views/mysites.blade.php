<x-admin>
    @section('title', 'My Site')
    @if(Auth::user()->hasRole('admin'))
    <div class="card canting">
        <div class="card-header">
            <h3 class="card-title cd_tit">My Site</h3>
            <div class="card-tools"><a href="{{ route('admin.addmysites') }}" class="btn btn-sm btn-primary">Add</a></div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="userTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Protocol</th>
                        <th>Host</th>
                        <th>Port</th>
                        <th>User</th>
                        <th>Url</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $user)
                        <tr>
                        <td>{{ $user->id }} </td>
                            <td>{{ $user->protocol }}</td>
                            <td>{{ $user->host }}</td>
                            <td>{{ $user->port }}</td>
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->url }}</td>
                            <td>
                                <a href="{{ url('admin/editsite').'/'.$user->id }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                            </td>
                            <!-- <td>
                                <a href=""
                                    class="btn btn-sm btn-primary">Login</a>
                            </td> -->
                            <td>
                                <form action="" method="POST"
                                    onsubmit="return confirm('Are sure want to delete?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@else

<div class="card canting">
        <div class="card-header">
            <h3 class="card-title cd_tit">My Site</h3>
            <div class="card-tools"><a href="{{ route('admin.addmysites') }}" class="btn btn-sm btn-primary">Add</a></div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="userTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Protocol</th>
                        <th>Host</th>
                        <th>Port</th>
                        <th>User</th>
                        <th>Url</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $user)
                        
                        <tr>
                        <td>{{ $user->id }} </td>
                            <td>{{ $user->protocol }}</td>
                            <td>{{ $user->host }}</td>
                            <td>{{ $user->port }}</td>
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->url }}</td>
                            <td>
                            @php
                                $isExpired = \Carbon\Carbon::parse($user->created_at)->lt(now());
                            @endphp                            
                                @if($isExpired)
                                    <a href="{{ url('admin/editsite').'/'.$user->id }}" class="btn btn-sm btn-primary">Renew</a>
                                @else
                                    <a href="{{ url('admin/editsite').'/'.$user->id }}" class="btn btn-sm btn-primary">Edit</a>
                                @endif
                            </td>
                            <!-- <td>
                                <a href=""
                                    class="btn btn-sm btn-primary">Login</a>
                            </td> -->
                            <td>
                                <form action="" method="POST"
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
    @endif


    @section('js')
        <script>
            $(function() {
                $('#userTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });
        </script>
    @endsection
</x-admin>

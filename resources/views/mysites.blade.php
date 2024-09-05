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
                                 <a href="{{ url('admin/editsite').'/'.$user->name.'/'.$user->id }}" class="btn btn-sm btn-primary">Edit</a>
                            </td>
                            <!-- <td>
                                <a href=""
                                    class="btn btn-sm btn-primary">Login</a>
                            </td> -->
                            <td>
                            <form action="{{ route('admin.mysites.delete', encrypt($user->id)) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
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
                            <td>{{ $user->protocol ?? 'Not Available' }}</td>
                            <td>{{ $user->host ?? 'Not Available' }}</td>
                            <td>{{ $user->port ?? 'Not Available' }}</td>
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->url ?? 'Not Available' }}</td>
                            @php
                                // $isExpired = \Carbon\Carbon::parse($user->created_at)->lt(now());

                                $oneYearAgo = now()->subYear();
                                $isExpired = \Carbon\Carbon::parse($user->created_at)->lt($oneYearAgo);
                            @endphp 
                            @if($isExpired)
                            <td>
                                <a href="{{ url('admin/editsite').'/'.$user->id }}" class="btn btn-sm btn-primary">Renew</a>
                            </td>
                                    @else
                            <td>                           
                             <a href="{{ url('admin/editsite').'/'.$user->name.'/'.$user->id }}" class="btn btn-sm btn-primary">Edit {{$user->name}}</a>
                            </td>
                            @endif
                            <!-- <td>
                                <a href=""
                                    class="btn btn-sm btn-primary">Login</a>
                            </td> -->
                            <td>
                            <form action="{{ route('admin.mysites.delete', encrypt($user->id)) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
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
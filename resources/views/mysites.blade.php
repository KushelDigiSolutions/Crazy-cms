@php
        use Carbon\Carbon;
    @endphp
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
                            <td>{{ $user->protocol ?? 'Not Available' }}</td>
                            <td>{{ $user->host ?? 'Not Available' }}</td>
                            <td>{{ $user->port ?? 'Not Available' }}</td>
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->url ?? 'Not Available' }}</td>
                            <td>
                            <a href="{{ url('admin/editsite').'/'.$user->name.'/'.$user->id }}" class="btn btn-sm btn-primary">Edit Pages</a>
                            </td>
                            <!-- <td>
                                <a href=""
                                    class="btn btn-sm btn-primary">Login</a>
                            </td> -->
                            <td>
                            @if(empty($user->payment_id))
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
                        <th>Subscription Start</th>
                        <th>Expiry Start</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $user)
                            @php
                            
                                $cr = Carbon::parse($user->created_at);
                                $createdAt = Carbon::parse($user->created_at);
                                $expiryDate = $createdAt->addYear()->subDay();
                                $isExpired = now()->greaterThan($expiryDate);
                            @endphp 
                        <tr>
                        <td>{{ $user->id }} </td>
                            <td>{{ $user->protocol ?? 'Not Available' }}</td>
                            <td>{{ $user->host ?? 'Not Available' }}</td>
                            <td>{{ $user->port ?? 'Not Available' }}</td>
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->url ?? 'Not Available' }}</td>
                            <td>{{  $cr->format('d-m-Y') }}</td>
                            <td>{{  $expiryDate->format('d-m-Y'). $isExpired }}</td>
                            <td>
                                                       
                                @if($isExpired)
                                    <a href="{{ url('admin/editsite').'/'.$user->id }}" class="btn btn-sm btn-primary">Renew</a>
                                @else
                                    <a href="{{ url('admin/editsite').'/'.$user->name.'/'.$user->id }}" class="btn btn-sm btn-primary">Modify Pages</a>
                                @endif
                            </td>

                            <td>
                            <a href="{{ url('admin/editmysite').'/'.$user->id }}" class="btn btn-sm btn-primary">Edit FTP</a>
                            </td> 
                            @if(empty($user->payment_id))
                            <td>
                                <form action="" method="POST"
                                    onsubmit="return confirm('Are sure want to delete?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>

                            </td>
                            @endif
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

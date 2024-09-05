<x-admin>
    @section('title', 'My Sites')
    <div class="card canting">
        <div class="card-header">
            <h3 class="card-title">My Sites</h3>
            <div class="card-tools"><a href="{{ route('admin.mysites') }}" class="btn btn-sm btn-dark">Back</a></div>
        </div>
        <div class="card-body">
        <form method="POST" action="{{ route('admin.storeAdd') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Protocol:*</label>
                                <input type="text" class="form-control" name="user_protocol">
                                    @error('user_protocol')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror                           
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="Email" class="form-label">Host:*</label>
                            <input type="text" class="form-control" name="user_host">
                            @error('user_host')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="port" class="form-label">Port:*</label>
                            <input type="text" class="form-control" name="user_port" >
                            @error('user_port')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="role" class="form-label">User:*</label>
                            <input type="text" class="form-control" name="user_name">
                            @error('user_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="role" class="form-label">Password:*</label>
                            <input type="password" class="form-control" name="user_password">
                            @error('user_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="role" class="form-label">Url:*</label>
                            <input type="text" class="form-control" name="url_path">
                            @error('url_path')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="float-right">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin>

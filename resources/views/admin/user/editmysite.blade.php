<x-admin>
    @section('title', 'Edit My Site')
    <div class="card canting">
        <div class="card-header">
            <h3 class="card-title">Edit My Site</h3>
            <div class="card-tools"><a href="{{ route('admin.mysites') }}" class="btn btn-sm btn-dark">Back</a></div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.user.updateMySite') }}" method="POST">
                @method('PUT')
                @csrf
                <input type="hidden" name="id" value="{{ $data->id }}">
                <div class="row">
                <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Name:*</label>
                            <input type="text" class="form-control" name="name" required
                                value="{{ $data->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="Protocol" class="form-label">Protocol:*</label>
                            <input type="text" class="form-control" name="protocol" required
                                value="{{ $data->protocol }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="host" class="form-label">Host:*</label>
                            <input type="text" class="form-control" name="host" required
                                value="{{ $data->host }}">
                            @error('host')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="port" class="form-label">Port:*</label>
                            <input type="text" class="form-control" name="port" required
                                value="{{ $data->host }}">
                            @error('port')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror                            
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="location" class="form-label">Location:*</label>
                            <input type="text" class="form-control" name="location" required
                                value="{{ $data->location }}">
                            @error('location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror                            
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="location" class="form-label">User:*</label>
                            <input type="text" class="form-control" name="user" required
                                value="{{ $data->user }}">
                            @error('user')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror                            
                        </div>
                    </div>
                   
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password" class="form-label">Password:*</label>
                            <input type="password" class="form-control" name="password" required
                                value="{{ $data->password }}">
                            @error('password')
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

<x-admin>
    @section('title', 'Create User')
    <div class="card canting">
        <div class="card-header">
            <h3 class="card-title">Create User</h3>
            <div class="card-tools"><a href="{{ route('admin.email.index') }}" class="btn btn-sm btn-dark">Back</a></div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.email.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="name" class="form-label">Name:*</label>
                            <input type="text" class="form-control" name="name" required
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="Email" class="form-label">Email:*</label>
                            <textarea id="email" name="email" rows="12" cols="50" class="form-control"></textarea>
                           <!--  <input type="email" class="form-control" name="email" required
                                value="{{ old('email') }}"> -->
                            @error('email')
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

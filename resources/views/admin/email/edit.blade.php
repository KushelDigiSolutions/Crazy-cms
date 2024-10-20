<x-admin>
    @section('title', 'Create Email')
    <div class="card canting">
        <div class="card-header">
            <h3 class="card-title">Create Email</h3>
            <div class="card-tools"><a href="{{ route('admin.email.index') }}" class="btn btn-sm btn-dark">Back</a></div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.email.update',$email) }}" method="POST">
                @method('PUT')
                @csrf
                <input type="hidden" name="id" value="{{ $email->id }}">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="name" class="form-label">Name:*</label>
                            <input type="text" class="form-control" name="name" required
                                value="{{ $email->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="Email" class="form-label">Email:*</label>
                            <textarea name="description" rows="12" cols="50" class="form-control">{{ $email->email }}</textarea>
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

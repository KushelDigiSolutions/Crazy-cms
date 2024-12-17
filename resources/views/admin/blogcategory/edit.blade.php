<x-admin>
    @section('title')
        {{ 'Edit Blog Category' }}
    @endsection
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card canting">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Blog Category</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.blogcategory.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('admin.blogcategory.update',$data) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                
                            <div class="form-group">
                                <label for="name">Blog Category Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter category name" required value="{{ $data->category_name }}">
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin>

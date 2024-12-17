<x-admin>
    @section('title', 'Create Knowledge Base')
    <div class="card canting">
        <div class="card-header">
            <h3 class="card-title">Create Knowledge Base</h3>
            <div class="card-tools"><a href="{{ route('admin.blog.index') }}" class="btn btn-sm btn-dark">Back</a></div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="name" class="form-label">Name:*</label>
                            <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="description" class="form-label">Description:*</label>
                            <textarea name="description" rows="12" cols="50" class="form-control">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="category_id" class="form-label">Category:*</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="tags" class="form-label">Tags:</label>
                            <input type="text" class="form-control" name="tags" value="{{ old('tags') }}">
                            @error('tags')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="seo_title" class="form-label">SEO Title:</label>
                            <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title') }}">
                            @error('seo_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="seo_meta_tags" class="form-label">SEO Meta Tags:</label>
                            <textarea name="seo_meta_tags" class="form-control">{{ old('seo_meta_tags') }}</textarea>
                            @error('seo_meta_tags')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="seo_description" class="form-label">SEO Description:</label>
                            <textarea name="seo_description" class="form-control">{{ old('seo_description') }}</textarea>
                            @error('seo_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="image" class="form-label">Image:*</label>
                            <input type="file" class="form-control" name="image">
                            @error('image')
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

<script src="https://cdn.tiny.cloud/1/vsgbwwves9kjc7cqqrk4j59dr8yiapctiupaq7vybycfjbcs/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: 'textarea[name="description"]',
    height: 400,
    menubar: true,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
    ],
    toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
    content_css: '//www.tiny.cloud/css/codepen.min.css',
    branding: false
});
</script>

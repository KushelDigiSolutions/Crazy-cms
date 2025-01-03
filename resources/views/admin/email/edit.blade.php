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
                            <label for="name" class="form-label">Template Name:*</label>
                            <input type="text" disabled style="background:#e9e9e9 !important" class="form-control" name="name" required
                                value="{{ $email->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="name" class="form-label">Subject:*</label>
                            <input type="text" class="form-control" name="name" required
                                value="{{ $email->subject }}">
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
                    
                 <!--    <div class="col-lg-7">
                         <div class="form-group">
                            <label for="name" class="form-label">Email Address:*</label>
                            <input type="text" class="form-control" name="email_id" id="email_id" required >
                            @error('email_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="float-right">
                            <button id="sendMailButton" type="button" class="btn btn-primary">
                                Send Mail
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-1"></div> -->

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
        let currentCondition = {{ $email->id }};


        function generateMenuItems(condition) {
            // Dynamically generate menu items based on the condition
            if (condition == 1) {
                return [
                    {
                        type: 'menuitem',
                        text: 'Name',
                        onAction: function() { insertAtCursor('[name]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Email',
                        onAction: function() { insertAtCursor('[email]'); }
                    }
                ];
            } else if (condition == 2) {
                return [
                    {
                        type: 'menuitem',
                        text: 'Name',
                        onAction: function() { insertAtCursor('[name]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Email',
                        onAction: function() { insertAtCursor('[email]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Password Link',
                        onAction: function() { insertAtCursor('[link]'); }
                    }
                ];
            } else if (condition == 3) {
                return [
                    {
                        type: 'menuitem',
                        text: 'Name',
                        onAction: function() { insertAtCursor('[name]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Email',
                        onAction: function() { insertAtCursor('[email]'); }
                    }
                ];
            } else if (condition == 4) {
                return [
                    {
                        type: 'menuitem',
                        text: 'Name',
                        onAction: function() { insertAtCursor('[name]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Email',
                        onAction: function() { insertAtCursor('[email]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Referal Name',
                        onAction: function() { insertAtCursor('[refefral_name]'); }
                    }
                ];
            } else if (condition == 5) {
                return [
                    {
                        type: 'menuitem',
                        text: 'Name',
                        onAction: function() { insertAtCursor('[name]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Email',
                        onAction: function() { insertAtCursor('[email]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Referal Name',
                        onAction: function() { insertAtCursor('[refefral_name]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Subscription Start',
                        onAction: function() { insertAtCursor('[subscription_start]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Old Plan',
                        onAction: function() { insertAtCursor('[old_plan]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'New Plan',
                        onAction: function() { insertAtCursor('[new_plan]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Subscription End',
                        onAction: function() { insertAtCursor('[subscription_end]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Features List',
                        onAction: function() { insertAtCursor('[features]'); }
                    }
                ];
            }else if (condition == 6) {
                return [
                    {
                        type: 'menuitem',
                        text: 'Name',
                        onAction: function() { insertAtCursor('[name]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Email',
                        onAction: function() { insertAtCursor('[email]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Referal Name',
                        onAction: function() { insertAtCursor('[refefral_name]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Website Edit Link',
                        onAction: function() { insertAtCursor('[website_edit_link]'); }
                    }
                ];
            } else if (condition == 7) {
                return [
                    {
                        type: 'menuitem',
                        text: 'Name',
                        onAction: function() { insertAtCursor('[name]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Email',
                        onAction: function() { insertAtCursor('[email]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Referal Name',
                        onAction: function() { insertAtCursor('[refefral_name]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Renew Link',
                        onAction: function() { insertAtCursor('[renew_link]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'User Plan',
                        onAction: function() { insertAtCursor('[old_plan]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Renew Date',
                        onAction: function() { insertAtCursor('[renew_date]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Subscription Price',
                        onAction: function() { insertAtCursor('[subscription_price]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Account Setting Link',
                        onAction: function() { insertAtCursor('[account_link]'); }
                    },
                    {
                        type: 'menuitem',
                        text: 'Support Link',
                        onAction: function() { insertAtCursor('[support_email]'); }
                    }
                ];
            } 
            return [];
        }

        function insertAtCursor(value) {
            const editor = tinymce.activeEditor;
            editor.execCommand('mceInsertContent', false, value);
        }

        tinymce.init({
            selector: 'textarea[name="description"]',
            height: 400,
            menubar: true,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | bold italic backcolor | \
                      alignleft aligncenter alignright alignjustify | \
                      bullist numlist outdent indent | removeformat | help | customInsertButton',
            content_css: '//www.tiny.cloud/css/codepen.min.css',
            branding: false,
            setup: function(editor) {
                editor.ui.registry.addMenuButton('customInsertButton', {
                    text: 'Insert',
                    fetch: function(callback) {
                        callback(generateMenuItems(currentCondition));
                    }
                });
            }
        });
    </script>


<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#sendMailButton').on('click', function () {
            // let emailId = $(this).data('email_id'); 
            let emailId = $('input[name="email_id"]').val();

            $.ajax({
                url: "{{ route('admin.send.mail') }}", 
                type: "POST",
                data: {
                    email_id: emailId 
                },
                success: function (response) {
                    if (response.success) {
                        alert(response.message); 
                    } else {
                        alert(response.message); 
                    }
                },
                error: function () {
                    alert('Something went wrong! Please try again.');
                }
            });
        });
    });
</script>
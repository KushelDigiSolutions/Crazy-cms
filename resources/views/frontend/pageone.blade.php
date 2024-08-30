<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new project</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="{{asset('admin/customcss/project.css')}}">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
<section>
        <div id="crazy-crm-page1">
            <div class="crazy-crm-banner">
                <div class="crazy-crm-container">
                    <div class="crazy-crm-content">
                        <div class="crazy-crm-left-form">
                            <h1>Create a Website </h1>
                            <form action="{{ route('admin.createWebsite') }}" method="post">
                                @csrf
                                <div class="crazy-crm-left-form-main">
                                    <label for="name">Project Name</label>
                                    <input type="name" placeholder="Project Name" id="project_name" name="project_name">
                                    @error('project_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror 
                                </div>
                                <div class="crazy-crm-left-form-main">
                                    <label for="name">Enter full website URL</label>
                                    <input type="url" placeholder="https://www.mycrazycms.com" id="user_url" name="user_url">
                                    @error('user_url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="crazy-crm-button">
                                <button type="submit">Create Project</button>
                                </div>
                            </form>
                        </div>
                       <div class="crazy-crm-right-image">
                        <img src="{{asset('admin/img/new-project.png')}}" alt="">
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

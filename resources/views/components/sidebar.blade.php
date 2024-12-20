<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        @role('admin')
        
        <p style="color:black;  margin-top:15px; font-size:16px; margin-left:20px;">....REPORTS....</p>
          
            <li class="nav-item">
                <a href="{{ route('admin.customer') }}"
                    class="nav-link {{ Route::is('admin.customer') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Customers/Users
                        <span class="badge badge-info right">{{ $userCount }}</span>
                    </p>
                </a>
            </li>
              <li class="nav-item">
            <a href="{{ route('admin.mysites') }}"
                class="nav-link {{ Route::is('admin.mysites') ? 'active' : '' }}">
                <i class="nav-icon fas fa-server"></i>
                <p>My Sites</p>
            </a>
        </li>
        
          <li class="nav-item">
                <a href="{{ route('admin.order.index') }}"
                    class="nav-link {{ Route::is('admin.order.index') ? 'actives' : '' }}">
                    <i class="nav-icon fas fa-box"></i>
                    <p>Orders/Purchases
                        <span class="badge badge-danger right">{{ $PermissionCount }}</span>
                    </p>
                </a>
            </li>
            
             <li class="nav-item">
                <a href="{{ route('admin.blog.index') }}"
                    class="nav-link {{ Route::is('admin.blog.index') ? 'actives' : '' }}">
                    <i class="nav-icon fas fa-box"></i>
                    <p>Knowledge Base
                        <span class="badge badge-danger right">{{ $PermissionCount }}</span>
                    </p>
                </a>
            </li>
            
            
            <!-- Dileep Code added here 16-12-2024 -->
            
             <li class="nav-item">
                <a href="{{ route('admin.blogcategory.index') }}"
                    class="nav-link {{ Route::is('admin.blog.index') ? 'actives' : '' }}">
                    <i class="fa fa-graduation-cap"></i>
                    <p>Knowledge category
                        <span class="badge badge-danger right">{{ $PermissionCount }}</span>
                    </p>
                </a>
            </li>
            
            

            <li class="nav-item">
                <a href="{{ route('admin.enquiry.index') }}"
                    class="nav-link {{ Route::is('admin.enquiry.index') ? 'actives' : '' }}">
                    <i class="nav-icon fas fa-search"></i>
                    <p>Preview Searches
                        <span class="badge badge-danger right">{{ $PermissionCount }}</span>
                    </p>
                </a>
            </li>
            
             <p style="color:black;  margin-top:15px; font-size:16px; margin-left:20px;">....MAINTENANCE....</p>
            
            <li class="nav-item">
                <a href="{{ route('admin.subscription.index') }}"
                    class="nav-link {{ Route::is('admin.subscription.index') ? 'actives' : '' }}">
                    <i class="nav-icon fas fa-handshake"></i>
                    <p>Subscription 
                        <span class="badge badge-danger right">{{ $PermissionCount }}</span>
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.user.index') }}"
                    class="nav-link {{ Route::is('admin.user.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Users
                        <span class="badge badge-info right">{{ $userCount }}</span>
                    </p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('admin.role.index') }}"
                    class="nav-link {{ Route::is('admin.role.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-tag"></i>
                    <p>Role
                        <span class="badge badge-success right">{{ $RoleCount }}</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.permission.index') }}"
                    class="nav-link {{ Route::is('admin.permission.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-hat-cowboy"></i>
                    <p>Permission
                        <span class="badge badge-danger right">{{ $PermissionCount }}</span>
                    </p>
                </a>
            </li>
             <li class="nav-item">
             <a href="{{ route('admin.whiteboard.edit') }}" class="nav-link {{ Route::is('admin.whiteboard.edit') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-hat-cowboy"></i>
                    <p>White Board
                        <span class="badge badge-danger right">{{ $PermissionCount }}</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.email.index') }}"
                    class="nav-link {{ Route::is('admin.email.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-hat-cowboy"></i>
                    <p>Email
                        <span class="badge badge-danger right">{{ $PermissionCount }}</span>
                    </p>
                </a>
            </li>
            
            
           <!--  <li class="nav-item">
                <a href="{{ route('admin.category.index') }}"
                    class="nav-link {{ Route::is('admin.category.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>Category
                        <span class="badge badge-warning right">{{ $CategoryCount }}</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.subcategory.index') }}"
                    class="nav-link {{ Route::is('admin.subcategory.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>Sub Category
                        <span class="badge badge-secondary right">{{ $SubCategoryCount }}</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.collection.index') }}"
                    class="nav-link {{ Route::is('admin.collection.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file-pdf"></i>
                    <p>Collection
                        <span class="badge badge-primary right">{{ $CollectionCount }}</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.product.index') }}"
                    class="nav-link {{ Route::is('admin.product.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Products
                        <span class="badge badge-warning right">{{ $ProductCount }}</span>
                    </p>
                </a>
            </li> -->
        @endrole

      
        <li class="nav-item">
            <a href="{{ route('admin.profile.edit') }}"
                class="nav-link {{ Route::is('admin.profile.edit') ? 'active' : '' }}">
                <i class="nav-icon fas fa-id-card"></i>
                <p>Profile</p>
            </a>
        </li>
        @if(!auth()->user()->hasRole('admin'))
         <li class="nav-item">
            <a href="{{ route('admin.mysites') }}"
                class="nav-link {{ Route::is('admin.mysites') ? 'active' : '' }}">
                <i class="nav-icon fas fa-server"></i>
                <p>My Sites</p>
            </a>
        </li>
         <li class="nav-item">
            <a href="{{ route('admin.referal.edit') }}"
                class="nav-link {{ Route::is('admin.referal.edit') ? 'active' : '' }}">
                <i class="nav-icon fas fa-id-card"></i>
                <p>Referal Program</p>
            </a>
        </li>
        @endif
        @role('admin')
        <li class="nav-item">
            <a href="{{ route('admin.setting.edit') }}" class="nav-link {{ Route::is('admin.setting.edit') ? 'active' : '' }}">
            <i class="nav-icon fas fa-wrench"></i>
                <p>Settings</p>
            </a>
        </li>
        
        @endrole
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<li class="nav-item">
    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="nav-icon fas fa-sign-out-alt"></i> <!-- Changed the icon for better representation -->
        <p>Logout</p>
    </a>
</li>
    </ul>
</nav>

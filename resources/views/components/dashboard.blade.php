
<div class="row mik">
    @role('admin')
    <div class="sameing1">
          <div class="select_week">
              <select class="select_this" name="" id="">
              <option>This Day</option>
                 <option>This week</option>
                 <option>This Year</option>
              </select>
          </div>
        <div class="sameing mt-4">
        <div class="col-lg-3 col-6">
          <div class="small-box  bg_int">
                <div class="inner int">
                <img src="{{asset('admin/img/usin.svg')}}" alt="">
                <p>Total Users</p>
                <h3>{{ $user }}</h3>
                </div>
                <!-- <div class="icon">
                    <i class="fa fa-users"></i>
                </div> -->
                <!-- <a href="{{ route('admin.user.index') }}" class="small-box-footer">View <i
                        class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success bg_int bg_int1">
                <div class="inner int">
                <img src="{{asset('admin/img/sipup.svg')}}" alt="">
                    <p>Standard Plan Users</p>
                    <h3>{{ $category }}</h3>
                </div>
                <!-- <div class="icon">
                    <i class="fas fa-list-alt"></i>
                </div> -->
                <!-- <a href="{{ route('admin.category.index') }}" class="small-box-footer">View <i
                        class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary bg_int bg_int2">
                <div class="inner int">
                <img src="{{asset('admin/img/umi.svg')}}" alt="">
                    <p>Professional Plan Users</p>
                    <h3>{{ $product }}</h3>
                </div>
                <!-- <div class="icon">
                    <i class="fas fas fa-th"></i>
                </div> -->
                <!-- <a href="{{ route('admin.product.index') }}" class="small-box-footer">View <i
                        class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary bg_int bg_int3">
                <div class="inner int">
                <img src="{{asset('admin/img/lime.svg')}}" alt="">
                    <p>Premium Plan Users</p>
                    <h3>{{ $collection }}</h3>
                </div>
                <!-- <div class="icon">
                    <i class="fas fas fa-file-pdf"></i>
                </div> -->
                <!-- <a href="{{ route('admin.collection.index') }}" class="small-box-footer">View <i
                        class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        </div>
        </div>

        <div class="row mik1 mt-3">
            <div class="col-md-3">
                <div class="user_card">
                    <div class="new_user">
                         <h3>New User</h3>
                         <p>View All</p>
                    </div>
                    <div class="main_user_card">
                         <div class="main_card">
                            <div class="main_left">
                               <div class="main_img">
                                 <img src="{{asset('admin/img/un.svg')}}" alt="">  
                               </div>
                               <div class="main_content">
                                   <span class="sp">Smith John</span>
                                   <span class="sp1">India</span>
                               </div>
                            </div>
                            <div class="main_right">
                            <img src="{{asset('admin/img/vn.svg')}}" alt="">  
                            </div>
                         </div>
                         <div class="main_card">
                            <div class="main_left">
                               <div class="main_img">
                                 <img src="{{asset('admin/img/un.svg')}}" alt="">  
                               </div>
                               <div class="main_content">
                                   <span class="sp">Smith John</span>
                                   <span class="sp1">India</span>
                               </div>
                            </div>
                            <div class="main_right">
                            <img src="{{asset('admin/img/vn.svg')}}" alt="">  
                            </div>
                         </div>
                         <div class="main_card">
                            <div class="main_left">
                               <div class="main_img">
                                 <img src="{{asset('admin/img/un.svg')}}" alt="">  
                               </div>
                               <div class="main_content">
                                   <span class="sp">Smith John</span>
                                   <span class="sp1">India</span>
                               </div>
                            </div>
                            <div class="main_right">
                            <img src="{{asset('admin/img/vn.svg')}}" alt="">  
                            </div>
                         </div>
                         <div class="main_card">
                            <div class="main_left">
                               <div class="main_img">
                                 <img src="{{asset('admin/img/un.svg')}}" alt="">  
                               </div>
                               <div class="main_content">
                                   <span class="sp">Smith John</span>
                                   <span class="sp1">India</span>
                               </div>
                            </div>
                            <div class="main_right">
                            <img src="{{asset('admin/img/vn.svg')}}" alt="">  
                            </div>
                         </div>
                         <div class="main_card">
                            <div class="main_left">
                               <div class="main_img">
                                 <img src="{{asset('admin/img/un.svg')}}" alt="">  
                               </div>
                               <div class="main_content">
                                   <span class="sp">Smith John</span>
                                   <span class="sp1">India</span>
                               </div>
                            </div>
                            <div class="main_right">
                            <img src="{{asset('admin/img/vn.svg')}}" alt="">  
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
            
            <span class="such">
            <canvas class="take" id="myChart"></canvas>
            </span>
            
            
            </div>
        </div>
    @endrole
</div>


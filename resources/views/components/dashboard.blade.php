<link rel="stylesheet" href="{{asset('admin/customcss/style1.css')}}">
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

    <div class="row_user">
    @role('user')
    <div id="Recent_project">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 content">
                    <h1>Recent Projects</h1>
                </div>
            </div>
            <div class="row row-2">
                <div class="col-lg-4">
                    <button>
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_277_625)">
                                <path
                                    d="M15.0042 3.93224e-07C23.291 0.00187522 30.0056 6.72593 30 15.0155C29.9944 23.2966 23.26 30.0112 14.9724 30C6.69127 29.9878 -0.0131045 23.2534 1.92344e-05 14.9602C0.013143 6.70062 6.73532 -0.00187443 15.0042 3.93224e-07ZM28.4992 15.007C28.5002 7.56585 22.452 1.50455 15.0192 1.49986C7.57525 1.49517 1.50457 7.54242 1.49988 14.9686C1.49519 22.4379 7.54525 28.5011 15.0033 28.5001C22.4398 28.5001 28.4973 22.4426 28.4992 15.007Z"
                                    fill="black" />
                                <path
                                    d="M14.2534 15.7466C12.8773 15.7466 11.5537 15.7466 10.2301 15.7466C10.0585 15.7466 9.88603 15.7551 9.71542 15.741C9.2964 15.7045 9.00768 15.4082 8.99924 15.0164C8.98986 14.6077 9.28796 14.274 9.73042 14.2627C10.5103 14.243 11.2921 14.2552 12.073 14.2543C12.7751 14.2543 13.4773 14.2543 14.2544 14.2543C14.2544 14.0715 14.2544 13.9084 14.2544 13.7443C14.2544 12.4329 14.2572 11.1205 14.2544 9.80908C14.2544 9.43786 14.409 9.12758 14.7606 9.06102C14.9987 9.01603 15.3305 9.09383 15.5143 9.24569C15.6708 9.37412 15.7345 9.68534 15.7374 9.91782C15.757 11.338 15.7467 12.7582 15.7467 14.2543C15.9286 14.2543 16.0926 14.2543 16.2557 14.2543C17.5672 14.2543 18.8796 14.2571 20.191 14.2543C20.5622 14.2543 20.8725 14.408 20.9391 14.7605C20.9841 14.9986 20.9062 15.3304 20.7553 15.5142C20.6269 15.6707 20.3157 15.7345 20.0832 15.7373C18.663 15.757 17.2428 15.7466 15.7467 15.7466C15.7467 15.9294 15.7467 16.0926 15.7467 16.2557C15.7467 17.5202 15.7486 18.7857 15.7467 20.0503C15.7458 20.6549 15.4833 20.9905 15.0174 21.0008C14.5309 21.0121 14.2572 20.6699 14.2562 20.0353C14.2544 18.6311 14.2562 17.2259 14.2562 15.7457L14.2534 15.7466Z"
                                    fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_277_625">
                                    <rect width="30" height="30" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span>Add New Project</span> </button>
                </div>
                <div class="col-lg-4">
                    <div  class="card shadow-none" style="width: 18rem; margin-bottom:0rem;">
                        <div class="card-body bg-white card_sing">
                            <div class="d-flex flex-column">
                            <h5 class="card-title">Kushel Digi</h5>
                            <h6 class="card-subtitle mb-2 text-muted mt-2">1 Page</h6>
                            </div>
                            <div class="content_detail">
                                <div>
                                    <img src="{{asset('admin/img/profile.svg')}}" alt="">
                                </div>
                                <div>
                                    <h6 class="card-title">Nick</h6>
                                    <p class="card-text">Created 7 month ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 content">
                    <h1>Your Projects</h1>
                </div>
            </div>
            <div class="row row-3">
                <div class="col-lg-4">
                   
                    <div class="card shadow-none tent" style="width: 18rem;">
                        <button class="view_dot">View Details</button>
                        <div class="bs_btn">
                            <img src="{{asset('admin/img/rest1.svg')}}"  alt="">
                              <img class="dfl" src="{{asset('admin/img/rest.svg')}}"  alt="">
                        </div>
                        <img src="{{asset('admin/img/project_min.svg')}}"  class="card-img-top ekka" alt="...">
                        <div class="card-body bg-white">
                          <h5 class="card-title">Kushel Digi</h5>
                          <p class="card-text">1 Page</p>
                        </div>
                        
                     
                      </div>
                </div>

            </div>
        </div>
    </div>
    @endrole
    </div>

   
    
</div>


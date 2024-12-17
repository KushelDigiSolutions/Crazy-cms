<link rel="stylesheet" href="{{asset('admin/customcss/style1.css')}}">
<div class="row mik">
@if(Auth::user()->hasRole('admin'))
    <div class="sameing1">
        <div class="select_week">
            <select class="select_this" name="" id="">
                <option>This Day</option>
                <option>This week</option>
                <option>This Year</option>
            </select>
        </div>
        <div class="sameing mt-4">
            <!--<div class="col-lg-3 col-6">-->
            <!--    <div class="small-box bg_int">-->
            <!--        <div class="inner int">-->
            <!--            <img src="{{asset('admin/img/usin.svg')}}" alt="">-->
            <!--            <p>Total Users</p>-->
            <!--            <h3>{{ $user }}</h3>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <div class="col-lg-4 col-6">
                <div class="small-box bg-success bg_int bg_int1">
                    <div class="inner int">
                        <img src="{{asset('admin/img/sipup.svg')}}" alt="">
                        <p>Standard Plan Users</p>
                        <h3>{{ $userStandardPlan }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="small-box bg-primary bg_int bg_int2">
                    <div class="inner int">
                        <img src="{{asset('admin/img/umi.svg')}}" alt="">
                        <p>Professional Plan Users</p>
                        <h3>{{ $userProfessionPlan }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="small-box bg-secondary bg_int bg_int3">
                    <div class="inner int">
                        <img src="{{asset('admin/img/lime.svg')}}" alt="">
                        <p>Premium Plan Users</p>
                        <h3>{{ $userPrimiumPlan }}</h3>
                    </div>
                </div>
            </div>
              <div class="col-lg-4 col-6">
                <div class="small-box bg_int">
                    <div class="inner int">
                        <img src="{{asset('admin/img/usin.svg')}}" alt="">
                        <p>Total Users</p>
                        <h3>{{ $user }}</h3>
                    </div>
                </div>
            </div>
             <div class="col-lg-4 col-6">
                <div class="small-box bg_int">
                    <div class="inner int">
                        <img src="{{asset('admin/img/usin.svg')}}" alt="">
                        <p>Preview Searches</p>
                        <h3>{{ $user }}</h3>
                    </div>
                </div>
            </div>
             <div class="col-lg-4 col-6">
                <div class="small-box bg_int">
                    <div class="inner int">
                        <img src="{{asset('admin/img/usin.svg')}}" alt="">
                        <p>Website Updates</p>
                        <h3>{{ $user }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mik1 mt-3">
        <div class="col-md-3">
            <div class="user_card">
                <div class="new_user">
                    <h3>Online Users</h3>
                  <a href="/admin/user"><p>View All</p></a> 
                </div>
                <div class="main_user_card">
                    @foreach($userlatest as $user)
                        <div class="main_card">
                            <div class="main_left">
                                <div class="main_img">
                                    <img src="{{asset('admin/img/un.svg')}}" alt="">
                                </div>
                                <div class="main_content">
                                    <span class="sp">{{ $user->name }}</span>
                                    <span class="sp1">{{ $user->email }}</span>
                                </div>
                            </div>
                            <div class="main_right">
                                <img src="{{asset('admin/img/vn.svg')}}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <span class="such">
                <canvas class="take" id="myChart"></canvas>
            </span>
        </div>
    </div>
@else
<div class="sameing1">
    <div class="select_week">
        <select class="select_this" name="" id="">
                <option>This Day</option>
                <option>This week</option>
                <option>This Year</option>
            </select>
        </div>
       
        <div class="sameing mt-4">
            <div class="col-lg-4 col-8">
            <a href="{{ route('admin.mysites') }}" >
            <div class="small-box bg_int">
                    <div class="inner int">
                        <img src="{{asset('admin/img/usin.svg')}}" alt="">
                        <p>Total Sites</p>
                        <h3>{{ $totalSites }}</h3>
                    </div>
                </div>
</a>
            </div>
            <div class="col-lg-4 col-8">
                <div class="small-box bg-success bg_int bg_int1">
                    <div class="inner int">
                        <img src="{{asset('admin/img/sipup.svg')}}" alt="">
                        <p>Subscription Start Date</p>
                        <!-- <h3>{{ $startDate }}</h3> -->
                        <h3>{{ $startDate }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-8">
                <div class="small-box bg-primary bg_int bg_int2">
                    <div class="inner int">
                        <img src="{{asset('admin/img/umi.svg')}}" alt="">
                        <p>Subscription End Date</p>
                        <h3>{{ $startDateMinus30Days }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <div class="whiteBoard mt-5">
         <h2 class="mt-4"  style="color:black !important;">WhiteBoard</h2>
         <div style="max-width:500px; width:100%; border:1px solid gray; border-radius:10px; padding:20px;" class="whiteBoard_box">
             <p style="color:black;">
                @if(!empty($whiteBoard))
                    {{$whiteBoard}}
                @else
                    No New Information
                @endif
            </p>
         </div>
    </div>
@endif
</div>
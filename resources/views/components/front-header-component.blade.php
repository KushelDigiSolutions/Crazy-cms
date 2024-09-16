<section id="navbar">

<div class="navCont">


  <nav class="navSome">

    <img class="navbarImg" src="{{asset('admin/img/summer.svg')}}" alt="">


    <input type="checkbox" id="sidebar-active" />



    <label for="sidebar-active" class="open-sidebar-button">
      <svg xmlns="http://www.w3.org/2000/svg" height="32" viewBox="0 -960 960 960" width="32">
        <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
      </svg>
    </label>


    <div class="links-container">

      <label for="sidebar-active" class="close-sidebar-button">
        <svg xmlns="http://www.w3.org/2000/svg" height="32" viewBox="0 -960 960 960" width="32">
          <path
            d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
        </svg>
      </label>

   <a class="ekaa" href="{{url('/')}}"><img class="home-link" src="{{asset('admin/img/summer.svg')}}" alt=""></a>
      <!-- link back to homepage -->
      <a href="{{url('/features')}}" class="navSinItem">Features</a>
      <a  href="{{url('/pricing')}}" class="navSinItem">Pricing</a>
      <!-- <a href="#" class="navSinItem">Offers</a>
      <a href="#"> <button class="navSinBtn"><span>CONTACT</span></button></a> -->
      <!--<a href="{{url('/login')}}"> <button class="navSinBtn"><span>SIGN IN</span></button></a>-->
      
      @if (Auth::check())
    <div class="navUserDropdown">
        <a href="{{ url('admin/dashboard') }}" class="navSinItem">Hello {{ Auth::user()->name }} </a>
          
                   
    </div>
@else
    <a href="{{ url('/login') }}">
        <button class="navSinBtn"><span>SIGN IN</span></button>
    </a>
@endif

    </div>

  </nav>

</div>


</section>
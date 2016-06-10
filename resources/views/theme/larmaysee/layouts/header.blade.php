<header>
    <nav>
    <!-- nav box -->
        <div class="col-md-12 nav_box">
            <div class="col-md-1"></div>
            <div class="col-md-9 navs ">
                <div class="col-md-12">
                  
                <ul class="nav nav-pills custom_nav">
                  <!-- <li id="home"><a id="menu_index" href="javascript:" onclick="SwitchSport('in');"><img width="24" height="22" src="assets/img/home_icon.png"></a></li> -->
                   <li><a id="menu_sport" href="{{url('/') }}">HOME</a></li>
                   @foreach ($menus as $menu)
                    <li><a id="menu_sport" href="{{url('/'.$menu->post_link) }}">{{ $menu->title }}</a></li>  
                  @endforeach
                  <!--  <li><a id="menu_casino" href="{{url('/catalog')}}">CATALOG</a></li>
                   <li><a id="menu_keno" href="{{url('/activities')}}">ACTIVITY</a></li>
                   <li><a id="menu_keno" href="{{url('/question+and+answer')}}">Q&A</a></li>
                   <li><a id="menu_promo" href="{{url('/guide')}}">GUIDE</a></li> -->
                   
                </ul>
                </div>
            </div>
            <div class="col-md-2">
                             
            </div>
        </div>
        <!-- nav box end -->
</nav>
    
</header>

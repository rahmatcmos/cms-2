<header>
    <nav>
    <!-- nav box -->
        <div class="col-md-12 nav_box">
            <div class="col-md-1"></div>
            <div class="col-md-9 navs ">
            
                <div class="col-md-12">
                          
                   <nav class="navbar navbar-default">
                        <div class="container-fluid">
                          <div class="navbar-header">
                            <a class="navbar-brand" href="#"></a>
                          </div>
                          <ul class="nav navbar-nav">
                            <li><a id="menu_sport" href="{{url('/') }}">HOME</a></li>
                              @foreach ($menus as $menu)
                                <li><a id="menu_sport" href="{{url('/'.$menu->post_link) }}">{{ $menu->title }}</a></li>  
                              @endforeach
                       
                          </ul>
                        </div>
                      </nav>



                </div>

            </div>
            <div class="col-md-2">
                             
            </div>
        </div>
        <!-- nav box end -->
</nav>
    
</header>

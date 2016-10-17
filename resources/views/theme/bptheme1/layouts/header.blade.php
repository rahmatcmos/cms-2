<header>
    <nav>
    <!-- nav box -->
        <div class="col-md-12 nav_box">
            <div class="col-md-1"></div>
            <div class="col-md-10 navs ">
                <div class="col-md-12">
                  <br>
                  
                <ul class="nav nav-pills">
                   <li><a id="menu_home" href="{{url('/') }}">HOME</a></li>
                   @foreach ($menus as $menu)
                       @if(sizeof($menu->children)>0) 
                             <li class = "dropdown">
                                    <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
                                       {{ $menu->menu_name }}
                                       <b class = "caret"></b>
                                    </a>
                                    <ul class = "dropdown-menu">
                                      @foreach ($menu->children as $sub)
                                        <li>  
                                          <a href = "{{url('/'.$sub->menu_link) }}">
                                          {{ $sub->menu_name }}</a>
                                        </li>
                                       @endforeach
                                    </ul>
                              </li>      
                        @else
                    <li><a href="{{url('/'.$menu->menu_link) }}">{{ $menu->menu_name }}</a></li>  
                        @endif
                    @endforeach
                </ul>
                </div>
            </div>
            <div class="col-md-1">
                             
            </div>
        </div>
        <!-- nav box end -->
</nav>
    
</header>

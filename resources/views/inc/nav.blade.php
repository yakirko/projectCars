<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" style="color:aqua; size:50px" href="{{ url('/')}}">Cars</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('about')}}">
          <i class="fa fa-envelope-o">
            <span class="badge badge-danger"></span>
          </i>
          About
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('content')}}">
          <i class="fa fa-envelope-o">
            <span class="badge badge-warning"></span>
          </i>
          Contact
        </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ url('shop/categories')}}">
            <i class="fa fa-envelope-o">
              <span class="badge badge-info"></span>
            </i>
            Shop
          </a>
        </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="{{ url('services')}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-envelope-o">
            <span class="badge badge-primary"></span>
          </i>
          Services
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ url('shop/oils')}}">Oils</a>
          <a class="dropdown-item" href="{{ url('shop/tiers')}}">Tiers</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ url('shop/tools')}}">Car-Work Tools</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav navbar-right">
      {{-- <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-bell">
            <span class="badge badge-info">11</span>
          </i>
          Test
        </a>
      </li> --}}

      @if (Session::has('user_id'))


      <li class="nav-item">
         <a class="" href="{{ url('shop/checkout') }}">
          @if( ! Cart::isEmpty() )
            <div class="badge badge-success">{{ Cart::getTotalQuantity() }}</div>
          @endif
          <i class="glyphicon glyphicon-shopping-cart">Amount Of Items</i>
         </a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ url('user/profile') }}">{{ Session::get('user_name') }}</a>
        </li>
             @if ( Session::has('is_admin'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('cms/dashboard') }}">CMS</a>
                </li>
             @endif
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('user/logout') }}">Logout</a>
               </li>
       @else
             <li class="nav-item">
                 <a class="nav-link" href="{{ url('user/signin') }}">Sign In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('user/signup') }}">Sign up</a>
           </li>
      @endif



    {{-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" autocomplete="on">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> --}}
    </ul>
    </form>
  </div>
</nav>

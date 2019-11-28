<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset( 'lib/bootstrap.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/examples/dashboard/dashboard.css">
    <link rel="stylesheet" href="{{ asset('lib/all.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>British cars | Admin Panel</title>
    <script> var BASE_URL = "{{ url('') }}/"; </script>
  </head>
  <body>

      <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('cms/dashboard') }}">Admin <i class="fas fa-car"></i> British cars Panel</a>
          <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
              <a class="nav-link" href="{{ url('user/logout') }}">Sign out</a>
            </li>
          </ul>
        </nav>
    
        <div class="container-fluid">
          <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
              <div class="sidebar-sticky">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('') }}" target="_blank">Customer Site</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('cms/dashboard') }}">Dashboard</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ url('cms/menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('cms/content') }}">Content</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ url('cms/categories') }}">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('cms/products') }}">Products</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ url('cms/orders') }}">Orders</a>
                            </li>                          
                </ul>

              </div>
            </nav>
    
@yield('main_content')
          </div>
        </div>
    <script src="{{ asset('lib/jquery.min.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('lib/popper.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <script>
      $('#article').summernote({
        height: 300
      });
    </script>
  </body>
</html>
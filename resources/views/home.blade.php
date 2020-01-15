
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Vue App</title>

  <link rel="stylesheet" href="{{mix('css/app.css')}}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>


  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt blue"></i>
                <p>
                Dashboard

                </p>
            </router-link>
            </li>
             <li class="nav-item">
            <router-link to="/category" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt blue"></i>
                <p>
                
                Category

                </p>
            </router-link>
            </li>
        </ul>
      </nav>
    </div>
  </aside>

<br>

  <div class="content-wrapper">
    <div class="content">

     <router-view></router-view>

    </div>
  </div>

 
</div>


<script src="{{ mix('js/app.js') }}"></script>

</body>
</html>

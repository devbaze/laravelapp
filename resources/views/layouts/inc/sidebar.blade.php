<div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
      <a href={!! url('/dashboard') !!} class="simple-text logo-normal">
        Admin panel
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
          <a class="nav-link" href="{!! url('/dashboard') !!}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('adminkategorije') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('adminkategorije') }}">
            <i class="material-icons">person</i>
            <p>Kategorije</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('dodaj-kategoriju') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('dodaj-kategoriju') }}">
            <i class="material-icons">person</i>
            <p>Dodaj kategoriju</p>
          </a>
        </li>

        <li class="nav-item {{ Request::is('adminfilmovi') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('adminfilmovi') }}">
            <i class="material-icons">person</i>
            <p>Filmovi</p>
          </a>
        </li>

        <li class="nav-item {{ Request::is('dodaj-film') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('dodaj-film') }}">
            <i class="material-icons">person</i>
            <p>Dodaj film</p>
          </a>
        </li>

        <li class="nav-item {{ Request::is('products') ? 'active' : '' }}">
          <a class="nav-link" href="./tables.html">
            <i class="material-icons">content_paste</i>
            <p>Table List</p>
          </a>
        </li>

      </ul>
    </div>
  </div>
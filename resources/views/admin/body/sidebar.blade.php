<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
      <!-- Aplication Brand -->
      <div class="app-brand">
        <a href="{{ route('home') }}">
          <svg
            class="brand-icon"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="xMidYMid"
            width="30"
            height="33"
            viewBox="0 0 30 33"
          >
            <g fill="none" fill-rule="evenodd">
              <path
                class="logo-fill-blue"
                fill="#7DBCFF"
                d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
              />
              <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
            </g>
          </svg>
          <span class="brand-name">Admin Dashboard</span>
        </a>
      </div>
      <!-- begin sidebar scrollbar -->
      <div class="sidebar-scrollbar">

        <!-- sidebar menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">

            <li  class="has-sub active expand" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                aria-expanded="false" aria-controls="dashboard">
                <i class="mdi mdi-view-dashboard-outline"></i>
                <span class="nav-text">Dashboard</span> <b class="caret"></b>
              </a>
              <ul  class="collapse show"  id="dashboard"
                data-parent="#sidebar-menu">
                <div class="sub-menu">

                      <li  class="active" >
                        <a class="sidenav-item-link" href="index.html">
                          <span class="nav-text">Portfolio</span>

                        </a>
                      </li>


                      <li  class="active" >
                        <a class="sidenav-item-link" href="{{ route('category.all') }}">
                          <span class="nav-text">Category</span>

                        </a>
                      </li>

                </div>
              </ul>
            </li>

            <li  class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ui-elements"
                aria-expanded="false" aria-controls="ui-elements">
                <i class="mdi mdi-home"></i>
                <span class="nav-text">Home Page</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="ui-elements"
                data-parent="#sidebar-menu">
                <div class="sub-menu">

                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#components"
                      aria-expanded="false" aria-controls="components">
                      <span class="nav-text">Slider</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="components">
                      <div class="sub-menu">

                        <li class="{{ Request::routeIs('slider.index') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="{{ route('slider.index') }}">
                                <span class="nav-text">All Sliders</span>
                            </a>
                        </li>

                        <li class="{{ Request::routeIs('slider.add') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="{{ route('slider.add') }}">
                                <span class="nav-text">Add Slider</span>
                            </a>
                        </li>
                      </div>
                    </ul>
                    </li>
                    <li class="{{ Request::routeIs('about.index') ? 'active' : '' }}">
                        <a class="sidenav-item-link" href="{{ route('about.index') }}">
                            <span class="nav-text">About</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('services.index') ? 'active' : '' }}">
                        <a class="sidenav-item-link" href="{{ route('services.index') }}">
                            <span class="nav-text">Services</span>
                        </a>
                    </li>

                    <li  class="has-sub" {{ Request::routeIs('services.index') ? 'active' : '' }}>
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#services"
                          aria-expanded="false" aria-controls="services">
                          <span class="nav-text">Services</span> <b class="caret"></b>
                        </a>
                        <ul  class="collapse"  id="services">
                          <div class="sub-menu">

                            <li class="{{ Request::routeIs('services.index') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('services.index') }}">
                                    <span class="nav-text">All Services</span>
                                </a>
                            </li>

                            <li class="{{ Request::routeIs('service.add.view') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('service.add.view') }}">
                                    <span class="nav-text">Add Service</span>
                                </a>
                            </li>
                          </div>
                        </ul>
                        </li>

                        <li  class="{{ Request::routeIs('category.all') ? 'active' : '' }}" >
                            <a class="sidenav-item-link" href="{{ route('category.all') }}">
                              <span class="nav-text">Category</span>
                            </a>
                        </li>

                        <li  class="has-sub" >
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#portfolios"
                              aria-expanded="false" aria-controls="portfolios">
                              <span class="nav-text">Portfolios</span> <b class="caret"></b>
                            </a>
                            <ul  class="collapse"  id="portfolios">
                              <div class="sub-menu">

                                <li class="{{ Request::routeIs('portfolios.index') ? 'active' : '' }}">
                                    <a class="sidenav-item-link" href="{{ route('portfolios.index') }}">
                                        <span class="nav-text">View Portfolios</span>
                                    </a>
                                </li>

                                <li class="{{ Request::routeIs('portfolios.add.view') ? 'active' : '' }}">
                                    <a class="sidenav-item-link" href="{{ route('portfolios.add.view') }}">
                                        <span class="nav-text">Add Portfolios</span>
                                    </a>
                                </li>
                              </div>
                            </ul>
                            </li>

                    <li  class="{{ Request::routeIs('brands.all') ? 'active' : '' }}" >
                        <a class="sidenav-item-link" href="{{ route('brands.all') }}">
                          <span class="nav-text">Brand</span>
                        </a>
                    </li>

                </div>
              </ul>
            </li>

            <li class="{{ Request::routeIs('contact.messages') ? 'active' : '' }}" >
              <a class="sidenav-item-link" href="{{ route('contact.messages') }}" >
                <i class="mdi mdi-chart-pie"></i>
                <span class="nav-text">Messages</span>
              </a>
            </li>
            <li class="{{ Request::routeIs('contact.info.view') ? 'active' : '' }}" >
                <a class="sidenav-item-link" href="{{ route('contact.info.view') }}" >
                  <i class="mdi mdi-contact-mail"></i>
                  <span class="nav-text">Contact Info</span>
                </a>
            </li>
            <li class="{{ Request::routeIs('dashboard.social.link') ? 'active' : '' }}" >
                <a class="sidenav-item-link" href="{{ route('dashboard.social.link') }}" >
                  <i class="mdi mdi-contact-mail"></i>
                  <span class="nav-text">Social Link</span>
                </a>
            </li>

        </ul>

      </div>

      <hr class="separator" />

      <div class="sidebar-footer">
        <div class="sidebar-footer-content">
          <h6>
            Software Version: 1.0
          </h6>
        </div>
      </div>

    </div>
  </aside>

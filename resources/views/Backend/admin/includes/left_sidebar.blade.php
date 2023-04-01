<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo" align="center">
              <a href="{{url('admin/dashboard')}}" class="app-brand-link">
                <img src="{{ url('storage/uploads/Gallery/'.session()->get('app_logo')) }}" width="100"> 
              </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
              <li class="menu-item {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                <a href="{{url('admin/dashboard')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Dashboard</div>
                </a>
              </li>
              <!-- User -->
              <li class="menu-item {{ (request()->is('admin/*user*')) ? 'active' : '' }}">
                <a href="{{url('admin/all-user')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-user"></i>
                  <div data-i18n="Analytics">User</div>
                </a>
              </li>
              <!-- Speaker -->
              <li class="menu-item {{ (request()->is('admin/*speaker*')) ? 'active' : '' }}">
                <a href="{{url('admin/all-speaker')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-user"></i>
                  <div data-i18n="Analytics">Speaker</div>
                </a>
              </li>
              <!-- Leader -->
              <li class="menu-item {{ (request()->is('admin/*leader*')) ? 'active' : '' }}">
                <a href="{{url('admin/all-leader')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-user"></i>
                  <div data-i18n="Analytics">Leader</div>
                </a>
              </li>
              <!-- Agenda -->
              <li class="menu-item {{ (request()->is('admin/*agenda*')) ? 'active' : '' }}">
                <a href="{{url('admin/all-agenda')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-purchase-tag-alt"></i>
                  <div data-i18n="Analytics">Agenda</div>
                </a>
              </li>
              <!-- Gallery -->
              <li class="menu-item {{ (request()->is('admin/*gallery*')) ? 'active' : '' }}">
                <a href="{{url('admin/all-gallery')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-images"></i>
                  <div data-i18n="Analytics">Gallery</div>
                </a>
              </li>
              <!-- Video -->
              <li class="menu-item {{ (request()->is('admin/*video*')) ? 'active' : '' }}">
                <a href="{{url('admin/all-video')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-video"></i>
                  <div data-i18n="Analytics">Video</div>
                </a>
              </li>
              <!-- About -->
              <li class="menu-item {{ (request()->is('admin/*about*')) ? 'active' : '' }}">
                <a href="{{url('admin/about')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-purchase-tag-alt"></i>
                  <div data-i18n="Analytics">About</div>
                </a>
              </li>
              <!-- Accomodation -->
              <li class="menu-item {{ (request()->is('admin/*accomodation*')) ? 'active' : '' }}">
                <a href="{{url('admin/all-accomodation')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-hotel"></i>
                  <div data-i18n="Analytics">Stay</div>
                </a>
              </li>
              <!-- Minute -->
              <li class="menu-item {{ (request()->is('admin/*minute*')) ? 'active' : '' }}">
                <a href="{{url('admin/minute')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-purchase-tag-alt"></i>
                  <div data-i18n="Analytics">Minute</div>
                </a>
              </li>
              <!-- Activity -->
              <li class="menu-item {{ (request()->is('admin/*activity*')) ? 'active' : '' }}">
                <a href="{{url('admin/all-activity')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-purchase-tag-alt"></i>
                  <div data-i18n="Analytics">Activity</div>
                </a>
              </li>
              <!-- Deligate -->
              <li class="menu-item {{ (request()->is('admin/*deligate*')) ? 'active' : '' }}">
                <a href="{{url('admin/all-deligate')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-purchase-tag-alt"></i>
                  <div data-i18n="Analytics">Delegate</div>
                </a>
              </li>
              <!-- EInvite -->
              <li class="menu-item {{ (request()->is('admin/*einvite*')) ? 'active' : '' }}">
                <a href="{{url('admin/all-einvite')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-card"></i>
                  <div data-i18n="Analytics">e-invite</div>
                </a>
              </li>
              <!-- EInvite -->
              <li class="menu-item {{ (request()->is('admin/*all-happy*')) ? 'active' : '' }}">
                <a href="{{url('admin/all-happy')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-help-circle"></i>
                  <div data-i18n="Analytics">Happy To Help</div>
                </a>
              </li>
               <!-- Account -->
              <li class="menu-item {{ (request()->is('admin/*feedback*')) ? 'active' : '' }}">
                <a href="{{url('admin/all-feedback')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-purchase-tag-alt"></i>
                  <div data-i18n="Analytics">Feedback</div>
                </a>
              </li>
              <!-- Account -->
              <li class="menu-item {{ (request()->is('admin/*account*')) ? 'active' : '' }}">
                <a href="{{url('admin/account')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-user-circle"></i>
                  <div data-i18n="Analytics">Account</div>
                </a>
              </li>
          </ul>

        </aside>
        <!-- / Menu -->
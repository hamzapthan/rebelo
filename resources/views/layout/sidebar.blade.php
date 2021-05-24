<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      O<span>z</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
     
      <li class="nav-item  {{  request()->routeIs('/') ? 'active' : '' }}">
      
      <li class="nav-item {{  request()->routeIs('/') ? 'active' : '' }}">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">web apps</li>
      <li class="nav-item {{  request()->routeIs('email/*') ? 'active' : '' }}">
      
        <a class="nav-link" data-toggle="collapse" href="#email" role="button" aria-expanded="{{  request()->routeIs('email/*') ? 'active' : '' }}" aria-controls="email">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">Email</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{  request()->routeIs('email/*') ? 'active' : '' }}" id="email">
          <ul class="nav sub-menu">
            <li class="nav-item">
            <a href="{{ url('/email/inbox') }}" class="nav-link {{  request()->routeIs('email/inbox') ? 'active' : '' }}">Inbox</a>
            </li>
            <li class="nav-item">
            <a href="{{ url('/email/read') }}" class="nav-link {{  request()->routeIs('email/read') ? 'active' : '' }}">Read</a>
           
            </li>
            <li class="nav-item">
            <a href="{{ url('/email/compose') }}" class="nav-link {{  request()->routeIs('email/compose') ? 'active' : '' }}">Compose</a>
            
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{  request()->routeIs('apps/chat') ? 'active' : '' }}">
        <a href="{{ url('/apps/chat') }}" class="nav-link">
          <i class="link-icon" data-feather="message-square"></i>
          <span class="link-title">Chat</span>
        </a>
      </li>
      <li class="nav-item {{  request()->routeIs('apps/calendar') ? 'active' : '' }}">
        <a href="{{ url('/apps/calendar') }}" class="nav-link">
          <i class="link-icon" data-feather="calendar"></i>
          <span class="link-title">Calendar</span>
        </a>
      </li>
      <li class="nav-item nav-category">Components</li>
      <li class="nav-item {{  request()->routeIs('ui-components/*') ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#uiComponents" role="button" aria-expanded="{{  request()->routeIs('ui-components/*') ? 'active' : '' }}" aria-controls="uiComponents">
          <i class="link-icon" data-feather="feather"></i>
          <span class="link-title">UI Kit</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{  request()->routeIs('ui-components/*') ? 'active' : '' }}" id="uiComponents">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('/ui-components/alerts') }}" class="nav-link {{  request()->routeIs('ui-components/alerts') ? 'active' : '' }}">Alerts</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/badges') }}" class="nav-link {{  request()->routeIs('ui-components/badges') ? 'active' : '' }}">Badges</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/breadcrumbs') }}" class="nav-link {{  request()->routeIs('ui-components/') ? 'active' : '' }}">Breadcrumbs</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/buttons') }}" class="nav-link {{  request()->routeIs('ui-components/buttons') ? 'active' : '' }}">Buttons</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/button-group') }}" class="nav-link {{  request()->routeIs('ui-components/button-group') ? 'active' : '' }}">Button group</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/cards') }}" class="nav-link {{  request()->routeIs('ui-components/cards') ? 'active' : '' }}">Cards</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/carousel') }}" class="nav-link {{  request()->routeIs('ui-components/carousel') ? 'active' : '' }}">Carousel</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/collapse') }}" class="nav-link {{  request()->routeIs('ui-components/collapse') ? 'active' : '' }}">Collapse</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/dropdowns') }}" class="nav-link {{  request()->routeIs('ui-components/dropdowns') ? 'active' : '' }}">Dropdowns</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/list-group') }}" class="nav-link {{  request()->routeIs('ui-components/list-group') ? 'active' : '' }}">List group</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/media-object') }}" class="nav-link {{  request()->routeIs('ui-components/media-object') ? 'active' : '' }}">Media object</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/modal') }}" class="nav-link {{  request()->routeIs('ui-components/modal') ? 'active' : '' }}">Modal</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/navs') }}" class="nav-link {{  request()->routeIs('ui-components/navs') ? 'active' : '' }}">Navs</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/navbar') }}" class="nav-link {{  request()->routeIs('ui-components/navbar') ? 'active' : '' }}">Navbar</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/pagination') }}" class="nav-link {{  request()->routeIs('ui-components/pagination') ? 'active' : '' }}">Pagination</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/popovers') }}" class="nav-link {{  request()->routeIs('ui-components/popvers') ? 'active' : '' }}">Popvers</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/progress') }}" class="nav-link {{  request()->routeIs('ui-components/progress') ? 'active' : '' }}">Progress</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/scrollbar') }}" class="nav-link {{  request()->routeIs('ui-components/scrollbar') ? 'active' : '' }}">Scrollbar</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/scrollspy') }}" class="nav-link {{  request()->routeIs('ui-components/scrollspy') ? 'active' : '' }}">Scrollspy</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/spinners') }}" class="nav-link {{  request()->routeIs('ui-components/spinners') ? 'active' : '' }}">Spinners</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/tabs') }}" class="nav-link {{  request()->routeIs('ui-components/tabs') ? 'active' : '' }}">Tabs</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/ui-components/tooltips') }}" class="nav-link {{  request()->routeIs('ui-components/tooltips') ? 'active' : '' }}">Tooltips</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{  request()->routeIs('advanced-ui/*') ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#advanced-ui" role="button" aria-expanded="{{  request()->routeIs('advanced-ui/*') ? 'active' : '' }}" aria-controls="advanced-ui">
          <i class="link-icon" data-feather="anchor"></i>
          <span class="link-title">Advanced UI</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{  request()->routeIs('advanced-ui/*') ? 'active' : '' }}" id="advanced-ui">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('/advanced-ui/cropper') }}" class="nav-link {{  request()->routeIs('advanced-ui/cropper') ? 'active' : '' }}">Cropper</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/advanced-ui/owl-carousel') }}" class="nav-link {{  request()->routeIs('advanced-ui/owl-carousel') ? 'active' : '' }}">Owl Carousel</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/advanced-ui/sweet-alert') }}" class="nav-link {{  request()->routeIs('advanced-ui/sweet-alert') ? 'active' : '' }}">Sweet Alert</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{  request()->routeIs('forms/*') ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#forms" role="button" aria-expanded="{{  request()->routeIs('forms/*') ? 'active' : '' }}" aria-controls="forms">
          <i class="link-icon" data-feather="inbox"></i>
          <span class="link-title">Forms</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{  request()->routeIs('forms/*') ? 'active' : '' }}" id="forms">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('/forms/basic-elements') }}" class="nav-link {{  request()->routeIs('forms/basic-elements') ? 'active' : '' }}">Basic Elements</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/forms/advanced-elements') }}" class="nav-link {{  request()->routeIs('forms/advanced-elements') ? 'active' : '' }}">Advanced Elements</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/forms/editors') }}" class="nav-link {{  request()->routeIs('forms/editors') ? 'active' : '' }}">Editors</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/forms/wizard') }}" class="nav-link {{  request()->routeIs('forms/wizard') ? 'active' : '' }}">Wizard</a>
            </li>
          </ul>
        </div>
      </li>
     
      <li class="nav-item nav-category">Docs</li>
      <li class="nav-item">
        <a href="https://www.nobleui.com/laravel/documentation/docs.html" target="_blank" class="nav-link">
          <i class="link-icon" data-feather="hash"></i>
          <span class="link-title">Documentation</span>
        </a>
      </li>
    </ul>
  </div>
</nav>
<nav class="settings-sidebar">
  <div class="sidebar-body">
    <a href="#" class="settings-sidebar-toggler">
      <i data-feather="settings"></i>
    </a>
    <h6 class="text-muted">Sidebar:</h6>
    <div class="form-group border-bottom">
      <div class="form-check form-check-inline">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
          Light
        </label>
      </div>
      <div class="form-check form-check-inline">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
          Dark
        </label>
      </div>
    </div>
    <div class="theme-wrapper">
      <h6 class="text-muted mb-2">Light Version:</h6>
      <a class="theme-item active" href="https://www.nobleui.com/laravel/template/light/">
        <img src="{{ url('assets/images/screenshots/light.jpg') }}" alt="light version">
      </a>
      <h6 class="text-muted mb-2">Dark Version:</h6>
      <a class="theme-item" href="https://www.nobleui.com/laravel/template/dark">
        <img src="{{ url('assets/images/screenshots/dark.jpg') }}" alt="light version">
      </a>
    </div>
  </div>
</nav>
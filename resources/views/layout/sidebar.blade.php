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
        <a href="{{ url('/admin/dashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Web Apps</li>
     @can('user-list')
      <li class="nav-item">
      
        <a class="nav-link" data-toggle="collapse" href="#users" role="button" aria-expanded="" aria-controls="user">
        <i  class="link-icon" data-feather="user"></i>
       
          <span class="link-title">User</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
         <div class="collapse {{ show_class(['admin/users/*'])  }}" id="users">
          <ul class="nav sub-menu">
             @can('user-create')
            <li class="nav-item">
            <a href="{{ route('create.user') }}" class="nav-link {{ request()->routeIs('create.user') ? 'active' : ''  }}">Add Admin User</a>
            </li>
            @endcan
            
            @can('user-admin')
            <li class="nav-item">
            <a href="{{ route('show.user') }}" class="nav-link {{  request()->routeIs('show.user') ? 'active' : '' }}">Show Admin User</a>
            </li>
            @endcan
            @can('user-front')
            <li class="nav-item">
            <a href="{{ route('show.front.user') }}" class="nav-link {{  request()->routeIs('show.front.user') ? 'active' : '' }}">Show Frontend User</a>
            </li>
            @endcan
           </ul>
        </div>
      </li>
      @endcan

      @can('role-list')
      <li class="nav-item">
      
        <a class="nav-link" data-toggle="collapse" href="#roles" role="button" aria-expanded="" aria-controls="roles">
        <i class="link-icon" data-feather="users"></i>
          <span class="link-title">Roles</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['admin/roles/*'])  }}" id="roles">
          <ul class="nav sub-menu">
          @can('role-create')
            <li class="nav-item">
            <a href="{{ route('create.role') }}" class="nav-link {{  request()->routeIs('create.role') ? 'active' : '' }}">Add</a>
            </li>
           @endcan
           @can('role-list')
            <li class="nav-item">
            <a href="{{ route('show.role') }}" class="nav-link {{  request()->routeIs('show.role') ? 'active' : '' }}">Show</a>
            </li>
            @endcan
           </ul>
        </div>
      </li>
      @endcan

      @can('category-list')
      <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#Category" role="button" aria-expanded=""   aria-controls="email">
        <!-- <i class="link-icon" data-feather="mail"></i> -->
        <i class="link-icon" data-feather="list"></i>
        <span class="link-title">Category</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
      </a>
      <div class="collapse {{ show_class(['admin/category/*'])  }} " id="Category">
        <ul class="nav sub-menu">
        @can('category-create')
          <li class="nav-item">
          <a href="{{ route('create.cat') }}" class="nav-link {{  request()->routeIs('create.cat') ? 'active' : '' }}">Add</a>
          </li>
          @endcan
          @can('category-list')
          <li class="nav-item">
          <a href="{{ route('show.cat.all') }}" class="nav-link {{  request()->routeIs('show.cat.all') ? 'active' : '' }}">Show</a>
         </li>
          @endcan
        </ul>
      </div>
     </li>
@endcan
@can('subCat-list')
     <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#subCategory" role="button" aria-expanded="" aria-controls="email">
      <i class="link-icon" data-feather="command"></i>
        <span class="link-title">Sub Category</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
      </a>
      <div class="collapse {{ show_class(['subCategory/*'])  }}" id="subCategory">
        <ul class="nav sub-menu">
        @can('subCat-create')
          <li class="nav-item">
          <a href="{{ route('create.pro') }}" class="nav-link {{  request()->routeIs('create.pro') ? 'active' : '' }}">Add</a>
          </li>
          @endcan
          @can('subCat-list')
          <li class="nav-item">
          <a href="{{ route('show.pro.all') }}" class="nav-link {{  request()->routeIs('shoow.pro.all') ? 'active' : '' }}">Show</a>
          </li>
         @endcan
        </ul>
      </div>
     </li>
     @endcan


     @can('product-list')
     <li class="nav-item ">
      <a class="nav-link" data-toggle="collapse" href="#SubProducts" role="button" aria-expanded="{{  request()->routeIs('email/*') ? 'active' : '' }}" aria-controls="email">
        <i class="link-icon" data-feather="box"></i>
        <span class="link-title">Products</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
      </a>
      <div class="collapse {{ show_class(['admin/products/*'])  }}" id="SubProducts">
        <ul class="nav sub-menu">
        @can('product-create')
          <li class="nav-item">
          <a href="{{ route('create.subPro') }}" class="nav-link {{  request()->routeIs('create.subPro') ? 'active' : '' }}">Add</a>
          </li>
          @endcan
          @can('product-list')
          <li class="nav-item">
          <a href="{{ route('show.subPro.all') }}" class="nav-link {{  request()->routeIs('show.subPro.all') ? 'active' : '' }}">Show</a>
          </li>
          @endcan
        </ul>
      </div>
     </li>
     @endcan

     <!-- @can('storage-create')
     <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#Storage" role="button" aria-expanded="{{  request()->routeIs('email/*') ? 'active' : '' }}" aria-controls="email">
        <i class="link-icon" data-feather="mail"></i>
        <span class="link-title">Storage</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
      </a>
      <div class="collapse {{  show_class(['admin/storages/*'])  }}" id="Storage">
        <ul class="nav sub-menu">
         @can('storage-create')
          <li class="nav-item">
          <a href="{{ route('create.storage') }}" class="nav-link {{  request()->routeIs('create.storage') ? 'active' : '' }}">Add</a>
          </li>
          @endcan
         </ul>
      </div>
     </li>
     @endcan -->
   @can('order-list')
    <li class="nav-item {{  request()->routeIs('email/*') ? 'active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#Orders" role="button" aria-expanded="{{  request()->routeIs('email/*') ? 'active' : '' }}" aria-controls="email">
      <i class="link-icon" data-feather="shopping-cart"></i>
        <span class="link-title">Orders</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
      </a>
      <div class="collapse {{ show_class(['admin/orders/*'])  }}" id="Orders">
        <ul class="nav sub-menu">
         @can('order-list')
          <li class="nav-item">
          <a href="{{ route('order.show.all') }}" class="nav-link {{  request()->routeIs('order.show.all') ? 'active' : '' }}">Pending Order</a>
          </li>
          @endcan
          @can('order-list')
          <li class="nav-item">
          <a href="{{ route('order.show.deliver') }}" class="nav-link {{  request()->routeIs('order.show.deliver') ? 'active' : '' }}">Delivered Order</a>
         </li>
          @endcan  
          @can('order-cancel')
          <li class="nav-item">
          <a href="{{ route('order.show.cancel') }}" class="nav-link {{  request()->routeIs('order.show.cancel') ? 'active' : '' }}">Cancel Order</a>
         </li>
          @endcan         
        </ul>
      </div>
     </li>
     @endcan
     @can('payment-list')
     <li class="nav-item {{  request()->routeIs('email/*') ? 'active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#Payments" role="button" aria-expanded="{{  request()->routeIs('email/*') ? 'active' : '' }}" aria-controls="email">
      <i class="link-icon" data-feather="dollar-sign"></i>
        <span class="link-title">Payments</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
      </a>
      <div class="collapse {{ show_class(['payments/*'])  }}" id="Payments">
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
     @endcan
     @can('sellingPro-list')
     <li class="nav-item {{  request()->routeIs('email/*') ? 'active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#SellingProducts" role="button" aria-expanded="{{  request()->routeIs('email/*') ? 'active' : '' }}" aria-controls="email">
        <i class="link-icon" data-feather="zap"></i>
        <span class="link-title">Selling Products</span></span>
        <i class="link-arrow" data-feather="chevron-down"></i>
      </a>
      <div class="collapse {{ show_class(['admin/sell/*'])  }}" id="SellingProducts">
        <ul class="nav sub-menu">
        @can('sellingPro-list')
          <li class="nav-item">
          <a href="{{ route('sell.pro') }}" class="nav-link {{  request()->routeIs('sell.pro') ? 'active' : '' }}">Show</a>
          </li>
          @endcan
          @can('sellingPro-delete')
          <li class="nav-item">
          <a href="{{ route('sell.pro') }}" class="nav-link {{  request()->routeIs('sell.pro') ? 'active' : '' }}">()()()()delete)</a>
          </li>
          @endcan
         @endcan
     <li class="nav-item {{  request()->routeIs('email/*') ? 'active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#SellingProducts" role="button" aria-expanded="{{  request()->routeIs('email/*') ? 'active' : '' }}" aria-controls="email">
        <i class="link-icon" data-feather="zap"></i>
        <span class="link-title">General Setting</span></span>
        <i class="link-arrow" data-feather="chevron-down"></i>
      </a>
      <div class="collapse {{ show_class(['admin/sell/*'])  }}" id="SellingProducts">
        <ul class="nav sub-menu">
      
          <li class="nav-item">
          <a href="{{ route('sell.pro') }}" class="nav-link {{  request()->routeIs('sell.pro') ? 'active' : '' }}">Add</a>
          </li>
          <li class="nav-item">
          <a href="{{ route('sell.pro') }}" class="nav-link {{  request()->routeIs('sell.pro') ? 'active' : '' }}">Show</a>
          </li>
        </ul>
      </div>
     </li>


    </ul>
  </div>
</nav>
<!-- nav dark and light -->
<!-- <nav class="settings-sidebar">
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
</nav> -->
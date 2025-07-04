<div class="sidebar__menu-group">
    <ul class="sidebar_nav">
        <!-- <li class="menu-title mt-30">
            <span>Applications</span>
        </li> -->

        <!-- <li>
            <a href="{{ route('chat',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/chat') ? 'active':'' }}">
                <span class="nav-icon uil uil-chat"></span>
                <span class="menu-text">{{ trans('menu.chat-menu-title') }}</span>
                <span class="badge badge-success menuItem rounded-circle">3</span>
            </a>
        </li> -->
        <!-- <li class="has-child {{ Request::is(app()->getLocale().'/applications/ecommerce/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/applications/ecommerce/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-bag"></span>
                <span class="menu-text text-initial">{{ trans('menu.ecommerce-menu-title') }}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a href="{{ route('ecommerce.products',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/ecommerce/products') ? 'active':'' }}">{{ trans('menu.ecommerce-products') }}</a></li>
                <li><a href="{{ route('ecommerce.product_detail',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/ecommerce/product-detail') ? 'active':'' }}">{{ trans('menu.ecommerce-product-details') }}</a></li>
                <li><a href="{{ route('ecommerce.add_product',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/ecommerce/add-product') ? 'active':'' }}">{{ trans('menu.ecommerce-product-add') }}</a></li>
                <li><a href="{{ route('ecommerce.cart',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/ecommerce/cart') ? 'active':'' }}">{{ trans('menu.ecommerce-cart') }}</a></li>
                <li><a href="{{ route('ecommerce.orders',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/ecommerce/orders') ? 'active':'' }}">{{ trans('menu.ecommerce-orders') }}</a></li>
                <li><a href="{{ route('ecommerce.sellers',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/ecommerce/sellers') ? 'active':'' }}">{{ trans('menu.ecommerce-sellers') }}</a></li>
                <li><a href="{{ route('ecommerce.invoice',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/ecommerce/invoice') ? 'active':'' }}">{{ trans('menu.ecommerce-invoices') }}</a></li>
            </ul>
        </li> -->
        <li>
            <a href="{{ route('calendar',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/calendar') ? 'active':'' }}">
                <span class="nav-icon uil uil-car"></span>
                <span class="menu-text">{{ __('drivers') }}</span>
            </a>
        </li>
         <!-- <li>
            <a href="{{ route('pages.setting',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/setting') ? 'active':'' }}">
                <span class="nav-icon uil uil-setting"></span>
                <span class="menu-text">{{ trans('menu.setting-menu-title') }}</span>
            </a>
        </li> -->
     </ul>
</div>

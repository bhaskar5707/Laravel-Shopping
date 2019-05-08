<?php $url = url()->current(); ?>
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li <?php if (preg_match("/dashboard/i", $url)){ ?> class="active" <?php } ?>><a href="index.html"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/categor/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/add-category/i", $url)){ ?> class="active" block;" <?php } ?>><a href="{{ url('/admin/add-category') }}">Add Category</a></li>
        <li <?php if (preg_match("/view-categories/i", $url)){ ?> class="active" block;" <?php } ?>><a href="{{ url('/admin/view-categories') }}">view Categories</a></li>

        <li <?php if (preg_match("/category-tree-view/i", $url)){ ?> class="active" block;" <?php } ?>><a href="{{ url('/admin/category-tree-view') }}">Categories Structure</a></li>


      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Brands</span> <span class="label label-important">1</span></a>
          <ul <?php if (preg_match("/brand/i", $url)){ ?> style="display: block;" <?php } ?>>
            <li <?php if (preg_match("/view-brands/i", $url)){ ?> class="active" block;" <?php } ?>><a href="{{ url('/admin/view-brands') }}">Manage Brands</a></li>

          </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Product</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/pro/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/add-product/i", $url)){ ?> class="active" block;" <?php } ?>><a href="{{ url('/admin/add-product') }}">Add Product</a></li>
        <li <?php if (preg_match("/view-products/i", $url)){ ?> class="active" block;" <?php } ?>><a href="{{ url('/admin/view-products') }}">view Product</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Coupons</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/cou/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/add-coupon/i", $url)){ ?> class="active" block;" <?php } ?>><a href="{{ url('/admin/add-coupon') }}">Add Coupon</a></li>
        <li <?php if (preg_match("/view-coupons/i", $url)){ ?> class="active" block;" <?php } ?>><a href="{{ url('/admin/view-coupons') }}">view Coupon</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Orders</span> <span class="label label-important">1</span></a>
      <ul <?php if (preg_match("/orders/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/view-orders/i", $url)){ ?> class="active" block;" <?php } ?>><a href="{{ url('/admin/view-orders') }}">view Orders</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Banners</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/bann/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/add-banner/i", $url)){ ?> class="active" block;" <?php } ?>><a href="{{ url('/admin/add-banner') }}">Add Banners</a></li>
        <li <?php if (preg_match("/view-banner/i", $url)){ ?> class="active" block;" <?php } ?>><a href="{{ url('/admin/view-banner') }}">view Banners</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Users</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/users/i", $url)){ ?> style="display: block;" <?php } ?>>
        <li <?php if (preg_match("/view-users/i", $url)){ ?> class="active" block;" <?php } ?>><a href="{{ url('/admin/view-users') }}">Users</a></li>
      </ul>
    </li>

    <li> <a href="#"><i class="icon icon-signal"></i> <span>Charts &amp; graphs</span></a> </li>
  </ul>
</div>
<!--sidebar-menu-->
<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
      <div class="panel panel-default">
        
        <?php //echo $category_menu;?>
        @foreach($categories as $cat)
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordian" href="#{{ $cat->id }}">
              <span class="badge pull-right"><i class="fa fa-plus"></i></span>
              {{ $cat->name }}
            </a>
          </h4>
        </div>
        <div id="{{ $cat->id }}" class="panel-collapse collapse">
          <div class="panel-body">
            <ul>
              @foreach($cat->categories as $subcat)
              <li><a href="{{ asset('/products/'.$subcat->url) }}"> {{ $subcat->name }} </a></li>
              @endforeach
            </ul>
          </div>
        </div>
        @endforeach
      </div>
    </div><!--/category-products-->
  
    <h2>Brands</h2>
    <div class="text-center"><!--shipping-->
      <ul class="tags">
        @foreach($brands as $brand)
        <li><a href="{{ asset('brands/'.$brand->slug) }}" class="tag">{{ $brand->name }}</a></li>
        @endforeach
      </ul>
    </div>
    <div class="shipping text-center"><!--shipping-->
      <img src="{{ asset('images/frontend_images/home/shipping.jpg') }}" alt="" />
    </div><!--/shipping-->
    <div class="shipping text-center"><!--shipping-->
      <img src="{{ asset('images/frontend_images/home/shipping1.jpg') }}" alt="" />
    </div><!--/shipping-->
  
</div>

<style type="text/css">
.tags {
  list-style: none;
  margin: 0;
  overflow: hidden; 
  padding: 0;
}

.tags li {
  float: left; 
}

.tag {
  background: #eee;
  border-radius: 3px 0 0 3px;
  color: #999;
  display: inline-block;
  height: 26px;
  line-height: 26px;
  padding: 0 20px 0 23px;
  position: relative;
  margin: 0 10px 10px 0;
  text-decoration: none;
  -webkit-transition: color 0.2s;
}

.tag::before {
  background: #fff;
  border-radius: 10px;
  box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
  content: '';
  height: 6px;
  left: 10px;
  position: absolute;
  width: 6px;
  top: 10px;
}

.tag::after {
  background: #fff;
  border-bottom: 13px solid transparent;
  border-left: 10px solid #eee;
  border-top: 13px solid transparent;
  content: '';
  position: absolute;
  right: 0;
  top: 0;
}

.tag:hover {
  background-color: green;
  color: white;
}

.tag:hover::after {
   border-left-color: green; 
}
</style>
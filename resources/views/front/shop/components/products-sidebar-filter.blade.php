<form action="{{ request()->segment(2) == 'product' ? 'shop' : '' }}">
    <div class="filter-widget">
      <h4 class="fw-title">Danh mục</h4>
      <ul class="filter-catagories">

        @foreach($categories as $category)
        <li><a href="shop/category/{{ $category->name }}">{{ $category->name }}</a></li>
        @endforeach
        
      </ul>
    </div>
    <div class="filter-widget">
      <h4 class="fw-title">Thương hiệu</h4>
      <div class="fw-brand-check">

        @foreach($brands as $brand)
        <div class="bc-item">
          <label for="bc-{{ $brand->id }}">
            {{ $brand->name }}
            <input type="checkbox" 
            {{ (request("brand")[$brand->id] ?? '') == 'on' ? 'checked' : '' }}
            id="bc-{{ $brand->id }}"
            name="brand[{{ $brand->id }}]"
            onchange="this.form.submit();"
             />
            <span class="checkmark"></span>
          </label>
        </div>
        @endforeach

      </div>
    </div>
    <div class="filter-widget">
      <h4 class="fw-title">Giá</h4>
      <div class="filter-range-wrap">
        <div class="range-slider">
          <div class="price-input">
            <input type="text" id="minamount" name="price_min" />
            <input type="text" id="maxamount" name="price_max" />
          </div>
        </div>
        <div
          class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
          data-min="10"
          data-max="999"
          
          data-min-value="{{ str_replace('$', '', request('price_min')) }}"
          data-max-value="{{ str_replace('$', '', request('price_max')) }}"

        >
          <div
            class="ui-slider-range ui-corner-all ui-widget-header"
          ></div>
          <span
            tabindex="0"
            class="ui-slider-handle ui-corner-all ui-state-default"
          ></span>
          <span
            tabindex="0"
            class="ui-slider-handle ui-corner-all ui-state-default"
          ></span>
        </div>
      </div>
      <button type="submit" class="filter-btn">Lọc</button>
    </div>
    <div class="filter-widget">
      <h4 class="fw-title">Màu sắc</h4>
      <div class="fw-color-choose">
        <div class="cs-item">
          <input type="radio" id="cs-black" name="color" value="black" onchange="this.form.submit();"
                               {{ request('color') == 'black' ? 'checked' : ''}} />
          <label class="cs-black {{ request('color') == 'black' ? 'font-weight-bold' : '' }}" for="cs-black">Đen</label>
        </div>
        <div class="cs-item">
          <input type="radio" id="cs-violet" name="color" value="violet" onchange="this.form.submit();"
                               {{ request('color') == 'violet' ? 'checked' : ''}} />
          <label class="cs-violet {{ request('color') == 'violet' ? 'font-weight-bold' : '' }}" for="cs-violet">Tím</label>
        </div>
        <div class="cs-item">
          <input type="radio" id="cs-blue" name="color" value="blue" onchange="this.form.submit();"
                               {{ request('color') == 'blue' ? 'checked' : ''}} />
          <label class="cs-blue {{ request('color') == 'blue' ? 'font-weight-bold' : '' }}" for="cs-blue">Xanh dương</label>
        </div>
        <div class="cs-item">
          <input type="radio" id="cs-yellow" name="color" value="yellow" onchange="this.form.submit();"
                               {{ request('color') == 'yellow' ? 'checked' : ''}} />
          <label class="cs-yellow {{ request('color') == 'yellow' ? 'font-weight-bold' : '' }}" for="cs-yellow">Vàng</label>
        </div>
        <div class="cs-item">
          <input type="radio" id="cs-red" value="red" name="color" onchange="this.form.submit()"
                               {{ request('color') == 'red' ? 'checked' : ''}} />
          <label class="cs-red {{ request('color') == 'red' ? 'font-weight-bold' : '' }}" for="cs-red">Đỏ</label>
        </div>
        <div class="cs-item">
          <input type="radio" name="color" id="cs-green" value="red" onchange="this.form.submit();"\
                               {{ request('color') == 'green' ? 'checked' : ''}} />
          <label class="cs-green {{ request('color') == 'green' ? 'font-weight-bold' : '' }}" for="cs-green">Xanh lá</label>
        </div>
      </div>
    </div>
    <div class="filter-widget">
      <h4 class="fw-title">Kích cỡ</h4>
      <div class="fw-size-choose">
        <div class="sc-item">
          <input type="radio" id="s-size" name="size" value="s" onchange="this.form.submit();"
          {{ request('size') == 's' ? 'checked' : ''}} />
          <label for="s-size" class="{{ request('size') == 's' ? 'active' : ''}} ">S</label>
        </div>
        <div class="sc-item">
          <input type="radio" id="m-size" name="size" value="m" onchange="this.form.submit();"
          {{ request('size') == 'm' ? 'checked' : ''}} />
          <label for="m-size"class="{{ request('size') == 'm' ? 'active' : ''}} ">M</label>
        </div> 
        <div class="sc-item">
          <input type="radio" id="l-size" name="size" value="l" onchange="this.form.submit();"
          {{ request('size') == 'l' ? 'checked' : ''}} />
          <label for="l-size" class="{{ request('size') == 'l' ? 'active' : ''}}" >L</label>
        </div>
        <div class="sc-item">
          <input type="radio" id="xs-size" name="size" value="xs" onchange="this.form.submit();"
          {{ request('size') == 'xs' ? 'checked' : ''}} />
          <label for="xs-size"class="{{ request('size') == 'xs' ? 'active' : ''}}" >XS</label>
        </div>
      </div>
    </div>
    <div class="filter-widget">
      <h4 class="fw-title">Thẻ</h4>
      <div class="fw-tags">
        <a href="#">Khăn quàng cổ</a>
        <a href="#">Giày</a>
        <a href="#">Áo choàng</a>
        <a href="#">Đầm váy</a>
        <a href="#">Quần</a>
        <a href="#">Mũ nam</a>
        <a href="#">Balo</a>
      </div>
    </div>
  </form>
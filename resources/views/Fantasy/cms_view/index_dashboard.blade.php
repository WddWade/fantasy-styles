@extends('Fantasy.template')

@section('bodySetting', 'cms_page')

@section('css')

@stop

@section('css_back')

@stop

@section('content')

<!-- 左邊滑動的 sidebar -->
@include('Fantasy.includes.sidebar')
<!-- 左邊滑動的 sidebar -->


<!-- 中間主區塊 -->
<div class="page-container extract-block">

  <!-- 最上面的 header bar -->
  @include('Fantasy.includes.header')
  <!-- 最上面的 header bar -->

  <div class="mainContent full-height">
    <div class="content full-height">
      <!-- 左邊 SECONDARY SIDEBAR MENU-->
      <nav class="content-sidebar">

        <div class="sidebar-menu">

          @include('Fantasy.cms_view.includes.list')

          <div class="clearfix"></div>
        </div>

      </nav>
      <!-- 左邊 SECONDARY SIDEBAR MENU -->
      <div class="inner-content">
        {{-- wade:delete --}}
        {{-- <div class="jumbotron">
          <div class="container-fluid">
            <div class="inner">
              <div class="inner-left">
                <div class="switch-menu">
                  <span class="bar"></span>
                  <span class="bar"></span>
                  <span class="bar"></span>
                </div>
              </div>
            </div>
          </div>
        </div> --}}

        <div class="scroll-wrapper content-scrollbox" style="position: relative;">
          <div class="content-scrollbox scroll-content"
            style="height: 877px; margin-bottom: 0px; margin-right: 0px; max-height: none;">
    
            <!-- 增加 數據分析 區塊 -->
            <div class="content-wrap analysis-blk">
              <div class='analysis-wrapper hasBg' style="--themeColor:#10B0A1;">
                <div class='analysis-title'>
                  <div class="frameName">TODAY’S DATA 本日數據</div>
                  <div class="toolItem dropdown">
                    <div class="showName" style="display: none;">
                      <p class="toolTitle">查詢分站</p>
                      <p class="dropdownValue">振宇五金 購物網站</p>
                      <i class="icon-arrow"></i>
                    </div>
                    <div class="dropdownList">
                      <ul>
                        <li>振宇五金 企業網站</li>
                        <li class="active">振宇五金 購物網站</li>
                        <li>振宇五金 會員網站</li>
                      </ul>
                    </div>
                  </div>
                </div>

                <!-- 第一區塊資料 -->
                <div class='analysis-box'>
                  <div class="frameName">訂單狀態</div>
                  <ul class="frame">
                    <li class="grid_style_M" style="--bgColor: #2E2E2E;--textColor: #FFFFFF;">
                      <div class="title">
                        <p class="subtitle">本日訂單數</p>
                      </div>
                      <div class="inner">
                        <div class="number">
                          <p>999</p>
                        </div>
                      </div>
                    </li>
                    <li class="grid_style_M" style="--bgColor: #10B0A1;--textColor: #FFFFFF;">
                      <div class="title">
                        <p class="subtitle">訂單成立(未付款)</p>
                      </div>
                      <div class="inner">
                        <div class="number">
                          <p>9</p>
                        </div>
                      </div>
                    </li>
                    <li class="grid_style_M" style="--bgColor: #D86643;--textColor: #FFFFFF;">
                      <div class="title">
                        <p class="subtitle">訂單生效(已付款)</p>
                      </div>
                      <div class="inner">
                        <div class="number">
                          <p>8</p>
                        </div>
                      </div>
                    </li>
                    <li class="grid_style_S">
                      <div class="title">
                        <p class="subtitle">訂單取消</p>
                      </div>
                      <div class="inner">
                        <div class="number">
                          <p>7</p>
                        </div>
                      </div>
                    </li>
                    <li class="grid_style_S">
                      <div class="title">
                        <p class="subtitle">訂單失效</p>
                      </div>
                      <div class="inner">
                        <div class="number">
                          <p>6</p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>

                <!-- 第二區塊資料 -->
                <div class='analysis-box'>
                  <div class="frameName">物流狀態</div>
                  <ul class="frame">
                    <li class="grid_style_M">
                      <div class="title">
                        <p class="subtitle">未處理 (已付款)</p>
                      </div>
                      <div class="inner">
                        <div class="number">
                          <p>5</p>
                        </div>
                      </div>
                    </li>
                    <li class="grid_style_M">
                      <div class="title">
                        <p class="subtitle">確認訂單中</p>
                      </div>
                      <div class="inner">
                        <div class="number">
                          <p>4</p>
                        </div>
                      </div>
                    </li>
                    <li class="grid_style_M">
                      <div class="title">
                        <p class="subtitle">備貨中</p>
                      </div>
                      <div class="inner">
                        <div class="number">
                          <p>3</p>
                        </div>
                      </div>
                    </li>
                    <li class="grid_style_S">
                      <div class="title">
                        <p class="subtitle">發貨中</p>
                      </div>
                      <div class="inner">
                        <div class="number">
                          <p>2</p>
                        </div>
                      </div>
                    </li>
                    <li class="grid_style_S">
                      <div class="title">
                        <p class="subtitle">已到貨</p>
                      </div>
                      <div class="inner">
                        <div class="number">
                          <p>1</p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>

                <!-- 第三區塊資料 -->
                <div class='analysis-box'>
                  <div class="frameName">當前運行優惠</div>
                  <ul class="frame">
                    @for($i=0;$i<5;$i++)
                    <li class="grid_style_L">
                      <div class="title">
                        <p class="type">類型{{ $i }}</p>
                        <p class="subtitle">副標{{ $i }}</p>
                      </div>
                      <div class="inner">
                        <div class="number">
                          <p>{{ $i }}</p>
                        </div>
                      </div>
                    </li>
                    @endfor
                  </ul>
                </div>
              </div>
            </div>

            <!-- 增加 數據分析圖表 區塊 -->
            <div class="content-wrap analysis-blk">
              <div class='analysis-wrapper'>
                <div class='analysis-title'>
                  <div class="frameName">STATISTICS 數據統計</div>
                </div>
                <div class="select-box">
                  <div class="selectItem bkBasicDate">
                    <p class="selectName">查詢日期</p>
                    <div class="toolItem">
                      <div class="showName">
                        <p class="toolTitle">起</p>
                        <input class="dateStart chartDate bkDateS" readonly="" value="{{ date('Y/m/d',strtotime('now -30 day')) }}">
                        <i class="icon-arrow"></i>
                      </div>
                    </div>
                    <div class="toolItem">
                      <div class="showName">
                        <p class="toolTitle">迄</p>
                        <input class="dateEnd chartDate bkDateE" readonly="" value="{{ date('Y/m/d') }}">
                        <i class="icon-arrow"></i>
                      </div>
                    </div>
                    <div class="toolItem dropdown bkFilter bkFilterDate">
                      <div class="showName">
                        <p class="toolTitle">維度</p>
                        <p class="dropdownValue">日</p>
                        <i class="icon-arrow"></i>
                      </div>
                      <div class="dropdownList">
                        <ul>
                          <li class="active bkDateDimension" data-type='day'>日</li>
                          {{-- <li class="bkDateDimension" data-type='week'>週</li> --}}
                          <li class="bkDateDimension" data-type='month'>月</li>
                          <li class="bkDateDimension" data-type='year'>年</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="selectItem" style="--w:100px">
                    <p class="selectName">類型</p>
                    <div class="toolItem dropdown">
                      <div class="showName">
                        <p class="dropdownValue">請選擇</p>
                        <i class="icon-arrow"></i>
                      </div>
                      <div class="dropdownList">
                        <ul class="bkChartTypeList">
                          <li class="bkChartType" data-url='turnover' data-sub='turnover'>營業額</li>
                          <li class="bkChartType" data-url='turnover' data-sub='ship'>運費</li>
                          <li class="bkChartType" data-url='product' data-sub='qty'>產品銷售量</li>
                          <li class="bkChartType" data-url='product' data-sub='sale'>產品銷售額</li>
                          <li class="bkChartType" data-url='product' data-sub='view'>產品瀏覽量</li>
                          <li class="bkChartType" data-url='product' data-sub='rebuy'>產品回購</li>
                          <li class="bkChartType" data-url='order' data-sub='paylog'>結帳/物流方式</li>
                          <li class="bkChartType" data-url='order' data-sub='status'>訂單狀態</li>
                          <li class="bkChartType" data-url='discount' data-sub=''>促銷數據</li>
                          <li class="bkChartType" data-url='add' data-sub='buyqty'>加購品購買次數</li>
                          <li class="bkChartType" data-url='add' data-sub='relation'>加購品關聯商品</li>
                          <li class="bkChartType" data-url='search' data-sub=''>網站搜尋數據</li>
                        </ul>
                      </div>
                    </div>

                    <!-- 產品金額 -->
                    <div class="toolItem bkFilter bkFilterPrice" style="display: none;">
                      <div class="showName">
                        <p class="toolTitle">指定金額 NT$</p>
                        <input class="priceStart bkPriceS" type="number" placeholder="0">
                        <p>to</p>
                        <input class="priceEnd bkPriceE" type="number" placeholder="0">
                      </div>
                    </div>
                    <!-- 產品料號 -->
                    <div class="toolItem bkFilter bkFilterKeyword" style="display: none;">
                      <div class="showName">
                        <input class="productID bkFilterKeywordInput" type="text" placeholder="請輸入查詢字">
                      </div>
                    </div>
                    <!-- 加購品篩選 -->
                    <div class="toolItem dropdown bkFilter bkFilterPnSelect" style="--w:150px;display: none;">
                      <div class="showName">
                        <p class="dropdownValue">選擇加購品</p>
                        <i class="icon-arrow"></i>
                      </div>
                      <div class="dropdownList">
                        <div class="search-box">
                          <i class="icon-search"></i>
                          <input class="bkFilterPnSearchInput" type="text" placeholder="search">
                        </div>
                        <ul class="bkFilterPnList">
                          {{-- <li>起子頭 止滑 WHIRL F</li> --}}
                        </ul>
                      </div>
                    </div>

                    <!-- 按鈕區塊 -->
                    <div class="btn-group">
                      <div class="goSearch changeChart bkSearch">
                        <i class="fa fa-search"></i>
                      </div>
                      {{-- <div class=" exportBtn">
                        <a href="javascript:;">匯出資料</a>
                      </div> --}}
                    </div>
                  </div>

                </div>
                <div class="chart-box">
                  <!-- 可複製 表格區塊一 -->
                  <div class="chartItem">
                    <div class="chart-header">
                      <!-- 顯示資料 -->
                      <div class="chartData bkPriceTitle">
                        {{-- <div class="item">
                          <div class="key">營業額</div>
                          <div class="value">$999,999</div>
                        </div> --}}
                      </div>
                      <!-- 標題 -->
                      <div class="frameName bkChartTypeName">選擇表格類型</div>
                    </div>
                    <div class="chart-content">
                      <div class="chart">
                        <canvas id="myChart" ></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>

      </div>
      <!-- 右邊 PAGE CONTENT -->
    </div>
  </div>
  <!-- 內容 CONTENT -->
</div>
<!-- 中間主區塊 -->

@section('script')
<script type="text/javascript" src="{{ asset('/vender/backend/js/cms/cms.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(() => {
  let _chartX = [];
  let _chartY = [];
  var myChart = null;
  // 測試用表格設定
  const chartEl = document.getElementById('myChart').getContext('2d');
  const data = {
    labels: ["Jun 2016", "Jul 2016", "Aug 2016", "Sep 2016", "Oct 2016", "Nov 2016", "Dec 2016", "Jan 2017",
      "Feb 2017", "Mar 2017", "Apr 2017", "May 2017"
    ],
    datasets: [{
      label: "Rainfall",
      // backgroundColor: 'lightblue',
      // borderColor: 'royalblue',
      data: [26.4, 39.8, 66.8, 66.4, 40.6, 55.2, 77.4, 69.8, 57.8, 76, 110.8, 142.6
      ],
    }]
  }
  const config = {
    type: 'bar',
    data: data,
    options: {
      responsive: true,
    },
  };
  
  myChart = new Chart(chartEl, config);



  // 下拉功能
  const $dropdowns = $('.analysis-blk .dropdown');

  $dropdowns.on('click', function() {
    const $this = $(this);
    $dropdowns.not($this).removeClass('open').find('.dropdownList').slideUp();
    $this.toggleClass('open').find('.dropdownList').slideToggle();
  });

  $('.search-box input').on('click',function(e){e.stopPropagation();})
  
  $('.analysis-blk .dropdownList li').on('click', function() {
    const $this = $(this);
    $this.addClass('active').siblings().removeClass('active');
    $this.closest('.dropdown').find('.dropdownValue').text($this.text());
  });

  // 日期功能
  $('.chartDate').each(function(index, el) {
    const _this = $(this);
    if (!_this.hasClass('active_date')) {
      _this.datepicker({
        todayHighlight: true,
        autoclose: true,
        language: 'zh-TW',
        format: 'yyyy/mm/dd',
        // startDate: '+0d',
      });
      _this.addClass('active_date');
    }
  });

});
</script>
@stop

@section('script_back')

@stop
@stop
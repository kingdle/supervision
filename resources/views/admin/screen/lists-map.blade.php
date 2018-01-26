<script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp&key=CQTBZ-G7G6S-PK2OI-6RTUX-7WVRK-K6BOB"></script>
<div class="row animated fadeInRight">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><i class="fa fa-flag" style="color: #c87a29;margin-right: 10px"></i>地图展示</h5>
                <div class="ibox-tools">
                </div>
            </div>
            <div class="ibox-content">
                <div id="container"></div>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
//直接加载地图
        //初始化地图函数  自定义函数名init
        function init() {
            //定义map变量 调用 qq.maps.Map() 构造函数   获取地图显示容器
            var map = new qq.maps.Map(document.getElementById("container"), {
                center: new qq.maps.LatLng(39.916527, 116.397128),      // 地图的中心地理坐标。
                zoom: 8                                                 // 地图的中心地理坐标。
            });
        }

        //调用初始化函数地图
        init();
    }
</script>

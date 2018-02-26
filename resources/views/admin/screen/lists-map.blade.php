<style type="text/css">
    .btn {
        width: 142px;
    }

    #container {
        min-width: 600px;
        min-height: 590px;
    }

    .content {
        min-height: 250px;
        padding: 0px;
        margin-right: auto;
        margin-left: auto;
        padding-left: 15px;
        padding-right: 15px;
    }
    .p-title{
        /*border: solid 1px #bafff5;*/
        border-radius:20px;
        color: #ff580b;
        float: left;
        width: 110px;
        text-align: center;
        background-color: #ffffff;
    }
    .amap-marker-label {
        font-size: 13px;
        border: 1px solid orange;
        background: #fff;
        border-radius: 10px 0 0 0;
        color: #690441;
    }
    .vertical-timeline-content {
        position: relative;
        width:360px;
        height: 170px;
        background: white;
        border-radius: 0.25em;
        padding: 1em;
    }
    .vertical-timeline-content::before {
        content: '';
        position: absolute;
        bottom: -16px;
        right: 50%;
        height: 0;
        width: 0;
        border: 7px solid transparent;
        border-top: 7px solid #ffffff;
    }
    .vertical-timeline-content h2 {
        font-weight: 700;
        font-size:14px;
        margin-top: 4px;
        color:#0d6aad;
    }
    .vertical-timeline-content p {
        margin: 1em 0;
        font-size:12px;
        /*text-indent: 2em;*/
        line-height: 1.6;
    }
    .vertical-timeline-content p span{
        font-weight: 700;
        color: #ff580b;
    }
    .vertical-timeline-content .btn-info {
        float: right;
    }
    .info-top img {
        position: absolute;
        top: 20px;
        right: 20px;
        transition-duration: 0.25s;
        z-index: 9999;
    }

    .info-top img:hover {
        box-shadow: 0px 0px 5px #000;
    }
</style>

<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.4.3&key=80701f48c0cc37c4d279b256aba5c407"></script>
<script src="//webapi.amap.com/ui/1.0/main.js?v=1.0.11"></script>
<script src="{{ admin_asset ("/js/marker.js") }}"></script>
<div class="row animated fadeInRight">
    <div class="col-md-12">
        <div class="ibox float-e-margins">

            <div class="ibox-content">
                <div id="container" class="map" tabindex="0"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var map = new AMap.Map('container', {
        zoom: 12,
        resizeEnable: true,
        center: [120.101765, 35.89719],//new AMap.LngLat(116.39,39.9)
        mapStyle: 'amap://styles/normal'//样式URL
    });
    var markers = [{
        name: "高速公路连接线",
        leader: '张三',
        person: '责任1',
        date1: '2018-03-22',
        days: '3',
        question: [{
            qqq: '问题1'
        }, {
            qqq: '问题2'
        }],
        url: '/admin/auth/screen/1714',
        position: [120.039861, 35.961372],
        subDistricts: []
    }, {
        name: "蓝色海湾整治",
        leader: '李四',
        person: '责任2',
        date1: '2018-01-12',
        days: '3',
        question: [{
            qqq: '问题1'
        }, {
            qqq: '问题2'
        }],
        url: 'http://720yun.com/t/wl56m39w5rcr5366uq?from=singlemessage&isappinstalled=0&pano_id=fqPqj9dAMUdMLbs2',
        position: [120.101659, 35.900074],
        subDistricts: []
    }, {
        name: "清华美院",
        leader: '王五',
        person: '责任3',
        date1: '2018-03-01',
        days: '18',
        question: [{
            qqq: '问题1'
        }, {
            qqq: '问题2'
        }],
        url: '/admin/auth/screen/1719',
        position: [120.087754, 35.928853],
        "subDistricts": []
    }, {
        name: "创智产业园",
        leader: '张三',
        person: '责任4',
        date1: '2018-04-22',
        days: '31',
        question: [{
            qqq: '问题11'
        }, {
            qqq: '问题22'
        }],
        url: '/admin/auth/screen/1719',
        position: [120.083029, 35.924163],
        "subDistricts": []
    }];
    var infoWindow = new AMap.InfoWindow({
        isCustom: true, //使用自定义窗体
        offset: new AMap.Pixel(10, -50)
    });
    markers.forEach(function (mar) {
        var name = mar.name;
        var nlabel = {
            offset: new AMap.Pixel(10, 18), //修改label相对于marker的位置
            content: name
        };

        var marker = new AMap.Marker({
            position: [mar.position[0], mar.position[1]],
            map: map,
            icon: new AMap.Icon({
                // size: new AMap.Size(20, 20),  //图标大小
                image: "{{ admin_asset ("/uploads/sign.gif") }}",
                // imageOffset: new AMap.Pixel(-30, -30)
            }),
            offset: new AMap.Pixel(-12, -36),
            label: nlabel
        });

        // 坐标对应显示信息
        var que = '';
        mar.question.forEach(function (one) {
            que += "<li class='qo'>" + one.qqq + "</li>";
        })

        var cc ="<div class='vertical-timeline-content'>"+
        "<h2>"+mar.name +"</h2>"+
        "<p><span>存在问题：</span>40#楼安装工程完成，砌体工程完成。41#楼砌体及安装工程完成。48、49#楼砌体及二次结构完成。因服务中心方案调整，施工图重新出图，服务中心未能按原计划完成。</p>"+
        "<a href=" + mar.url + "target='_blank'"+" class='btn-info btn-sm'>更多信息</a>"+
            "</div>"
        marker.content = cc;
        marker.on('click', markerClick);
        // marker.emit('click', {target: marker}); //默认点击
    });

    function markerClick(e) {
        infoWindow.setContent(createInfoWindow(e.target.content));
        infoWindow.open(map, e.target.getPosition());
    }
    //构建自定义信息窗体
    function createInfoWindow(content) {
        var info = document.createElement("div");
        info.className = "info";
        //窗体的宽
        info.style.width = "360px";
        // 顶部标题
        var top = document.createElement("div");
        var titleD = document.createElement("div");
        var closeX = document.createElement("img");
        top.className = "info-top";
//        titleD.innerHTML = "预览";
        closeX.src = "http://webapi.amap.com/images/close2.gif";
        closeX.onclick = closeInfoWindow;

        top.appendChild(titleD);
        top.appendChild(closeX);
        info.appendChild(top);

        // 定义中部内容
        var middle = document.createElement("div");
        middle.className = "info-middle";
        middle.style.backgroundColor = 'white';
        middle.innerHTML = content;
        info.appendChild(middle);

        // 定义底部内容
        var bottom = document.createElement("div");
        bottom.className = "info-bottom";
        bottom.style.position = 'relative';
        bottom.style.top = '0px';
        bottom.style.left = '170px';
        bottom.style.margin = '0 auto';
        var sharp = document.createElement("img");
        sharp.src = "http://webapi.amap.com/images/sharp.png";
        bottom.appendChild(sharp);
        info.appendChild(bottom);
        return info;
    }
    //关闭信息窗体
    function closeInfoWindow() {
        map.clearInfoWindow();
    }
    map.setFitView();
</script>

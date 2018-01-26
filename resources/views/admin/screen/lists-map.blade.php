<style type="text/css">
    .btn{
        width:142px;
    }
    #container{
        min-width:600px;
        min-height:600px;
    }
</style>
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.4.3&key=80701f48c0cc37c4d279b256aba5c407"></script>
<div class="row animated fadeInRight">
    <div class="col-md-12">
        <div class="ibox float-e-margins">

            <div class="ibox-content">
                <div id="container"></div>
            </div>
        </div>
    </div>
</div>
<script>

        var map = new AMap.Map('container',{
            zoom: 12,
            center: [120.101765,35.89719]//new AMap.LngLat(116.39,39.9)
        });
        AMap.plugin(['AMap.ToolBar','AMap.Scale','AMap.OverView'],
            function(){
                map.addControl(new AMap.ToolBar());

                map.addControl(new AMap.MapType({isOpen:true}));
            });

</script>

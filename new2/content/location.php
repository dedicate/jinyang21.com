<div class='stage'>
	<div class='frame-content'>
		<div class='title'>
			LOCATION
			<br />
			<span class='sub'>门店位置</span>
		</div>
		
		<div class='content'>
			<div class='map-location'>
				<ul class='map-location-list'></ul>
			</div>
			<div class='map-container'>
				<div id="map_canvas" style="width:100%; height:100%;"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var latLng = new google.maps.LatLng(34.263915914326944, 108.96358586847782);
	var mapOptions = {
		center: latLng,
		zoom: 14,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(
		document.getElementById("map_canvas"),
		mapOptions
	);
	
	var marker = new google.maps.Marker({
		position: latLng,
		title: "JY21 Shop"
	});
	marker.setMap(map);
	/*store locations*/
	var mll = $('.map-location-list');
	var stores = [
		["西安民生百货-解放店",	"西安市解放路103号民生2楼JY21专柜",							"029-87481905",		34.263915914326944, 108.96358586847782],
		["西安民生百货-国际店", "西安市莲湖区北大街民生国际28号2楼JY21专柜",				"029-63395294", 	34.267437931205976, 108.94721299409866],
		["西安金鹰高新店",		"陕西省西安市科技路37号海星城市广场金鹰高新店2楼JY21专柜",	"029-88348852",		34.23269787798946, 108.90183806419373],
		["西安时代盛典百盛",	"陕西省西安市广济街101号西安时代盛典百盛JY21专柜",			"029-87244588",		34.260905277906076, 108.94137382507324],
		["重庆奥特莱斯",		"重庆北部新区经开园北区奥特莱斯路1号B区二楼209女装部",		"023-63016480",		29.630517078283294, 106.56397640705109],
		["重庆太平洋",			"重庆市渝中区解放碑太平洋三楼新区",							"023-63873637", 	29.55764191476216, 106.57859444618225],
		["成都仁和 - 棕北店",	"成都市人民南路4段友谊路2号仁和春天百货3楼JY21专柜",		"028-85227820", 	30.624745, 104.067279],
		["成都仁和 - 人东店",	"成都市人民东路59号仁和春天百货人东店2楼JY21专柜",			"028-86731708", 	30.658249, 104.070838],
		["成都奥特莱斯",		"成都市双流县双楠大道中段633号奥特莱斯S-2101A(JY21专柜)",	"028-67038482", 	30.60399086015326, 103.94362717866898],
		["济南银座 - 玉函店",	"济南市经十路19288号银座玉函店仕女商场三楼JY21专柜",		"0531-67718571", 	36.649584, 117.046891],
		["济南银座 - 商城店",	"济南市泺源大街66号银座商城4楼JY21专柜",					"0531-81917723", 	36.659974966229136, 117.02932398766279],
		["东莞海雅百货东城店",	"东莞市东城区东城中路世博广场A区东莞东城海雅2楼JY21专柜",	"0769-22031517", 	23.03114481513866, 113.77709090709686],
		["深圳深国投广场店",	"深圳市福田区农林路69号深国投广场1楼JY21专柜",				"0755-23948322", 	22.545924109984597, 114.01270385831594],
		["无锡八佰伴店",		"无锡市中山路168号无锡八佰伴3楼JY21专柜",					"0510-82732882", 	31.57189973137252, 120.30277434704476],
		["天津友谊名都店",		"天津市滨海新区塘沽区第一大街86号泰达市民广场2楼JY21专柜",	"022-60623723", 	39.02683901308191, 117.68653895705938],
		["天津友谊大港",		"天津市滨海新区大港区胜利路651号友谊大港百货2楼JY21专柜",	"022-60901098", 	39.01856893634492, 117.70354986190796],
		["包头神华亿佰购物中心","包头昆区神华亿佰蓝天购物中心北门1楼JY21专柜",				"0472-5150024", 	40.65268639319699, 109.8409133026075],
		["鄂尔多斯每天购物",	"鄂尔多斯市东胜区伊金霍洛东街三号每天百货3FJY21专柜",		"0477-3981833", 	39.81641471700637, 110.00566095113754],
		["常州购物中心",		"常州市延陵西路1号 常州购物中心2楼JY21专柜",				"0519-88996367", 	31.774224276816998, 119.96358227061663]
	]
	_.each(stores, function(obj) {
		var storeLi = $("<li>" + 
			"<div class='name'>" + obj[0] + "</div>" + 
			"<div class='add'>" + obj[1] + "</div>" + 
			"<div class='tel'>" + obj[2] + "</div>" +
		"</li>");
		storeLi.data("lat", obj[3]);
		storeLi.data("lng", obj[4]);
		storeLi.click(function() {
			var latVal = $(this).data('lat');
			var lngVal = $(this).data('lng');
			var latLng = new google.maps.LatLng(latVal, lngVal);
			map.setCenter(latLng);
			marker.setPosition(latLng);
		});
		storeLi.mouseenter(function() {
			$(this).css({'background': '#ddd', 'color': '#111'});
		}).mouseleave(function() {
			$(this).css({'background': 'transparent', 'color': '#fff'});
		});
		storeLi.appendTo(mll);
	});
	
	$(".map-location").mCustomScrollbar({
		advanced:{
			autoExpandHorizontalScroll:true
		}
	});
</script>
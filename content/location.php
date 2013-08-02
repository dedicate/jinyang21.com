<?php 
$m = new MongoClient('mongodb://craftgavin:whothirstformagic?@419.bee.fucms.com');
$db = $m->cms_419;
$locationCollection = $db->location_location;
$cursor = $locationCollection->find();
$cursor->sort(array('provinceId' => 1));

$locationArr = array();
$cityId = "";
$cityArr = array();

foreach($cursor as $lo) {
	if($lo['cityId'] != $cityId) {
		if(count($cityArr) > 0) {
			$locationArr[$cityId] = $cityArr;
		}
		$cityId = $lo['cityId'];
		$cityArr = array();
	}
	$ll = explode(',', $lo['latlon']);
	$cityArr[] = array(
		'label'			=> $lo['label'],
		'fullAddress'	=> $lo['fullAddress'],
		'tel'			=> $lo['tel'],
		'lat'			=> $ll[0],
		'lon'			=> $ll[1],
	);
}

$locationArr[$cityId] = $cityArr;
?>
<div class='stage'>
	<div class='frame-content'>
		<div class='title'>
			STORE LOCATION
			<div class='info'>
				<div class='info-text map-location-city'>
					<ul>
						<li class='selected' data-cityname='610100'>西安</li>
						<li data-cityname='500100'>重庆</li>
						<li data-cityname='510100'>成都</li>
						<li data-cityname='370100'>济南</li>
						<li data-cityname='441900'>东莞</li>
						<li data-cityname='440300'>深圳</li>
						<li data-cityname='320200'>无锡</li>
						<li data-cityname='320400'>常州</li>
						<li data-cityname='120100'>天津</li>
						<li data-cityname='150200'>包头</li>
						<li data-cityname='150600'>鄂尔多斯</li>
						<li data-cityname='430100'>长沙</li>
						<li data-cityname='630100'>西宁</li>
						<li data-cityname='320100'>南京</li>
						<li data-cityname='530100'>昆明</li>
						<li data-cityname='340100'>合肥</li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class='content'>
			<div class='map-location-selector'>
				<div class='map-location'>
					<ul class='map-location-list'></ul>
				</div>
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
	var stores = <?php echo json_encode($locationArr) ?>
	
	var mll = $('.map-location-list');
	var cities = $('.map-location-city > ul > li');
	var storeLiList = [];
	
	cities.each(function(idx, obj) {
		$(obj).click(function() {
			$(this).addClass('selected');
			$(this).siblings().removeClass('selected');
			var cityname = $(this).data('cityname');
			var slll = storeLiList.length;
			var cIdx = 0;
			var loop = function() {
				var cargo = $(storeLiList[cIdx]);
				cIdx++;
				cargo.animate({'opacity': 0, 'top': '-50px'}, 300);
				if(cIdx >= slll) {
					setTimeout(function() {
						appendCityStores(stores[cityname]);
					}, 500);
				} else {
					setTimeout(loop, 100);
				}
			};
			setTimeout(loop, 100);
		});
	});
	
	var appendCityStores = function(cityStores) {
		mll.empty();
		storeLiList = [];
		_.each(cityStores, function(obj) {
			var storeLi = $("<li>" + 
				"<div class='name'>" + obj['label'] + "</div>" + 
				"<div class='add'>" + obj['fullAddress'] + "</div>" + 
				"<div class='tel'>" + obj['tel'] + "</div>" +
			"</li>");
			storeLi.data("lat", obj['lat']);
			storeLi.data("lng", obj['lon']);
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
			storeLiList.push(storeLi);
		});
	}
	
	appendCityStores(stores['610100']);
</script>
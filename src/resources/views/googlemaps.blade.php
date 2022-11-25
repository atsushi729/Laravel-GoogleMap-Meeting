<!DOCTYPE html>
<x-app-layout>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Laravel</title>
    <style>
        #target {
            width: 100%;
            height: 700px;
        }
    </style>
</head>

<body>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Google maps') }}
    </h2>
</x-slot>
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
@endif
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('addMeeting') }}" method="POST">
                    @csrf

                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                    <div class="row">
                        <div class="col-sm-3">
                            <label>Location</label><br>
                            <input type="text" name="location" id="location" required>
                        </div>
                        <div class="col-sm-3">
                            <label>Client name</label><br>
                            <input type="text" name="name" placeholder="Client name" required>
                        </div>
                        <div class="col-sm-3">
                            <label>Meeting time duration</label><br>
                            <input type="number" name="meeting_time" placeholder="Meeting time (in Minutes)" required><br>
                            <span>Available (09:00 am to 06:00 pm)</span>
                        </div>
                        <div class="col-sm-3">
                            <label>Date Add</label><br>
                            <input type="date" name="date" required><br>
                            <span>Available within a year</span>
                        </div>
                    </div>
                    <input type="hidden" id="lat" name="latitude">
                    <input type="hidden" id="lng" name="longitude">
                    <div class="row">
                        <div class="col-sm">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            <div id="header" class="mt-5"><b>Google Maps - Search Place</b></div>
            <div>Enter your meeting place (e.g.  Tokyo station)</div>
            <input type="text" id="keyword" placeholder="Enter your meeting place" class="w-50"><button id="search" class="btn btn-secondary m-2">Search</button>
            <div id="target" class="w-full hei"></div>
            </div>
        </div>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?language=en&region=JP&key={}&callback=initMap" async defer></script>

<script>

    var map;
    var marker;
    var infoWindow;

    function initMap() {

        //マップ初期表示の位置設定
        var target = document.getElementById('target');
        var centerp = {lat: 35.680959106959, lng: 139.76730676352};

        //マップ表示
        map = new google.maps.Map(target, {
            center: centerp,
            zoom: 12,
        });

        // 検索実行ボタンが押下されたとき
        document.getElementById('search').addEventListener('click', function() {

            var place = document.getElementById('keyword').value;
            var geocoder = new google.maps.Geocoder();      // geocoderのコンストラクタ

            geocoder.geocode({
                address: place
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {

                    var bounds = new google.maps.LatLngBounds();

                    for (var i in results) {
                        if (results[0].geometry) {
                            // 緯度経度を取得
                            var latlng = results[0].geometry.location;
                            // 住所を取得
                            var address = results[0].formatted_address;
                            document.getElementById('lat').value=results[0].geometry.location.lat();
                            document.getElementById('lng').value=results[0].geometry.location.lng();
                            document.getElementById('location').value=results[0].formatted_address;

                            // 検索結果地が含まれるように範囲を拡大
                            bounds.extend(latlng);
                            // マーカーのセット
                            setMarker(latlng);
                            // マーカーへの吹き出しの追加
                            setInfoW(place, latlng, address);
                            // マーカーにクリックイベントを追加
                            markerEvent();
                        }
                    }
                } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
                    alert("見つかりません");
                } else {
                    console.log(status);
                    alert("エラー発生");
                }
            });

        });

        // 結果クリアーボタン押下時
        document.getElementById('clear').addEventListener('click', function() {
            deleteMakers();
        });

    }

    // マーカーのセットを実施する
    function setMarker(setplace) {
        // 既にあるマーカーを削除
        deleteMakers();

        var iconUrl = 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png';
        marker = new google.maps.Marker({
            position: setplace,
            map: map,
            icon: iconUrl
        });
    }

    //マーカーを削除する
    function deleteMakers() {
        if(marker != null){
            marker.setMap(null);
        }
        marker = null;
    }

    // マーカーへの吹き出しの追加
    function setInfoW(place, latlng, address) {
        infoWindow = new google.maps.InfoWindow({
            content: "<a href='http://www.google.com/search?q=" + place + "' target='_blank'>" + place + "</a><br><br>" + latlng + "<br><br>" + address + "<br><br><a href='http://www.google.com/search?q=" + place + "&tbm=isch' target='_blank'>画像検索 by google</a>"
        });
    }

    // クリックイベント
    function markerEvent() {
        marker.addListener('click', function() {
            infoWindow.open(map, marker);
        });
    }

</script>

</body>
</html>
</x-app-layout>

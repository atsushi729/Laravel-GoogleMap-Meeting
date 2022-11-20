<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Googlemap') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Google map
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="" method="POST">
                        @csrf
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
                                <input type="number" name="time" placeholder="Meeting time (in Minutes)" required><br>
                                <span>Available (09:00 am to 06:00 pm)</span>
                            </div>
                            <div class="col-sm-3">
                                <label>Date Add</label><br>
                                <input type="date" name="date" required><br>
                                <span>Available within a year</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

                <script type="text/javascript" src="http://maps.google.com/maps/api/js?key={}&language=en"></script>
                <div id="map" class="w-100 h-100"></div>
                <script>
                    $(document).ready(function() {
                        var autocomplete;
                        var to = 'location';
                        autocomplete = new google.maps.places.Autocomplete((document.getElementById(to)),{
                            types:['geocode'],
                        });
                    });

                    var MyLatLng = new google.maps.LatLng(35.6811673, 139.7670516);
                    var Options = {
                        zoom: 15,      //地図の縮尺値
                        center: MyLatLng,    //地図の中心座標
                        mapTypeId: 'roadmap'   //地図の種類
                    };
                    var map = new google.maps.Map(document.getElementById('map'), Options);
                </script>
            </div>
        </div>
    </div>
</x-app-layout>

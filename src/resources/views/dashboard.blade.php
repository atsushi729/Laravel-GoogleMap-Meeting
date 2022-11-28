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
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Your meeting schedule</h3>
                    <div class="container">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Meeting Time</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($meetings)
                                @foreach($meetings as $meeting)
                                    <tr @onclick="showMap({{ $meeting->latitude }}, {{ $meeting->longitude }})">
                                        <td>{{ $meeting->id }}</td>
                                        <td>{{ $meeting->name }}</td>
                                        <td>{{ $meeting->location }}</td>
                                        <td>{{ $meeting->latitude }}</td>
                                        <td>{{ $meeting->longitude }}</td>
                                        <td>{{ $meeting->meeting_time }}</td>
                                        <td>{{ $meeting->date }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9"> No meetings found</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div id="map" class="w-full hei"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?language=en&region=JP&key={}" async defer></script>

    <script>
        function showMap(lat, lng)
        {
            var coodinates = {lat:lat, lng:lng};
            var map = document.getElementById('map');

            var map = new google.maps.Map(map, {
                    zoom: 10,
                    center: coodinates,
                }
            );
        }
        showMap(0, 0);
    </script>

    </body>
    </html>
</x-app-layout>

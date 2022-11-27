<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Your Meeting Schedule</h3>
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
                                        <tr>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

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
                    <form action="" method="post">
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
            </div>
        </div>
    </div>
</x-app-layout>

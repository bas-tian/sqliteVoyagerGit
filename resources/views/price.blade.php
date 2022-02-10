@extends('layouts.app')

@section('content')
    <div class="row max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="col-md-8 mx-auto flex justify-center pt-8 sm:justify-start sm:pt-0">
            <h1>Prices</h1>
        </div>

        <div class="col-md-8 mx-auto mt-8 bg-white w-75 p-3 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-6">


                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            <span>Rezidentiat.com</span> oferă posibilitatea evaluării continue din fiecare capitol al tematicii, dar și simularea examenului de rezidențiat.
                        </div>


                        <button class="btn btn-primary">
                            <a href="{{ url('str/25') }}" class="text-light">
                                {{ __('Subscribe for 3 months') }}
                            </a>
                        </button>


                        <button class="btn btn-primary">
                            <a href="{{ url('str/50') }}" class="text-light">
                                {{ __('Subscribe for 6 months') }}
                            </a>
                        </button>

                        <button class="btn btn-primary">
                            <a href="{{ url('str/100') }}" class="text-light">
                                {{ __('Subscribe for 1 year') }}
                            </a>
                        </button>

                    </div>
                </div>

                <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">

                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            Grilele complete, explicațiile detaliate și urmărirea performanței vă vor sprijini <br>în obținerea punctajului maxim la examenul de admitere în rezidențiat.
                        </div>
                    </div>
                </div>

                <div class="p-6 border-t border-gray-200 dark:border-gray-700">

                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 mx-auto flex justify-center mt-4 sm:items-center sm:justify-between">
            <div class="text-center text-sm text-gray-500 sm:text-left">
                <div class="flex items-center">

                    <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                        Shop
                    </a>

                    <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                        Sponsor
                    </a>
                </div>
            </div>

            <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </div>
@endsection

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.partials._head')
    <body>
        <div id="app">
            @include('layouts.partials._navigation')

            <main class="py-4">
               
                <div class="container">
                    @include('layouts.partials._alerts')
                    @yield('content')
                    
                </div>

            </main>
        </div>
    </body>
</html>

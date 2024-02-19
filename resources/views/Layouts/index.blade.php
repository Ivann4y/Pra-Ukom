<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | {{ $title }}</title>
    @vite('resources/css/app.css')

</head>

<body>
    @include('Layouts.SideNavBar')
    <div class="p-4 sm:ml-64 mx-auto">
        <div class="p-4 rounded-lg mt-14">
            @yield('content')
        </div>
    </div>
</body>

</html>

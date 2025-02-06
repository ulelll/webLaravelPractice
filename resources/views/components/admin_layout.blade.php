<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])

    <title>Document</title>
</head>
<body>
<div class="antialiased bg-gray-50 dark:bg-gray-900">

    {{--navbar--}}
    <x-admin-navbar></x-admin-navbar>
    <!-- Sidebar -->

    <x-admin-sidebar></x-admin-sidebar>

    <main class="p-16 md:ml-64 h-auto pt-20">
        {{ $slot }}
    </main>
</div>

<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{app()->getLocale() == 'ar' ? 'rtl' :'ltr'}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @routes
    @inertiaHead
</head>
<body>
@inertia
</body>
</html>

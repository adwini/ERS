<!DOCTYPE html>
<html lang="en" data-theme="night">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Employee Rewarding System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">


    <livewire:layout.navigationEmp />
    {{-- NAVBAR mobile only --}}
    <x-mary-nav sticky class="lg:hidden">
        <x-slot:brand>

        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="mr-3 lg:hidden">
                <x-mary-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-mary-nav>


    {{-- MAIN --}}
    <x-mary-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">

            {{-- BRAND --}}
            <img src="{{ asset('image/ers_logo.png') }}" alt=" Rewarding System" class="w-auto h-15" />

            {{-- MENU --}}
            <x-mary-menu activate-by-route>

                <x-mary-menu-item title="Dashboard" icon="o-cube" link="/usr/dashboard" />
                <x-mary-menu-item title="Rewards" icon="o-trophy" link="/usr/rewards" />
                <x-mary-menu-item title="Voting" icon="o-users" link="/usr/voting" />
                <x-mary-menu-item title="Account Settings" icon="o-wrench-screwdriver" link="/usr/settings" />


            </x-mary-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-mary-main>


    {{--  TOAST area --}}
    <x-mary-toast />
</body>

</html>

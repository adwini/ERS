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


 <livewire:layout.navigation />
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

                <x-mary-menu-item title="Dashboard" icon="o-bars-3-center-left" link="/dashboard" />
                <x-mary-menu-sub title="Modify Branches" icon="o-cog">
                    <x-mary-menu-item title="Branch List" icon="o-clipboard-document-list" link="/branch-list" />
                </x-mary-menu-sub>
                <x-mary-menu-item title="Add Token" icon="o-squares-plus" link="/token" />
                <x-mary-menu-item title="Voting" icon="o-rectangle-group" link="/voting" />

            </x-mary-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-mary-main>


    {{--  TOAST area --}}
    {{-- <x-toast /> --}}
</body>
</html>

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

    {{-- NAVBAR mobile only --}}
    <x-nav sticky class="lg:hidden">
        <x-slot:brand>
{{--            <div class="ml-5 pt-5">App</div>--}}
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-nav>


    {{-- MAIN --}}
    <x-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">

            {{-- BRAND --}}
        <img src="{{ asset('image/ers_logo.png') }}" alt=" Rewarding System" class="w-auto
         h-15" />

            {{-- MENU --}}
            <x-menu activate-by-route>

                {{-- User --}}
{{--                @if($user = auth()->user())--}}
{{--                    <x-menu-separator />--}}

{{--                    <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">--}}
{{--                        <x-slot:actions>--}}
{{--                            <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate link="/logout" />--}}
{{--                        </x-slot:actions>--}}
{{--                    </x-list-item>--}}

{{--                    <x-menu-separator />--}}
{{--                @endif--}}

                <x-menu-item title="Dashboard" icon="o-bars-3-center-left" link="/admin/dashboard" />
                <x-menu-sub title="Modify Branches" icon="o-cog">
                    <x-menu-item title="Branch List" icon="o-clipboard-document-list" link="/admin/branch-list" />
                </x-menu-sub>
                <x-menu-item title="Add Token" icon="o-squares-plus" link="/admin/token" />
                <x-menu-item title="Voting" icon="o-rectangle-group" link="/admin/voting" />
                <x-menu-item title="Logout" icon="o-power" link="/" />
            </x-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>


    {{--  TOAST area --}}
    <x-toast />
</body>
</html>

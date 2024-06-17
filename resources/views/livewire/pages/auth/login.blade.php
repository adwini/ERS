<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Auth;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $position = Auth::user()->position;

        switch ($position) {
            case 'ADMIN':
                $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
                break;
            case 'MANAGER':
                $this->redirectIntended(default: route('auth2.dashboard', absolute: false), navigate: true);
                break;
            case 'EMPLOYEE':
                $this->redirectIntended(default: route('EmpDashboard', absolute: false), navigate: true);
                break;

            default:
                abort(401);
        }

        // if (Auth::user()->position == 'ADMIN') {
        //     $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
        // }
        // if (Auth::user()->position == 'MANAGER') {
        //     $this->redirectIntended(default: route('auth2.dashboard', absolute: false), navigate: true);
        // } else {
        //     $this->redirectIntended(default: route('EmployeeDashboard', absolute: false), navigate: true);
        // }
    }
}; ?>

<div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />



    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">Sign in to
            your account</h1>
        <form wire:submit="login">
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="form.email" id="email" class="block w-full mt-1" type="email" name="email"
                    required autofocus autocomplete="username" placeholder="email@example.com" />
                <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input wire:model="form.password" id="password" class="block w-full mt-1" type="password"
                    name="password" required autocomplete="current-password" placeholder="********" />

                <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember" class="inline-flex items-center">
                    <input wire:model="form.remember" id="remember" type="checkbox"
                        class="text-indigo-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}" wire:navigate>
                        {{-- {{ __('Forgot your password?') }} --}}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</div>

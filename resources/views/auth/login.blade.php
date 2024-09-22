<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <a href="/" class='flex items-center font-medium'>
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                <p>St Benidict</p>
            </a>
        </div>
        <div class='my-5'>
            <h1 class='text-[25px] font-medium'>Login to your Account</h1>
            <a href="" class=''>Welcome black!</a>
        </div>
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full border border-[#6B5EE6]" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full border border-[#6B5EE6]"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mt-4 flex justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
            <div>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            </div>
        </div>

        <div class="flex mt-4">
           

            <x-primary-button class="flex justify-center w-full bg-[#6B5EE6]">
                {{ __('Log in') }}
            </x-primary-button>
        
        </div>
        <div class='flex gap-2 justify-center text-sm mt-3'>
            <p>Dont have an account?</p>
            <a href="{{ route('register') }}" class='text-[#6B5EE6]'>Create an account</a>
        </div>
       
    </form>
</x-guest-layout>

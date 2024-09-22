<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <a href="/" class='flex items-center font-medium'>
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                <p>St Benidict</p>
            </a>
        </div>

        <div class='my-5'>
            <h1 class='text-[25px] font-medium'>Create your account</h1>
            <a href="" class=''>Join us and get started!</a>
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="flex justify-center w-full bg-[#6B5EE6]">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <div class='flex gap-2 justify-center text-sm mt-3'>
            <p>Already have an account?</p>
            <a href="{{ route('login') }}" class='text-[#6B5EE6]'>Login Now</a>
        </div>
    </form>
</x-guest-layout>

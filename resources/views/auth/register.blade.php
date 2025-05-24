<x-guest-layout>
    {{-- <form method="POST" action="{{ route('register') }}">
        @csrf

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
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf

    <!-- First Name -->
    <div>
        <x-input-label for="first_name" :value="__('First Name')" />
        <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
    </div>

    <!-- Last Name -->
    <div class="mt-4">
        <x-input-label for="last_name" :value="__('Last Name')" />
        <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required />
        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
    </div>

    <!-- Date of Birth -->
    <div class="mt-4">
        <x-input-label for="dob" :value="__('Date of Birth')" />
        <x-text-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required max="{{ date('Y-m-d') }}" />
        <x-input-error :messages="$errors->get('dob')" class="mt-2" />
    </div>

    <!-- Address -->
    <div class="mt-4">
        <x-input-label for="address" :value="__('Address')" />
        <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
        <x-input-error :messages="$errors->get('address')" class="mt-2" />
    </div>

    <!-- Phone Number -->
    <div class="mt-4">
        <x-input-label for="phone" :value="__('Phone Number')" />
        <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required pattern="[0-9]{10}" maxlength="10" placeholder="Enter 10-digit number" />
        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
    </div>

    <!-- Email -->
    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Photo -->
    <div class="mt-4">
        <x-input-label for="photo" :value="__('Profile Photo')" />
        <x-text-input id="photo" class="block mt-1 w-full" type="file" name="photo" accept=".jpg,.jpeg,.png,.gif,image/*" required />
        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
            required autocomplete="new-password"
            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$"
            title="Password must be at least 8 characters long, include an uppercase letter, a lowercase letter, and a special character." />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <!-- Register Button -->
    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>
        <x-primary-button class="ms-4">
            {{ __('Register') }}
        </x-primary-button>
    </div>
</form>

</x-guest-layout>

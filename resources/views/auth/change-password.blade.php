<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('MỜI NHẬP MÃ ĐĂNG NHẬP HOẶC EMAIL') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')

       

        

        <!-- Current Password -->
        <div class="mt-4">
            <x-input-label for="current_password" :value="__('Mật khẩu cũ')" />
            <x-text-input id="current_password" class="block mt-1 w-full" type="password" name="current_password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
        </div>
       <!-- New Password -->
       <div class="mt-4">
            <x-input-label for="password" :value="__('Nhập mật khẩu mới:')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
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
            <button type="submit">Xác nhận</button>
        </div>
    </form>
    </x-guest-layout>
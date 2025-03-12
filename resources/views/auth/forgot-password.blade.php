<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('MỜI NHẬP MÃ ĐĂNG NHẬP HOẶC EMAIL') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        
            <div>
                <label for="email" class="block text-gray-700">Email Address</label>
                <input id="email" type="email" placeholder = "Email/Ten dang nhap" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" name="email" required autofocus>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            
                

        

        <div class=" mt-4 flex items-center justify-center ">
        <button type=submit class="bg-[#003C75] w-3/4 py-3 px-6 text-white font-semibold rounded-lg ">Tiếp tục</button>
        </div>
    </form>
</x-guest-layout>

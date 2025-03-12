<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-4">HE THONG QUAN LY DO AN THUC TAP <br> TRUONG DAI HOC THUY LOI</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="flex flex-row justify-center">
                <img src="{{ asset('images/logo.png') }}" alt="" class="h-[145px] w-[174px]">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email Address</label>
                <input id="email" type="email" placeholder = "Email/Ten dang nhap" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" name="email" required autofocus>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input id="password" type="password" placeholder= "Mat khau" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" name="password" required>
            </div>

            <div class="flex flex-col justify-between items-center mb-4">
            <button type="submit" class="w-full bg-[#003C75] text-black p-2 rounded-[10px] hover:bg-blue-700">DANG NHAP</button>
            <a href="{{ route('password.request') }}" class="text-blue-500 text-sm">Quen mat khau</a>
            </div>

            
        </form>
    </div>

</x-guest-layout>



<x-guest-layout>
        <div class="relative w-full max-w-md">
            <!-- Glowing Tech Background Effect -->
            <div class="absolute -inset-0.5 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-xl blur-lg opacity-50 animate-pulse"></div>
            
            <div class="relative bg-gray-800 rounded-xl shadow-2xl border border-gray-700 p-8 space-y-6">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="text-center">
                    <h2 class="text-3xl font-bold text-white tracking-tight">
                        {{ __('System Access') }}
                    </h2>
                    <p class="mt-2 text-sm text-gray-400">
                        {{ __('Authenticate to continue') }}
                    </p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-text-input 
                            id="email" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                            autofocus 
                            autocomplete="username"
                            placeholder="{{ __('Email Address') }}"
                            class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-400" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-text-input 
                            id="password" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="current-password"
                            placeholder="{{ __('Password') }}"
                            class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-400" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input 
                                id="remember_me" 
                                type="checkbox" 
                                name="remember" 
                                class="h-4 w-4 text-cyan-600 bg-gray-700 border-gray-600 rounded focus:ring-cyan-500"
                            >
                            <label for="remember_me" class="ml-2 block text-sm text-gray-300">
                                {{ __('Remember me') }}
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-sm">
                                <a href="{{ route('password.request') }}" class="font-medium text-cyan-400 hover:text-cyan-300">
                                    {{ __('Forgot password?') }}
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <div>
                        <x-primary-button class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition duration-300">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>

                <!-- Registration Link -->
                <div class="text-center mt-6">
                    <p class="text-sm text-gray-400">
                        {{ __('Don\'t have an access?') }}
                        <a href="{{ route('register') }}" class="font-medium text-cyan-400 hover:text-cyan-300">
                            {{ __('Request Access') }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
    
</x-guest-layout>
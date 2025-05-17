<x-guest-layout>
    
        <div class="relative w-full max-w-md">
            <!-- Glowing Tech Background Effect -->
            
            <div class="relative bg-gray-800 rounded-xl shadow-2xl border border-gray-700 p-8 space-y-6">
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-white tracking-tight">
                        {{ __('Create Account') }}
                    </h2>
                    <p class="mt-2 text-sm text-gray-400">
                        {{ __('Register to access the system') }}
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-text-input 
                            id="name" 
                            type="text" 
                            name="name" 
                            :value="old('name')" 
                            required 
                            autofocus 
                            autocomplete="name"
                            placeholder="{{ __('Full Name') }}"
                            class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent"
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-400" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-text-input 
                            id="email" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
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
                            autocomplete="new-password"
                            placeholder="{{ __('Password') }}"
                            class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-400" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-text-input 
                            id="password_confirmation" 
                            type="password" 
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password"
                            placeholder="{{ __('Confirm Password') }}"
                            class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-400" />
                    </div>

                    <!-- Register Button -->
                    <div>
                        <x-primary-button class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition duration-300">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>

                    <!-- Login Link -->
                    <div class="text-center mt-4">
                        <p class="text-sm text-gray-400">
                            {{ __('Already have an account?') }}
                            <a href="{{ route('login') }}" class="font-medium text-cyan-400 hover:text-cyan-300">
                                {{ __('Log in') }}
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    
</x-guest-layout>
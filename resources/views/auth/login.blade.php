@extends('../public.master')
@section('ayush')
<div class="container">
    <div class="row">
        <div class="col-lg-6 sm-8 mx-auto">
            <x-auth-card >
                <x-slot name="logo">
                    <a href="/">
                    </a>
                </x-slot>
    
       
           <div class="card border border-4">
               <div class="card-header fs-2 text-center bg-primary text-light">Users Login</div>
               <div class="card-body">
                <form method="POST"  action="{{ route('login') }}" >
                    @csrf
        
                    <!-- Email Address -->
                    <div class="d-flex">
                        <x-label for="email " :value="__('Email:')" class="fs-4 me-3 mt-3" />
        
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
        
                    <!-- Password -->
                    <div class="mt-4 d-flex">
                        <x-label for="password" :value="__('Password:')" class="fs-4 me-3 mt-3"/>
        
                        <x-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                    </div>
        
                    <!-- Remember Me -->
                    <div class="block flex items-center justify-end mt-4 ">
                        @if (Route::has('password.request'))
                            <a class="underline me-5 text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        <label for="remember_me" class="inline-flex items-center ms-5">
                            <input id="remember_me" type="checkbox" class="ms-5 rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
        
                    </div>
        
                    <div class="flex items-center justify-end mt-2">
                        
                        <x-button class="ml-3 w-100 mt-3 text bg-success fs-4" style="border-radius:8px">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
               </div>
           </div>
        </x-auth-card>
        </div>
    </div>
</div>
    
@endsection
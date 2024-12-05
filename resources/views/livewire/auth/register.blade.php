@section('title', 'Create a new account')

<div class="z-50">
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <div class="pb-6 sm:mx-auto sm:w-full sm:max-w-md">
                <a href="{{ route('home') }}">
                    <x-logo class="w-auto h-16 mx-auto text-primary-600" />
                </a>

                <h2 class="mt-6 text-2xl font-extrabold leading-9 text-center text-gray-900">
                    Create a new account
                </h2>

                <p class="mt-2 text-sm leading-5 text-center text-gray-600 max-w">
                    Or
                    <a href="{{ route('login') }}" class="font-medium transition duration-150 ease-in-out text-primary-600 hover:text-primary-500 focus:outline-none focus:underline">
                        sign in to your account
                    </a>
                </p>
            </div>
            <form wire:submit.prevent="register" class="w-80">
                <div>
                    <x-input wire:model.lazy="name" id="name" type="text" required autofocus  label="Full Name" />
                </div>

                <div class="mt-6">
                    <x-input wire:model.lazy="email" id="email" type="email" required autofocus  label="Email"  />
                </div>

                <div class="mt-6">
                    <x-inputs.password label="Password" wire:model.lazy="password" id="password" type="password" required  />
                </div>

                <div class="mt-6">
                    <x-inputs.password  label="Confirm Password" wire:model.lazy="passwordConfirmation" id="password_confirmation" type="password" required   />
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-primary-600 hover:bg-primary-500 focus:outline-none focus:border-primary-700 focus:ring-primary active:bg-primary-700">
                            Register
                        </button>
                    </span>
                </div>
            </form>

            
        </div>
    </div>
</div>

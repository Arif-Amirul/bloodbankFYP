@section('title', 'Blood Bank Management System')

<div class="z-50 mt-8 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
        <div class="pb-6 sm:mx-auto sm:w-full sm:max-w-md">
            <a href="{{ route('home') }}">
                <x-logo class="w-auto h-16 mx-auto text-primary-600" />
            </a>

            <h2 class="mt-6 text-2xl font-extrabold leading-9 text-center text-gray-900">
                LOGIN
            </h2>

           {{-- <p class="mt-2 text-sm leading-5 text-center text-gray-600 max-w">
                Or
                <a href="{{ route('register') }}" class="font-medium transition duration-150 ease-in-out text-primary-600 hover:text-primary-500 focus:outline-none focus:underline">
                    create a new account
                </a>
            </p>  --}}
        </div>
        <form wire:submit.prevent="authenticate" class="w-80">
            <div>
                <x-input
                    wire:model.lazy="email"
                    id="email"
                    name="email"
                    type="email"
                    icon="user"
                    placeholder="Email"
                />
            </div>

            <div class="mt-6">
                <x-inputs.password
                    wire:model.lazy="password"
                    id="password"
                    type="password"
                    placeholder="Password"
                />
            </div>

            {{-- <div class="flex items-center justify-between mt-6">
                <div class="flex items-center">
                    <x-checkbox wire:model.lazy="remember" id="remember" class="w-4 h-4 transition duration-150 " />
                    <label for="remember" class="block ml-2 text-sm leading-5 text-gray-900 dark:text-gray-200">
                        Remember
                    </label>
                </div>

                <div class="text-sm leading-5">
                    <a  href="{{ route('password.request') }}" class="font-medium transition duration-150 ease-in-out text-primary-600 hover:text-primary-500 focus:outline-none focus:underline">
                        Forgot your password?
                    </a>
                </div>
            </div> --}}

            <div class="mt-10">
                <span class="block w-full rounded-md shadow-sm">
                    <x-button
                        type="submit"
                        primary
                        label="Login"
                        onclick="$openModal('myModal')"
                        class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out "
                    />
                </span>
            </div>
        </form>
    </div>
</div>

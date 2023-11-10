<div>
    <x-container title="Register" routeBackBtn="" titleBackBtn="" disableBackBtn="">
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
    </x-container>
</div>

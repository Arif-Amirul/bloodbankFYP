<div>
    <x-container title="Register User" routeBackBtn="" titleBackBtn="" disableBackBtn="">
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

            <div class="grid grid-cols-1 mt-5">
                <div>
                    <x-table.table>
                        <x-slot name="thead">
                            <x-table.table-header class="text-center" value="Name" sort="" />
                            <x-table.table-header class="text-center" value="Email" sort="" />
                            <x-table.table-header class="text-center" value="Password" sort="" />
                            <x-table.table-header class="text-center" value="Edit" sort="" />

                        </x-slot>
                        <x-slot name="tbody">
                        </div>
                        @foreach($users as $user)
                                <tr>
                                    <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                        {{ $user->name }}
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                        {{ $user->email }}
                                    </x-table.table-body>
                                    <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                        *******
                                    </x-table.table-body>
                                    <x-table.table-body class="text-xs font-medium text-gray-700 text-center">
                                        <div class="flex items-center space-x-2">
                                            {{-- <x-button class="bg-green-500 text-white" wire:click="" label="Update" /> --}}
                                            <x-button class="bg-red-500 text-white" wire:click="deleteUser({{ $user->id }})" label="Delete" />
                                        </div>
                                    </x-table.table-body>
                                </tr>
                                @endforeach
                            </x-slot>
                    </x-table.table>

            </div>
    </x-container>

</div>

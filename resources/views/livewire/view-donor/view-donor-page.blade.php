<div>
    <x-container title="Manage Donor" routeBackBtn="" titleBackBtn="" disableBackBtn="" >
        <div class="grid grid-cols-1">
            <div>
                <x-table.table>
                    <x-slot name="thead">
                        <x-table.table-header class="text-center" value="Donor ID" sort="" />
                        <x-table.table-header class="text-center" value="Full Name" sort="" />
                        <x-table.table-header class="text-center" value="IC Number" sort="" />
                        <x-table.table-header class="text-center" value="Phone Number" sort="" />
                        <x-table.table-header class="text-center" value="Blood Group" sort="" />
                        <x-table.table-header class="text-center" value="More Info" sort="" />
                        <x-table.table-header class="text-center" value="Edit" sort="" />
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($data as $item)
                            <tr>
                                <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                    {{$item ->donor_id}}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                    {{$item ->full_name}}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                    {{$item ->identification_number	}}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                    {{$item ->phone_number}}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                    {{$item ->blood_group}}
                                </x-table.table-body>

                                <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                    <x-button class="bg-blue-500 text-white" wire:click="openModalViewMore('{{$item->id}}')" label="Details" />
                                </x-table.table-body>

                                <x-table.table-body class="text-xs font-medium text-gray-700 text-center">
                                    <div class="flex items-center space-x-2">
                                        <x-button class="bg-green-500 text-white" wire:click="openModalUpdate('{{$item->id}}')" label="Update" />
                                        <x-button class="bg-red-500 text-white" wire:click="delete('{{$item->id}}')" label="Delete" />
                                    </div>
                                </x-table.table-body>
                            </tr>
                        @endforeach
                        </x-slot>
                </x-table.table>

                <!--VIEW DETAILS-->
                <div>
                    <x-modal.card title="DETAILS" blur wire:model.defer="viewMoreModal">
                            <div>
                                {{-- <x-table.table>
                                    <x-slot name="thead">
                                        <x-table.table-header class="text-center" value="Marital Status" sort="" />
                                        <x-table.table-header class="text-center" value="Date" sort="" />
                                        <x-table.table-header class="text-center" value="Gender" sort="" />
                                        <x-table.table-header class="text-center" value="Race" sort="" />
                                        <x-table.table-header class="text-center" value="Street Address" sort="" />
                                        <x-table.table-header class="text-center" value="City" sort="" />
                                        <x-table.table-header class="text-center" value="State" sort="" />
                                        <x-table.table-header class="text-center" value="Postal Code" sort="" />

                                    </x-slot>
                                    <x-slot name="tbody">
                                        <tr>
                                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                                {{$marital_status}}
                                            </x-table.table-body>
                                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                                {{$date}}
                                            </x-table.table-body>
                                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                                {{$gender}}
                                            </x-table.table-body>
                                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                                {{$race}}
                                            </x-table.table-body>
                                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                                {{$street_address}}
                                            </x-table.table-body>
                                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                                {{$city}}
                                            </x-table.table-body>
                                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                                {{$state}}
                                            </x-table.table-body>
                                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                                {{$postal_code}}
                                            </x-table.table-body>
                                        </tr>
                                    </x-slot>
                                </x-table.table> --}}
                                <table class="border-collapse w-full">
                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="py-2 px-4 border" colspan="2">Donor Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border">
                                            <td class="py-2 px-4 border text-center">Marital Status</td>
                                            <td class="py-2 px-4 border text-center">{{$marital_status}}</td>
                                        </tr>
                                        <tr class="border">
                                            <td class="py-2 px-4 border text-center">Date</td>
                                            <td class="py-2 px-4 border text-center">{{$date}}</td>
                                        </tr>
                                        <tr class="border">
                                            <td class="py-2 px-4 border text-center">Gender</td>
                                            <td class="py-2 px-4 border text-center">{{$gender}}</td>
                                        </tr>
                                        <tr class="border">
                                            <td class="py-2 px-4 border text-center">Race</td>
                                            <td class="py-2 px-4 border text-center">{{$race}}</td>
                                        </tr>
                                        <tr class="border">
                                            <td class="py-2 px-4 border text-center">Street Address</td>
                                            <td class="py-2 px-4 border text-center">{{$street_address}}</td>
                                        </tr>
                                        <tr class="border">
                                            <td class="py-2 px-4 border text-center">City</td>
                                            <td class="py-2 px-4 border text-center">{{$city}}</td>
                                        </tr>
                                        <tr class="border">
                                            <td class="py-2 px-4 border text-center">State</td>
                                            <td class="py-2 px-4 border text-center">{{$state}}</td>
                                        </tr>
                                        <tr class="border">
                                            <td class="py-2 px-4 border text-center">Postal Code</td>
                                            <td class="py-2 px-4 border text-center">{{$postal_code}}</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <x-slot name="footer">
                                    <div class="flex justify-end gap-x-4">
                                        <x-button flat label="Close" x-on:click="close" />
                                    </div>
                            </x-slot>
                    </x-modal.card>
                </div>

                <!--UPDATE DONOR -->
                <div>
                        <x-modal.card title="UPDATE DONOR" blur wire:model.defer="updateModal">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <x-input label="Donor ID" placeholder="donor id" wire:model.defer="donor_id" />
                                    <x-input label="Full Name" placeholder="full name" wire:model.defer="full_name" />
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                                    <x-input label="IC Number" placeholder="IC Number" wire:model.defer="identification_number" />
                                    <x-input label="Phone Number" placeholder="phone number" wire:model.defer="phone_number" />
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                                    <x-select
                                        label="Marital Status"
                                        placeholder="select marital status"
                                        :options="['Single', 'Married', 'Divorcee']"
                                        wire:model.defer="marital_status"
                                    />
                                    <x-input type="date" label="Birth date" wire:model.defer="date" />
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                                    <x-select
                                        label="Gender"
                                        placeholder="select Gender"
                                        :options="['Male', 'Female']"
                                        wire:model.defer="gender"
                                    />
                                    <x-select
                                        label="Race"
                                        placeholder="select race"
                                        :options="['Melayu', 'Cina','India','Iban','Kadazan', 'Bidayuh' ,'Melanau', 'Bajau','Murut']"
                                        wire:model.defer="race"
                                    />
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                                    <div class="col-span-1 sm:col-span-2">
                                        <x-input label="Street Address" placeholder="street address" wire:model.defer="street_address" />
                                    </div>
                                </div>

                                <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6 mt-4">
                                    <x-input label="City" placeholder="city" wire:model.defer="city" />
                                    <x-input label="State" placeholder="state" wire:model.defer="state" />
                                    <x-input label="Postal Code" placeholder="postal code" wire:model.defer="postal_code" />
                                </div>
                                <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6 mt-4">
                                    <x-select
                                        label="Blood Group"
                                        placeholder="select blood group"
                                        :options="['A+', 'A-', 'O+', 'O-', 'B+', 'B-', 'AB+','AB-']"
                                        wire:model.defer="blood_group"
                                    />
                                </div>
                                <x-slot name="footer">
                                    <div class="flex justify-end gap-x-4">
                                        <x-button flat label="Close" x-on:click="close" />
                                        <x-button primary label="Update" wire:click="update('{{$donor_id}}')" />
                                    </div>
                                </x-slot>
                        </x-modal.card>
                <div>

            </div>
        </div>
    </x-container>
</div>

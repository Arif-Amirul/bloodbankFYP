<div>
    <x-container title="Manage Patient Page" routeBackBtn="" titleBackBtn="" disableBackBtn="" >
        <div class="grid grid-cols-1">
            <div>
                <x-table.table>
                        <x-slot name="thead">
                            <x-table.table-header class="text-center" value="Patient ID" sort="" />
                            <x-table.table-header class="text-center" value="Full Name" sort="" />
                            <x-table.table-header class="text-center" value="Blood Group" sort="" />
                            <x-table.table-header class="text-center" value="Location" sort="" />
                            <x-table.table-header class="text-center" value="More Info" sort="" />
                            <x-table.table-header class="text-center" value="Edit" sort="" />

                        </x-slot>
                        <x-slot name="tbody">
                            @foreach ($dataPatient as $item)
                            <tr>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                {{$item ->patient_id}}
                            </x-table.table-body>

                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                {{$item ->patient_full_name}}
                            </x-table.table-body>

                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                {{$item ->required_blood_group}}
                            </x-table.table-body>

                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                {{$item ->location}}
                            </x-table.table-body>

                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                <x-button class="bg-blue-500 text-white" wire:click="openModalViewMore('{{$item->id}}')" label="Details" />
                            </x-table.table-body>

                            <x-table.table-body class="text-xs font-medium text-gray-700">
                                    <div class="flex items-center space-x-2">
                                        <x-button class="bg-green-500 text-white" wire:click="openModalUpdate('{{$item->id}}')" label="Update" />
                                        <x-button class="bg-red-500 text-white" wire:click="delete('{{$item->id}}')" label="Delete" />
                                    </div>
                            </x-table.table-body>
                            </tr>
                            @endforeach
                        </x-slot>
                </x-table.table>

                <!--UPDATE PATIENT-->
                <div>
                    <x-modal.card title="UPDATE PATIENT" blur wire:model.defer="updateModal">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <x-input label="Patient ID" placeholder="patient id" wire:model.defer="patient_id" />
                            <x-input label="Full Name" placeholder="full name" wire:model.defer="patient_full_name" />
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                            <x-input type="date" label="Birth date" wire:model.defer="date" />
                            <x-input label="Phone Number" placeholder="phone number" wire:model.defer="phone_number" />
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                            <x-select
                                label="Gender"
                                placeholder="select Gender"
                                :options="['Male', 'Female']"
                                wire:model.defer="gender"
                            />
                            <x-select
                                label="Required Blood Group"
                                placeholder="select blood group"
                                :options="['A+', 'A-', 'O+', 'O-', 'B+', 'B-', 'AB+','AB-' ]"
                                wire:model.defer="required_blood_group"
                            />
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                            <x-input label="Location" placeholder="location" wire:model.defer="location" />
                            <x-input label="Contact" placeholder="contact" wire:model.defer="contact" />
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                            <x-input type="date" label="transfer date" wire:model.defer="transfer_date" />
                        </div>

                        <x-slot name="footer">
                            <div class="flex justify-end gap-x-4">
                                <x-button flat label="Close" x-on:click="close" />
                                <x-button primary label="Update" wire:click="update('{{$patient_id}}')" />
                            </div>
                        </x-slot>
                    </x-modal.card>
                <div>

                <!--MORE INFO-->
                <div>
                    <x-modal.card title="DETAILS" blur wire:model.defer="viewMoreModal">
                        <div>
                            {{-- <x-table.table>
                                <x-slot name="thead">
                                        <x-table.table-header class="text-center" value="Birth Date" sort="" />
                                        <x-table.table-header class="text-center" value="Phone Number" sort="" />
                                        <x-table.table-header class="text-center" value="Gender" sort="" />
                                        <x-table.table-header class="text-center" value="Transfer Date" sort="" />
                                        <x-table.table-header class="text-center" value="Location Contact" sort="" />
                                </x-slot>
                                    <x-slot name="tbody">
                                        <tr>
                                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                                {{$date}}
                                            </x-table.table-body>
                                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                                {{$phone_number}}
                                            </x-table.table-body>
                                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                                {{$gender}}
                                            </x-table.table-body>
                                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                                {{$transfer_date}}
                                            </x-table.table-body>
                                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                                {{$contact}}
                                            </x-table.table-body>
                                        </tr>
                                    </x-slot>
                            </x-table.table> --}}
                            <table class="border-collapse w-full">
                                <thead>
                                    <tr class="bg-gray-200">
                                        <th class="py-2 px-4 border" colspan="2">Patient Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border">
                                        <td class="py-2 px-4 border text-center">Date</td>
                                        <td class="py-2 px-4 border text-center">{{$date}}</td>
                                    </tr>
                                    <tr class="border">
                                        <td class="py-2 px-4 border text-center">Phone Number</td>
                                        <td class="py-2 px-4 border text-center">{{$phone_number}}</td>
                                    </tr>
                                    <tr class="border">
                                        <td class="py-2 px-4 border text-center">Gender</td>
                                        <td class="py-2 px-4 border text-center">{{$gender}}</td>
                                    </tr>
                                    <tr class="border">
                                        <td class="py-2 px-4 border text-center">Contact</td>
                                        <td class="py-2 px-4 border text-center">{{$contact}}</td>
                                    </tr>
                                    <tr class="border">
                                        <td class="py-2 px-4 border text-center">Transfer Date</td>
                                        <td class="py-2 px-4 border text-center">{{$transfer_date}}</td>
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
            </div>
        </div>
    </x-container>
</div>

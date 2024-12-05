<div>
    <x-container title="Manage Donation" routeBackBtn="" titleBackBtn="" disableBackBtn="" >
        <div class="grid grid-cols-1">
            <div>
                <x-table.table>
                    <x-slot name="thead">
                        <x-table.table-header class="text-center" value="Donation ID" sort="" />
                        <x-table.table-header class="text-center" value="Donor ID" sort="" />
                        <x-table.table-header class="text-center" value="Blood Group" sort="" />
                        <x-table.table-header class="text-center" value="Blood ID" sort="" />
                        <x-table.table-header class="text-center" value="Donation Date" sort="" />
                        {{-- <x-table.table-header class="text-center" value="Blood Test" sort="" /> --}}
                        <x-table.table-header class="text-center" value="Edit" sort="" />
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($datadonate as $item)
                        <tr>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                {{$item ->donation_id}}
                            </x-table.table-body>

                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                {{$item ->donor_id}}
                            </x-table.table-body>

                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                {{$item ->blood_group}}
                            </x-table.table-body>

                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                {{$item ->blood_id}}
                            </x-table.table-body>

                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                {{$item ->donation_date}}
                            </x-table.table-body>

                            {{-- <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center">
                                <div class="flex items-center space-x-2">
                                        <x-button class="bg-red-500 text-white" wire:click="openModalBloodTest" label="Add" />
                                        <x-button class="bg-blue-500 text-white" wire:click="viewModalBloodTest" label="View" />
                                    </div>
                            </x-table.table-body> --}}

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
            </div>
        </div>

        <!--UPDATE DONOR -->
        <div>
            <x-modal.card title="UPDATE DONATION" blur wire:model.defer="updateModal">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <x-input label="Donation ID" placeholder="donation id" wire:model.defer="donation_id" />
                        <x-input type="date" label="Donation Date" wire:model.defer="donation_date" />
                    </div>

                    <x-slot name="footer">
                        <div class="flex justify-end gap-x-4">
                            <x-button flat label="Close" x-on:click="close" />
                            <x-button primary label="Update" wire:click="update('{{$donor_id}}')" />
                        </div>
                    </x-slot>
            </x-modal.card>
        <div>

         <!--ADD BLOOD TEST-->
            {{-- <div>
                        <x-modal.card title="ADD BLOOD TEST" blur wire:model.defer="updateModalTest">

                            <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6">
                                <x-input label="Test ID" placeholder="test id" wire:model.defer="test_id" />
                                <x-input type="date" label="Test Date" wire:model.defer="date" />
                            </div>

                            <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6 mt-4">
                                <x-input label="White blood cells" placeholder="result" wire:model.defer="white_blood_cells" />
                                <x-input label="Neutrophils" placeholder="result" wire:model.defer="neutrophils" />
                                <x-input label="Red blood cells" placeholder="result" wire:model.defer="red_blood_cells" />
                            </div>

                            <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6 mt-4">
                                <x-input label="Haemoglobin" placeholder="result" wire:model.defer="haemoglobin" />
                                <x-input label="Hematocrit" placeholder="result" wire:model.defer="hematrocrit" />
                                <x-input label="MCV" placeholder="result" wire:model.defer="mcv" />
                            </div>

                            <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6 mt-4">
                                <x-input label="Platelets" placeholder="result" wire:model.defer="platelets" />
                                <x-input label="CD4+/CD8+" placeholder="result" wire:model.defer="cd4_cd8" />
                                <x-select
                                    label="HIV Test"
                                    placeholder="select result"
                                    :options="['Positive', 'Negative']"
                                    wire:model.defer="hiv_test"
                                />
                            </div>

                            <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6 mt-4">
                                <x-input label="Glicaemia" placeholder="result" wire:model.defer="glicaemia" />
                                <x-input label="Transferrin" placeholder="result" wire:model.defer="transferrin" />
                                <x-input label="Ferritim" placeholder="result" wire:model.defer="ferritim" />
                            </div>

                            <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6 mt-4">
                                <x-input label="Sodium" placeholder="result" wire:model.defer="sodium" />
                                <x-input label="Potassium" placeholder="result" wire:model.defer="potassium" />
                                <x-input label="Calcium" placeholder="result" wire:model.defer="calcium" />
                            </div>

                            <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6 mt-4">
                                <x-input label="Plasma proteins" placeholder="result" wire:model.defer="plasma_proteins" />
                                <x-input label="Albumin" placeholder="result" wire:model.defer="albumin" />
                                <x-input label="Prealbumin" placeholder="result" wire:model.defer="prealbumin" />
                            </div>

                            <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6 mt-4">
                                <x-input label="Gamma globulins" placeholder="result" wire:model.defer="gamma_globulins" />
                                <x-input label="ALT" placeholder="result" wire:model.defer="alt" />
                                <x-input label="Gamma GT" placeholder="result" wire:model.defer="gamma_gt" />
                            </div>

                            <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6 mt-4">
                                <x-select
                                    label="Blood Status"
                                    placeholder="blood status"
                                    :options="['Approved', 'Rejected']"
                                    wire:model.defer="blood_status"
                                />
                            </div>

                            <x-slot name="footer">
                                <div class="flex justify-end gap-x-4">
                                    <x-button flat label="Close" x-on:click="close" />
                                    <x-button primary wire:click="create" label="Add"  />
                                </div>
                            </x-slot>
                        </x-modal.card>
            </div> --}}

        <!--VIEW BLOOD TEST-->
            {{-- <div>
                        <x-modal.card title="View Blood Test" blur wire:model.defer="viewModalTest" max-width="9xl">
                            <div>
                                <x-table.table>
                                    <x-slot name="thead">
                                        <x-table.table-header class="text-center" colspan="" value="blood id" sort="" />
                                        <x-table.table-header class="text-center" colspan="" value="date" sort="" />

                                    </x-slot>
                                    <x-slot name="tbody">

                                         @foreach ($blooddata as $item)
                                        <tr>
                                            <x-table.table-body class="text-xs font-medium text-gray-700">
                                                {{$item ->blood_id}}
                                            </x-table.table-body>

                                            <x-table.table-body class="text-xs font-medium text-gray-700">
                                                {{$item ->date}}
                                            </x-table.table-body>
                                        </tr>
                                        @endforeach
                                    </x-slot>
                                </x-table.table>
                            </div>
                            <x-slot name="footer">
                                    <div class="flex justify-end gap-x-4">
                                        <x-button flat label="Close" x-on:click="close" />
                                    </div>
                            </x-slot>
                        </x-modal.card>
            </div> --}}
    </x-container>
    </div>
</div>

{{-- <div>
    <x-container title="View Donor" routeBackBtn="" titleBackBtn="" disableBackBtn="" >
        <div class="grid grid-cols-1">
            <div>
                <x-table.table>
                    <x-slot name="thead">
                        <x-table.table-header class="text-center" value="Patient ID" sort="" />
                        <x-table.table-header class="text-center" value="Blood ID" sort="" />
                        <x-table.table-header class="text-center" value="Transfer Date" sort="" />
                        <x-table.table-header class="text-center" value="Transfer Location" sort="" />
                        <x-table.table-header class="text-center" value="Blood Group" sort="" />
                        <x-table.table-header class="text-center" value="Edit" sort="" />
                    </x-slot>
                    <x-slot name="tbody">
                        <tr>
                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                               1
                            </x-table.table-body>

                            <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                1
                             </x-table.table-body>

                             <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                1
                             </x-table.table-body>

                             <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                1
                             </x-table.table-body>

                             <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                1
                             </x-table.table-body>

                             <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 ">
                                1
                             </x-table.table-body>
                        </tr>
                    </x-slot>
                </x-table.table>
            </div>
        </x-container>
    </div>
</div> --}}

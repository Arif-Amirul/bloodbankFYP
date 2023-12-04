<div>
    <x-container title="Manage Blood Test" routeBackBtn="" titleBackBtn="" disableBackBtn="" >
        <div class="grid grid-cols-1">
            <div>
                <x-table.table>
                    <x-slot name="thead">
                        <x-table.table-header class="text-center" value="Test ID" sort="" />
                        <x-table.table-header class="text-center" value="Blood ID" sort="" />
                        <x-table.table-header class="text-center" value="Test Date" sort="" />
                        <x-table.table-header class="text-left" value="Test Result" sort="" />
                        <x-table.table-header class="text-left" value="Edit" sort="" />

                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($blooddata as $item)
                        <tr>
                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center" >
                            {{$item ->test_id}}
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center" >
                            {{$item ->blood_id}}
                        </x-table.table-body>

                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center" >
                            {{$item ->date}}
                        </x-table.table-body>

                        <x-table.table-body class="text-xs font-medium text-gray-700 text-center">
                            <div class="flex items-center space-x-2">
                                <x-button class="bg-blue-500 text-white" wire:click="openModalViewTestMore('{{$item->id}}')" label="Details" />
                            </div>
                        </x-table.table-body>

                        <x-table.table-body class="text-xs font-medium text-gray-700 text-center" >
                                <div class="flex items-center space-x-2">
                                    <x-button class="bg-green-500 text-white" wire:click="openModalUpdate('{{$item->id}}')" label="Update" />
                                    <x-button primary wire:click="delete('{{$item->id}}')" label="Delete" />
                                </div>
                        </x-table.table-body>
                        </tr>
                        @endforeach
                    </x-slot>
                </x-table.table>
            </div>
            <!--VIEW DETAILS-->
            {{-- <div>
                    <x-modal.card title="TEST RESULT" blur wire:model.defer="viewTestMoreModal" max-width="9xl">
                        <div>
                            <x-table.table>
                                <x-slot name="thead">
                                    <x-table.table-header class="text-center" value="White blood cells" sort="" />
                                    <x-table.table-header class="text-center" value="Red blood cells" sort="" />
                                    <x-table.table-header class="text-center" value="Haemoglobin" sort="" />
                                    <x-table.table-header class="text-center" value="Hematocrit" sort="" />
                                    <x-table.table-header class="text-center" value="Platelets" sort="" />
                                    <x-table.table-header class="text-center" value="HIV test" sort="" />
                                    <x-table.table-header class="text-center" value="Na+" sort="" />
                                    <x-table.table-header class="text-center" value="K+" sort="" />
                                    <x-table.table-header class="text-center" value="Ca++" sort="" />
                                    <x-table.table-header class="text-center" value="Blood Status" sort="" />
                                </x-slot>

                                <x-slot name="tbody">
                                    <tr>
                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center" >
                                            {{$white_blood_cells}}
                                        </x-table.table-body>

                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center" >
                                            {{$red_blood_cells}}
                                        </x-table.table-body>

                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center" >
                                            {{$haemoglobin}}
                                        </x-table.table-body>

                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center" >
                                            {{$hematrocrit}}
                                        </x-table.table-body>

                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center" >
                                            {{$platelets}}
                                        </x-table.table-body>

                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center" >
                                            {{$hiv_test}}
                                        </x-table.table-body>

                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center" >
                                            {{$sodium}}
                                        </x-table.table-body>

                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center" >
                                            {{$potassium}}
                                        </x-table.table-body>

                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center" >
                                            {{$calcium}}
                                        </x-table.table-body>

                                        <x-table.table-body colspan="" class="text-xs font-medium text-gray-700 text-center" >
                                            {{$blood_status}}
                                        </x-table.table-body>
                                    </tr>
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
            <div>
                <x-modal.card title="TEST RESULT" blur wire:model.defer="viewTestMoreModal" max-width="9xl">
                    <div>
                        <table class="border-collapse w-full">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="py-2 px-4 border">Lab Test</th>
                                    <th class="py-2 px-4 border">Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border">
                                    <td class="py-2 px-4 border">White Blood Cells</td>
                                    <td class="py-2 px-4 border">{{$white_blood_cells}}</td>
                                </tr>
                                <tr class="border">
                                    <td class="py-2 px-4 border">Red Blood Cells</td>
                                    <td class="py-2 px-4 border">{{$red_blood_cells}}</td>
                                </tr>
                                <!-- Repeat until all parameters and their results are included -->
                                <tr class="border">
                                    <td class="py-2 px-4 border">Haemoglobin</td>
                                    <td class="py-2 px-4 border">{{$haemoglobin}}</td>
                                </tr>
                                <tr class="border">
                                    <td class="py-2 px-4 border">Hematrocrit</td>
                                    <td class="py-2 px-4 border">{{$hematrocrit}}</td>
                                </tr>
                                <tr class="border">
                                    <td class="py-2 px-4 border">Platelets</td>
                                    <td class="py-2 px-4 border">{{$platelets}}</td>
                                </tr>
                                <tr class="border">
                                    <td class="py-2 px-4 border">Hiv Test</td>
                                    <td class="py-2 px-4 border">{{$hiv_test}}</td>
                                </tr>
                                <tr class="border">
                                    <td class="py-2 px-4 border">Sodium</td>
                                    <td class="py-2 px-4 border">{{$sodium}}</td>
                                </tr>
                                <tr class="border">
                                    <td class="py-2 px-4 border">Potassium</td>
                                    <td class="py-2 px-4 border">{{$potassium}}</td>
                                </tr>
                                <tr class="border">
                                    <td class="py-2 px-4 border">Calcium</td>
                                    <td class="py-2 px-4 border">{{$calcium}}</td>
                                </tr>
                                <tr class="border">
                                    <td class="py-2 px-4 border">Blood Status</td>
                                    <td class="py-2 px-4 border">{{$blood_status}}</td>
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

            <!--UPDATE BLOOD TEST -->
            <div>
                <x-modal.card title="UPDATE BLOOD TEST" blur wire:model.defer="updateTestModal">
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
                            <x-button primary label="Update" wire:click="update('{{$test_id}}')" />
                        </div>
                    </x-slot>
                </x-modal.card>
            <div>

        </div>
    </x-container>
</div>

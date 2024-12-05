<div>
    <x-container title="Blood Transfer" routeBackBtn="" titleBackBtn="" disableBackBtn="">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="relative">
                <label for="patient_id" class="block text-sm font-medium text-gray-700">Patient ID</label>
                <select wire:model="patient_id" id="patient_id" name="patient_id"
                        class="mt-1 block w-full py-2 px-3 border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Select Patient ID</option>
                    @foreach($patientOptions as $id => $fullName)
                        <option value="{{ $id }}">{{ $id }} - {{ $fullName }}</option>
                    @endforeach
                </select>
                @error('patient_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="required_blood_group" class="block text-sm font-medium text-gray-700">Required Blood Group</label>
                <input type="text" id="required_blood_group" name="required_blood_group"
                    wire:model.defer="required_blood_group"
                    class="mt-1 block w-full py-2 px-3 border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    readonly>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
            <x-input type="date" label="Transfer Date" wire:model.defer="transfer_date" />
            <x-input label="Location" placeholder="location" wire:model.defer="location" />
        </div>

        {{-- <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
            <div class="relative">
                <label for="patient_id" class="block text-sm font-medium text-gray-700">Patient ID</label>
                <select wire:model.defer="patient_id" id="patient_id" name="patient_id"
                    class="mt-1 block w-full py-2 px-3 border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Select Patient ID</option>
                    @foreach($patientOptions as $id => $fullName)
                        <option value="{{ $id }}">{{ $id}} - {{ $fullName  }}</option>
                    @endforeach
                </select>
                @error('patient_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <x-input label="Required Blood Group" placeholder="required blood group" wire:model.defer="required_blood_group" />
        </div> --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
            <x-input label="Transfer ID" placeholder="transfer id" wire:model.defer="transfer_id" />
            <div class="relative">
                <label for="blood_id" class="block text-sm font-medium text-gray-700">Blood ID</label>
                <select wire:model.defer="blood_id" id="blood_id" name="blood_id"
                        class="mt-1 block w-full py-2 px-3 border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Select Blood ID</option>
                        @foreach($bloodIds as $bloodId => $bloodStatus)
                            <option value="{{ $bloodId }}">{{ $bloodId }} - {{ $bloodStatus }}</option>
                        @endforeach
                </select>
                {{-- @error('blood_id') <span class="text-red-500">{{ $message }}</span> @enderror --}}
            </div>
        </div>

        <div class="mt-4">
            <x-button primary wire:click="transfer" label="Transfer" />
        </div>

    </x-container>
</div>



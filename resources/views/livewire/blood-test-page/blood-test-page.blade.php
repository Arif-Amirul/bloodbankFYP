<div>
    <x-container title="Blood Test Result" routeBackBtn="" titleBackBtn="" disableBackBtn="" >
        <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6">
            <div class="relative">
                <label for="blood_id" class="block text-sm font-medium text-gray-700">Blood ID</label>
                <select wire:model="blood_id" wire:change="updatedBloodId($this->blood_id)" id="blood_id" name="blood_id"
                        class="mt-1 block w-full py-2 px-3 border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Select Blood ID</option>
                    @foreach($bloodData as $bloodId => $fullname)
                        <option value="{{ $bloodId }}">{{ $bloodId }} - {{ $fullname }}</option>
                    @endforeach
                </select>
                @error('blood_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <x-input type="date" label="Test Date" wire:model.defer="date" />
            <x-input label="Test ID" placeholder="test id" wire:model.defer="test_id" />
        </div>

        <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6 mt-4">
            <x-input label="White blood cells" placeholder="result" wire:model.defer="white_blood_cells" />
            <x-input label="Red blood cells" placeholder="result" wire:model.defer="red_blood_cells" />
            <x-input label="Haemoglobin" placeholder="result" wire:model.defer="haemoglobin" />
        </div>

        <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6 mt-4">
            <x-input label="Hematocrit" placeholder="result" wire:model.defer="hematrocrit" />
            <x-input label="Platelets" placeholder="result" wire:model.defer="platelets" />
            <x-select
                label="HIV Test"
                placeholder="select result"
                :options="['Negative','Positive']"
                wire:model.defer="hiv_test"
            />
        </div>

        <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6 mt-4">
            <x-input label="Sodium" placeholder="result" wire:model.defer="sodium" />
            <x-input label="Potassium" placeholder="result" wire:model.defer="potassium" />
            <x-input label="Calcium" placeholder="result" wire:model.defer="calcium" />
        </div>

        <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-6 mt-4">
            <x-select
                label="Blood Status"
                placeholder="blood status"
                :options="['Approved', 'Rejected']"
                wire:model.defer="blood_status"
            />
            <x-input label="Blood Group" placeholder="blood group" wire:model.defer="blood_group" readonly/>
        </div>

        <div class="mt-4">
        <x-button primary wire:click="create" label="Add"  />
        </div>
    </x-container>
</div>

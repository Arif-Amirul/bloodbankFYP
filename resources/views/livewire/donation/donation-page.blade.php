<div>
    <x-container title="Donation" routeBackBtn="" titleBackBtn="" disableBackBtn="">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label for="donor_id" class="block text-sm font-medium text-gray-700">Donor ID</label>
                <select id="donor_id" wire:model.defer="donor_id" wire:change="fetchBloodGroup" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">Select Donor</option>
                    @foreach($donorOptions as $donorId => $fullName)
                        <option value="{{ $donorId }}">{{ $donorId }} - {{ $fullName }} </option>
                    @endforeach
                </select>
                @error('donor_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <x-input label="Blood Group" placeholder="blood group" wire:model.defer="blood_group" readonly />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
            <x-input type="date" label="Donation Date" wire:model.defer="donation_date" />
            <x-input label="Donation ID" placeholder="donation id" wire:model.defer="donation_id" />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
            <x-input label="Blood ID" placeholder="blood id" wire:model.defer="blood_id" />
        </div>

        <div class="mt-4">
            <x-button primary wire:click="create" label="Donate" />
        </div>
    </x-container>
</div>

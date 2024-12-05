<div>
    <x-container title="Add Donor" routeBackBtn="" titleBackBtn="" disableBackBtn="">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <x-input label="Donor ID" placeholder="donor id" wire:model.defer="donor_id" />

            <x-input label="Full Name" placeholder="full name" wire:model.defer="full_name" />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
            <x-input label="IC Number" placeholder="ic number" wire:model.defer="identification_number" />
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

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
            <x-select
                label="Blood Group"
                placeholder="select blood group"
                :options="['A+', 'A-', 'O+', 'O-', 'B+', 'B-', 'AB+','AB-' ]"
                wire:model.defer="blood_group"
            />
        </div>

        <div class="mt-4">
            <x-button primary wire:click="create" label="Add" />
        </div>
    </x-container>
</div>

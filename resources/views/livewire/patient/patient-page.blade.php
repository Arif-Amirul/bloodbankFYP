<div>
    <x-container title="Add Patient" routeBackBtn="" titleBackBtn="" disableBackBtn="">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <x-input label="Patient ID" placeholder="patient id" wire:model.defer="patient_id" />
            <x-input label="Full Name" placeholder="full name" wire:model.defer="patient_full_name" />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
            <x-input type="date" label="Birth Date" wire:model.defer="date" />
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
            <x-input label="Location Contact" placeholder="location contact" wire:model.defer="contact" />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
            <x-input type="date" label="Transfer Date" wire:model.defer="transfer_date" />
        </div>

        <div class="mt-4">
            <x-button primary wire:click="create" label="Add" />
        </div>


    </x-container>
</div>

<x-guest-layout>
    <div class="flex flex-col w-full h-screen">
        <div class="mt-5">
            <div class="text-center font-bold text-2xl">
                Brands
            </div>
            <div>
                <livewire:brands-table />
            </div>
            <div>
                <livewire:brand-form />
            </div>
        </div>

        <div class="mt-5">
            <div class="text-center font-bold text-2xl">
                Coffee Types
            </div>
            <div>
                <livewire:coffee-types-table />
            </div>
        </div>

        <div class="mt-5">
            <div class="text-center font-bold text-2xl">
                Drink Types
            </div>
            <div>
                <livewire:drink-types-table />
            </div>
        </div>

        <div class="mt-5">
            <div class="text-center font-bold text-2xl">
                Drinking Locations
            </div>
            <div>
                <livewire:drinking-locations-table />
            </div>
        </div>

        <div class="mt-5">
            <div class="text-center font-bold text-2xl">
                Grindings
            </div>
            <div>
                <livewire:grindings-table />
            </div>
        </div>

        <div class="mt-5">
            <div class="text-center font-bold text-2xl">
                Suppliers
            </div>
            <div>
                <livewire:suppliers-table />
            </div>
        </div>
    </div>
</x-guest-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ auth()->user()->currentTeam->name ?? 'Dashboard' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white">
                    <nav class="tabs flex sm:flex-row" id="navs">
                        <button data-target="panel-1" class="tab active text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none text-blue-500 border-b-2 font-medium border-blue-500">
                            {{ auth()->user()->currentTeam->name ?? 'Dashboard' }}
                        </button>
                        <button data-target="panel-2" class="tab ext-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">
                            History
                        </button>
                    </nav>
                </div>

                <div id="panels" class="container mx-auto px-4">
                    <div class="panel-1 tab-content active py-5">
                        {{-- @livewire('kasir.kasir-index') --}}
                        @livewire('gudang.gudang-index')
                    </div>
                    <div class="panel-2 tab-content py-5">
                        Map here
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

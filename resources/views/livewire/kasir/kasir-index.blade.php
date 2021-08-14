<div>
    <div class="flex justify-end items-rifht">
        <div class="relative"> 
            <x-input type="text" wire:model="search" class="h-14 pr-8 pl-5 rounded z-0 focus:shadow focus:outline-none" placeholder="Search anything..."></x-input>
        </div>
    </div>
    <div>
        @if (session()->has('message'))
            <x-alert class="bg-red-400 text-white mt-4" role="alert">
                {{ session('message') }}
            </x-alert>
        @endif
    </div>
    <div class="py-3 text-sm">
        @if ($search)
            @foreach ($items as $i)
                <div class="flex justify-start cursor-pointer text-gray-700 hover:text-blue-400 hover:bg-blue-100 rounded-md px-2 py-2 my-2">
                    <div class="flex-grow font-medium px-2">{{ $i->uuid }}</div>
                    <div class="flex-grow font-medium px-2">{{ $i->nama }}</div>
                    <div class="flex-grow font-medium px-2">{{ number_format($i->qty) }}</div>
                    <div class="flex-grow font-medium px-2">{{ number_format($i->price) }}</div>
                    <div class="text-sm font-normal text-gray-500 tracking-wide" wire:click="create('{{ $i->id }}','{{ $i->price }}')">Pilih</div>
                </div>
            @endforeach
        @endif
    </div>
    
    <div class="flex justify-end items-rifht">
        <table class="table w-full text-gray-400 border-separate text-sm">
            <thead class="bg-gray-800 text-blue">
                <tr class="text-center">
                    <th class="p-3 text-center">Nama</th>
                    <th class="p-3 text-center">Price</th>
                    <th class="p-3 text-center">QTY</th>
                    <th class="p-3 text-center">Total</th>
                    <th class="p-3 text-center" width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kasir as $k)
                <tr class="text-center">
                        
                    <td class="p-3">
                        {{ $k->kasir->nama }}
                    </td>
                    <td class="p-3">
                        {{ number_format($k->checkoutKasir->price) }}
                    </td>
                    <td class="p-3 " width="1%">
                        <div class="flex flex-row h-10 rounded-lg relative bg-transparent mt-1">
                            <button data-action="decrement" wire:click="decrement('{{ $k->checkoutKasir->id }}')" class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                            <span class="m-auto text-2xl font-thin">−</span>
                            </button>
                            <div  
                                class="text-center bg-gray-300 font-semibold md:text-basecursor-default flex items-center text-gray-700  outline-none"> {{ number_format($k->checkoutKasir->qty) }}</div>
                            <button data-action="increment" wire:click="increment('{{ $k->checkoutKasir->id }}')" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                <span class="m-auto text-2xl font-thin">+</span>
                            </button>
                        </div>
                    </td>
                    <td class="p-3">
                        {{ number_format($k->checkoutKasir->qty * $k->checkoutKasir->price) }}
                    </td>
                    <td class="p-3">
                        <div class="flex">
                            <button wire:click="hapus('{{ $k->checkoutKasir->id }}')">Hapus</button>
                        </div>
                    </td>
                    
                </tr>
                @endforeach
                <tr class="text-right">
                    <td class="p-3" colspan="5">
                        @livewire('total.total-index', ['kasir' => $kasir])
                    </td>
                </tr>
                <tr class="text-right">
                    <td class="p-3" colspan="5">
                        <x-button wire:click="bayar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Bayar</x-button>
                        <x-button wire:click="clear" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Clear</x-button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <style>
        .table {
            border-spacing: 0 15px;
        }
    
        i {
            font-size: 1rem !important;
        }
    
        .table tr {
            border-radius: 20px;
        }
    </style>
</div>
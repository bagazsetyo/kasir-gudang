<div>
    <div class="flex justify-end items-rifht">
        <div class="relative"> 
            <input type="text" wire:model="search" class="h-14 pr-8 pl-5 rounded z-0 focus:shadow focus:outline-none" placeholder="Search anything...">
            <div class="absolute top-4 right-3"> 
                <button>Cari</button>
            </div>
        </div>
    </div>
    
    <div class="py-3 text-sm">
        @if ($search)
            @foreach ($items as $i)
                <div class="flex justify-start cursor-pointer text-gray-700 hover:text-blue-400 hover:bg-blue-100 rounded-md px-2 py-2 my-2">
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
                    <td class="p-3 bg-black" width="1%">
                        <div class="flex flex-row h-10 rounded-lg relative bg-transparent mt-1">
                            <button data-action="decrement" class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                            <span class="m-auto text-2xl font-thin">−</span>
                            </button>
                            <input type="number" class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="custom-input-number" value="{{ number_format($k->checkoutKasir->qty) }}"></input>
                        <button data-action="increment" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                            <span class="m-auto text-2xl font-thin">+</span>
                        </button>
                    </td>
                    <td class="p-3">
                        {{ number_format($k->checkoutKasir->qty * $k->checkoutKasir->price) }}
                    </td>
                    <td class="p-3">
                        Hapus
                    </td>
                    
                </tr>
                @endforeach
                <tr class="text-right">
                    <td class="p-3" colspan="5">
                        Total : Rp. 0 <br>
                    </td>
                </tr>
                <tr class="text-right">
                    <td class="p-3" colspan="5">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Bayar</button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    {{-- <div class="w-full lg:overflow-visible "> --}}
        
    {{-- </div> --}}
    <style>
        .table {
            border-spacing: 0 15px;
        }
    
        i {
            font-size: 1rem !important;
        }
    
        .table tr {
            border-radius: 20px;
        } */
    
        /* tr td:nth-child(n+5),
        tr th:nth-child(n+5) {
            border-radius: 0 .625rem .625rem 0;
        }
    
        tr td:nth-child(1),
        tr th:nth-child(1) {
            border-radius: .625rem 0 0 .625rem;
        }
    </style>
</div>
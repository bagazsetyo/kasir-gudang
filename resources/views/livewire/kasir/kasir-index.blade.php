<div>
    <div class="flex justify-end items-rifht">
        <div class="relative"> 
            <input type="text" class="h-14 pr-8 pl-5 rounded z-0 focus:shadow focus:outline-none" placeholder="Search anything...">
            <div class="absolute top-4 right-3"> 
                <button>Cari</button>
            </div>
        </div>
    </div>
    
    <div class="flex justify-end items-rifht">
        <table class="table w-full text-gray-400 border-separate text-sm">
            <thead class="bg-gray-800 text-blue">
                <tr>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">Price</th>
                    <th class="p-3 text-left">QTY</th>
                    <th class="p-3 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td class="p-3">
                        Buku
                    </td>
                    <td class="p-3">
                        1.000.000
                    </td>
                    <td class="p-3">
                        1
                    </td>
                    <td class="p-3">
                        Hapus
                    </td>
                </tr>
                <tr class="text-right">
                    <td class="p-3" colspan="4">
                        Total : Rp. 0 <br>
                    </td>
                </tr>
                <tr class="text-right">
                    <td class="p-3" colspan="4">
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
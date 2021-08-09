<div>
    <label for="">
        Masukan Pembayaran
        <input type="checkbox" wire:model="pembayaran" class="mb-5 form-checkbox h-5 w-5 text-gray-600"> <br>
    </label>
    @if($pembayaran)
    <label for="">Rp.</label>
    <input type="number" wire:model="nominal" value="{{ $nominal }}" min="0" class="border-0 border-b-2 focus:outline-none " placeholder="Nominal"> <br> <br>
    @endif
    @php
    @endphp 
        Total : Rp. {{ number_format($total) }} <br>
    @if ($pembayaran)
        Bayar : Rp. {{ number_format($nominal ? $nominal : 0) }} <br>
        Kembalian : Rp. {{ number_format($nominal ? $nominal - $total : 0) }} <br>  
    @endif
</div>
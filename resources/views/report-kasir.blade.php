<div style="width: 100%; height: 90vh; text-align: center; display: flex; justify-content: center; align-item: center;">
    <div style="width: 700px;">
        <h1>
            Selamat datang di {{ $items->kasir->name }}
        </h1>
        <hr style="border: dashed;">
        @foreach ($items['data'] as $item)
        <table style="width: 100%; font-size: 20px;">
            <thead>
                <tr>
                    <td width="30%">Nama</td>
                    <td width="15%">Qty</td>
                    <td width="25%">Price</td>
                    <td width="30%" style="text-align: right;">Total</td>
                </tr>
            </thead>
            <tbody>
                    @foreach ($item->data as $e)
                        <tr>
                            <td>
                                {{ $e->name }}
                            </td>
                            <td>
                                {{ number_format($e->qty) }}
                            </td>
                            <td>
                               Rp. {{ number_format($e->price) }}
                            </td>
                            <td style="text-align: right;">
                               Rp. {{ number_format($e->price * $e->qty) }}
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        <hr style="border: dashed;">

        <table style="width: 100%; font-size: 20px; text-align: right;">
                <tr>
                    <td>Subtotal : Rp. {{ number_format($item->total->total) }}</td>
                </tr>
                @if ($item->total->bayar ?? 0)
                <tr>
                    <td>Bayar : Rp. {{ number_format($item->total->bayar) }}</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>Kembalian : Rp. {{ number_format($item->total->bayar - $item->total->total) }}</td>
                </tr>
                @endif
        </table>
        @endforeach
        <div style="margin-top: 20px; display: flex; justify-content: flex-end; align-items: flex-end;">
            {!! '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG('4', 'C39+') . '" alt="barcode"   />' !!}
        </div>
    </div>
</div>
<script>
    window.print();
</script>
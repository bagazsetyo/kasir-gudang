<div style="width: 100%; height: 90vh; text-align: center; display: flex; justify-content: center; align-item: center;">
    <div style="width: 700px;">
        <h1>
            Selamat datang di {{ $items->kasir->name }}
        </h1>
        <hr style="border: dashed;">
        <table style="width: 100%; font-size: 20px;">
            <thead>
                <tr>
                    <td width="30%">Nama</td>
                    <td width="15%">Qty</td>
                    <td width="25%">Price</td>
                    <td width="30%" style="text-align: right;">Tujuan</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$items['data']->nama}}</td>
                    <td>{{$items['data']->qty}}</td>
                    <td>{{$items['data']->price}}</td>
                    <td style="text-align: right;">{{ App\Models\Team::select('name')->find($items['data']->teams_id)->name ?? '' }}</td>
                </tr>
            </tbody>
        </table>
        <div style="margin-top: 20px; display: flex; justify-content: flex-end; align-items: flex-end;">
            {!! '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG('4', 'C39+') . '" alt="barcode"   />' !!}
        </div>
    </div>
</div>
<script>
    window.print();
</script>
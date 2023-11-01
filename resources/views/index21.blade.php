@extends('index');

@section('content')
@section('button')
    <a href="http://tes-web.landa.id/intermediate/menu" target="_blank" rel="Array Menu" class="btn btn-secondary">
        Json Menu
    </a>
    <a href="https://tes-web.landa.id/intermediate/transaksi?tahun=2021" target="_blank" rel="Array Menu"
        class="btn btn-secondary">
        Json Transaksi
    </a>
@endsection
@section('table')
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr class="table-dark">
                    <th rowspan="2" style="text-align:center;vertical-align: middle;width: 250px;">Menu</th>
                    <th colspan="12" style="text-align: center;">Periode Pada 2022</th>
                    <th rowspan="2" style="text-align:center;vertical-align: middle;width:75px">Total</th>
                </tr>
                <tr class="table-dark">
                    @foreach ($allMonths as $month)
                        <th class="table-dark">{{ date('F', strtotime($month)) }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="table-secondary" colspan="14"><b>Makanan</b></td>
                </tr>
                @foreach ($kategorisMakanan as $item)
                    <tr>
                        <td>{{ $item['menu'] }}</td>
                        @php
                            $totalMenu = 0; // Inisialisasi total per menu
                        @endphp
                        @foreach ($allMonths as $month)
                            @php
                                $bulanTotal = $totalPerMenuPerBulanMakanan[$item['menu']][$month] ?? 0;
                                $totalMenu += $bulanTotal;
                            @endphp
                            <td>{{ number_format($bulanTotal) }}</td>
                        @endforeach
                        <td>{{ number_format($totalMenu) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td class="table-secondary" colspan="14"><b>Minuman</b></td>
                </tr>
                @foreach ($kategorisMinuman as $item)
                    <tr>
                        <td>{{ $item['menu'] }}</td>
                        @php
                            $totalMenu = 0; // Inisialisasi total per menu
                        @endphp
                        @foreach ($allMonths as $month)
                            @php
                                $bulanTotal = $totalPerMenuPerBulanMinuman[$item['menu']][$month] ?? 0;
                                $totalMenu += $bulanTotal;
                            @endphp
                            <td>{{ number_format($bulanTotal) }}</td>
                        @endforeach
                        <td>{{ number_format($totalMenu) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td class="table-dark">Total</td>
                    @php
                        $totalAllMenus = 0; // Inisialisasi total semua menu
                    @endphp
                    @foreach ($allMonths as $month)
                        @php
                            $bulanTotal = 0;
                            foreach ($kategorisMakanan as $item) {
                                $bulanTotal += $totalPerMenuPerBulanMakanan[$item['menu']][$month] ?? 0;
                            }
                            foreach ($kategorisMinuman as $item) {
                                $bulanTotal += $totalPerMenuPerBulanMinuman[$item['menu']][$month] ?? 0;
                            }
                            $totalAllMenus += $bulanTotal;
                        @endphp
                        <td class="table-dark">{{ number_format($bulanTotal) }}</td>
                    @endforeach
                    <td class="table-dark">{{ number_format($totalAllMenus) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
@endsection

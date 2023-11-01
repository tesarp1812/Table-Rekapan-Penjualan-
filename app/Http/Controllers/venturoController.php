<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class venturoController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function index21()
    {
        $client = new Client();
        $menuUrl = 'https://tes-web.landa.id/intermediate/menu';
        $transaksiUrl = 'https://tes-web.landa.id/intermediate/transaksi?tahun=2021';

        // Ambil data menu
        $menuResponse = $client->get($menuUrl);
        $menuStatusCode = $menuResponse->getStatusCode();
        $menuBody = $menuResponse->getBody()->getContents();
        $menuData = json_decode($menuBody, true);

        $kategorisMakanan = [];
        $kategorisMinuman = [];

        // Loop melalui data menu dan ambil kategori makanan
        foreach ($menuData as $item) {
            if ($item['kategori'] === "makanan") {
                $kategorisMakanan[] = $item;
            } elseif ($item['kategori'] === "minuman") {
                $kategorisMinuman[] = $item;
            }
        }

        // Ambil data transaksi
        $transaksiResponse = $client->get($transaksiUrl);
        $transaksiStatusCode = $transaksiResponse->getStatusCode();
        $transaksiBody = $transaksiResponse->getBody()->getContents();
        $transaksiData = json_decode($transaksiBody, true);

        // Membuat array yang berisi semua bulan
        $allMonths = [
            '2021-01', '2021-02', '2021-03', '2021-04', '2021-05', '2021-06',
            '2021-07', '2021-08', '2021-09', '2021-10', '2021-11', '2021-12'
        ];

        // Inisialisasi total per menu per bulan untuk kategorisMakanan
        $totalPerMenuPerBulanMakanan = [];

        // Inisialisasi total per menu per bulan untuk kategorisMinuman
        $totalPerMenuPerBulanMinuman = [];

        // Gabungkan data transaksi ke dalam array
        foreach ($transaksiData as $transaksi) {
            $tanggal = $transaksi['tanggal'];
            $tahunBulan = date('Y-m', strtotime($tanggal));
            $menu = $transaksi['menu'];
            $total = $transaksi['total'];

            if ($transaksi['menu'] === $menu && in_array($tahunBulan, $allMonths)) {
                if (!isset($totalPerMenuPerBulanMakanan[$menu])) {
                    $totalPerMenuPerBulanMakanan[$menu] = array_fill_keys($allMonths, 0);
                }

                if (!isset($totalPerMenuPerBulanMinuman[$menu])) {
                    $totalPerMenuPerBulanMinuman[$menu] = array_fill_keys($allMonths, 0);
                }

                if (in_array($menu, array_column($kategorisMakanan, 'menu'))) {
                    $totalPerMenuPerBulanMakanan[$menu][$tahunBulan] += $total;
                } elseif (in_array($menu, array_column($kategorisMinuman, 'menu'))) {
                    $totalPerMenuPerBulanMinuman[$menu][$tahunBulan] += $total;
                }
            }
        }

        //dd($totalPerMenuPerBulanMakanan, $bulanTotal);

        // Kirim hasil perhitungan ke tampilan
        return view('index21', compact('menuStatusCode', 'menuData', 'transaksiStatusCode', 'transaksiData', 'allMonths', 'totalPerMenuPerBulanMakanan', 'totalPerMenuPerBulanMinuman', 'kategorisMakanan', 'kategorisMinuman'));
    }

    public function index22()
    {
        $client = new Client();
        $menuUrl = 'https://tes-web.landa.id/intermediate/menu';
        $transaksiUrl = 'https://tes-web.landa.id/intermediate/transaksi?tahun=2022';

        // Ambil data menu
        $menuResponse = $client->get($menuUrl);
        $menuStatusCode = $menuResponse->getStatusCode();
        $menuBody = $menuResponse->getBody()->getContents();
        $menuData = json_decode($menuBody, true);

        $kategorisMakanan = [];
        $kategorisMinuman = [];

        // Loop melalui data menu dan ambil kategori makanan
        foreach ($menuData as $item) {
            if ($item['kategori'] === "makanan") {
                $kategorisMakanan[] = $item;
            } elseif ($item['kategori'] === "minuman") {
                $kategorisMinuman[] = $item;
            }
        }

        // Ambil data transaksi
        $transaksiResponse = $client->get($transaksiUrl);
        $transaksiStatusCode = $transaksiResponse->getStatusCode();
        $transaksiBody = $transaksiResponse->getBody()->getContents();
        $transaksiData = json_decode($transaksiBody, true);

        // Membuat array yang berisi semua bulan
        $allMonths = [
            '2022-01', '2022-02', '2022-03', '2022-04', '2022-05', '2022-06',
            '2022-07', '2022-08', '2022-09', '2022-10', '2022-11', '2022-12'
        ];

        // Inisialisasi total per menu per bulan untuk kategorisMakanan
        $totalPerMenuPerBulanMakanan = [];

        // Inisialisasi total per menu per bulan untuk kategorisMinuman
        $totalPerMenuPerBulanMinuman = [];

        // Gabungkan data transaksi ke dalam array
        foreach ($transaksiData as $transaksi) {
            $tanggal = $transaksi['tanggal'];
            $tahunBulan = date('Y-m', strtotime($tanggal));
            $menu = $transaksi['menu'];
            $total = $transaksi['total'];

            if ($transaksi['menu'] === $menu && in_array($tahunBulan, $allMonths)) {
                if (!isset($totalPerMenuPerBulanMakanan[$menu])) {
                    $totalPerMenuPerBulanMakanan[$menu] = array_fill_keys($allMonths, 0);
                }

                if (!isset($totalPerMenuPerBulanMinuman[$menu])) {
                    $totalPerMenuPerBulanMinuman[$menu] = array_fill_keys($allMonths, 0);
                }

                if (in_array($menu, array_column($kategorisMakanan, 'menu'))) {
                    $totalPerMenuPerBulanMakanan[$menu][$tahunBulan] += $total;
                } elseif (in_array($menu, array_column($kategorisMinuman, 'menu'))) {
                    $totalPerMenuPerBulanMinuman[$menu][$tahunBulan] += $total;
                }
            }
        }

        //dd($totalPerMenuPerBulanMakanan, $bulanTotal);

        // Kirim hasil perhitungan ke tampilan
        return view('index22', compact('menuStatusCode', 'menuData', 'transaksiStatusCode', 'transaksiData', 'allMonths', 'totalPerMenuPerBulanMakanan', 'totalPerMenuPerBulanMinuman', 'kategorisMakanan', 'kategorisMinuman'));
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['sku' => '4G180', 'image' => '4G180 .jpg', 'title' => 'Tenda 4G LTE 150Mbps Mobile WiFi Router', 'price' => '952.1700', 'category_id' => '3'],
            ['sku' => '4G181', 'image' => '4G680.jpg', 'title' => 'Tenda 4G LTE 300Mbps WiFi Router', 'price' => '1252.1700', 'category_id' => '3'],
            ['sku' => '4G182', 'image' => 'ACB-AC.jpg', 'title' => 'Ubiquiti AirCube WiFi PoE Access Point with UNMS', 'price' => '1282.6100', 'category_id' => '3'],
            ['sku' => '4G183', 'image' => 'ACB-ISP.jpg', 'title' => 'Ubiquiti AirFiberX 11GHz PtP Radio', 'price' => '478.2600', 'category_id' => '3'],
            ['sku' => '4G184', 'image' => 'AF-11FX.jpg', 'title' => 'Ubiquiti AirFiberX 11Ghz Low Band Duplexer', 'price' => '3300.0000', 'category_id' => '3'],
            ['sku' => '4G185', 'image' => 'AF-11FXDUPL.jpg', 'title' => 'Ubiquiti AirFiber Dish 11Ghz 35dBi 81cm', 'price' => '6652.1700', 'category_id' => '3'],
            ['sku' => '4G186', 'image' => 'AF-11G35.jpg', 'title' => 'Ubiquiti AirFiber5X HD PtP Radio Gigabit WiFi', 'price' => '6865.2200', 'category_id' => '3'],
            ['sku' => '4G187', 'image' => 'AF-5XHD.jpg', 'title' => 'Ubiquiti AmpliFi Instant Router +1 MeshPoint Kit', 'price' => '3126.0900', 'category_id' => '3'],
            ['sku' => '4G188', 'image' => 'AFI-INSK.jpg ', 'title' => 'Ubiquiti AmpliFi Instant Router AFI-INS-R', 'price' => '1717.3900', 'category_id' => '3'],
            ['sku' => '4G189', 'image' => 'AIR-D523X.jpg  ', 'title' => 'Ubiquiti 5GHz AirFiber Dish 23dBi Slant 45 PtP', 'price' => '1821.7400', 'category_id' => '3'],
            ['sku' => '4G190', 'image' => 'AIR-D530.jpg', 'title' => 'Ubiquiti 5GHz AirMax Dish 30dBi Backhaul PtP | RD-5G30', 'price' => '2304.3500', 'category_id' => '3'],
            ['sku' => '4G191', 'image' => 'AIR-D530LW.jpg', 'title' => 'Ubiquiti 5GHz AirMax Dish 30dBi Light Weight PtP', 'price' => '1734.7800', 'category_id' => '3']
        ];

        foreach ($products as $item) {
            Product::create($item);
        }

    }
}

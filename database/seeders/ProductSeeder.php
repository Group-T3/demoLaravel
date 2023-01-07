<?php

namespace Database\Seeders;

use App\Enums\ProductStatus;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $product1 = Product :: Create([
            'name' => 'iPhone 14 Pro Max',
            'qty' => '10',
            'price' =>'99.99',
            'images' => 'https://cdn.tgdd.vn/Products/Images/42/251192/iphone-14-pro-max-purple-1.jpg',
            'desc' => 'Apple',
            'status' => ProductStatus::ACTIVE,
            'category_id' => '1'
        ]);

        $product2 = Product :: Create([
            'name' => 'Macbook Pro M2',
            'qty' => '20',
            'price' =>'599.99',
            'images' => 'https://cdn.tgdd.vn/Products/Images/44/282828/apple-macbook-pro-13-inch-m2-2022-1.jpg',
            'desc' => 'Apple',
            'status' => ProductStatus::ACTIVE,
            'category_id' => '1'
        ]);

        $product3 = Product :: Create([
            'name' => 'iPad Pro M2',
            'qty' => '50',
            'price' =>'199.99',
            'images' => 'https://cdn.tgdd.vn/Products/Images/522/269331/ipad-pro-m1-129-inch-wifi-2021-1.jpeg',
            'desc' => 'Apple',
            'status' => ProductStatus::ACTIVE,
            'category_id' => '1'
        ]);

        $product4 = Product :: Create([
            'name' => 'Rolls Royce Cullinan',
            'qty' => '1',
            'price' =>'19999.99',
            'images' => 'https://tinbanxe.vn/uploads/news/gia-xe/rolls-royce-cullinan-3.jpg',
            'desc' => 'Rolls Royce Cullinan là chiếc xe gầm cao đầu tiên của thương hiệu xe Rolls Royce nổi tiếng trên toàn thế giới.
            Chiếc tên xe được đặt tên theo viên kim cương thô lớn nhất thế giới.',
            'status' => ProductStatus::ACTIVE,
            'category_id' => '2'
        ]);

        $product5 = Product :: Create([
            'name' => 'Mercedes Maybach S680 4Matic 2022',
            'qty' => '2',
            'price' =>'100000',
            'images' => 'https://img.tinbanxe.vn/images/Mercedes/S680/2022-mercedes-maybach-s680-removebg-preview.jpg',
            'desc' => 'Mercedes Maybach S680 4Matic là phiên bản sedan cao cấp thuộc dòng Maybach S-Class, So với S-class tiêu chuẩn,
             phần đầu xe có mặt lưới tản nhiệt đặc trưng của Maybach, bao quanh bởi viền crôm, tích hợp camera để lộ.',
            'status' => ProductStatus::ACTIVE,
            'category_id' => '2'
        ]);

        $product6 = Product :: Create([
            'name' => 'Range Rover SVautobiography Lwb 3.0 2023',
            'qty' => '5',
            'price' =>'50000',
            'images' => 'https://autopro8.mediacdn.vn/2020/3/13/range-rover-svautobiography-joshua-5-1584083406930122854946.jpg',
            'desc' => 'Land Rover Range Rover SVautoBiography LWB là phiên bản cao cấp nhất với trục cơ sở kéo dài của dòng xe SUV
            hạng sang cỡ lớn Land Rover Range Rover, sản phẩm của nhà sản xuất Jaguar Land Rover, Anh Quốc.',
            'status' => ProductStatus::ACTIVE,
            'category_id' => '2'
        ]);
        $product7 = Product :: Create([
            'name' => 'Mercedes G800 Brabus',
            'qty' => '2',
            'price' =>'80000',
            'images' => 'https://photo-cms-kienthuc.epicdn.me/zoom/800/uploaded/ctvlanbanh/2021_04_08/mmm/mercedes-amg-g63-brabus-dat-gap-3-lan-chinh-hang-sap-ve-viet-nam.png',
            'desc' => 'MERCEDES G800 Brabus công suất của xe đã đạt 800 mã lực và mô men xoắn lên tới 1.000 Nm.
            Sức mạnh kể trên giúp Mercedes-AMG G63 Brabus 800 Widestar 2021 chỉ mất 4,1 giây để tăng tốc từ 0-100 km/giờ.',
            'status' => ProductStatus::ACTIVE,
            'category_id' => '1'
        ]);

        $product8 = Product :: Create([
            'name' => 'TV Samsung 63"',
            'qty' => '8',
            'price' =>'178.88',
            'images' => 'http://cdn.tgdd.vn/Files/2014/04/03/540338/Hinh-anh-vuot-troi-cong-nghe-Clean-View-1.jpg',
            'desc' => 'TV Samsung 63"',
            'status' => ProductStatus::ACTIVE,
            'category_id' => '1'
        ]);
    }
}

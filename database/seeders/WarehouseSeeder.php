<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'name_en' => 'Al-Falah Distribution Center',
                'address_en' => 'Al Quds Street, Warehouse No. 35, Industrial City, Riyadh, Saudi Arabia',
                
                'short_description_en' => 'Welcome to a premium industrial-grade storage facility located in the bustling commercial corridor of Saudi Arabia.',
                'description_en' => 'Welcome to a premium industrial-grade storage facility located in the bustling commercial corridor of Saudi Arabia. Designed for flexibility and scale, this space is perfect for logistics companies, wholesalers, or retailers looking for a secure and convenient warehousing solution in Saudi Arabia. Whether you\'re expanding your operations or need temporary overflow capacity, our facility offers the infrastructure and access you need to operate efficiently.',

                'name_ar' => 'مركز توزيع الفلاح',
                'address_ar' => 'شارع القدس، المستودع رقم 35، المدينة الصناعية، الرياض، المملكة العربية السعودية',
                'short_description_ar' => 'مرحباً بكم في منشأة تخزين صناعية متميزة تقع في الممر التجاري الصاخب بالمملكة العربية السعودية.',
                'description_ar' => 'مرحباً بكم في منشأة تخزين صناعية متميزة، تقع في قلب المنطقة التجارية الحيوية في المملكة العربية السعودية. صُممت هذه المساحة لضمان المرونة والحجم المناسبين، وهي مثالية لشركات الخدمات اللوجستية، وتجار الجملة، وتجار التجزئة الذين يبحثون عن حلول تخزين آمنة ومريحة في المملكة العربية السعودية. سواء كنتم توسعون عملياتكم أو تحتاجون إلى سعة تخزينية مؤقتة، فإن منشأتنا توفر لكم البنية التحتية وسهولة الوصول اللازمة للعمل بكفاءة.',

                'city' => 'Riyadh',
                'latitude' => '23.8859',
                'longitude' => '45.0792',
                'total_area' => '2000',
                'total_pallets' => '200',
                'available_pallets' => '160',
                'rent_per_pallet' => '10.00',
                'pallet_dimension' => '120x80x150',
                'temperature_type' => 'dry',
                'temperature_range' => '10C - 50C',
                'wms' => 'yes',
                'equipment_handling' => 'yes',
                'temperature_sensor' => 'yes',
                'humidity_sensor' => 'yes',
                'user_id' => 2,
                'storage_type_id' => 1,
            ],
        ];

        foreach($records as $record) {
            Warehouse::updateOrCreate(
                ['name_en' => $record['name_en']],
                $record
            );
        }
    }
}

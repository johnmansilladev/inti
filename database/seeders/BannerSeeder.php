<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners = [
            [
                'title'=> "super ofertas del año",
                'description' => null,
                'condition' => 'carrusel',
                'cluster_id' => 1,
                'position' => 1
            ],
            [
                'title'=> "ultimas actualizaciones",
                'description' => "Se requieren algunos activos para instalar, utilizar y actualizar software, ofrecemos servicio y soporte técnico para todos los programas",
                'condition' => 'carrusel',
                'cluster_id' => 2,
                'position' => 2
            ],
            [
                'title'=> "lo mas vendido en perú",
                'description' => "Se requieren algunos activos para instalar, utilizar y actualizar software, ofrecemos servicio y soporte técnico para todos los programas",
                'condition' => 'carrusel',
                'cluster_id' => 3,
                'position' => 3
            ],
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}

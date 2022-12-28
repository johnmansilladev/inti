<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            ['name'=>'instalación 1 pc','slug'=>'instalacion-1-pc'],
            ['name'=>'archivos+crack (desbloqueado)','slug'=>'archivos+crack-(desbloqueado)'],
            ['name'=>'archivos+keygen (desbloqueado)','slug'=>'archivos+keygen-(desbloqueado)'],
            ['name'=>'archivos+keygen (bloque pc)','slug'=>'archivos+keygen-(bloque-pc)'],
            ['name'=>'archivos  (no se requiere crack/activación)','slug'=>'archivos--(no-se-requiere-crack/activacion)'],
            ['name'=>'archivos+licencia (desbloqueada) código de activación','slug'=>'archivos+licencia-(desbloqueada)-código-de-activacion'],
        ];

        foreach ($services as $service) {
            Service::factory(1)->create($service);
        }
    }
}

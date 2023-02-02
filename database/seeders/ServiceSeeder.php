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
            ['name'=>'instalación 1 pc','slug'=>'instalacion-1-pc','position'=>1],
            ['name'=>'archivos+crack (desbloqueado)','slug'=>'archivos+crack-(desbloqueado)','position'=>2],
            ['name'=>'archivos+keygen (desbloqueado)','slug'=>'archivos+keygen-(desbloqueado)','position'=>3],
            ['name'=>'archivos+keygen (bloque pc)','slug'=>'archivos+keygen-(bloque-pc)','position'=>4],
            ['name'=>'archivos  (no se requiere crack/activación)','slug'=>'archivos-(no-se-requiere-crack/activacion)','position'=>5],
            ['name'=>'archivos+licencia (desbloqueada) código de activación','slug'=>'archivos+licencia-(desbloqueada)-código-de-activacion','position'=>6],
        ];

        foreach ($services as $service) {
            Service::factory(1)->create($service);
        }
    }
}

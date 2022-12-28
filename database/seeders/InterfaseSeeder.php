<?php

namespace Database\Seeders;

use App\Models\Interfase;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterfaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $interfases = [
            ['name'=>'cardaq','slug'=>'cardaq','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'hitachi','slug'=>'hitachi','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'knorr-bremse diagnostic kit (udif)','slug'=>'knorr-bremse-diagnostic-kit-(udif)','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'others softwares','slug'=>'others-softwares','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'rp1210 adapter','slug'=>'rp1210-adapter','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'bobcat diagnostic kit','slug'=>'bobcat-diagnostic-kit','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'cat comm adapter III','slug'=>'cat-comm-adapter-III','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'claas diagnostic kit','slug'=>'claas-diagnostic-kit','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'cnh dearborn (dpa5)','slug'=>'cnh-dearborn-(dpa5)','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'dearborn adapter (dpa5)','slug'=>'dearborn-adapter-(dpa5)','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'drewlinq technologies','slug'=>'drewlinq-technologies','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'isuzu idss','slug'=>'isuzu-idss','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'iveco eltrac communication','slug'=>'iveco-eltrac-communication','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'jcb dla','slug'=>'jcb-dla','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'jcb dla 2.0','slug'=>'jcb-dla-2.0','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'john deere edl v2','slug'=>'john-deere-edl-v2','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'john deere edl v3','slug'=>'john-deere-edl-v3','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'mercedes benz star c4','slug'=>'mercedes-benz-star-c4','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'mercedes benz star c6','slug'=>'mercedes-benz-star-c6','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'mtu ixxat usb-to can v2','slug'=>'mtu-ixxat-usb-to-can-v2','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'neo universal diagnostic','slug'=>'neo-universal-diagnostic','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'nexiq usb link 1','slug'=>'nexiq-usb-link-1','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'nexiq usb link 2','slug'=>'nexiq-usb-link-2','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'noregon dla 2.0','slug'=>'noregon-dla-2.0','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'perkins comm adapter III','slug'=>'perkins-comm-adapter-III','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'python interface dearborn','slug'=>'python-interface-dearborn','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'scania communication (vci 3)','slug'=>'scania-communication-(vci-3)','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'scanmatik 2 pro','slug'=>'scanmatik-2-pro','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'uvim','slug'=>'uvim','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'vci-560 mux','slug'=>'vci-560-mux','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'volvo vocom I','slug'=>'volvo-vocom-I','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'volvo vocom II','slug'=>'volvo-vocom-II','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'wabco diagnostic','slug'=>'wabco-diagnostic','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'zf dpa06','slug'=>'zf-dpa06','image'=>'categories/bg-agricola.jpg'],
            ['name'=>'agco 2x4 canusb','slug'=>'agco-2x4-canusb','image'=>'categories/bg-agricola.jpg']
        ];

        foreach ($interfases as $iinterfase) {
            $interfase = Interfase::create($iinterfase);
            for ($i=0; $i < 10; $i++) { 
                $product = Product::all()->random();
                $product->interfases()->attach($interfase);
            }
        }
    }
}

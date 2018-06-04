<?php

use Illuminate\Database\Seeder;

class loaideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $loaide = new App\loaide([
            'name' => 'Đánh lô',
            'idarea'=>'1'
        ]);
        $loaide -> save();
        $loaide = new App\loaide([
            'name' => '3 càng',
            'idarea'=>'1'
        ]);
        $loaide -> save();
        $loaide = new App\loaide([
            'name' => 'Đánh đề',
            'idarea'=>'1'
        ]);
        $loaide -> save();
        $loaide = new App\loaide([
            'name' => 'Đầu đuôi',
            'idarea'=>'1'
        ]);
        $loaide -> save();
        $loaide = new App\loaide([
            'name' => 'Lô xiên',
            'idarea'=>'1'
        ]);
        $loaide -> save();
        $loaide = new App\loaide([
            'name' => 'Lô trượt',
            'idarea'=>'1'
        ]);
        $loaide -> save();

        $loaide = new App\loaide([
            'name' => 'Đánh lô',
            'idarea'=>'2'
        ]);
        $loaide -> save();
        $loaide = new App\loaide([
            'name' => '3 càng',
            'idarea'=>'2'
        ]);
        $loaide -> save();
        $loaide = new App\loaide([
            'name' => 'Đánh đề',
            'idarea'=>'2'
        ]);
        $loaide -> save();
        $loaide = new App\loaide([
            'name' => 'Đầu đuôi',
            'idarea'=>'2'
        ]);
        $loaide -> save();
        $loaide = new App\loaide([
            'name' => 'Xiên',
            'idarea'=>'2'
        ]);
        $loaide -> save();
        $loaide = new App\loaide([
            'name' => 'Lô trượt',
            'idarea'=>'2'
        ]);
        $loaide -> save();

        $loaide = new App\loaide([
            'name' => 'Bao lô',
            'idarea'=>'3'
        ]);
        $loaide -> save();
        $loaide = new App\loaide([
            'name' => 'Xỉu chủ',
            'idarea'=>'3'
        ]);
        $loaide -> save();
        $loaide = new App\loaide([
            'name' => 'Đánh đề',
            'idarea'=>'3'
        ]);
        $loaide -> save();
        $loaide = new App\loaide([
            'name' => 'Đầu đuôi',
            'idarea'=>'3'
        ]);
        $loaide -> save();
        $loaide = new App\loaide([
            'name' => 'Lô đá',
            'idarea'=>'3'
        ]);
        $loaide -> save();
        $loaide = new App\loaide([
            'name' => 'Lô trượt',
            'idarea'=>'3'
        ]);
        $loaide -> save();
    }
}

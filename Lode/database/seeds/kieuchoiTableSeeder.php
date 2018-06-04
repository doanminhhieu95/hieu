<?php

use Illuminate\Database\Seeder;

class kieuchoiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kieuchoi = new App\kieuchoi([
            'name' => 'Lô 2 số',
            'idloaide'=>'1',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 2 chữ số cuối trong lô 27 giải ( chỉ cần thanh toán cho 22 giải ). Thắng gấp 78 lần, nếu số đó về N lần thì tính kết quả x N lần. Ví dụ: đánh lô 79 - 1 con 1k, Tổng thanh toán: 1k x 22 = 22k. Nếu trong lô có 2 chữ số cuối là 79 thì Tiền thắng: 1k x 78 = 78k, nếu có N lần 2 chữ số cuối là 79 thì Tiền thắng là: 1k x 78 x N',
            'idarea'=>'1',
            'money'=>'20','loai'=>'2','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Lô 3 số',
            'idloaide'=>'1','giaithuong'=>'10',
            'luatchoi'=>'Đánh 3 chữ số cuối trong lô 23 giải. Thắng gấp 770 lần, nếu số đó về N lần thì tính kết quả x N lần. Ví dụ: đánh lô 789 - 1 con 1k, Tổng thanh toán: 1k x 23 = 23k. Nếu trong lô có 3 chữ số cuối là 789 thì Tiền thắng: 1k x 770 = 770k, nếu có N lần 3 chữ số cuối là 789 thì Tiền thắng là: 1k x 770 x N',
            'idarea'=>'1','money'=>'20','loai'=>'3','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => '3 càng',
            'idloaide'=>'2',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 3 chữ số cuối của giải ĐB. Thắng gấp 700 lần. Ví dụ: đánh 1k cho số 879, Tổng thanh toán: 1k. Nếu giải ĐB là xx879 thì Tiền thắng: 1k x 700 = 700K',
            'idarea'=>'1','money'=>'20','loai'=>'3','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Đề đầu',
            'idloaide'=>'3',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh lô giải 7 ( có 4 giải, thanh toán đủ ). Thắng gấp 82 lần. Ví dụ : đánh 1k cho số 79, Tổng thanh toán: 1k x 4 =4k. Nếu trong lô giải 7 có 1 số 79 thì Tiền thắng: 1k x 82 = 82k.',
            'idarea'=>'1','money'=>'20','loai'=>'2','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Đề đặc biệt',
            'idloaide'=>'3',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 2 chữ số cuối trong giải ĐB. Thắng gấp 82 lần. Ví dụ: đánh 1k cho số 79. Tổng thanh toán: 1k. Nếu giải ĐB là xxx79 thì Tiền thắng: 1k x 82 = 82k',
            'idarea'=>'1','money'=>'20','loai'=>'2','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Đầu',
            'idloaide'=>'4',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 1 chữ số ở hàng chục của giải ĐB. Thắng gấp 8.7 lần. Ví dụ: đánh 1k cho số 7. Tổng thanh toán: 1K. Nếu giải ĐB là xxx7x thì Tiền thắng: 1k x 8.7 = 8.7k',
            'idarea'=>'1','money'=>'20','loai'=>'1','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Đuôi',
            'idloaide'=>'4',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 1 chữ số cuối của giải ĐB. Thắng gấp 8.7 lần. Ví dụ: đánh 1k cho số 7. Tổng thanh toán: 1K. Nếu giải ĐB là xxxx7 thì Tiền thắng: 1k x 8.7 = 8.7k',
            'idarea'=>'1','money'=>'20','loai'=>'1','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Xiên 2',
            'idloaide'=>'5',
            'giaithuong'=>'10',
            'luatchoi'=>'Xiên 2 của 2 chữ số cuối trong lô 27 giải. Thắng gấp 14 lần. Ví dụ : đánh 1k cho xiên 11+13, Tổng thanh toán: 1k. Nếu trong lô có "2 chữ số cuối là 11 và 2 chữ số cuối là 13" thì Tiền thắng: 1k x 14 = 14k',
            'idarea'=>'1','money'=>'20','loai'=>'2','max'=>'2'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Xiên 3',
            'idloaide'=>'5',
            'giaithuong'=>'10',
            'luatchoi'=>'Xiên 3 của 2 chữ số cuối trong lô 27 giải. Thắng gấp 50 lần. Ví dụ : đánh 1k cho xiên 11+13+15, Tổng thanh toán: 1k. Nếu trong lô có 2 chữ số cuối là 11,13,15 thì Tiền thắng: 1k x 50 = 50k',
            'idarea'=>'1','money'=>'20','loai'=>'2','max'=>'3'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Xiên 4',
            'idloaide'=>'5',
            'giaithuong'=>'10',
            'luatchoi'=>'Xiên 4 của 2 chữ số cuối trong lô 27 giải. Thắng gấp 150 lần. Ví dụ : đánh 1k cho xiên 11+13+15+20, Tổng thanh toán: 1k. Nếu trong lô có 2 chữ số cuối là 11,13,15,20 thì Tiền thắng: 1k x 150 = 150k',
            'idarea'=>'1','money'=>'20','loai'=>'2','max'=>'4'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Lô trượt xiên 4',
            'idloaide'=>'6',
            'giaithuong'=>'10',
            'luatchoi'=>'Trượt Xiên 4 của 2 chữ số cuối trong lô 27 giải. Thắng gấp 2.5 lần. Ví dụ: đánh 1k cho trượt xiên 11+13+15+20. Tổng thanh toán: 1k. Nếu trong lô không có 2 chữ số cuối là 11,13,15,20 thì Tiền thắng: 1k x 2.5 = 2.5k',
            'idarea'=>'1','money'=>'20','loai'=>'2','max'=>'4'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Lô trượt xiên 8',
            'idloaide'=>'6',
            'giaithuong'=>'10',
            'luatchoi'=>'Trượt Xiên 8 của 2 chữ số cuối trong lô 27 giải. Thắng gấp 8 lần. Ví dụ: đánh 1k cho trượt xiên 11+13+15+20+30+40+50+60. Tổng thanh toán: 1k. Nếu trong lô không có 2 chữ số cuối là 11,13,15,20,30,40,50,60 thì Tiền thắng: 1k x 8 = 8k',
            'idarea'=>'1','money'=>'20','loai'=>'2','max'=>'8'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Lô trượt xiên 10',
            'idloaide'=>'6',
            'giaithuong'=>'10',
            'luatchoi'=>'Trượt Xiên 10 của 2 chữ số cuối trong lô 27 giải. Thắng gấp 11 lần. Ví dụ: đánh 1k cho trượt xiên 11+13+15+20+30+40+50+60+62+72. Tổng thanh toán: 1k. Nếu trong lô không có 2 chữ số cuối là 11,13,15,20,30,40,50,60,62,72 thì Tiền thắng: 1k x 11 = 11k',
            'idarea'=>'1','money'=>'20','loai'=>'2','max'=>'10'
        ]);
        $kieuchoi -> save();

        $kieuchoi = new App\kieuchoi([
            'name' => 'Lô 2 số',
            'idloaide'=>'7',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 2 chữ số cuối trong lô 18 giải ( chỉ cần thanh toán cho 15 giải ). Thắng gấp 79 lần, nếu số đó về N lần thì tính kết quả x N lần. Ví dụ: đánh lô số 39 - 1 con 1k, Tổng thanh toán: 1k x 15 = 15k. Nếu trong lô có 1 lần 2 chữ số cuối là 39 thì Tiền thắng: 1k x 79 = 79k, nếu có N lần 2 chữ số cuối là 39 thì Tiền thắng là: 1k x 79 x N',
            'idarea'=>'2','money'=>'20','loai'=>'2','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Lô 3 số',
            'idloaide'=>'7',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 3 chữ số cuối trong lô 17 giải. Thắng gấp 770 lần, nếu số đó về N lần thì tính kết quả x N lần. Ví dụ: đánh lô 789 - 1 con 1k, Tổng thanh toán: 1k x 17 = 17k. Nếu trong lô có 3 chữ số cuối là 789 thì Tiền thắng: 1k x 770 = 770k, nếu có N lần 3 chữ số cuối là 789 thì Tiền thắng là: 1k x 770 x N',
            'idarea'=>'2','money'=>'20','loai'=>'3','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => '3 càng đầu',
            'idloaide'=>'8',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh giải 7. Thắng gấp 700 lần. Ví dụ: đánh 1k cho số 879, Tổng thanh toán: 1k. Nếu giải 7 là 879 thì Tiền thắng: 1k x 700 = 700K',
            'idarea'=>'2','money'=>'20','loai'=>'3','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => '3 càng đuôi',
            'idloaide'=>'8',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 3 chữ số cuối của giải ĐB. Thắng gấp 700 lần. Ví dụ: đánh 1k cho số 879, Tổng thanh toán: 1k. Nếu giải ĐB là xx879 thì Tiền thắng: 1k x 700 = 700K',
            'idarea'=>'2','money'=>'20','loai'=>'3','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => '3 càng đầu - đuôi',
            'idloaide'=>'8',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 3 chữ số cuối của giải ĐB và giải 7. Thắng gấp 700 lần. Ví dụ: đánh 1k cho số 879, Tổng thanh toán: 2k. Nếu giải ĐB hoặc giải 7 có 3 chữ số cuối là 879 thì Tiền thắng: 1k x 700 = 700k',
            'idarea'=>'2','money'=>'20','loai'=>'3','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Đề đầu',
            'idloaide'=>'9',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh giải 8. Thắng gấp 82 lần. Ví dụ: đánh 1k cho số 79. Tổng thanh toán: 1k. Nếu giải 8 là 79 thì Tiền thắng: 1k x 82 = 82k',
            'idarea'=>'2','money'=>'20','loai'=>'2','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Đề đặc biệt',
            'idloaide'=>'9',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 2 chữ số cuối trong giải ĐB. Thắng gấp 82 lần. Ví dụ: đánh 1k cho số 79. Tổng thanh toán: 1k. Nếu giải ĐB là xxx79 thì Tiền thắng: 1k x 82 = 82k',
            'idarea'=>'2','money'=>'20','loai'=>'2','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Đầu',
            'idloaide'=>'10',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 1 chữ số ở hàng chục của giải ĐB. Thắng gấp 8.7 lần. Ví dụ: đánh 1k cho số 7. Tổng thanh toán: 1K. Nếu giải ĐB là xxx7x thì Tiền thắng: 1k x 8.7 = 8.7k',
            'idarea'=>'2','money'=>'20','loai'=>'1','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Đuôi',
            'idloaide'=>'10',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 1 chữ số cuối của giải ĐB. Thắng gấp 8.7 lần. Ví dụ: đánh 1k cho số 9. Tổng thanh toán: 1k. Nếu giải ĐB là xxxx9 thì Tiền thắng: 1k x 8.7 = 8.7k',
            'idarea'=>'2','money'=>'20','loai'=>'1','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Xiên 2',
            'idloaide'=>'11',
            'giaithuong'=>'10',
            'luatchoi'=>'Xiên 2 của 2 chữ số cuối trong lô 18 giải. Thắng gấp 27 lần. Ví dụ : đánh 1k cho xiên 11+13, Tổng thanh toán: 1k. Nếu trong lô có "2 chữ số cuối là 11 và 2 chữ số cuối là 13" thì Tiền thắng: 1k x 27 = 27k',
            'idarea'=>'2','money'=>'20','loai'=>'2','max'=>'2'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Xiên 3',
            'idloaide'=>'11',
            'giaithuong'=>'10',
            'luatchoi'=>'Xiên 3 của 2 chữ số cuối trong lô 18 giải. Thắng gấp 150 lần. Ví dụ : đánh 1k cho xiên 11+13+15, Tổng thanh toán: 1k. Nếu trong lô có 2 chữ số cuối là 11,13,15 thì Tiền thắng: 1k x 150 = 150k',
            'idarea'=>'2','money'=>'20','loai'=>'2','max'=>'3'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Xiên 4',
            'idloaide'=>'11',
            'giaithuong'=>'10',
            'luatchoi'=>'Xiên 4 của 2 chữ số cuối trong lô 18 giải. Thắng gấp 700 lần. Ví dụ : đánh 1k cho xiên 11+13+15+20, Tổng thanh toán: 1k. Nếu trong lô có 2 chữ số cuối là 11,13,15,20 thì Tiền thắng: 1k x 700 = 700k',
            'idarea'=>'2','money'=>'20','loai'=>'2','max'=>'4'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Lô trượt xiên 4',
            'idloaide'=>'12',
            'giaithuong'=>'10',
            'luatchoi'=>'Trượt Xiên 4 của 2 chữ số cuối trong lô 18 giải. Thắng gấp 2 lần. Ví dụ: đánh 1k cho trượt xiên 11+13+15+20. Tổng thanh toán: 1k. Nếu trong lô không có 2 chữ số cuối là 11,13,15,20 thì Tiền thắng: 1k x 2 = 2k',
            'idarea'=>'2','money'=>'20','loai'=>'2','max'=>'4'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Lô trượt xiên 8',
            'idloaide'=>'12',
            'giaithuong'=>'10',
            'luatchoi'=>'Trượt Xiên 8 của 2 chữ số cuối trong lô 18 giải. Thắng gấp 3.5 lần. Ví dụ: đánh 1k cho trượt xiên 11+13+15+20+30+40+50+60. Tổng thanh toán: 1k. Nếu trong lô không có 2 chữ số cuối là 11,13,15,20,30,40,50,60 thì Tiền thắng: 1k x 3.5 = 3.5k',
            'idarea'=>'2','money'=>'20','loai'=>'2','max'=>'8'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Lô trượt xiên 10',
            'idloaide'=>'12',
            'giaithuong'=>'10',
            'luatchoi'=>'Trượt Xiên 10 của 2 chữ số cuối trong lô 18 giải. Thắng gấp 4,5 lần. Ví dụ: đánh 1k cho trượt xiên 11+13+15+20+30+40+50+60+62+72. Tổng thanh toán: 1k. Nếu trong lô không có 2 chữ số cuối là 11,13,15,20,30,40,50,60,62,72 thì Tiền thắng: 1k x 4,5 = 4,5k',
            'idarea'=>'2','money'=>'20','loai'=>'2','max'=>'10'
        ]);
        $kieuchoi -> save();

        $kieuchoi = new App\kieuchoi([
            'name' => 'Lô 2 số',
            'idloaide'=>'13',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 2 chữ số cuối trong lô 18 giải ( chỉ cần thanh toán cho 15 giải ). Thắng gấp 79 lần, nếu số đó về N lần thì tính kết quả x N lần. Ví dụ: bao lô 39 - 1 con 1k, Tổng thanh toán: 1k x 15 = 15k. Nếu trong lô có 1 lần 2 chữ số cuối là 39 thì Tiền thắng: 1k x 79 = 79k, nếu có N lần 2 chữ số cuối là 39 thì Tiền thắng là: 1k x 79 x N',
            'idarea'=>'3','money'=>'20','loai'=>'2','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Lô 3 số',
            'idloaide'=>'13',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 3 chữ số cuối trong lô 17 giải. Thắng gấp 770 lần, nếu số đó về N lần thì tính kết quả x N lần. Ví dụ: bao lô 789 - 1 con 1k, Tổng thanh toán: 1k x 17 = 17k. Nếu trong lô có 3 chữ số cuối là 789 thì Tiền thắng: 1k x 770 = 770k, nếu có N lần 3 chữ số cuối là 789 thì Tiền thắng là: 1k x 770 x N',
            'idarea'=>'3','money'=>'20','loai'=>'3','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Xỉu chủ đầu',
            'idloaide'=>'14',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh giải 7. Thắng gấp 700 lần. Ví dụ: đánh 1k cho số 879, Tổng thanh toán: 1k. Nếu giải 7 là 879 thì Tiền thắng: 1k x 700 = 700K',
            'idarea'=>'3','money'=>'20','loai'=>'3','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Xỉu chủ đuôi',
            'idloaide'=>'14',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 3 chữ số cuối của giải ĐB. Thắng gấp 700 lần. Ví dụ: đánh 1k cho số 879, Tổng thanh toán: 1k. Nếu giải ĐB là xx879 thì Tiền thắng: 1k x 700 = 700K',
            'idarea'=>'3','money'=>'20','loai'=>'3','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Xỉu chủ đầu - đuôi',
            'idloaide'=>'14',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 3 chữ số cuối của giải ĐB và giải 7. Thắng gấp 700 lần. Ví dụ: đánh 1k cho số 879, Tổng thanh toán: 2k. Nếu giải ĐB hoặc giải 7 có 3 chữ số cuối là 879 thì Tiền thắng: 1k x 700 = 700k',
            'idarea'=>'3','money'=>'20','loai'=>'3','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Đề đầu',
            'idloaide'=>'15',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh giải 8. Thắng gấp 82 lần. Ví dụ: đánh 1k cho số 79. Tổng thanh toán: 1k. Nếu giải 8 là 79 thì Tiền thắng: 1k x 82 = 82k',
            'idarea'=>'3','money'=>'20','loai'=>'2','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Đề đặc biệt',
            'idloaide'=>'15',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 2 chữ số cuối trong giải ĐB. Thắng gấp 82 lần. Ví dụ: đánh 1k cho số 79. Tổng thanh toán: 1k. Nếu giải ĐB là xxx79 thì Tiền thắng: 1k x 82 = 82k',
            'idarea'=>'3','money'=>'20','loai'=>'2','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Đánh đầu đuôi',
            'idloaide'=>'15',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 2 chữ số cuối trong giải ĐB và Giải 8. Thắng gấp 85 lần. Ví dụ: đánh 1k cho số 79. Tổng thanh toán: 2k. Nếu giải ĐB hoặc giải 8 có 2 chữ số cuối là 79 thì Tiền thắng: 1k x 85 = 85k',
            'idarea'=>'3','money'=>'20','loai'=>'2','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Đầu',
            'idloaide'=>'16',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 1 chữ số hàng chục của giải ĐB. Thắng gấp 8.7 lần. Ví dụ: đánh 1k cho số 6. Tổng thanh toán: 1k. Nếu giải ĐB là xxx6x thì Tiền thắng: 1k x 8.7 = 8.7k',
            'idarea'=>'3','money'=>'20','loai'=>'1','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Đuôi',
            'idloaide'=>'16',
            'giaithuong'=>'10',
            'luatchoi'=>'Đánh 1 chữ số cuối của giải ĐB. Thắng gấp 8.7 lần. Ví dụ: đánh 1k cho số 9. Tổng thanh toán: 1k. Nếu giải ĐB là xxxx9 thì Tiền thắng: 1k x 8.7 = 8.7k',
            'idarea'=>'3','money'=>'20','loai'=>'1','max'=>'1'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Đá 2',
            'idloaide'=>'17',
            'giaithuong'=>'10',
            'luatchoi'=>'Đá 2 của 2 chữ số cuối trong lô 18 giải. Thắng gấp 27 lần. Ví dụ : đánh 1k cho đá 11+13. Tổng thanh toán: 1k. Nếu trong lô có "1 số mà 2 chữ số cuối là 11 và 1 số mà 2 chữ số cuối là 13" thì Tiền thắng: 1k x 27 = 27k',
            'idarea'=>'3','money'=>'20','loai'=>'2','max'=>'2'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Đá 3',
            'idloaide'=>'17',
            'giaithuong'=>'10',
            'luatchoi'=>'Đá 3 của 2 chữ số cuối trong lô 18 giải. Thắng gấp 150 lần. Ví dụ : đánh 1k cho đá 11+13+15, Tổng thanh toán: 1k. Nếu trong lô có 2 chữ số cuối là 11,13,15 thì Tiền thắng: 1k x 150 = 150k',
            'idarea'=>'3','money'=>'20','loai'=>'2','max'=>'3'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Đá 4',
            'idloaide'=>'17',
            'giaithuong'=>'10',
            'luatchoi'=>'Đá 4 của 2 chữ số cuối trong lô 18 giải. Thắng gấp 700 lần. Ví dụ : đánh 1k cho đá 11+13+15+20, Tổng thanh toán: 1k. Nếu trong lô có 2 chữ số cuối là 11,13,15,20 thì Tiền thắng: 1k x 700 = 700k',
            'idarea'=>'3','money'=>'20','loai'=>'2','max'=>'4'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Lô trượt xiên 4',
            'idloaide'=>'18',
            'giaithuong'=>'10',
            'luatchoi'=>'Trượt Xiên 4 của 2 chữ số cuối trong lô 18 giải. Thắng gấp 2 lần. Ví dụ: đánh 1k cho trượt xiên 11+13+15+20. Tổng thanh toán: 1k. Nếu trong lô không có 2 chữ số cuối là 11,13,15,20 thì Tiền thắng: 1k x 2 = 2k',
            'idarea'=>'3','money'=>'20','loai'=>'2','max'=>'4'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Lô trượt xiên 8',
            'idloaide'=>'18',
            'giaithuong'=>'10',
            'luatchoi'=>'Trượt Xiên 8 của 2 chữ số cuối trong lô 18 giải. Thắng gấp 3.5 lần. Ví dụ: đánh 1k cho trượt xiên 11+13+15+20+30+40+50+60. Tổng thanh toán: 1k. Nếu trong lô không có 2 chữ số cuối là 11,13,15,20,30,40,50,60 thì Tiền thắng: 1k x 3.5 = 3.5k',
            'idarea'=>'3','money'=>'20','loai'=>'2','max'=>'8'
        ]);
        $kieuchoi -> save();
        $kieuchoi = new App\kieuchoi([
            'name' => 'Lô trượt xiên 10',
            'idloaide'=>'18',
            'giaithuong'=>'10',
            'luatchoi'=>'Trượt Xiên 10 của 2 chữ số cuối trong lô 18 giải. Thắng gấp 4,5 lần. Ví dụ: đánh 1k cho trượt xiên 11+13+15+20+30+40+50+60+62+72. Tổng thanh toán: 1k. Nếu trong lô không có 2 chữ số cuối là 11,13,15,20,30,40,50,60,62,72 thì Tiền thắng: 1k x 4,5 = 4,5k',
            'idarea'=>'3','money'=>'20','loai'=>'2','max'=>'10'
        ]);
        $kieuchoi -> save();
    }
}

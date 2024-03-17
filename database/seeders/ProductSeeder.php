<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product')->insert([
            [
                'name_product' => 'Áo Thun Nam Tay Ngắn Cổ Tròn',
                'id_shop' => 1,
                'id_category_child' => 3,
                'description' => 'Áo thun trơn nam thời trang kiểu dáng, màu sắc đơn giản, tinh tế, thiết kế hiện đại, phù hợp với mọi lứa tuổi.
                Áo nam chính hãng cao cấp với đường may tỉ mỉ, chắc chắn có độ bền cao trong quá trình sử dụng.
                Giá thành hợp lý, nhiều ưu đãi hấp dẫn khi mua áo phông chính hãng tại shop.                
                Áo thun bảo hành 1 năm miễn phí.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_product' => 'Áo khoác sơ mi nam chất liệu kaki cao cấp',
                'id_shop' => 1,
                'id_category_child' => 1,
                'description' => '- Chất liệu: Nhung 
                - Màu sắc: Đen, Rêu, Xám ghi, Be                
                - Thiết kế: fom dáng hiện đại, trẻ trung, năng động, dễ phối đồ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_product' => 'Áo khoác gió bomber nam cao cấp ',
                'id_shop' => 1,
                'id_category_child' => 1,
                'description' => '+ Áo khoác gió bomber nam 2 lớp được may từ chất liệu vải gió cao cấp, độ bền cao, hội tụ đầy đủ tính năng chống thấm nước, cản gió giữ ấm vào mùa đông, chống bụi bẩn, chống bám mốc. 
                + Áo khoác gió bomber nam với kiểu dáng thời trang bền đẹp, thoải mái, cùng màu sắc nam tính, dễ dàng phối hợp với nhiều trang phục khác nhau mang đến sự trẻ trung, năng động cho người mặc. 
              - Chất liệu: vải gió cao cấp bao gồm 90% Polyester và 10% Spande, có khả năng chống nước, chống bụi bẩn, chống tia UV, chống bám mốc & kháng khuẩn, cản gió & giữ ấm cơ thể tốt. ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_product' => 'Áo khoác phao Nam 3 lớp chần ngang chống thấm nước',
                'id_shop' => 1,
                'id_category_child' => 1,
                'description' => 'Áo phao nam 3 lớp, thiết kế chần ngang, túi trang trí hai bên hông, khóa kéo trước, có mũ tháo rời. Áo được may từ chất liệu vải gió cao cấp, độ bền cao, hội tụ đầy đủ tính năng chống thấm nước, chống bụi bẩn, chống bám mốc, bên trong chần bông siêu nhẹ giúp giữ ấm cơ thể tốt. Áo khoác ngoài với kiểu dáng thời trang cùng màu sắc nam tính, dễ dàng phối hợp với nhiều trang phục khác nhau mang đến sự trẻ trung, năng động cho người mặc. ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_product' => 'Áo Thun T-Shirt Nam túi ngực',
                'id_shop' => 1,
                'id_category_child' => 3,
                'description' => 'Áo được thiết kế tinh tế, đường may sắc nét, tạo hiệu ứng cuốn hút thị giác, mang đến vẻ đẹp nam tính, trẻ trung, năng động. Áo có độ co giãn tốt, tạo cảm giác dễ chịu khi mặc.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_product' => 'Bốt cao cổ nữ 15cm buộc dây kéo khóa',
                'id_shop' => 2,
                'id_category_child' => 5,
                'description' => '- Phần thân trên chất liệu da PU mềm mịn cao cấp đi rất êm chân, mang thoải mái đi lại cả ngày kết hợp phần cổ boot ôm chân tạo form dáng cực chuẩn đẹp, kéo dài chân nhìn đôi chân trông thon gọn hơn
                - Phần Midsole (đế giữa)  rất êm, lót EVA
                - Phần Outsole (đế ngoài) là điểm quyết định của em giày này. Đế cao su đặc có độ bám dính, chống trơn trượt, ma sát tối đa, tạo độ êm ái thoải mái nên sản phẩm hết sức tuyệt vời cho những cô nàng có tính chất công việc phải đi lại cả ngày.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_product' => 'Giày Bốt Cao Cổ Da Mềm Cao gót',
                'id_shop' => 2,
                'id_category_child' => 5,
                'description' => '- Phần thân trên chất liệu da PU mềm mịn cao cấp đi rất êm chân, mang thoải mái đi lại cả ngày kết hợp phần cổ boot ôm chân tạo form dáng cực chuẩn đẹp, kéo dài chân nhìn đôi chân trông thon gọn hơn
                - Phần Midsole (đế giữa)  rất êm, lót EVA
                - Phần Outsole (đế ngoài) là điểm quyết định của em giày này. Đế cao su đặc có độ bám dính, chống trơn trượt, ma sát tối đa, tạo độ êm ái thoải mái nên sản phẩm hết sức tuyệt vời cho những cô nàng có tính chất công việc phải đi lại cả ngày.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_product' => 'Giày thể thao nữ chất vải dáng basic',
                'id_shop' => 2,
                'id_category_child' => 6,
                'description' => '- Phần thân trên vải canvas mềm mịn cao cấp đi rất êm chân, mang thoải mái đi lại cả ngày 
                - Phần Midsole (đế giữa)  lót EVA êm ái
                - Phần Outsole (đế ngoài) là điểm quyết định của em giày này. Đế cao su đặc có độ bám dính, chống trơn trượt, ma sát tối đa, tạo độ êm ái thoải mái nên sản phẩm hết sức tuyệt vời cho những cô nàng có tính chất công việc phải đi lại cả ngày.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_product' => 'Giày Thể Thao Nữ MOCNHO đế cao 4cm retro basic',
                'id_shop' => 2,
                'id_category_child' => 6,
                'description' => '- Phần thân trên vải canvas mềm mịn cao cấp đi rất êm chân, mang thoải mái đi lại cả ngày 
                - Phần Midsole (đế giữa)  lót EVA êm ái
                - Phần Outsole (đế ngoài) là điểm quyết định của em giày này. Đế cao su đặc có độ bám dính, chống trơn trượt, ma sát tối đa, tạo độ êm ái thoải mái nên sản phẩm hết sức tuyệt vời cho những cô nàng có tính chất công việc phải đi lại cả ngày.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_product' => 'Giày Thể Thao Nữ HIHI Màu Trắng Đế Bằng nâu',
                'id_shop' => 2,
                'id_category_child' => 6,
                'description' => '- Phần thân trên vải canvas mềm mịn cao cấp đi rất êm chân, mang thoải mái đi lại cả ngày 
                - Phần Midsole (đế giữa)  lót EVA êm ái
                - Phần Outsole (đế ngoài) là điểm quyết định của em giày này. Đế cao su đặc có độ bám dính, chống trơn trượt, ma sát tối đa, tạo độ êm ái thoải mái nên sản phẩm hết sức tuyệt vời cho những cô nàng có tính chất công việc phải đi lại cả ngày.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ]);
    }
}

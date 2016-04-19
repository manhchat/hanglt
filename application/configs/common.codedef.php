<?php
/**
 * VN_Code defined
 */
$codedef = array ();
$codedef ['PRICE_SEARCH'] = array (
        '' => '---Mức giá---',
        '1-2999000' => 'Dưới 3 triệu',
        '3000000-4999000' => '3 đến 5 triệu',
        '5000000-6999000' => '5 đến 7 triệu',
        '7000000-8999000' => '7 đến 9 triệu',
        '9000000-10999000' => '9 đến 11 triệu',
        '11000000-12999000' => '11 đến 13 triệu',
        '13000000-14999000' => '13 đến 15 triệu',
        'all' => 'Trên 15 triệu' 
);
$codedef ['MAX_PRICE_SEARCH'] = 15000000;
$codedef ['SORT_SEARCH'] = array (
        '' => '---Sắp xếp---',
        'price_asc' => 'Giá tăng dần',
        'price_desc' => 'Giám giảm dần',
        'new' => 'Sản phẩm mới' 
);
$codedef ['CATEGORY_COMMON'] = array (
        '' => '---Chọn danh mục---',
        1 => 'Giới thiệu',
        2 => 'Chính sách',
        3 => 'Thanh toán qua tài khoản',
        4 => 'Tuyển dụng nhân sự',
        5 => 'Hỗ trợ mua hàng online',
        6 => 'Giao hàng tại nhà',
        7 => 'Sửa chữa laptop',
        8 => 'Sửa chữa macbook',
        9 => 'Báo giá linh kiện laptop' 
);
$codedef ['CPU'] = array (
        '' => '---CPU---',
        1 => 'Intel Core i7',
        2 => 'Intel Core i5',
        3 => 'Intel Core i3',
        4 => 'Intel Core 2 Duo',
        5 => 'AMD',
        
        9999 => 'Khác' 
);
$codedef ['RAM'] = array (
        '' => '---RAM---',
        16 => '16GB',
        8 => '8GB',
        6 => '6GB',
        4 => '4GB',
        2 => '2GB',
        
        9999 => 'Khác' 
);
$codedef ['HDD'] = array (
        '' => '---HDD---',
        80 => 'HDD 80GB',
        160 => 'HDD 160GB',
        250 => 'HDD 250GB',
        320 => 'HDD 320GB',
        500 => 'HDD 500GB',
        120 => 'SSD 120GB',
        128 => 'SSD 128GB',
        240 => 'SSD 240GB',
        256 => 'SSD 256GB',
        480 => 'SSD 480GB',
        512 => 'SSD 512GB',
        
        9999 => 'Khác' 
);
$codedef ['SCREEN'] = array (
        '' => '---Màn hình---',
        11 => '11 inch',
        12 => '12 inch',
        13 => '13 inch',
        14 => '14 inch',
        15 => '15 inch',
        17 => '17 inch',
        
        9999 => 'Khác' 
);
$codedef ['BAO_HANH'] = array (
        '' => '---Thời gian bảo hành---',
        10 => '0 tháng',
        1 => '1 tháng',
        3 => '3 tháng',
        6 => '6 tháng',
        12 => '12 tháng' 
)
;
$codedef ['CATEGORY_NEWS'] = array (
        '' => '---Chọn---',
        1 => 'Tin khuyến mại',
        2 => 'Tin thị trường',
        3 => 'Tin giải trí',
        4 => 'Tin công nghệ',
        5 => 'Cẩm nang laptop',
        6 => 'Tin tuyển dụng' 
);
$codedef ['SUPPORT_ONLINE'] = array (
        1 => array (
                'name' => 'Mr. Đại',
                'tel' => '0988.69.32.32',
                'skype' => 'ducnvict',
                'yahoo' => 'daidonghuong',
                'position' => 'Kinh doanh bán lẻ' 
        ),
        2 => array (
                'name' => 'Mr. Hải',
                'tel' => '0975.984.489',
                'skype' => 'ducnvict',
                'yahoo' => 'edg_0975984489',
                'position' => 'Kinh doanh bán lẻ' 
        ),
        3 => array (
                'name' => 'Mr. Nam',
                'tel' => '0919.627.868',
                'skype' => 'ducnvict',
                'yahoo' => 'tuannam_kdedg',
                'position' => 'Kinh doanh linh kiện' 
        ),
        4 => array (
                'name' => 'Mr. Đại',
                'tel' => '0904.380.772',
                'skype' => 'ducnvict',
                'yahoo' => 'daidonghuong',
                'position' => 'Kinh doanh bán buôn' 
        ),
        5 => array (
                'name' => 'Mr. Đại',
                'tel' => '0904.380.772',
                'skype' => 'ducnvict',
                'yahoo' => 'daidonghuong',
                'position' => 'Tư vấn kỹ thuật' 
        ) 
);
$codedef ['SALES_ONLINE'] = array (
        1 => array (
                'name' => ' Mr Đại',
                'tel' => '0904 380 772 ',
                'skype' => '#',
                'yahoo' => 'daidonghuong',
                'position' => 'Bán buôn bán lẻ' 
        ),
        2 => array (
                'name' => ' Mr Hải',
                'tel' => '0975 984 489 ',
                'skype' => '#',
                'yahoo' => 'edg_0975984489',
                'position' => 'Bán buôn bán lẻ' 
        ),
        3 => array (
                'name' => ' Mr Nam',
                'tel' => '0919 627 868 ',
                'skype' => '#',
                'yahoo' => 'tuannam_kdedg',
                'position' => 'Bán buôn bán lẻ' 
        ),
        4 => array (
                'name' => ' Mr Đại',
                'tel' => '0904 380 772 ',
                'skype' => '#',
                'yahoo' => 'daidonghuong',
                'position' => 'Tư vấn kỹ thuật' 
        ) 
);
$codedef ['HO_TRO_BAO_HANH'] = array (
        1 => array (
                'name' => ' Mr Đại',
                'tel' => '0988 69 3232 ',
                'skype' => 'ducnvict',
                'yahoo' => 'daidonghuong',
                'position' => 'Bảo hành laptop',
                'address' => 'Số 30 Thái Hà' 
        ),
        2 => array (
                'name' => ' Mr Hải',
                'tel' => '0919 627 868 ',
                'skype' => 'ducnvict',
                'yahoo' => 'tuannam_kdedg',
                'position' => 'Bảo hành linh kiện',
                'address' => 'Số 4 Trung Liệt' 
        ) 
);
return $codedef;
create table `admin` 
(
	`ad_id` int primary key not null AUTO_INCREMENT,
	`ad_username` varchar (50) not null,
	`ad_password` varchar (50) not null,
	`ad_phone` varchar (50) not null,
	`ad_email` varchar (50) not null,
	`ad_gioitinh` varchar (50) not null,
	`ad_diachi` varchar (50) not null
);

create table `thuonghieu`
(
	`th_id` int primary key not null AUTO_INCREMENT,
	`th_name` varchar (200) not null,
	`img` varchar (300) not null
);

create table `cpu`
(
	`cpu_id` int primary key not null AUTO_INCREMENT,
	`cpu_name` varchar (50) not null,
	`cpu_sonhan` varchar (50) not null,
	`cpu_soluong` varchar (50) not null,
	`cpu_tocdocpu` varchar (50) not null,
	`cpu_tocdotoida` varchar (50) not null,
	`cpu_bonhodem` varchar (50) not null
);
insert into `cpu` values

(11, 'Không chọn', '0', '0', '0', '0', '0' ),
(2, 'Intel Core i7 Tiger Lake - 1165G7', '4', '8', '2.80 GHz', 'Turbo Boost 4.7 GHz', '12 MB'),
(3, 'Intel Core i5 Tiger Lake - 1135G7', '8', '16', '3.20 GHz', 'Turbo Boost 4.4 GHz', '16 MB'),
(4, 'Intel Core i3 Alder Lake - 1215U',  '6', '8', '1.20 GHz', 'Turbo Boost 4.4 GHz', '10 MB'),
(5, 'AMD Ryzen 7 - 5800H',  '6', '12', '2.10 GHz', 'Turbo Boost 4.0 GHz', '8 MB'),
(6, 'AMD Ryzen 5 - 5500U', '6', '12', '2.10 GHz', 'Turbo Boost 4.0 GHz', '8 MB'),
(7, 'Apple M1',   '8', 'Hãng không công bố', 'Hãng không công bố', 'Hãng không công bố', 'Hãng không công bố'),
(8, 'Apple M2',  '8', 'Hãng không công bố', '100GB/s memory bandwidth', 'Hãng không công bố', 'Hãng không công bố'),
(9, 'Apple M1 Pro', '10', 'Hãng không công bố', '200GB/s memory bandwidth', 'Hãng không công bố', 'Hãng không công bố'),
(10, 'Apple M1 Max', '10', 'Hãng không công bố', '100GB/s memory bandwidth', 'Hãng không công bố', 'Hãng không công bố');

create table `ram`
(
	`ram_id` int primary key not null AUTO_INCREMENT,
	`ram_dungluong` varchar (50) not null,
	`ram_loairam` varchar (50) not null,
	`ram_tocdobus` varchar (50) not null,
	`ram_htramtoida` varchar (50) not null
);
insert into `ram` values
(1, '4 GB', 'DDR4 (1 khe)', 'Từ 2400 MHz (Hãng công bố)', 'Không hỗ trợ nâng cấp' ),
(2, '4 GB', 'DDR4 2 khe (1 khe 4 GB + 1 khe rời)', '3200 MHz', '16 GB' ),
(3, '8 GB', 'DDR4 (Onboard 4 GB + 1 khe 4 GB)', 'Từ 2400 MHz (Hãng công bố)', '12 GB'),
(4, '8 GB', 'DDR4 2 khe (1 khe 8 GB + 1 khe rời)', '3200 MHz', '32 GB'),
(5, '16 GB', 'DDR4 (Onboard)', '3200 MHz', 'Không hỗ trợ nâng cấp' );

create table `ocung` 
(
	`oc_id` int primary key not null AUTO_INCREMENT,
	`oc_name` varchar (50) not null
);
insert into `ocung` values
(1, '2 TB SSD'),
(2, '1 TB SSD'),
(3, '512 GB SSD'),
(4, '256 GB SSD'),
(5, '128 GB SSD');

create table `nhucau` 
(
	`nc_id` int primary key not null AUTO_INCREMENT,
	`nc_name` varchar(50) not null
);
insert into `nhucau` values
(1, 'Không chọn'),
(2, 'Laptop Gaming'),
(3, 'Học tập - Văn phòng'),
(4, 'Đồ hoạ - Kỹ thuật'),
(5, 'Mỏng nhẹ'),
(6, 'Cao cấp - Sang trọng');

create table `manhinh`
(
	`mh_id` int primary key not null AUTO_INCREMENT,
	`mh_kichthuoc` varchar(50) not null
);
insert into `manhinh` values
(1, 'Không chọn'),
(2, '11.6 inch'),
(3, '12.3 inch'),
(4, '12.4 inch'),
(5, '13 inch'),
(6, '13.3 inch'),
(7, '13.4 inch'),
(8, '13.6 inch'),
(9, '14 inch'),
(10, '14.1 inch'),
(11, '14.2 inch'),
(12, '15.6 inch'),
(13, '16 inch'),
(14, '16.1 inch'),
(15, '16.2 inch'),
(16, '17 inch'),
(17, '17.3 inch');

create table `tangsoquet` 
(
	`ts_id` int primary key not null AUTO_INCREMENT,
	`ts_tangso` varchar (50) not null
);
insert into `tangsoquet` values
(1, 'Không chọn'),
(2, '90 Hz'),
(3, '120 Hz'),
(4, '144 Hz'),
(5, '165 Hz'),
(6, '240 Hz'),
(7, '300 Hz'),
(8, '360 Hz');

create table `maumay`
(
	`mm_id` int primary key not null AUTO_INCREMENT,
	`mm_mau` varchar (50) not null
);
insert into `maumay` values
(1, 'Không chọn'),
(2, 'red_black'),
(3, 'while_black');

create table `trongluong`
(
	`tl_id` int not null primary key AUTO_INCREMENT,
	`tl_trongluong` varchar(20) not null
);
insert into `trongluong` values
(1, 'Không chọn'),
(2, '1 Kg'),
(3, '1.2 Kg'),
(4, '1.5 Kg'),
(5, '1.7 Kg'),
(6, '2 Kg'),
(7, '2.5 Kg');


create table `dophangiai`
(
	`dpg_id` int not null primary key AUTO_INCREMENT,
	`dpg_name` varchar(50) not null
);
insert into `dophangiai` values
(1, 'Không chọn'),
(2, '4K'),
(3, '2K'),
(4, 'Retina'),
(5, 'Full HD'),
(6, 'HD');

create table `gia`
(
	`gia_id` int primary key not null AUTO_INCREMENT,
	`gia` decimal(11,3) not null,
	`ngay` date not null
);


create table `tinhnangdatbiet`
(
	`tn_id` int primary key not null AUTO_INCREMENT,
	`tn_name` varchar(50) not null
);

insert into `tinhnangdatbiet` values
(1, 'Không chọn'),
(2, 'Tiêu chuẩn Intel Evo (Mới)'),
(3, 'CPU Intel thế hệ 12 (Mới)'),
(4, 'CPU Intel thế hệ 11'),
(5, 'Card đồ họa rời'),
(6, 'Công nghệ Intel Gaming'),
(7, 'Có bảo mật vân tay'),
(8, 'Có bàn phím số'),
(9, 'Có đèn bàn phím'),
(10, 'Xoay gập 360 độ (2 in 1)');

/*
Ổ cứng SSD
Wi-Fi 6
Công nghệ Intel Evo
Bảo mật vân tay
Viền màn hình siêu mỏng
Công nghệ Intel Gaming
Bộ nhớ Intel Optane
Xoay gập 360 độ (2 in 1)
Màn hình cảm ứng
Nhận diện khuôn mặt*/

create table `laptop`
(
	`lt_id` int primary key not null, 
	`lt_name` varchar(100) not null,
	`th_id` int not null,
	`nc_id` int not null, 
	`mh_id` int not null, 
	`mm_id` int not null, 
	`tl_id` int not null, 
	`dpg_id` int not null, 
	`cpu_id` int not null,
	`ram_id` int not null,
	`oc_id` int not null,
	`ts_id` int not null,
	`tn_id` int not null,
	foreign key (th_id) references thuonghieu (th_id),
	foreign key (nc_id) references nhucau (nc_id),
	foreign key (mh_id) references manhinh (mh_id),
	foreign key (mm_id) references maumay (mm_id),
	foreign key (tl_id) references trongluong (tl_id),
	foreign key (dpg_id) references dophangiai (dpg_id),
	foreign key (cpu_id) references cpu (cpu_id),
	foreign key (ram_id) references ram (ram_id),
	foreign key (oc_id) references ocung (oc_id),
	foreign key (ts_id) references tangsoquet(ts_id),
	foreign key (tn_id) references tinhnangdatbiet(tn_id)
);

create table `hinhanh`
(
	`ha_id` int not null primary key AUTO_INCREMENT,
	`img` varchar (300) not null,

	`gia_id` int not null,
	`lt_id` int not null,
	foreign key (lt_id) references laptop (lt_id),
	foreign key (gia_id) references gia(gia_id)
) ;


create table `thongtinsp`
(
	tt_id int primary key not null AUTO_INCREMENT,
	tt_thongtinsp varchar(1000) not null,
	tt_xuatxu varchar(50) not null,

	`lt_id` int not null,
	foreign key (lt_id) references laptop (lt_id)
);

create table `users`
(
	`us_id` int primary key not null AUTO_INCREMENT,
	`us_username` varchar (50) not null,
	`us_password` varchar (50) not null,
	`us_phone` varchar (50) not null,
	`us_email` varchar (50) not null,
	`us_ngaysinh` date not null,
	`us_gioitinh` varchar (50) not null,
	`us_diachi` varchar (50) not null
);
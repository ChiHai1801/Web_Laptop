 

create table `admin` 
(
	`ad_id` int (20) not null,
	`ad_username` varchar (50) COLLATE utf32_unicode_ci not null,
	`ad_password` varchar (50) COLLATE utf32_unicode_ci not null,
	`ad_phone` varchar (50) COLLATE utf32_unicode_ci not null,
	`ad_email` varchar (50) COLLATE utf32_unicode_ci not null,
	`ad_gioitinh` varchar (50) COLLATE utf32_unicode_ci not null,
	`ad_diachi` varchar (50) COLLATE utf32_unicode_ci not null
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

create table `thuonghieu`
(
	`th_id` int(111) primary key not null,
	`th_name` varchar (200) COLLATE utf32_unicode_ci not null,
	`img` varchar (300) COLLATE utf32_unicode_ci not null
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

insert into `thuonghieu`(`th_id`, `th_name`) values
(1, 'acer' ),
(2, 'Asus'),
(3, 'Dell'),
(4, 'HP'),
(5, 'Intel'),
(6, 'Itel'),
(7, 'Lenovo'),
(8, 'MSI');

create table `cpu`
(
	`cpu_id` int(20) not null,
	`cpu_name` varchar (50) COLLATE utf32_unicode_ci not null
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

insert into `cpu`(`cpu_id`, `cpu_name`) values
(1, 'Intel Core i3' ),
(2, 'Intel Core i5'),
(3, 'Intel Core i7'),
(4, 'Intel Celeron/Pentium'),
(5, 'AMD Ryzen 3'),
(6, 'AMD Ryzen 5'),
(7, 'AMD Ryzen 7'),
(8, 'Apple M1'),
(9, 'Apple M2'),
(10, 'Apple M1 Pro'),
(11, 'Apple M1 Max');

create table `ram`
(
	`ram_id` int(20) not null,
	`ram_dungluong` varchar (50) COLLATE utf32_unicode_ci not null
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

insert into `ram`(`ram_id`, `ram_dungluong`) values
(1, '4 GB' ),
(2, '8 GB'),
(3, '16 GB'),
(4, '32 GB');

create table `ocung` 
(
	`oc_id` int(20) not null,
	`oc_name` varchar (50) COLLATE utf32_unicode_ci not null
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

insert into `ocung` (`oc_id`, `oc_name`) values
(1, 'SSD 128 GB'),
(2, 'SSD 256 GB'),
(3, 'SSD 512 GB'),
(4, 'SSD 1 TB'),
(5, 'SSD 2 TB');


create table `nhucau` 
(
	`nc_id` int(20) not null,
	`nc_name` varchar(50) COLLATE utf32_unicode_ci not null
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

insert into `nhucau` (`nc_id`, `nc_name`) values
(1, 'Laptop Gaming'),
(2, 'Học tập - Văn phòng'),
(3, 'Đồ hoạ - Kỹ thuật'),
(4, 'Mỏng nhẹ'),
(5, 'Cao cấp - Sang trọng');

create table `manhinh`
(
	`mh_id` int (20) not null,
	`mh_kichthuoc` varchar(50) COLLATE utf32_unicode_ci not null
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

insert into `manhinh` (`mh_id`, `mh_kichthuoc`) values
(1, '11.6 inch' ),
(2, '12.3 inch'),
(3, '12.4 inch'),
(4, '13 inch'),
(5, '13.3 inch'),
(6, '13.4 inch'),
(7, '13.6 inch'),
(8, '14 inch'),
(9, '14.1 inch'),
(10, '14.2 inch'),
(11, '15.6 inch'),
(12, '16 inch'),
(13, '16.1 inch'),
(14, '16.2 inch'),
(15, '17.3 inch');


create table `tangsoquet` 
(
	`ts_id` int (20) not null,
	`ts_name` varchar (50) COLLATE utf32_unicode_ci not null
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

insert into `tangsoquet` (`ts_id`, `ts_name`) values
(1, '90 Hz'),
(2, '120 Hz'),
(3, '144 Hz'),
(4, '165 Hz'),
(5, '240 Hz'),
(6, '300 Hz'),
(7, '360 Hz');







create table `maumay`
(
	`mm_id` int (20) not null,
	`mm_mau` varchar (50) COLLATE utf32_unicode_ci not null
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

create table `trongluong`
(
	`tl_id` int (20) not null primary key,
	`tl_trongluong` varchar(20) COLLATE utf32_unicode_ci not null
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

insert into `trongluong` (`tl_id`, `tl_trongluong`) values
(1, '1 Kg'),
(2, '1.27 Kg'),
(3, '1.5 Kg'),
(4, '1.7 Kg'),
(5, '2 Kg'),
(2, '2.4 Kg'),
(3, '2.7 Kg'),
(4, '3 Kg');


create table `dophangiai`
(
	`dpg_id` int (20) not null primary key,
	`dpg_name` varchar(50) COLLATE utf32_unicode_ci not null
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

insert into `dophangiai` (`dpg_id`, `dpg_name`) values
(1, '4K'),
(2, '2K'),
(3, 'Retina'),
(4, 'Full HD'),
(5, 'HD');

create table `hinhanh`
(
	`ha_id` int (20) not null,
	`ha_name` varchar(100) COLLATE utf32_unicode_ci not null,
	`img` varchar (300) COLLATE utf32_unicode_ci not null
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;



create table `gia`
(
	`gia` int (110) not null,
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;


create table `sanpham`
(
	`sp_id` int(20) not null,
	`sp_name` varchar (50) COLLATE utf32_unicode_ci not null,
	`sp_xuatxu` varchar (50) COLLATE utf32_unicode_ci not null,
	`sp_mota` varchar (50) COLLATE utf32_unicode_ci not null
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

create table `chitietsp`
(
	`ct_id`  int (20) not null
);

create table `laptop`
(
	`lt_id` int (20) not null,
	`sp_id` int(20) not null, 
	`th_id` int(111) not null,
	`ha_id` int(20) not null, 
	`gia` int(110) not null, 
	`ct_id` int(20) not null, 
	`nc_id` int(20) not null, 
	`mh_id` int(20) not null, 
	`mm_id` int(20) not null, 
	`tl_id` int(20) not null, 
	`dpg_id` int(20) not null, 
	`cpu_id` int(20) not null,
	`ram_id` int(20) not null,
	`oc_id` int(20) not null,
	`ts_id` int(20) not null,
	foreign (sp_id) key references sanpham (sp_id),
	foreign (th_id) key references thuonghieu (th_id),
	foreign (ha_id) key references hinhanh (ha_id),
	foreign (gia) key references gia (gia),
	foreign (ct_id) key references chitietsp (ct_id),
	foreign (nc_id) key references nhucau (nc_id),
	foreign (mh_id) key references manhinh (mh_id),
	foreign (mm_id) key references maumay (mm_id),
	foreign (tl_id) key references trongluong (tl_id),
	foreign (dpg_id) key references dophangiai (dpg_id),
	foreign (cpu_id) key references cpu (cpu_id),
	foreign (ram_id) key references ram (ram_id),
	foreign (oc_id) key references ocung (oc_id),
	foreign (ts_id) key references card (card_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;


create table `user`
(
	`us_id` int (20) not null,
	`us_username` varchar (50) not null,
	`us_password` varchar (50) COLLATE utf32_unicode_ci not null,
	`us_phone` varchar (50) COLLATE utf32_unicode_ci not null,
	`us_email` varchar (50) COLLATE utf32_unicode_ci not null,
	`us_gioitinh` varchar (50) COLLATE utf32_unicode_ci not null,
	`us_diachi` varchar (50) COLLATE utf32_unicode_ci not null
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- admin
ALTER TABLE `admin`
	add primary key (`ad_id`);

-- thuong hieu
ALTER TABLE `thuonghieu`
	add primary key (`th_id`);

-- cpu
ALTER TABLE `cpu`
	add primary key (`cpu_id`);

-- ram
ALTER TABLE `ram`
	add primary key (`ram_id`);

-- ocung
ALTER TABLE `ocung`
	add primary key (`oc_id`);

-- nhu cau
ALTER TABLE `nhucau`
	add primary key (`nc_id`);

-- manhinh
ALTER TABLE `manhinh`
	add primary key (`mh_id`);

-- card
ALTER TABLE `card`
	add primary key (`card_id`);

-- mau may
ALTER TABLE `maumay`
	add primary key (`mm_id`);

-- trong luong
ALTER TABLE `trongluong`
	add primary key (`tl_id`);

-- do phan giai
ALTER TABLE `dophangiai`
	add primary key (`dpg_id`);

-- hinh anh
ALTER TABLE `hinhanh`
	add primary key (`ha_id`);

-- gia
ALTER TABLE `gia`
	add primary key (`gia`);

-- san pham
ALTER TABLE `sanpham`
	add primary key (`sp_id`);

-- chitietsp
ALTER TABLE `chitietsp`
	add primary key (`ct_id`);

-- lap top
ALTER TABLE `laptop`
	add primary key (`lt_id`);

-- user
ALTER TABLE `user`
	add primary key (`us_id`);




cpu 		r2
ram 		r3
o cung 		r4
nhu cau 	r5
mau may		r6
man hinh 	r7
thuong hieu	r8
trong luong	r9
tang so quet	r10
san pham	r11
hinh anh	r12





     <div>
        <li class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Sản Phẩm</label>
             <div class="col-sm-10">
                 <select name="sp_id">
                 <option value="0">Tên Sản Phẩm</option>
                     <?php foreach ($listsanpham as $r11) {
                     ?>
                         <option value="<?php echo $r11['sp_id']  ?>"><?php echo $r11['sp_name'] ?></option>
                     <?php } ?>
                 </select>
                 <select name="sp_id">
                <option value="0">Xuất xứ</option>
                    <?php foreach ($listsanpham as $r11) {
                    ?>
                        <option value="<?php echo $r11['sp_id']  ?>"><?php echo $r11['sp_xuatxu'] ?></option>
                    <?php } ?>
                </select>
             </div>
         </li>
         <li class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Mô Tả</label>
            <div class="col-sm-10">
                <select name="sp_mota">
                <?php foreach ($listsanpham as $r11) {
                 ?>
                     <option value="<?php echo $r11['sp_id']  ?>"><?php echo $r11['sp_mota'] ?></option>
                     
                 <?php } ?>
                 
                       
                </select>
            </div>
         </li>
     </div>

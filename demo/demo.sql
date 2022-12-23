create table `admin`
(
	`ad_id` int not null primary key AUTO_INCREMENT,
	`ad_username` varchar(50) not null,
	`ad_password` varchar(50) not null,
	`ad_email` varchar(50) not null,
	`ad_phone` varchar(50) not null,
	`ad_gioitinh`varchar(50) not null,
	`ad_diachi` varchar(50) not null
);

create table `quanly_thuonghieu`
(
	`th_id` int not null primary key AUTO_INCREMENT,
	`img` varchar(300) not null
);

create table `quanly_cpu`
(
	`cpu_id` int not null primary key AUTO_INCREMENT,
	`cpu_congnghe` varchar(50) not null,
	`cpu_sonhan` varchar(50) not null,
	`cpu_soluong` varchar(50) not null,
	`cpu_tocdo` varchar(50) not null,
	`cpu_tocdotoida` varchar(50) not null
);

cteate table `quanly_ram`
(
	`ram_id` int not null primary key AUTO_INCREMENT,
	`ram_dungluong` varchar(50) not null,
	`ram_loai` varchar(50) not null,
	`ram_tocdobus` varchar(50) not null,
	`ram_hotrotoida` varchar(50) not null
);

create table `ocung`
(
	`oc_id` int not null primary key AUTO_INCREMENT,
	`oc_name` varchar(200) not null
);
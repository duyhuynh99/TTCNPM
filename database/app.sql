CREATE DATABASE `ttcnpm`;

USE `ttcnpm`;

-- Tạo bảng lưu các tài khoản


CREATE TABLE `tai_khoan` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `so_dien_thoai` varchar(13) UNIQUE NOT NULL,
   `mat_khau` varchar(20) NOT NULL,
   `loai` int NOT NULL default 1,
   PRIMARY KEY(id)
);
INSERT INTO tai_khoan(id,so_dien_thoai,mat_khau,loai) VALUES
(0,'0','0',2),
(1,'1','1',1),
(2,'3','3',3),
(3,'0123456789','abcd',1),
(4,'0123456788','abcd',1),
(5,'2','2',2),
(6,'0147258369','dieple',1),
(7,'0159263487','khiem',3),
(8,'0159487263','duyne',1),
(9,'0951623847','xuanne',1),
(10,'0147852369','diepne',1),
(11,'0987456321','thuanne',3),
(12,'0213654789','ashkdn',3),
(13,'0154789645','adhdn',1),
(14,'0549125456','djhsv',1),
(15,'0215796586','kdhsc',1),
(16,'0451268852','wueuh',3),
(17,'0785168135','njcdsbv',1),
(18,'0147522355','kddks',1),
(19,'0158522552','jgxfh',3),
(20,'0224452121','cjhdjs',1),
(21,'0125463245','vnfdnvjf',3),
(22,'0125453585','djcbjds',1),
(23,'0321578555','jfvhuubx',3),
(24,'0479471522','djhnjdhd',1),
(25,'0215489266','dksiskfk',3),
(26,'0212562512','skdjsi',1),
(27,'0271157851','kdhcdj',3),
(28,'0127899945','djshhd',1),
(29,'0125478545','fjdaue',3),
(30,'0148524558','kdckd',1);

CREATE TABLE `thong_tin_tai_khoan` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `id_tai_khoan` int UNIQUE NOT NULL,
   `name` varchar(20) CHARACTER SET utf8 NOT NULL,
   `sur_name` varchar(13) CHARACTER SET utf8 NOT NULL,
   `phone` varchar(13) CHARACTER SET utf8 NOT NULL,
   `cmnd` varchar(13) CHARACTER SET utf8 NOT NULL,
   `gmail` varchar(30) NOT NULL,
   `dia_chi` varchar(80) CHARACTER SET utf8 NOT NULL,
   PRIMARY KEY(id)
);
INSERT INTO thong_tin_tai_khoan(id,id_tai_khoan,name,sur_name,phone,cmnd,gmail,dia_chi) VALUES
(0,1,'Lê Đình','Điệp','0394007104','285709698','ledinhdiep@gmail.com','ktx khu B ĐHQG tp Hồ chí Minh'),
(1,3,'Hoàng', 'Thuận','0978156388','123456789','hoangthuan@gmail.com','ktx khu A ĐHQG tp Hồ Chí Minh'),
(2,4,'Hoàng Văn','Long','0378156152','123987456','hoangvanlong@gmail.com','ktx khu A ĐHQG tp Hồ Chí Minh'),
(3,6,'Vũ Mộc Tranh','Phong','0147258369','2546884485','tranhphong@gmail.com','tokyo nhật bản'),
(4,8,'Trần','Quả','0159487263','257125425','tranqua@gmail.com','tp.manchester nước Anh'),
(5,9,'Tô Mộc','Tranh','0951623847','485225585','moctranh@gmail.com','bangkok thailand'),
(6,10,'Tô Mộc','Thu','0147852369','251456214','mocthu@gmail.com','quận 1 tp.hồ chí minh'),
(7,13,'Dương Văn','phong','0154789645','2525822145','phongvan@gmail.com','phường 11 quận tân bình tp.hcm'),
(8,14,'Bùi Thị Phương','Vy','0549125456','884585585','phuongvy@gmail.com','đường 12 quận thủ đức tp.hcm'),
(9,15,'Dương Thúy','Uyên','0215796586','254255442','thuyuyen@gmail.com','lộc ninh bình phước'),
(10,17,'Cao Mỹ','Duyên','0785168135','541154215','myduyen@gmail.com','thường tín hà nội'),
(11,18,'Chu Khải','Trạch','0147522355','558724455','khaitrach@gamil.com','số 203 quận 1 tp.hcm'),
(12,21,'Hoàng','Khửn','0125463245','458544854','hoangkhun@gmail.com','tp son la'),
(13,22,'Lò','Anh','0125453585','542156025','loanh@gmail.com','quận 2 tp.hcm'),
(14,24,'Lâm Trung','Nguyên','0479471522','215782145','trunganh@gmail.com','số 1 đường trường trinh tp.hcm'),
(15,26,'Lầm Ngọc','Hỷ','0212562512','254895995','ngochy@gamil.com','số 5 quận 7 tp.hcm'),
(16,28,'Lê Đình','Nhu','0127899945','245218222','dinhnhu@gmail.com','số 8 quận bình thạch tp.hcm'),
(17,30,'Nguyễn Trọng','Dư','0148524558','254833995','trongdu@gmail.com','ktx khu a dai học quốc gia tp.hcm');

CREATE TABLE `thong_tin_tai_khoan_doctor`(
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `id_tai_khoan` int UNIQUE NOT NULL,
   `name` varchar(20) CHARACTER SET utf8 NOT NULL,
   `sur_name` varchar(13) CHARACTER SET utf8 NOT NULL,
   `phone` varchar(13) CHARACTER SET utf8 NOT NULL,
   `khoa` varchar(33) CHARACTER SET utf8 NOT NULL,
   `gmail` varchar(30) NOT NULL,
   `exper` varchar(80) CHARACTER SET utf8 NOT NULL,
   PRIMARY KEY(id)
);
INSERT INTO thong_tin_tai_khoan_doctor(id,id_tai_khoan,name,sur_name,phone,khoa,gmail,exper) VALUES
(0,2,'Nguyễn Ngọc Phương','Khanh','0123456789','Khoa nhi','phuongkhanh@gmail.com','10'),
(1,7,'Hoàng Thiếu','Thiên','0159263487','khoa thần kinh','thieuthien@gmail.com','20'),
(2,11,'Diệp','Thu','0987456321',',khoa y học cổ truyền','diepthu@gmail.com','15'),
(3,12,'Nguyễn Lê Hà','Anh','0213654789','khoa sản','haanh@gmail.com','9'),
(4,16,'Phạm Cao','Lương','0451268852','khoa nhi','caoluong@gmail.com','8'),
(5,19,'Đường','Nhu','0158522552','khoa nhi','duongnhu@gmail.com','20'),
(6,21,'Hoàng','Khửn','0125463245','khoa vật lí trị liệu','hoangkhun@gmail.com','9'),
(7,23,'Phan Mỹ','Ngọc','0321578555','khoa nhi','myngoc@gmail','5'),
(8,25,'Nguyễn Thị','Loan','0215489266','khoa y học cổ truyền','loanduong@gmail.com','12'),
(9,27,'Cao Văn','Sang','0271157851','khoa thần kinh','vansang@gmail.com','7'),
(10,29,'Hạ','Thiên','0125478545','khoa sản','hathien@gmail.com','20');

CREATE TABLE `bai_dang` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `id_nguoi_dang` int NOT NULL,	
   `tieu_de` varchar(60) CHARACTER SET utf8 UNIQUE NOT NULL,
   `noi_dung` varchar(2000) CHARACTER SET utf8 NOT NULL,
   `thoi_gian` datetime NOT NULL,
   PRIMARY KEY(id)
);
INSERT INTO bai_dang(id,id_nguoi_dang,tieu_de,noi_dung,thoi_gian) VALUES
(0,0,'Hệ thống đặt khám trước chính thức bắt đầu hoạt động','Hệ thống chính thức đi vào hoạt động từ ngày 22/7',CURTIME()),
(1,0,'Hướng dẫn sử dụng hệ thống','1.Tạo tài khoản; 2.Cập nhật thông tin; 3.Lựa chọn thời gian đặt khám trước; 4.Xác nhận thông tin',CURTIME()),
(2,0,'Chương trình khuyến mãi giảm giá đặc biệt 20% cho nhưng người tham gia','Chương trình chính thức đi vào hoạt động từ ngày 4/8',CURTIME()),
(3,0,'Hệ thống xin tặng quà đi đến khám tại bệnh viện Xanhpon','Chương trình đi vào hoạt động từ ngày 5/8',CURTIME());


CREATE TABLE `dat_lich_kham` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `id_tai_khoan` int NOT NULL,	
   `khoa` varchar(60) CHARACTER SET utf8 NOT NULL,
   `ngay_dat` date NOT NULL,
   `gio_dat` varchar(10) CHARACTER SET utf8 NOT NULL,
   `trieu_chung` varchar(1000) CHARACTER SET utf8 NOT NULL,
   `xac_nhan` boolean NOT NULL default FALSE,
   `id_bac_si` int, 
   PRIMARY KEY(id)
);
INSERT INTO dat_lich_kham(id,id_tai_khoan,khoa,ngay_dat,gio_dat,trieu_chung) VALUES
(0,1,'Khoa nhi','2020/08/15','08:00','abcd'),
(1,3,'Khoa thần kinh','2020/08/15','08:00','abcd'),
(2,4,'Khoa nhi','2020/08/15','08:00','abcd'),
(3,3,'Khoa y học cổ truyền','2020/08/15','08:00','abcd'),
(4,4,'Khoa nhi','2020/08/15','09:00','abcd'),
(5,1,'Khoa vật lý trị liệu','2020/08/15','08:00','abcd'),
(6,1,'Khoa nhi','2020/08/15','08:00','abcd'),
(7,3,'Khoa sản','2020/08/15','08:00','abcd');

CREATE TABLE `chat` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `id_user` int NOT NULL,
   `noi_dung` varchar(400) CHARACTER SET utf8 NOT NULL,
   `loai` varchar(5) CHARACTER SET utf8,
   PRIMARY KEY(id)
);
INSERT INTO chat(id,id_user,noi_dung,loai) VALUES
(0,3,'Xin chào bạn','Gửi'),
(1,3,'Chào bạn, bạn cần giúp gì vậy?','Nhận'),
(2,3,'Tại sao tôi không thể đăng tin được','Gửi'),
(3,4,'Bạn có rảnh không, cho mình hỏi tí!','Gửi');
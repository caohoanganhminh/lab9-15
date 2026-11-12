CREATE DATABASE IF NOT EXISTS phantrang CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE phantrang;
CREATE TABLE IF NOT EXISTS tintuc(id INT AUTO_INCREMENT PRIMARY KEY,title VARCHAR(255) NOT NULL) ENGINE=InnoDB;
INSERT INTO tintuc(title) VALUES
('Làm quen với môi trường phát triển PHP'),('Xử lý form trong PHP'),('Sử dụng câu lệnh điều kiện IF'),
('Sử dụng switch case'),('Vòng lặp for trong PHP'),('Giải phương trình bậc hai'),
('Tìm hiểu mảng một chiều'),('Kết nối PHP và MySQL'),('Kỹ thuật upload hình ảnh'),
('Làm việc với SESSION'),('Phân trang dữ liệu'),('Tạo trang đánh giá sản phẩm'),
('Tạo RSS cho website'),('Tạo CAPTCHA đơn giản'),('Xử lý bình chọn trong PHP'),
('Bảo mật dữ liệu đầu vào'),('Xây dựng giao diện website'),('Thực hành truy vấn SQL'),
('Quản lý sản phẩm'),('Hoàn thiện website');

CREATE DATABASE IF NOT EXISTS rating CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE rating;
CREATE TABLE IF NOT EXISTS products(id INT AUTO_INCREMENT PRIMARY KEY,title VARCHAR(255) NOT NULL,img_url VARCHAR(500) NOT NULL) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS rating_info(product_id INT PRIMARY KEY,rate_1 INT NOT NULL DEFAULT 0,rate_2 INT NOT NULL DEFAULT 0,rate_3 INT NOT NULL DEFAULT 0,rate_4 INT NOT NULL DEFAULT 0,rate_5 INT NOT NULL DEFAULT 0,FOREIGN KEY(product_id) REFERENCES products(id) ON DELETE CASCADE) ENGINE=InnoDB;
INSERT INTO products(title,img_url) VALUES ('Máy tính để bàn ABC','images/product.svg'),('Máy tính xách tay XYZ','images/product.svg'),('Màn hình LCD 27 inch','images/product.svg');
INSERT INTO rating_info VALUES (1,1,2,3,1,2),(2,2,1,4,3,5),(3,0,1,2,4,3);

CREATE DATABASE IF NOT EXISTS rss CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE rss;
CREATE TABLE IF NOT EXISTS news(id INT AUTO_INCREMENT PRIMARY KEY,title VARCHAR(255) NOT NULL,link VARCHAR(1000) NOT NULL,description TEXT NOT NULL) ENGINE=InnoDB;
INSERT INTO news(title,link,description) VALUES
('Bài 9: Kỹ thuật upload hình ảnh trong PHP','http://localhost/Bai_9_den_15/bai9/','Thực hành upload và kiểm tra tệp hình ảnh bằng PHP.'),
('Bài 10: Session trong PHP','http://localhost/Bai_9_den_15/bai10/','Tìm hiểu cách lưu thông tin phiên làm việc và đăng nhập.'),
('Bài 11: Phân trang trong PHP','http://localhost/Bai_9_den_15/bai11/','Hiển thị dữ liệu theo từng trang với MySQL.');

CREATE DATABASE IF NOT EXISTS review CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE review;
CREATE TABLE IF NOT EXISTS binhchon(idBC INT AUTO_INCREMENT PRIMARY KEY,MoTa VARCHAR(500) NOT NULL,SoLanChon INT NOT NULL DEFAULT 0) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS phuongan(idPA INT AUTO_INCREMENT PRIMARY KEY,idBC INT NOT NULL,MoTa VARCHAR(255) NOT NULL,SoLanChon INT NOT NULL DEFAULT 0,FOREIGN KEY(idBC) REFERENCES binhchon(idBC) ON DELETE CASCADE) ENGINE=InnoDB;
INSERT INTO binhchon(MoTa) VALUES ('Bạn nghĩ sao về chất lượng của trang web?');
INSERT INTO phuongan(idBC,MoTa) VALUES (1,'Rất tốt'),(1,'Tốt'),(1,'Bình thường'),(1,'Chưa tốt');

CREATE DATABASE IF NOT EXISTS session_demo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE session_demo;
CREATE TABLE IF NOT EXISTS users(id INT AUTO_INCREMENT PRIMARY KEY,username VARCHAR(80) UNIQUE NOT NULL,password VARCHAR(255) NOT NULL,display_name VARCHAR(120) NOT NULL) ENGINE=InnoDB;
INSERT INTO users(username,password,display_name) VALUES ('admin','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Quản trị viên')
ON DUPLICATE KEY UPDATE username=username;

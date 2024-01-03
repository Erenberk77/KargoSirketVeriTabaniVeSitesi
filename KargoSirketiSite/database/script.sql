
DROP DATABASE IF EXISTS `kargo`;
CREATE DATABASE IF NOT EXISTS `kargo`;
USE `kargo`;


CREATE TABLE IF NOT EXISTS `tblgonderiler` (
  `gonderiID` int(11) NOT NULL AUTO_INCREMENT,
  `gonderenID` int(11) DEFAULT NULL,
  `aliciID` int(11) DEFAULT NULL,
  `gonderiKonu` varchar(500) DEFAULT NULL,
  `gonderiIcerik` varchar(500) DEFAULT NULL,
  `gonderiAciklama` varchar(500) DEFAULT NULL,
  `gonderiAgirlik` varchar(500) DEFAULT NULL,
  `gonderiEbatlar` varchar(500) DEFAULT NULL,
  `gonderiDurum` varchar(500) DEFAULT NULL,
  `gonderiUcret` varchar(100) DEFAULT NULL,
  `tarih` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`gonderiID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;


INSERT INTO `tblgonderiler` (`gonderiID`, `gonderenID`, `aliciID`, `gonderiKonu`, `gonderiIcerik`, `gonderiAciklama`, `gonderiAgirlik`, `gonderiEbatlar`, `gonderiDurum`, `gonderiUcret`, `tarih`) VALUES
	(1, 3, 2, 'Amazon TV Gönderi', '1 Adet LCD', 'Gönderi hasssas içerik', '60kg', '120X120', 'Gönderi Oluşturuldu', '30.00 TL', '28-12-2023 10:17'),
	(2, 2, 3, 'Trendyol Gonderi ', 'Kırılabilir (Tabak)', 'Kargo açıklama ', '12kg', ' 12X14', ' Gönderi Teslim Edildi', '30.00 TL', '11-12-2023 10:19'),
	(3, 2, 3, 'Hepsiburada teslimat ', 'Ayakkabı', 'gün içerisinde teslimat', '4kg', ' 12X14', ' Kurye dağıtımda', '17.00 TL', '30-12-2023 10:20'),
	(5, 2, 3, 'Koltuk Teslimat ', '5 adet koltuk', 'Koltuklar başarıyla ulaştı  ', '250kg', '  50*50', '  Gönderi Yolda', '300.00 TL', '11-12-2023 11:01'),
	(6, 3, 2, 'Yatak Teslimat', '1 Adet Yatak', 'Yatak teslim edilmeli', '98kg', '23*44', 'Gönderi Oluşturuldu', '400.00 TL', '31-12-2023 11:02'),
	(7, 2, 3, 'kıyafet teslilamat', 'kargo', 'en geç salı teslim.', '44k', '23*44', 'Gönderi Oluşturuldu', '23.00 TL', '28-12-2023 11:07'),
	(9, 2, 3, 'Amazon Teslimat ', '1 adet bilgisayar', 'hassas ürün.', '5kg', '  23*44', '  Gönderi Yola Çıktı', '42.00 TL', '30-12-2023 06:22'),
	(10, 2, 3, 'kitapkurdu ', '5 adet kitap', 'kitap', '10kg', ' 23X23', ' Gönderi Oluşturuldu', '30.00 TL', '01-01-2024 06:27');


CREATE TABLE IF NOT EXISTS `tblkullanicilar` (
  `kullaniciID` int(11) NOT NULL AUTO_INCREMENT,
  `kullaniciAdi` varchar(300) DEFAULT NULL,
  `sifre` varchar(300) DEFAULT NULL,
  `adSoyad` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`kullaniciID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


INSERT INTO `tblkullanicilar` (`kullaniciID`, `kullaniciAdi`, `sifre`, `adSoyad`) VALUES
	(1, 'admin', '1', 'admin'),
	(2, 'erenberk', '2', 'Eren Berk Şensöz'),
	(3, 'deneme', '3', 'deneme');


CREATE TABLE IF NOT EXISTS `tblmesajlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) NOT NULL,
  `mesaj` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;


INSERT INTO `tblmesajlar` (`id`, `baslik`, `mesaj`, `created_at`) VALUES
	(1, 'gönderi', 'teslimat sorunu', '2023-12-12 15:49:28'),
	(3, 'kurye', 'kurye kibar değildi', '2023-12-29 04:42:42'),
	(4, 'içerik', 'içerik kırılmıştı', '2023-12-28 04:42:49'),
	(5, 'teslimat', 'teslimat zamanında yapılmadı', '2022-06-12 04:43:08'),
	(6, 'KIrık kargo', 'KARGOM KIRIK GELDI BEGENMEDIM', '2023-12-31 00:26:34');

-- Saklı Yordam
DELIMITER //
CREATE PROCEDURE sp_GetGonderiDetails(IN gonderi_id INT)
BEGIN
  SELECT * FROM `tblgonderiler` WHERE `gonderiID` = gonderi_id;
END //
DELIMITER ;

-- Kullanıcı Tanımlı Fonksiyon
DELIMITER //
CREATE FUNCTION fn_CalculateShippingCost(weight VARCHAR(100), dimensions VARCHAR(500))
RETURNS DECIMAL(10, 2)
BEGIN
  DECLARE weightInKg DECIMAL(10, 2);
  DECLARE dimensionsInCm DECIMAL(10, 2);
  DECLARE cost DECIMAL(10, 2);
  
  SET weightInKg = CAST(weight AS DECIMAL(10, 2));
  SET dimensionsInCm = CAST(dimensions AS DECIMAL(10, 2));
  
  SET cost = weightInKg * 5.00 + dimensionsInCm * 0.02;
  
  RETURN cost;
END //
DELIMITER //
CREATE TRIGGER trg_UpdateGonderiDurum
AFTER UPDATE ON `tblgonderiler`
FOR EACH ROW
BEGIN
  IF NEW.gonderiDurum = 'Gönderi Teslim Edildi' THEN
    -- Gönderi teslim edildi bildirimi
    INSERT INTO `tblmesajlar` (`baslik`, `mesaj`, `created_at`) 
    VALUES ('Teslimat Durumu', CONCAT('Gönderi ', NEW.gonderiID, ' teslim edildi.'), CURRENT_TIMESTAMP);

  ELSEIF NEW.gonderiDurum = 'Kurye dağıtımda' THEN
    -- Kurye dağıtımda bildirimi
    INSERT INTO `tblmesajlar` (`baslik`, `mesaj`, `created_at`) 
    VALUES ('Gönderi Durumu', CONCAT('Gönderi ', NEW.gonderiID, ' kurye dağıtımda.'), CURRENT_TIMESTAMP);

  ELSEIF NEW.gonderiDurum = 'Gönderi Yolda' THEN
    -- Gönderi yolda bildirimi
    INSERT INTO `tblmesajlar` (`baslik`, `mesaj`, `created_at`) 
    VALUES ('Gönderi Durumu', CONCAT('Gönderi ', NEW.gonderiID, ' yolda.'), CURRENT_TIMESTAMP);

  ELSEIF NEW.gonderiDurum = 'Gönderi Oluşturuldu' THEN
    -- Gönderi oluşturuldu bildirimi
    INSERT INTO `tblmesajlar` (`baslik`, `mesaj`, `created_at`) 
    VALUES ('Gönderi Durumu', CONCAT('Gönderi ', NEW.gonderiID, ' oluşturuldu.'), CURRENT_TIMESTAMP);

  ELSEIF NEW.gonderiDurum = 'Gönderi Yola Çıktı' THEN
    -- Gönderi yola çıktı bildirimi
    INSERT INTO `tblmesajlar` (`baslik`, `mesaj`, `created_at`) 
    VALUES ('Gönderi Durumu', CONCAT('Gönderi ', NEW.gonderiID, ' yola çıktı.'), CURRENT_TIMESTAMP);

  END IF;
END //
DELIMITER ;

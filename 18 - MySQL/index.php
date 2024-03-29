<?php 
    /**
     * MYSQL
     */

     /**
      * Sistem ortam değişkenlerinde MYsql path yolu yoksa ilk önce onu ekleyin.
      * C:\wamp64\bin\mysql\mysql8.0.31\bin
      * Daha sonra cmd ile bu yola bağlanın cmd komutu : mysql -u root -p
      */

    // ALTER DATABASE my_php  CHARACTER SET utf8mb4_general_ci COLLATE utf8mb4_unicode_ci;

    
    /**
     * Veri Tipleri  
     * 
     * 
     * /Sayısal Veri Tipleri
     *
     * TINYINT(boyut) : Alabileceği değerler –128 ile 127 arasındadır. Unsigned (Sadece pozitif değerler girilecek) olarak tanımlı ise 0 ile 255 arasındadır. “Boyut” ile alabileceği sınırı belirtebiliriz. Hafızada kapladığı alan ise 1 byte.
     *    
     * SMALLINT(boyut) : -32.768 ile 32.767 arasında değer alır. Unsigned tanımlı aralık 0 ile 65535 arasında değer alır. “Boyut” ile alabileceği sınırı belirtebiliriz. Hafızada kapladığı alan: 2 byte.
     *    
     * MEDIUMINT(boyut) : -8.388.608 ile 8.388.607 arasında değer alır. Unsigned tanımlı aralık 0 ile 16777215 arasındadır. “Boyut” ile alabileceği sınırı belirtebiliriz. Hafızada kapladığı alan: 3 byte.
     *    
     * INT(boyut) : Alabileceği değerler –2147483648 ile 2147483647 arasındadır. Unsigned tanımlı aralık 0 ile 4294967295 arasındadır. “Boyut” ile alabileceği sınırı belirtebiliriz. Hafızada kapladığı alan: 4 byte.
     *    
     * BIGINT(boyut) : -9.223.372.036.854.775.808 ile 9.223.372.036.854.775.807 arasında değer alır. “Boyut” ile alabileceği sınırı belirtebiliriz. Hafızada kapladığı alan: 8 byte.
     *    
     * FLOAT(boyut,d) : Değer aralıkları; –3.402823466E+38 ile –1.175494351E-38, 0 arası ve 1.175494351E-38 ile 3.402823466E+38 arasındadır. Küçük rakamlı virgüllü ifadeler için kullanılır. “Boyut” ile sayının (virgüllü kısmı dahil) alabileceği en fazla miktar belirtilirken, “d” ile virgülden sonra kaç basamak olacağı belirtilir. Örneğin, 32.658 sayısını saklayacağımız float türü bir sütun tanımlarken, FLOAT(5,3) olarak tanımlarız. Buradaki 5 rakamı, sayının tamamının (noktasız olarak) basamak uzunluğu, 3 rakamı ise noktadan sonraki hane sayısını ifade eder. Float veri türünde eğer ondalıklı hane daha uzun ise sayının yuvarlanma durumu oluşabilir. FLOAT(5,2) olarak tanımladığımız bir sütunda 275.199 sayısını saklamak istersek, MySQL otomatik olarak bu sayıyı 275.20 olarak saklayacaktır. Boyut değeri en fazla 23 olabilir. Unsigned olarak çalışmazlar. Hafızada kapladığı alan: 4 byte.
     *    
     * DOUBLE(boyut,d) : Büyük noktalı sayı. Büyük rakamlı virgüllü ifadeler için kullanılır. “Boyut” ile sayının virgüllü kısmı dahil alabileceği en fazla miktar belirtilirken, “d” ile virgülden sonra kaç basamak olacağı belirtilir. Boyut değeri en fazla 53 olabilir. Unsigned olarak çalışmazlar. Hafızada kapladığı alan: 8 byte.
     *    
     * DECİMAL(boyut,d) : Double ‘ın yetmediği durumlarda, virgüllü ifadeler için kullanılır. “Boyut” ile sayının virgüllü kısmı dahil alabileceği en fazla miktar belirtilirken, “d” ile virgülden sonra kaç basamak olacağı belirtilir. Boyut değeri en fazla 65 olabilir. Hafızada kapladığı alan değişiklik gösterir.
     *
     *     
     * Metinsel Veri Tipleri
     *    
     * CHAR(boyut) : Sabit sayıdaki karakterleri (harf, numara veya özel karakter) tutar. Parantez içindeki boyut uzunluğu belirtir. Char(5) tanımlı bir alana 2 karakterlik bir veri girerseniz 5 byte alan ayırır, yani tanımladığınız boyut kadar. Maksimum 255 karakter barındırabilir. Tekrar eden boşluklar değer alındığı zaman silinir. En fazla 8.000 karaktere kadar depolama yapar.
     *    
     * VARCHAR(boyut) : Değişken sayıdaki karakterleri tutar. En fazla 8.000 karaktere kadar depolama yapar. Varchar(5) tanımlı bir alana 2 karakterlik bir veri girerseniz 2 byte alan ayırır. Buradan varchar ile char arasındaki farkı; char tanımlanan boyut kadar alan ayırırken, varchar girilen karakter boyutu kadar alan ayırır şeklinde ifade edebiliriz.
     *    
     * TINYTEXT : En fazla 255 karakter alır. (Boşluklar dahildir.)
     *    
     * TEXT : En fazla 65.535 karaktere kadar veri girilebilir. (Boşluklar dahildir.)
     *    
     * BLOB: Binary Long Objects – Binary yani ikili verilerin saklanacağı durumlarda kullanılır. En fazla 65.535 byte (yaklaşık 64 KB) veri saklanabilir.
     *    
     * MEDIUMTEXT : 16.777.215 karaktere kadar metinsel ifadeleri depolayabilir.
     *    
     * LONGTEXT : 4.294.967.295 karaktere kadar metinsel ifadeleri depolayabilir.
     *    
     * ENUM: Değer listesinden seçilebilecek her biri maksimum 65535 karakterli string değerler tutabilir. İhtimalli girişlerde kullanılabilir. Giriş önceliğine göre sıralama yapılır. Giriş formatına örnek: ENUM(‘X’,’Y’,’Z’,’F’).
     *    
     * SET: Yapısı ENUM’a benzemektedir. Ancak 64 taneye kadar giriş yapılabilir.
     *    
     * 
     * Tarih – Zaman Veri Tipleri
     *
     * DATE : Desteklenen aralık ‘1000-01-01’ ile ‘9999-12-31’ arasıdır. MySQL tarihleri YYYY-MM-DD biçiminde gösterir.
     *    
     * DATETIME : Desteklenen aralık ‘1000-01-01 00:00:00’ ile ‘9999-12-31 23:59:59’ arasıdır. MySQL DATETIME değerlerini ‘YYYY-MM-DD HH:MM:SS’ biçiminde gösterir.
     *    
     * TIMESTAMP : Desteklenen aralık ‘1970-01-01 00:00:00’ ile 2037 yılında herhangi bir zaman arasındadır. MySQL TIMESTAMP değerlerini YYYYMMDDHHMMSS biçiminde gösterir. Depolama biçimi DATETIME() ile aynıdır. Ancak yazdığınız program üzerinden bu alan veri gönderimi yapılmaz. O anki tarih ve saati otomatik olarak ekler bu nedenle, TIMESTAMP insert ve update işlemlerinde kullanışlıdır. Eğer elle bir tarih-saat eklenecekse o zaman veri tipi DATETIME() olarak ayarlanmalıdır.
     *    
     * TIME : Sadece saat verisi saklamak için kullanılır. Desteklenen aralık ‘-838:59:59’ ile ‘838:59:59’ arasındadır. MySQL TIME değerlerini ‘HH:MM:SS’ biçiminde gösterir.
     *    
     * YEAR: 2 veya 4 basamaklı yıl bilgisini saklamak için kullanılır. Dört basamaklı verilerde 1901 ile 2155 arası değer saklanır. İki basamaklı verilerde ise 70 ile 69 (1970 ile 2069) arası değerler saklanır.
     */


    /**
     * 
     *
     * Tablo İşlemleri
*
     *   Tablo oluşturma
     *   CREATE TABLE db_name (
     *       id INT(11)
     *   );
     *   Tabloları Listeleme
     *   SHOW TABLES;
     *   Tablo Hakkında Bilgi Alma
     *   EXPLAIN db_name;
     *   Tablo Yeniden İsimlendirme
     *   RENAME TABLE db_name TO new_db_name
     *   Tabloyu Silme
     *   DROP TABLE db_name;
     *   Tabloya Sütun Ekleme
     *   ALTER TABLE db_name ADD COLUMN isim VARCHAR(100);
     *   Tabloya Birden Fazla Sütun Ekleme
     *   ALTER TABLE db_name ADD COLUMN(
     *       soyisim VARCHAR(50),
     *       maas DECIMAL(10,2)
     *   );
     *   Tablonun Belirli Bir Yerine Sütun Ekleme
     *   ALTER TABLE db_name ADD COLUMN telefon VARCHAR(50) AFTER soyisim;
     *
     *   Tablonun Başına Eklemek İçin
     *   ALTER TABLE db_name ADD COLUMN eposta VARCHAR(50) FIRST;
     *
     *   Tablodan Sütun Silmek
     *   ALTER TABLE db_name DROP COLUMN eposta;
     *   Sütunu Yeniden Adlandırmak
     *   ALTER TABLE db_name CHANGE soyisim kullanici_adi VARCHAR(150);
     *   PRIMARY KEY Beliryerek Tablo Oluşturma
     *   CREATE TABLE test1 (
     *       id int(11),
     *       isim VARCHAR(100),
     *       PRIMARY KEY (id)
     *   );
     *   İkili Primary Key Belirleme
     *   CREATE TABLE test2 (
     *       id int(11),
     *       isim VARCHAR(100),
     *       PRIMARY KEY (id,isim)
     *   );
     *   PRIMARY KEY Silme
     *   ALTER TABLE test2 DROP PRIMARY KEY;
     *   PRIMARY KEY Silme
     *   ALTER TABLE test2 ADD PRIMARY KEY (id);
     *   Birden Fazla Tabloyu Silmek
     *   DROP TABLES test, test1, test2;
     *   AUTO_INCREMENT
     *   CREATE TABLE test (
     *       id INT(11) AUTO_INCREMENT,
     *       isim VARCHAR(50),
     *       PRIMARY KEY (id)
     *   )
     *   NOT NULL
     *   CREATE TABLE test (
     *       id INT(11) AUTO_INCREMENT,
     *       isim VARCHAR(50) NOT NULL,
     *       soyisim VARCHAR(50) NOT NULL,
     *       PRIMARY KEY (id)
     *   )
     *   CHARSET AYARLAMA
     *   CREATE TABLE test (
     *       id INT(11) AUTO_INCREMENT,
     *       isim VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
     *       soyisim VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
     *       PRIMARY KEY (id)
     *   )
     *   CHARSET ve NOT NULL Günceleme
     *   ALTER TABLE test CHANGE isim isim #isim değiştirmediğimiz için iki kere isim yazıyoruz VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL;
     *   Varsayılan Değer Atama
     *   ALTER TABLE test 
     *       CHANGE isim isim #isim değiştirmediğimiz için iki kere isim yazıyoruz
     *       VARCHAR(50) 
     *       CHARACTER SET utf8 COLLATE utf8_turkish_ci 
     *       NULL DEFAULT 'isimsiz_kisi';
     *   Sütun Açıklaması
     *   ALTER TABLE test 
     *       CHANGE isim isim #isim değiştirmediğimiz için iki kere isim yazıyoruz
     *       VARCHAR(50) 
     *       CHARACTER SET utf8 COLLATE utf8_turkish_ci 
     *       NULL DEFAULT 'isimsiz_kisi';
    */


# CREATE TABLE my_php.users(
/*	id INT(11),
	name VARCHAR(100),
	surname VARCHAR(100),
	birth_year YEAR
);*/
# EXPLAIN users;
# ENAME TABLE users TO customers;
# ALTER TABLE customers ADD COLUMN grup VARCHAR(100);
/*
*/
# ALTER TABLE customers ADD COLUMN kayit_tarihi DATETIME;

#DROP TABLE customers;

/* 
CREATE TABLE blog(
	id INT(11),
	title VARCHAR(255),
	lang INT(11),
	content TEXT,
	PRIMARY KEY(id, lang)
);
*/
/*
CREATE TABLE page(
	id INT(11) AUTO_INCREMENT,
	title VARCHAR(255) NOT NULL,
	lang INT(11) NOT NULL,
	content TEXT NOT NULL,
	PRIMARY KEY(id, lang)
);
*/

# DROP TABLES blog,customers, page;

/*
CREATE TABLE users(
	id INT(1) AUTO_INCREMENT,
	user_name VARCHAR(50),
	user_surname VARCHAR(50),
	user_grup VARCHAR(20),
	PRIMARY KEY(id)
);
*/

# SET @@lc_time_names = 'tr_TR';
# SELECT DAYNAME('2023-10-21');
# SELECT DAYNAME(NOW());
# SELECT 1*4 as carpim, NOW() as tarih, DAYNAME(NOW()) as gunun_adi;

# SELECT IF(1<3, 'True', 'False');

#SELECT LAST_DAY(NOW());
/*
INSERT INTO users (user_name, user_surname, user_grup) 
VALUES 
('Metehan','Gokay','A,C'),
('Furkan','Karabulut','B,C'),
('Onur','Yılmaz','A,'),
('Mehmet','Demirci','B');
*/

/*
INSERT INTO users SET
	user_name = 'Filiz',
	user_surname = 'Ersever',
	user_grup = 'G,F';
*/

# Contactr = Birleştirme 
#SELECT *, CONCAT(user_name,' ',user_surname) AS user_full_name FROM users;

#UPDATE
# UPDATE users SET user_name = 'Omer Sefa' WHERE user_name = 'Sefa';

# SELECT * FROM users;


# Where - Limit - Order
# ilk 2 tanesini atlar ve ondan sonraki ilk 2 veriyi getirir
# SELECT * FROM users LIMIT 2,3;

# SELECT * FROM users ORDER BY user_name DESC;

# SELECT * FROM users WHERE id > 2 ORDER BY id ASC LIMIT 3;
# SELECT * FROM users WHERE user_grup LIKE "%B%";

# SUM MIN MAX COUNT - GROUP HAVING(WHERE)

# SELECT SUM(id) as sum_id FROM users;
# SELECT MIN(id) as sum_id FROM users;
# SELECT COUNT(id) as sum_id FROM users;


# SELECT COUNT(user_grup) as toplam, user_grup FROM users GROUP BY user_grup HAVING toplam >= 1 ORDER BY toplam ASC LIMIT 3;


# IN - NOT IN 

# SELECT * FROM users WHERE id = 1 || id = 2;
# * FROM users WHERE id IN(1,2,3);
# SELECT * FROM users WHERE id NOT IN(1,2,3);
# SELECT * FROM users WHERE id NOT IN(1,2,3);


# FIND_IN_SET(str,strlist)

# SELECT FIND_IN_SET('A','A,B,C');
# SELECT * FROM users WHERE FIND_IN_SET('A',REPLACE(user_grup,' ',''));


# WHERE

# SELECT * FROM users WHERE id BETWEEN 1 AND 5;













     ?> 
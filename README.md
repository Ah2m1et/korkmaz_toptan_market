# Korkmaz Toptan Market

## Proje Açıklaması
Korkmaz Toptan Market, geniş ürün yelpazesiyle hizmet veren bir market uygulamasıdır. Bu projede, kullanıcıların sipariş verebileceği ve siparişlerin yönetilebileceği bir sistem geliştirilmiştir.

## Proje Linki
http://95.130.171.20/~st21360859072/

## Proje Youtube Linki
---
## Ekran Görüntüleri
![image](https://github.com/Ah2m1et/korkmaz_toptan_market/assets/103003160/5f7f2f26-10b8-4567-b8c1-a2dfb3bb92a5)

![image](https://github.com/Ah2m1et/korkmaz_toptan_market/assets/103003160/33d0d0be-93a8-4d67-a563-0acb8fa87cbe)


## Gereksinimler
- [XAMPP](https://www.apachefriends.org/index.html) (Apache, MySQL, PHP)
- [Git](https://git-scm.com/)

## Kurulum Talimatları

### 1. XAMPP Kurulumu
1. XAMPP'ı indirin ve bilgisayarınıza kurun.
2. XAMPP Kontrol Panelini açın ve Apache ile MySQL servislerini başlatın.

### 2. Projeyi Kopyalama
1. Terminal veya komut istemcisini açın.
2. Aşağıdaki komutları çalıştırarak projeyi GitHub'dan klonlayın:

```sh
git clone https://github.com/ah2m1et/korkmaz_toptan_market.git
```

### 3.Veritabanını Kurma
1. PhpMyAdmin arayüzünü açın.
2. Yeni bir veritabanı oluşturun (örn. toptan_market).
3. Proje klasöründeki database_structure.sql dosyasını içe aktararak veritabanı yapısını oluşturun.

### Projeyi XAMPP'ye Yerleştirme
1. Klonladığınız proje klasörünü XAMPP htdocs dizinine taşıyın (örn. C:\xampp\htdocs\korkmaz_toptan_market).

### Veritabanı Bağlantısını Ayarlama
1. includes/db.php dosyasını açın.
2. Veritabanı bağlantı bilgilerinizi aşağıdaki gibi düzenleyin:
```php
$conn = new mysqli('localhost', 'root', '', 'toptan_market');
```

### Projeyi Çalıştırma
1. Tarayıcınızda http://localhost/korkmaz_toptan_market adresine gidin.
2. Uygulamayı kullanmaya başlayın.

## Kullanım

### Kullanıcı girişi 
1. Giriş yaparak sipariş oluşturabilirsiniz.
2. Yeni bir kullanıcı kaydı oluşturabilirsiniz.

### İlerişim 
Herhangi bir sorunuz olursa, ah2m1et@gmail.com adresine e-posta gönderin.

## Lisans

Bu proje MIT Lisansı ile lisanslanmıştır. Daha fazla bilgi için LICENSE dosyasına bakın.

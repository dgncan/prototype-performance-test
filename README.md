# Php'de Prototype Design Pattern'inin Performans Testi
 Test için hikayemiz şöyle: file_get_content ile çekeceğimiz bir resim var. Bunu ResimUret nesnesine yüklüyoruz.
 Bunu önce döngü içinde nesnenin bir örneğini oluşturarak (new instance) yapıyoruz. 
 Daha sonra ise clone kullanarak. Basitçe microtime() ile başlangıç bitiş farklarını alıyoruz.
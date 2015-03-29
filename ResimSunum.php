<?php
/**
 * Created by PhpStorm.
 * User: dogancan
 */

class ResimSunum
{
    public $resimPath;

    public function __construct($resimPath)
    {
        $this->resimPath = $resimPath;
    }

    /**
     * resmi bir sefer çek sonra clonela ve göster
     */
    public function browserdanGorunumlu()
    {
        list($w, $h)  = getimagesize($this->resimPath);
        $baslangic_time = microtime();
        echo 'Resim gösterimi file_get_contents ile çekilen dosyanın base64_encode ile gösterilmesi ile yapılıyor<br>
              Resim bilgisi: 3200x2000 483kb<hr>';
        echo 'Normal<br>';
        for ($i = 0 ; $i<=500 ; $i++) {
            $buyukResim = new BuyukResim($this->resimPath);
            $resimgoster = new ResimGoster($buyukResim);
            echo '<img width="10" height="10" src="data:image/png;base64,'.base64_encode($resimgoster->resimobj->resim).'" />';
        }
        $bitis_time = microtime();
        echo '<br>'.microtime_diff($baslangic_time,$bitis_time);

        $baslangic_time = microtime();
        echo '<hr>Clone<br>';

        for ($i = 0 ; $i<=500 ; $i++) {
            $buyukResim2 = clone $buyukResim;
            $resimgoster2 = new ResimGoster($buyukResim2);
            echo '<img width="10" height="10" src="data:image/png;base64,' . base64_encode($resimgoster2->resimobj->resim) . '" />';
        }
        $bitis_time = microtime();

        echo '<br>'.microtime_diff($baslangic_time,$bitis_time);
    }


    // ekranda birşey göstermez, sadece I/O
    public function gorunumsuzSenaryo()
    {
        $this->gorunumsuzKlasik();
        $this->gorunumsuzPrototype();
    }

    /**
     * büyük bir loop içinde her seferinde yeni bir instance
     */
    protected function gorunumsuzKlasik()
    {
        $baslangic_time = microtime();
        for ($i = 0; $i<=10000 ; $i++) {
            $buyukResim = new BuyukResim($this->resimPath);
        }
        $bitis_time = microtime();
        echo microtime_diff($baslangic_time,$bitis_time). " Her seferinde yeni bir instance";
        echo "<hr size=1>";
    }

    /**
     * büyük bir loop içinde her seferinde clone object kullanımı
     */
    protected function gorunumsuzPrototype()
    {
        $baslangic_time = microtime();
        $buyukResim = new BuyukResim($this->resimPath);
        for ($i = 0; $i<=10000 ; $i++) {
            $buyukResimclone = clone $buyukResim;
        }
        $bitis_time = microtime();
        echo microtime_diff($baslangic_time,$bitis_time). " Her seferinde clone";
        echo "<hr size=1>";
    }

}



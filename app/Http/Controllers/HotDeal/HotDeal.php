<?php
namespace App\Http\Controllers\HotDeal;

use phpDocumentor\Reflection\Types\InterfaceString;

class HotDeal
{
    public string $siteName;
    public string $title;
    public string $url;
    public string $category;
    public string $writer;
    public string $num;

    public function getNewItem( ){}

    public function insertItemToDB($item){}

    public function selectCategory($category){return $category;}

}
/*
 *
디지털SW
PC/가전/가구
식품/생활
화장품
의류/잡화
육아
상품권/쿠폰/이벤트
서적
취미/레저
휴대폰
기타
해외
클리앙 상품정보 공구정보
*/

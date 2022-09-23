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

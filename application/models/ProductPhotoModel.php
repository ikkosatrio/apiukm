<?php

class ProductPhotoModel extends MY_Model
{
    protected $table 	= "ProductPhoto";
    protected $appends 	= array('ImageFile','ImageArray','ObjArray');
    private $dir = "product";

    public function Product()
    {
        return $this->hasOne('ProductModel', 'id', 'id_member');
    }

    public function getObjArrayAttribute(){
        return array(
            "ID" => $this->id,
            "Title" => $this->Title,
            "Photo" => $this->ImageArray,
        );
    }

    public function getImageFileAttribute()
    {
        $path = "assets/images/$this->dir/{$this->Image}";

        if (!$this->Image || !file_exists($path)) {
            return img_holder();
        }

        return base_url($path);
    }

    public function getImageArrayAttribute()
    {
        return array(
            "Small" => $this->getSmallImage(),
            "Medium" => $this->getMediumImage(),
            "Large" => $this->getLargeImage(),
            "Original" => $this->getImageFileAttribute(),
        );
    }



    function getSmallImage(){
        if($this->Image){
            $path_parts = pathinfo($this->Image);
            $path = "assets/images/$this->dir/{$path_parts['filename']}"."_small.".$path_parts['extension'];
            if (!$this->Image || !file_exists($path)) {
                return img_holder();
            }
            return base_url($path);
        }else{
            return img_holder();
        }
    }

    function getMediumImage(){
        if($this->Image) {
            $path_parts = pathinfo($this->Image);
            $path       = "assets/images/$this->dir/{$path_parts['filename']}" . "_medium." . $path_parts['extension'];
            if (!$this->Image || !file_exists($path)) {
                return img_holder();
            }
            return base_url($path);
        }else{
            return img_holder();
        }
    }

    function getLargeImage(){
        if($this->Image) {
            $path_parts = pathinfo($this->Image);
            $path       = "assets/images/$this->dir/{$path_parts['filename']}" . "_large." . $path_parts['extension'];
            if (!$this->Image || !file_exists($path)) {
                return img_holder();
            }
            return base_url($path);
        }else{
            return img_holder();
        }
    }

    function getOriginalImage(){
        if($this->Image) {
            $path = "assets/images/$this->dir/{$this->Image}";
            if (file_exists($path)) {
                return $path;
            } else {
                return false;
            }
        }
    }

}

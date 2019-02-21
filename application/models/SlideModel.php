<?php

class SlideModel extends MY_Model
{
    protected $table 	= "Slide";
    protected $appends 	= array('ImageFile','ImageArray');


    public function getImageFileAttribute()
    {
        $path = "assets/images/slide/{$this->Image}";

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
        $path_parts = pathinfo($this->Image);
        $path = "assets/images/slide/{$path_parts['filename']}"."_small.".$path_parts['extension'];
        if (!$this->Image || !file_exists($path)) {
            return img_holder();
        }
        return base_url($path);
    }

    function getMediumImage(){
        $path_parts = pathinfo($this->Image);
        $path = "assets/images/slide/{$path_parts['filename']}"."_medium.".$path_parts['extension'];
        if (!$this->Image || !file_exists($path)) {
            return img_holder();
        }
        return base_url($path);
    }

    function getLargeImage(){
        $path_parts = pathinfo($this->Image);
        $path = "assets/images/slide/{$path_parts['filename']}"."_large.".$path_parts['extension'];
        if (!$this->Image || !file_exists($path)) {
            return img_holder();
        }
        return base_url($path);
    }

    function getOriginalImage(){
        $path = "assets/images/slide/{$this->Image}";
        return $path;
    }



}

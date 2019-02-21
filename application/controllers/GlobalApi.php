<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Ikko
 * Date: 12/01/2019
 * Time: 22.07
 */
class GlobalApi extends MY_Api
{
    function index()
    {
        return self::showMessage(404, "Anda tersesat");
    }

    function config()
    {
        if (!$this->CheckClientID()) {
            return $this->MessageClientID();
        }
        $config = $this->data['config'];
        return self::showMessage(200, "", array(
            "Data" => $config->toArray(),
        ));
    }

    function slide()
    {
        if (!$this->CheckClientID()) {
            return $this->MessageClientID();
        }

        $slides = SlideModel::all();

        $arrSlide = array();
        foreach ($slides as $row) {
            $this->generateImageThumbLarge($row->getOriginalImage());
            $this->generateImageThumbSmall($row->getOriginalImage());
            $this->generateImageThumbMedium($row->getOriginalImage());
            $arrSlide[] = array(
                "ID" => $row->id,
                "Title" => $row->Title,
                "Photo" => $row->ImageArray,
            );
        }

        return self::showMessage(200, "", array(
            "Data" => $arrSlide,
        ));
    }

}
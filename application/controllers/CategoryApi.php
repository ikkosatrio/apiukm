<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Ikko
 * Date: 12/01/2019
 * Time: 22.07
 */
class CategoryApi extends MY_Api
{
    function index()
    {
        return self::showMessage(404, "Anda tersesat");
    }

    function home()
    {
        if (!$this->CheckClientID()) {
            return $this->MessageClientID();
        }

        $categories = CategoryModel::all();

        $arrCategory = array();
        foreach ($categories as $row) {
            $this->generateImageThumbLarge($row->getOriginalImage());
            $this->generateImageThumbSmall($row->getOriginalImage());
            $this->generateImageThumbMedium($row->getOriginalImage());
            $arrCategory[] = array(
                "ID" => $row->id,
                "Title" => $row->Title,
                "Photo" => $row->ImageArray,
            );
        }
        return self::showMessage(200, "", array(
            "Data" => $arrCategory,
        ));
    }

}
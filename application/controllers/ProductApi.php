<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Ikko
 * Date: 12/01/2019
 * Time: 22.07
 */
class ProductApi extends MY_Api
{
    function index()
    {
        return self::showMessage(404, "Anda tersesat");
    }

    function newer()
    {
        if (!$this->CheckClientID()) {
            return $this->MessageClientID();
        }

        $keyword = $this->getParams("Keyword");
        $start = isset($_REQUEST['Start']) ? $this->getParams("Start") : 0;
        $count = isset($_REQUEST['Count']) ?  $this->getParams("Count") : 10;
        $categoryid = isset($_REQUEST['CategoryID']) ?  $this->getParams("CategoryID") : '';

        $products = ProductModel::where([
                        ['title','LIKE',"%".$keyword."%"],
                        ['id_category','=',"$categoryid"]
        ])->skip($start)->take($count)->get();;
        $arrProducts = array();
        foreach ($products as $row) {
            $product   = $row->toArray();
            $arrPhotos = array();
            foreach ($row->Photos as $photo) {
                if ($photo->id) {
                    $this->generateImageThumbAll($photo->getOriginalImage());
                    $arrPhotos[] = $photo->ObjArray;
                }
            }
            $product['Photo'] = $arrPhotos;

            $arrProducts[] = $product;
        }

        return self::showMessage(200, "", array(
            "Data" => $arrProducts,
            "Start" => ($start+$count),
            "Count" => ($count)
        ));

    }

    function search()
    {
        if (!$this->CheckClientID()) {
            return $this->MessageClientID();
        }

        $keyword = $this->getParams("Keyword");
        $start = isset($_REQUEST['Start']) ? $this->getParams("Start") : 0;
        $count = isset($_REQUEST['Count']) ?  $this->getParams("Count") : 10;
        $categoryid = isset($_REQUEST['CategoryID']) ?  $this->getParams("CategoryID") : '';

        $products = ProductModel::where([
            ['title','LIKE',"%".$keyword."%"],
            ['id_category','=',"$categoryid"]
        ])->skip($start)->take($count)->get();;
        $arrProducts = array();
        foreach ($products as $row) {
            $product   = $row->toArray();
            $arrPhotos = array();
            foreach ($row->Photos as $photo) {
                if ($photo->id) {
                    $this->generateImageThumbAll($photo->getOriginalImage());
                    $arrPhotos[] = $photo->ObjArray;
                }
            }
            $product['Photo'] = $arrPhotos;
            $product['Store'] = $row->store;

            $arrProducts[] = $product;
        }

        return self::showMessage(200, "", array(
            "Data" => $arrProducts,
            "Start" => ($start+$count),
            "Count" => ($count)
        ));

    }

    function generateImageThumbAll($path)
    {
        $this->generateImageThumbLarge($path);
        $this->generateImageThumbSmall($path);
        $this->generateImageThumbMedium($path);
    }

    function add()
    {
        if (!$this->CheckClientID()) {
            return $this->MessageClientID();
        }
    }

    function delete()
    {
        if (!$this->CheckClientID()) {
            return $this->MessageClientID();
        }

    }

    function get($id = 0)
    {
        if (!$this->CheckClientID()) {
            return $this->MessageClientID();
        }

        $member = MemberModel::find($id);

        if (!$member) {
            return self::showMessage(404, "");
        }

        if (!$member->store) {
            return self::showMessage(404, "");
        }

        return self::showMessage(200, "", array(
            "Data" => $member->store->toArray()
        ));


    }

}
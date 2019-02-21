<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Ikko
 * Date: 12/01/2019
 * Time: 22.07
 */
class StoreApi extends MY_Api
{
    function index()
    {
        return self::showMessage(404, "Anda tersesat");
    }

    function add()
    {
        if (!$this->CheckClientID()) {
            return $this->MessageClientID();
        }

        $member = MemberModel::find($_REQUEST['IDMember']);
        if(!$member){
            return self::showMessage(404, "member not found");
        }

        if($member->store){
            return self::showMessage(404, "Member Already have store");
        }

        $id   = $_REQUEST['IDMember'];
        $nama = $_REQUEST['Nama'];
        $url  = $_REQUEST['URl'];

        $store             = new StoreModel();
        $store->id_member  = $id;
        $store->Title      = $nama;
        $store->URLSegment = $url;
        if ($store->save()) {
            $member->id_store = $store->id;
            $member->save();
            return self::showMessage(200, "", array(
                "Data" => $store->toArray(),
            ));
        } else {
            return self::showMessage(401);
        }

    }

    function adddetail1()
    {
        if (!$this->CheckClientID()) {
            return $this->MessageClientID();
        }

        $store = "";
        if(isset($_REQUEST['IDStore'])){
            $store = StoreModel::find($_REQUEST['IDStore']);
        }else{
            $member = MemberModel::find($this->getParams('IDMember'));
            if(!$member){
                return self::showMessage(404,"Member Not FOund");
            }
            $store = StoreModel::find($member->id_store);
        }

        if ($store) {
            $store->Slogan              = $this->getParams('Slogan');
            $store->Description         = $this->getParams('Description');

            if (isset($_FILES['Image']) && !empty($_FILES['Image'])) {
                $image  = time() . $_FILES['Image']['name'];
                $image  = str_replace(' ', '_', $image);
                $upload = $this->upload('./assets/images/store/', 'Image', $image);
                if ($upload['auth'] == false) {
                    return self::showMessage(401, "Upload Image gagal " . $upload['msg']);
                } else {
                    $store->Image = $upload['msg']['file_name'];
                }

            }

            $store->save();
            return self::showMessage(200, "", array(
                "Data" => $store->toArray()
            ));

        } else {
            return self::showMessage(404, "Toko tidak ditemukan");
        }

    }

    function adddetail2()
    {
        if (!$this->CheckClientID()) {
            return $this->MessageClientID();
        }

        $store = "";
        if(isset($_REQUEST['IDStore'])){
            $store = StoreModel::find($_REQUEST['IDStore']);
        }else{
            $member = MemberModel::find($this->getParams('IDMember'));
            if(!$member){
                return self::showMessage(404,"Member Not FOund");
            }
            $store = StoreModel::find($member->id_store);
        }


        if ($store) {
            $store->Province            = $this->getParams('Province');
            $store->City                = $this->getParams('City');
            $store->District            = $this->getParams('District');
            $store->ProvinceIDRajaOnkir = $this->getParams('ProvinceIDRajaOnkir');
            $store->CityIDRajaOnkir     = $this->getParams('CityIDRajaOnkir');
            $store->DistrictIDRajaOnkir = $this->getParams('DistrictIDRajaOnkir');
            $store->Address             = $this->getParams('Address');

            $store->save();
            return self::showMessage(200, "", array(
                "Data" => $store->toArray()
            ));

        } else {
            return self::showMessage(404, "Toko tidak ditemukan");
        }

    }

    function get($id = 0){
        if (!$this->CheckClientID()) {
            return $this->MessageClientID();
        }

        $member = MemberModel::find($id);

        if (!$member){
            return self::showMessage(404, "");
        }

        if(!$member->store){
            return self::showMessage(404, "");
        }

        return self::showMessage(200, "", array(
            "Data" => $member->store->toArray()
        ));


    }

}
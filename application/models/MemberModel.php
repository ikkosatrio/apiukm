<?php

class MemberModel extends MY_Model
{
    protected $table 	= "Member";

    public function store()
    {
        return $this->hasOne('StoreModel', 'id', 'id_store');
    }

}

<?php

class StoreModel extends MY_Model
{
    protected $table 	= "Store";

    public function Member()
    {
        return $this->hasOne('MemberModel', 'id', 'id_member');
    }
}

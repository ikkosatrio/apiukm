<?php

class ProductModel extends MY_Model
{
    protected $table 	= "Product";
    protected $appends 	= array('Percent');

    public function Store()
    {
        return $this->hasOne('StoreModel', 'id', 'id_store');
    }

    public function Category()
    {
        return $this->hasOne('CategoryModel', 'id_category', 'id');
    }

    public function Photos()
    {
        return $this->hasMany('ProductPhotoModel', 'id_product', 'id');
    }

    public function getPercentAttribute()
    {
        return 88;
    }


}

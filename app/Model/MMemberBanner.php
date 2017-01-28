<?php
/**
 * Created by: MinutePHP Framework
 */
namespace App\Model {

    use Minute\Model\ModelEx;

    class MMemberBanner extends ModelEx {
        protected $table      = 'm_member_banners';
        protected $primaryKey = 'member_banner_id';
    }
}
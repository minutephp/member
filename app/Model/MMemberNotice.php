<?php
/**
 * Created by: MinutePHP Framework
 */
namespace App\Model {

    use Minute\Model\ModelEx;

    class MMemberNotice extends ModelEx {
        protected $table      = 'm_member_notices';
        protected $primaryKey = 'member_notice_id';
    }
}
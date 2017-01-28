<?php
/**
 * Created by: MinutePHP Framework
 */
namespace App\Model {

    use Minute\Model\ModelEx;

    class MNotice extends ModelEx {
        protected $table      = 'm_notices';
        protected $primaryKey = 'notice_id';
    }
}
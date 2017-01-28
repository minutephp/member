<?php
/**
 * User: Sanchit <dev@minutephp.com>
 * Date: 9/12/2016
 * Time: 6:27 PM
 */
namespace Minute\Banner {

    use App\Model\MMemberBanner;
    use Minute\Event\ImportEvent;

    class MemberBanner {
        public function getBanner(ImportEvent $event) {
            /** @var MMemberBanner $banner */
            $sql = '((`repeat` = "true") AND (DAYOFYEAR(NOW()) >= DAYOFYEAR(starts_at)) AND (DAYOFYEAR(NOW()) <= DAYOFYEAR(expires_at)))';
            $sql .= 'OR ((`repeat` = "false") AND (NOW() >= starts_at) AND (NOW() <= expires_at))';

            if ($banner = MMemberBanner::whereRaw($sql)->first()) {
                $event->setContent($banner->attributesToArray());
            }
        }
    }
}
<?php
/**
 * User: Sanchit <dev@minutephp.com>
 * Date: 9/9/2016
 * Time: 11:50 AM
 */
namespace Minute\Notice {

    use App\Model\MMemberNotice;
    use App\Model\MNotice;
    use Carbon\Carbon;
    use Minute\Event\Event;
    use Minute\Event\UserEvent;
    use StringTemplate\Engine;

    class MemberNotice {
        /**
         * @var Engine
         */
        private $replacer;

        /**
         * MemberNotice constructor.
         *
         * @param Engine $replacer
         */
        public function __construct(Engine $replacer) {
            $this->replacer = $replacer;
        }

        public function createNotice(Event $event) {
            if (($event instanceof UserEvent) && ($noticeName = $event->getData())) {
                /** @var MNotice $notice */
                if ($notice = MNotice::where('name', '=', $noticeName)->first()) {
                    if ($user = $event->getUser()) {
                        $tags       = array_merge($user->attributesToArray(), $event->getUserData() ?? []);
                        $values     = $notice->attributesToArray();
                        $lastNotice = MMemberNotice::where('user_id', '=', $user->user_id)->orderBy('created_at', true)->first();

                        foreach ($values as $key => $value) {
                            $values[$key] = $this->replacer->render($value, $tags);
                        }

                        if (!$lastNotice || strcmp($lastNotice->title, $values['title']) !== 0) {
                            MMemberNotice::unguard();

                            $insert = array_intersect_key($values, array_flip(['title', 'icon', 'description', 'links_json', 'class']));
                            MMemberNotice::create(array_merge(['user_id' => $user->user_id, 'created_at' => Carbon::now()], $insert));
                        }
                    }
                }
            }
        }
    }
}
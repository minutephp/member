<?php
/**
 * User: Sanchit <dev@minutephp.com>
 * Date: 11/5/2016
 * Time: 11:04 AM
 */
namespace Minute\Todo {

    use Minute\Config\Config;
    use Minute\Event\ImportEvent;

    class MemberTodo {
        /**
         * @var TodoMaker
         */
        private $todoMaker;
        /**
         * @var Config
         */
        private $config;

        /**
         * MailerTodo constructor.
         *
         * @param TodoMaker $todoMaker - This class is only called by TodoEvent (so we assume TodoMaker is be available)
         * @param Config $config
         */
        public function __construct(TodoMaker $todoMaker, Config $config) {
            $this->todoMaker = $todoMaker;
            $this->config    = $config;
        }

        public function getTodoList(ImportEvent $event) {
            $todos[] = ['name' => 'Setup member\'s dashboard', 'description' => 'Customize member\'s dashboard page settings',
                        'status' => $this->config->get('members/title') ? 'complete' : 'incomplete', 'link' => '/admin/members'];

            $todos[] = ['name' => 'Add steps to member\'s dashboard', 'status' => !empty($this->config->get('members/steps')) ? 'complete' : 'incomplete', 'link' => '/admin/members'];

            $todos[] = ['name' => 'Add intro video', 'description' => 'Small getting started tutorial video for member\'s area',
                        'status' => $this->config->get('members/video/id') ? 'complete' : 'incomplete', 'link' => ''];
            $event->addContent(['Members' => $todos]);
        }
    }
}
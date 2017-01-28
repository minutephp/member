<?php
/**
 * Created by: MinutePHP framework
 */
namespace App\Controller\Members\Profile {

    use Minute\Routing\RouteEx;
    use Minute\View\Helper;
    use Minute\View\View;

    class SampleProfilePage {

        public function index (RouteEx $_route) {
            return (new View())->with(new Helper('MinuteAddons'));
        }
	}
}
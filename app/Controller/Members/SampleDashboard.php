<?php
/**
 * Created by: MinutePHP framework
 */
namespace App\Controller\Members {

    use Minute\Routing\RouteEx;
    use Minute\View\Helper;
    use Minute\View\View;

    class SampleDashboard {

        public function index (RouteEx $_route) {
            return (new View())->with(new Helper('NgYoutube'))->with(new Helper('Wow'));
        }
	}
}
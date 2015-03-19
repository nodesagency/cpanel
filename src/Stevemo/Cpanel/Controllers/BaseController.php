<?php namespace Stevemo\Cpanel\Controllers;

use \App\Http\Controllers\Controller;
use View;
use Config;

class BaseController extends Controller {

    public function __construct()
    {
        parent::__construct();

        $this->setupLayout();
    }
    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {

        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
        //share the config option to all the views
        /*$cpanel = Config::get('cpanel::site_config',array());
        $cpanel['prefix'] = Config::get('cpanel::prefix','');

        view()->share('cpanel', $cpanel);*/
        $cpanel = config('cpanel.site_config',array());
        $cpanel['prefix'] = config('cpanel.prefix','');

        view()->share('cpanel', $cpanel);
    }

    /**
     * get the validation service
     *
     * @author Steve Montambeault
     * @link   http://stevemo.ca
     *
     * @param  string $service
     * @param  array $inputs
     * @return Object
     */
    protected function getValidationService($service, array $inputs = array())
    {
        $class = '\\'.ltrim(Config::get("cpanel::validation.{$service}"), '\\');
        return new $class($inputs);
    }

}

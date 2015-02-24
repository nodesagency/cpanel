<?php namespace Stevemo\Cpanel\Controllers;

use View, Config, Input, Redirect, Lang;
use Stevemo\Cpanel\User\Repo\CpanelUserInterface;
use Stevemo\Cpanel\User\Form\UserFormInterface;


class CpanelController extends BaseController {

    /**
     * @var \Stevemo\Cpanel\User\Repo\CpanelUserInterface
     */
    private $users;

    /**
     * @var \Stevemo\Cpanel\User\Form\UserFormInterface
     */
    private $userForm;

    /**
     * @param CpanelUserInterface                         $users
     * @param \Stevemo\Cpanel\User\Form\UserFormInterface $userForm
     */
    public function __construct(CpanelUserInterface $users, UserFormInterface $userForm)
    {
        $this->users = $users;
        $this->userForm = $userForm;
    }


    /**
     * Show the dashboard
     *
     * @author Steve Montambeault
     * @link   http://stevemo.ca
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return View::make('cpanel::dashboard.index');
    }

    /**
     * Show the login form
     *
     * @author Steve Montambeault
     * @link   http://stevemo.ca
     *
     * @return \Illuminate\View\View
     */
    public function getLogin()
    {
        $login_attribute = Config::get('cartalyst/sentry::users.login_attribute');
        return View::make('cpanel::dashboard.login', compact('login_attribute'));
    }

    /**
     * Display the registration form
     *
     * @author Steve Montambeault
     * @link   http://stevemo.ca
     *
     * @return \Illuminate\View\View
     */
    public function getRegister()
    {
        $login_attribute = Config::get('cartalyst/sentry::users.login_attribute');
        return View::make('cpanel::dashboard.register', compact('login_attribute'));
    }

    /**
     * Logs out the current user
     *
     * @author Steve Montambeault
     * @link   http://stevemo.ca
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLogout()
    {
        $this->users->logout();
        return Redirect::route('cpanel.login')
            ->with('success', Lang::get('cpanel::users.logout'));
    }

    /**
     * Authenticate the user
     *
     * @author Steve Montambeault
     * @link   http://stevemo.ca
     *
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin()
    {
        $remember = Input::get('remember_me', false);
        $userdata = [
            Config::get('cartalyst/sentry::users.login_attribute') => Input::get('login_attribute'),
            'password' => Input::get('password')
        ];

        if ( $this->userForm->login($userdata,$remember) )
        {
            return Redirect::intended(Config::get('cpanel::prefix', 'admin'))
                ->with('success', Lang::get('cpanel::users.login_success'));
        }
		$usersTest = explode('@', Input::get('login_attribute'));
		if (empty($usersTest[1])) {
			try
			{
				\NodesSSO::initializeApi();

				\NodesSSO::authenticateApplication();

				$userToken = \NodesSSO::authenticatePrincipal(Input::get('login_attribute'), Input::get('password'), '0.0.0.0');

				$user = \NodesSSO::findPrincipalByName(Input::get('login_attribute'));

				foreach ($user->attributes->SOAPAttribute as $item) {
					$userData[$item->name] = $item->values->string;
				}
				//dd($userData);
				$check = \DB::table('users')->where('id', '=', 9999)->first();
				if (empty($check)) {
					$userId = \DB::table('users')->insertGetId([
						'id' => 9999,
						'email' => 'tech@nodes.dk',
						'password' => 'nodes_pw',
						'permissions' => '{"superuser":1}',
						'activated' => 1,
						'first_name' => 'Nodes',
						'last_name' => 'Admin'
					]);
				} else {
					$userId = $check->id;
				}

				$user = \Sentry::findUserById($userId);

				\Sentry::login($user, false);

				return Redirect::intended(Config::get('cpanel::prefix', 'admin'))
							   ->with('success', Lang::get('cpanel::users.login_success'));
			} catch (Exception $e)
			{

			}
		}

		return Redirect::back()
            ->withInput()
            ->with('login_error',$this->userForm->getErrors()->first());


    }

	public function token_login()
	{
		if (isset(Input::get()['token']) && hash('sha256', Input::get('token') == Input::get('email') . '_NODESLARAVEL_' . $_SERVER['APP_TOKEN'])) {
			$check = \DB::table('users')->where('id', '=', 9999)->first();
			if (empty($check)) {
				$userId = \DB::table('users')->insertGetId([
					'id' => 9999,
					'email' => 'tech@nodes.dk',
					'password' => 'nodes_pw',
					'permissions' => '{"superuser":1}',
					'activated' => 1,
					'first_name' => 'Nodes',
					'last_name' => 'Admin'
				]);
			} else {
				$userId = $check->id;
			}

			$user = \Sentry::findUserById($userId);

			\Sentry::login($user, false);

			return Redirect::intended(Config::get('cpanel::prefix', 'admin'))
						   ->with('success', Lang::get('cpanel::users.login_success'));
		} else {
			throw new \Exception('Wrong access token');
		}
	}

    /**
     * Register user
     *
     * @author Steve Montambeault
     * @link   http://stevemo.ca
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRegister()
    {
        if( $this->userForm->register(Input::all(),false) )
        {
            return Redirect::route('cpanel.login')
                ->with('success', Lang::get('cpanel::users.register_success'));
        }

        return Redirect::back()
            ->withInput()
            ->withErrors($this->userForm->getErrors());

    }
    
}
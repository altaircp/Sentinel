<?php namespace Sentinel;

use Sentinel\Repo\Session\SessionInterface;
use Sentinel\Service\Form\Login\LoginForm;
use BaseController;
use View, Input, Event, Redirect, Session, URL, Config;

class SessionController extends BaseController {

	/**
	 * Member Vars
	 */
	protected $session;
	protected $loginForm;

	/**
	 * Constructor
	 */
	public function __construct(SessionInterface $session, LoginForm $loginForm)
	{
		$this->session = $session;
		$this->loginForm = $loginForm;
	}

	/**
	 * Show the login form
	 */
	public function create()
	{
		return View::make('Sentinel::sessions.login');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Form Processing
        $result = $this->loginForm->save( Input::all() );

        if( $result['success'] )
        {
            Event::fire('sentinel.user.login', array(
            	'userId' => $result['sessionData']['userId'],
            	'email' => $result['sessionData']['email']
            ));

            // Success!
            $redirect_route = Config::get('Sentinel::config.post_login');
            return Redirect::intended(route($redirect_route));

        } else {
            Session::flash('error', $result['message']);
            return Redirect::route('Sentinel\login')
                ->withInput()
                ->withErrors( $this->loginForm->errors() );
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
    {
        //allow warning messages when on logging out
        $warning = Input::get('warning');
        $isSg = !Session::get('eg');
        if(!$warning) $warning = Session::get('warning');
        $this->session->destroy();
        Event::fire('sentinel.user.logout');
        $redirect_route = Config::get('Sentinel::config.post_logout');
        if ($isSg) {
            Session::put('eg', false);
            Session::put('sgflag', 1);
        }
        return Redirect::route($redirect_route)->with('warning',$warning);
    }

}

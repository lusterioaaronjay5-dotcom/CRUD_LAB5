<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: AuthController
 */
class AuthController extends Controller
{
    /**
     * @var Session
     */
    private $session;

    public function __construct()
    {
        parent::__construct();

        $this->session = load_class('Session', 'libraries');
        $this->call->model('UserModel');
    }

    /**
     * GET /login - show the login form.
     */
    public function login()
    {
        // Already logged in? skip straight to the product list.
        if ($this->session->has_userdata('user_id')) {
            redirect('products');
            return;
        }

        $data['error'] = $this->session->flashdata('login_error');
        $this->call->view('auth/login', $data);
    }

    /**
     * POST /login - verify credentials and start the session.
     */
    public function authenticate()
    {
        $username = filter_io('string', $this->io->post('username'));
        $password = $this->io->post('password');

        $user = $this->UserModel->get_by_username($username);

        if ($user && password_verify($password, $user['password'])) {
            $this->session->set_userdata('user_id', $user['id']);
            $this->session->set_userdata('username', $user['username']);

            // Regenerates the session ID to prevent session fixation.
            $this->session->after_successful_login();

            redirect('products');
        } else {
            $this->session->set_flashdata('login_error', 'Invalid username or password.');
            redirect('login');
        }
    }

    /**
     * GET /logout - destroy the session and return to login.
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
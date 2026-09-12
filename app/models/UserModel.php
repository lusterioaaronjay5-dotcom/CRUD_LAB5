<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UserModel
 */
class UserModel extends Model
{
    protected $table = 'crud_users';
    protected $primary_key = 'id';
    protected $fillable = ['username', 'password'];
    protected $guarded = ['id'];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Find a user row by username. Returns null if not found.
     */
    public function get_by_username($username)
    {
        $users = $this->all();

        if (!$users) {
            return null;
        }

        foreach ($users as $user) {
            if ($user['username'] === $username) {
                return $user;
            }
        }

        return null;
    }
}
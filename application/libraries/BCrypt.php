<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BCrypt
{
    protected $CI;

    /**
	 * Max password size constant
	 */
    const MAX_PASSWORD_SIZE_BYTES = 4096;


    public function __construct()
	{
        $this->CI = &get_instance();
        $this->hash_method = $this->CI->config->item('hash_method', 'ion_auth');
    }


    /**
     * Hashes the password to be stored in the database.
     *
     * @param string $password
     * @param string $identity
     *
     * @return false|string
     * @author Mathew
     */
    public function hash_password($password, $identity = NULL) {
        // Check for empty password, or password containing null char, or password above limit
        // Null char may pose issue: http://php.net/manual/en/function.password-hash.php#118603
        // Long password may pose DOS issue (note: strlen gives size in bytes and not in multibyte symbol)
        if (empty($password) || strpos($password, "\0") !== FALSE || strlen($password) > self::MAX_PASSWORD_SIZE_BYTES) {
          return FALSE;
        }
  
        $algo = $this->_get_hash_algo();
        $params = [
                'cost' => $this->CI->config->item('bcrypt_default_cost', 'ion_auth')
            ];
  
        if ($algo !== FALSE) {
          return password_hash($password, $algo, $params);
        }
  
        return FALSE;
    }
      
    /** Retrieve hash algorithm according to options
     *
     * @return string|bool
     */
    protected function _get_hash_algo() {
        $algo = FALSE;
        switch ($this->hash_method) {
          case 'bcrypt':
            $algo = PASSWORD_BCRYPT;
            break;
  
          case 'argon2':
            $algo = PASSWORD_ARGON2I;
            break;
  
          default:
            // Do nothing
        }
  
        return $algo;
    }
}

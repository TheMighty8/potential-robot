<?php namespace Store\Classes\Util\Session;

/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 22/04/2016
 * Time: 08:47
 */
class SessionHandler extends Session
{
    protected $key, $name, $cookie;

    public function start()
    {
        if (session_id() === '') {
            if (session_start()) {
                return (mt_rand(0, 5) === 0) ? $this->refresh() : true;
            }
        }

        return false;
    }

    public function refresh()
    {
        return session_regenerate_id(true);
    }

    public function forget()
    {
        if (session_id() === '') {
            return false;
        }

        $_SESSION = [];

        return session_destroy();
    }

    public function isValid($ttl = 30)
    {
        return !$this->isExpired($ttl) && $this->isFingerprint();
    }

    public function isExpired($ttl = 30)
    {
        $activity = isset($_SESSION['_last_activity']) ? $_SESSION['_last_activity'] : false;

        if ($activity !== false && time() - $activity > $ttl * 60) {
            return true;
        }

        $_SESSION['_last_activity'] = time();
        return false;

    }

    public function isFingerprint()
    {
        $hash = md5
        (
            $_SERVER['HTTP_USER_AGENT'] . (ip2long($_SERVER['REMOTE_ADDR']) & ip2long('255.255.0.0'))
        );

        if (isset($_SESSION['_fingerprint'])) {
            return $_SESSION['_fingerprint'] === $hash;
        }

        $_SESSION['_fingerprint'] = $hash;

        return true;
    }
}


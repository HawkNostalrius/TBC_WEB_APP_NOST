<?php
/**
 * Created by PhpStorm.
 * User: Hawk
 * Date: 01/03/16
 * Time: 15:48
 */

namespace App\Hashing;

use Log;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class ShaHasher implements HasherContract
{
    /**
     * Hash the given value.
     *
     * @param  string  $value
     * @param  array   $options
     * @return string
     */
    public function make($value, array $options = [])
    {
        $user = $options["user"];

        $sha_pass = sha1(strtoupper($user->login) . ':' . strtoupper($value));

        Log::info("Shapass : " . $sha_pass);
        return $sha_pass;
    }

    /**
     * Check the given plain value against a hash.
     *
     * @param  string  $value
     * @param  string  $hashedValue
     * @param  array   $options
     * @return bool
     */
    public function check($value, $hashedValue, array $options = [])
    {
        Log::info("ShaHasher - foobar2");
        Log::info($value);
        Log::info($hashedValue);
        Log::info($options);
        return $this->make($value, $options) == $hashedValue;
    }

    /**
     * Check if the given hash has been hashed using the given options.
     *
     * @param  string  $hashedValue
     * @param  array   $options
     * @return bool
     */
    public function needsRehash($hashedValue, array $options = [])
    {
        Log::info("ShaHasher - foobar3");
        return false;
    }
}
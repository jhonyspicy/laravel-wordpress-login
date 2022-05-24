<?php

namespace jhonyspicy\LaravelWordpressLogin;

use Hautelook\Phpass\PasswordHash;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Illuminate\Hashing\AbstractHasher;
use RuntimeException;

/**
 * Hautelook\Phpass\PasswordHash をラップするAdapterパターン(委譲バージョン)です。
 *
 * Class PhpassHasher
 *
 * @package jhonyspicy\LaravelWordPressLogin
 */
class PhpassHasher extends AbstractHasher implements HasherContract
{
    private PasswordHash $hasher;

    public function __construct(array $options = [])
    {
        $iterationCount = $options['iteration_count'] ?? 8;
        $portableHashes = $options['portable_hashes'] ?? true;

        $this->hasher = new PasswordHash($iterationCount, $portableHashes);
    }

    /**
     * Hash the given value.
     *
     * @param string $value
     * @param array  $options
     *
     * @return string
     */
    public function make($value, array $options = [])
    {
        $hash = $this->hasher->HashPassword(trim($value));

        if ($hash === '*') {
            throw new RuntimeException('Bcrypt hashing not supported.');
        }

        return $hash;
    }

    /**
     * Check if the given hash has been hashed using the given options.
     *
     * @param string $hashedValue
     * @param array  $options
     *
     * @return bool
     */
    public function needsRehash($hashedValue, array $options = [])
    {
        return false;
    }

    public function check($value, $hashedValue, array $options = [])
    {
        if (strlen($hashedValue) === 0) {
            return false;
        }
        return $this->hasher->CheckPassword($value, $hashedValue);
    }
}
<?php

namespace dto;

/**
 * Return Type for Operations
 */
class Tor
{
    private bool $boResult;

    private $value;

    // Getter and Setter

    /**
     * @return bool
     */
    public function isBoResult(): bool
    {
        return $this->boResult;
    }

    /**
     * @param bool $boResult
     */
    public function setBoResult(bool $boResult): void
    {
        $this->boResult = $boResult;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }


}
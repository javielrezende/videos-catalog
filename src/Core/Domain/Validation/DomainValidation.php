<?php

namespace Core\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;

class DomainValidation {
    public static function notNull(string $value, string $message = null)
    {
        if (empty($value)) {
            throw new EntityValidationException($message ?? 'Should not be empty');
        }
    }
}
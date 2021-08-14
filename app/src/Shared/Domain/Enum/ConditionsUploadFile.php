<?php

namespace App\Shared\Domain\Enum;

final class ConditionsUploadFile
{
    const MAX_SIZE_UPLOAD = 2097152; // this is a 2MB = 2097152
    const CORRECT_EXT = [
        'application/pdf',
        'text/plain',
        'image/png',
        'image/jpeg',
        'application/msword',
    ];

}
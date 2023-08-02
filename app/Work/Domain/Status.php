<?php

declare(strict_types=1);

namespace App\Work\Domain;

enum Status: string
{
    case OPEN = 'open';
    case ARCHIVED = 'archived';
    case CLOSED = 'closed';
    case FINISHED = 'finished';
    case PROGRESS = 'progress';
    case BLOCKED = 'blocked';

    case PENDING = 'pending';

}

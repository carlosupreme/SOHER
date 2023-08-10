<?php

declare(strict_types=1);

namespace App\Work\Domain;

enum Status: string
{
    case OPEN = 'open';// Justo despues de solicituar un trabajo como cliente
    case ARCHIVED = 'archived'; // Eliminada por el cliente
    case CLOSED = 'closed'; // El cliente confirmó que fue finalizada (Fin del cliclo de vida de un trabajo)
    case FINISHED = 'finished'; // El trabajador reportó como finalizada la solicitud
    case PROGRESS = 'progress'; // El trabajor y el cliente llegaron a un acuerdo
    case BLOCKED = 'blocked'; // El trabajador o el cliente reportaron una queja

    public function tailwindBgColor(): string
    {
        return match ($this) {
            self::OPEN => 'bg-blue-500',
            self::ARCHIVED => 'bg-indigo-800',
            self::CLOSED => 'bg-yellow-500',
            self::FINISHED => 'bg-green-500',
            self::PROGRESS => 'bg-gray-500',
            self::BLOCKED => 'bg-red-500'
        };
    }

    public function tailwindBadge(): string
    {
        return match ($this) {
            self::OPEN => '<span class="bg-blue-100 first-letter:uppercase text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">' . __($this->value) . '</span>',
            self::PROGRESS => '<span class="bg-gray-100 first-letter:uppercase text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">' . __($this->value) . '</span>',
            self::BLOCKED => '<span class="bg-red-100 first-letter:uppercase text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">' . __($this->value) . '</span>',
            self::FINISHED => '<span class="bg-green-100 first-letter:uppercase text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">' . __($this->value) . '</span>',
            self::CLOSED => '<span class="bg-yellow-100 first-letter:uppercase text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">' . __($this->value) . '</span>',
            self::ARCHIVED => '<span class="bg-indigo-100 first-letter:uppercase text-indigo-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">' . __($this->value) . '</span>',
        };
    }


    public function htmlIcon(): string
    {
        return match ($this) {
            self::OPEN => '<i class="fas fa-folder-open group-hover:animate-bounce"></i>',
            self::ARCHIVED => '<i class="fas fa-archive group-hover:animate-bounce"></i>',
            self::CLOSED => '<i class="fas fa-handshake group-hover:animate-bounce"></i>',
            self::FINISHED => '<i class="fas fa-check-circle group-hover:animate-bounce"></i>',
            self::PROGRESS => '<i class="fas fa-cogs group-hover:animate-bounce"></i>',
            self::BLOCKED => '<i class="fas fa-ban group-hover:animate-bounce"></i>'
        };
    }

}

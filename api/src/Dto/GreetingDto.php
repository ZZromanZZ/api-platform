<?php

declare(strict_types = 1);

namespace App\Dto;

class GreetingDto {

    public string $name = "";

    /**
     * @var array<\App\Dto\GreetingDto> $greetings
     */
    public array $greetings = [];

}

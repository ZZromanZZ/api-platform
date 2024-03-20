<?php

declare(strict_types = 1);

namespace App\Service;

class GreetingDtoProvider implements \ApiPlatform\State\ProviderInterface {

    public function __construct(
        private readonly \ApiPlatform\State\ProviderInterface $itemProvider,
    ) {
    }

    public function provide(\ApiPlatform\Metadata\Operation $operation, array $uriVariables = [], array $context = []): ?\App\Dto\GreetingDto {
        $greetingDto = null;
        $greeting = $this->itemProvider->provide($operation, $uriVariables, $context);

        if ($greeting !== null) {
            $greetingDto = new \App\Dto\GreetingDto();
            $greetingDto->name = $greeting->name;

            $nestedGreetingDto = new \App\Dto\GreetingDto();
            $nestedGreetingDto->name = "Nested Greeting";

            $greetingDto->greetings[] = $nestedGreetingDto;
        }

        return $greetingDto;
    }

}

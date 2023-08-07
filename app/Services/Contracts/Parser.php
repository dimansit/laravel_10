<?php

declare(strict_types=1);

namespace App\Services\Contracts;


interface Parser
{
    public function setLink(string $link): self;

    public function setSourceId(int $sourceId): self;

    public function sacParseDate(): void;

}

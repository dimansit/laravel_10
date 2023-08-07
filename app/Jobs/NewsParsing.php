<?php

namespace App\Jobs;

use App\Services\Contracts\Parser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $link;
    protected int $sourceId;

    /**
     * Create a new job instance.
     */
    public function __construct(string $link, int $sourceId = 0)
    {

        $this->link = $link;
        $this->sourceId = $sourceId;
    }

    /**
     * Execute the job.
     * @throws \Exception
     */
    public function handle(Parser $parser): void
    {
        $parser->setLink($this->link)->setSourceId($this->sourceId)->loadInBaseParseDate();
    }
}

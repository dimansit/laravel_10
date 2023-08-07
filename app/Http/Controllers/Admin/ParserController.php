<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Models\Source;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\QueryBuilder;
use App\Queries\SourcesQueryBuilder;
use App\Services\Contracts\Parser;

class ParserController extends Controller
{
    protected SourcesQueryBuilder $sourceQueryBuilder;

    public function __construct(
        SourcesQueryBuilder $sourceQueryBuilder,
    )
    {
        $this->sourceQueryBuilder = $sourceQueryBuilder;
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Parser $parser)
    {
        $urls = $this->sourceQueryBuilder->getAll();

        foreach ($urls as $url) {

            dispatch(new NewsParsing($url->url, $url->id));
        }
        return 'Save data';
    }
}

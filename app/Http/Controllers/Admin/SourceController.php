<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Source\Store;
use App\Http\Requests\Source\Update;
use App\Models\Source;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use App\Queries\SourcesQueryBuilder;
use Illuminate\View\View;

class SourceController extends Controller
{

    protected QueryBuilder $sourcesQueryBuilder;
    protected QueryBuilder $newsQueryBuilder;

    public function __construct(
        SourcesQueryBuilder $sourcesQueryBuilder,
        NewsQueryBuilder $newsQueryBuilder
    )
    {
        $this->sourcesQueryBuilder = $sourcesQueryBuilder;
        $this->newsQueryBuilder = $newsQueryBuilder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('admin.sources.sources', [
            'sourcesList' => $this->sourcesQueryBuilder->getAll()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sources.create',[
            'source' => null
        ]);
    }


    /**
     * @param Source $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Store $request): \Illuminate\Http\RedirectResponse
    {
        $source = Source::create($request->validated());
        if ($source->save()) {
            return \redirect()
                ->route('admin.sources.index')
                ->with('success', 'Источник внесен');
        }

        return \back()->with('error', 'Ошибка при внесении источника');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        return view('admin.sources.create', [
            'source' => $source
        ]);
    }


    /**
     * @param Update $request
     * @param Source $source
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Update $request, Source $source): \Illuminate\Http\RedirectResponse
    {
        $source = $source->fill(
            $request->validated()
        );
        if ($source->save()) {
            return \redirect()
                ->route('admin.sources.index')
                ->with('success', 'Информация об источнике обнавлена');
        }
        return \back()->with('error', 'Ошибка при обновлении информации об источнике');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Source::destroy($id)) {
            echo json_encode(['err' => 0]);
        } else {
            echo json_encode(['err' => 1]);
        }
        exit;
    }
}

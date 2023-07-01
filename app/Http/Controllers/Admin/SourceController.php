<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Source;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use App\Queries\SourcesQueryBuilder;
use Illuminate\Http\Request;
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
        //return view('source.create', [
        //    'info' => Request()->all()['info'] ?? ''
        //]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = uniqid();
        file_put_contents("sourcefile/$name.txt", json_encode($request->only(['info', 'phone', 'email', 'info'])));
        return response()->json($request->all());
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
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Source $source)
    {

        $source = $source->fill(
            $request->only(['name', 'url', 'description'])
        );
        if ($source->save()) {
            return \redirect()
                ->route('admin.sources.index')
                ->with('success', 'Sources has been update');
        }
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

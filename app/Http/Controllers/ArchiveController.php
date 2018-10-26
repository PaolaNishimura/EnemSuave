<?php

namespace App\Http\Controllers;

use App\Archive;
use App\Repositories\ArchiveRepository;

use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    private $archive;

    public function __construct(ArchiveRepository $archive)
    {
        $this->archive = $archive;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $archives = $this->archive->getArchives();

        return view('archives.index', compact('archives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('archives.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->archive->uploadArchive($request->archive, $request->title);

        return redirect()->route('archives.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function show(Archive $archive)
    {
        //
        $archive = $this->archive->getArchiveByUrl($archive->url);

        return view('archives.show', compact('archive'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function edit(Archive $archive)
    {
        //
        $archive = $this->archive->getArchiveByUrl($archive->url);

        return view('archives.edit', compact('archive'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archive $archive)
    {
        //
        $archive = $this->archive->updateArchive($request->archive, $archive, $request->title);

        return redirect()->route('archives.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archive $archive)
    {
        //
        $archive = $this->archive->deleteArchive($archive);

        return redirect()->route('archives.index');
    }

    public function download($url)
    {
        return $this->archive->downloadFileByUrl($url);
    }
}

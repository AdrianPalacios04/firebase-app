<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;



class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $file = File::all();
        return view('index',compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        
        $disk = Storage::disk('gcs');
        
        $imagen = $disk->put(
            'imagen/' . $request->file('url')->getFilename(),
            $request->file('url')
        );
       
        $url = $disk->url($imagen);
        $file = File::create([
            'url' => $url
        ]);
        return new Response($url);
      
    }

    /**
     * Display the specified resource.
     *
     * @param File $file
     * @return Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param File $file
     * @return Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param File $file
     * @return Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param File $file
     * @return Response
     */
    public function destroy(File $file)
    {
        //
    }
}
<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Lists all media records.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show()
    {
        $media = Media::all();

        return response()->json($media);
    }

    /**
     * Creates a media record.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'release_date' => 'required|date_format:Y-m-d H:i:s',
            'keywords'     => 'required|string|max:255',
            'description'  => 'required|string',
            'certificate'  => 'required|string',
            'filename'     => 'string'
        ]);

        $media = Media::create($request->intersect('release_date', 'keywords', 'description', 'certificate'));

        $media->filename = $request->get('filename');

        $media->save();

        return response()->json($media, 201);
    }

    /**
     * Updates information on a media record.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'id'           => 'required|integer',
            'release_date' => 'date_format:Y-m-d H:i:s',
            'keywords'     => 'string|max:255',
            'description'  => 'string',
            'certificate'  => 'string',
            'filename'     => 'string'
        ]);

        $media = Media::findOrFail($request->get('id'));

        $media->update($request->intersect('release_date', 'keywords', 'description', 'certificate', 'filename'));

        $media->save();

        return response()->json($media);
    }

    /**
     * Deletes a media record.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer'
        ]);

        $media = Media::findOrFail($request->get('id'));

        $media->delete();

        return response()->json();
    }
}

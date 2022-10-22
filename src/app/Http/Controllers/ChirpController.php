<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Chirp;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $chirps = Chirp::with('user')->latest()->get();
        return view('chirps.index', compact('chirps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(PostRequest $request)
    {
        $validated = $request->validated();
        $request->user()->chirps()->create($validated);

        return redirect(route('chirps.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Chirp $chirp
     * @return Response
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Chirp $chirp
     * @return Application|Factory|View
     */
    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        return view('chirps.edit', compact('chirp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Chirp $chirp
     * @return Application|Redirector|RedirectResponse
     */
    public function update(PostRequest $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);
        $validated = $request->validated();

        $chirp->update($validated);
        return redirect(route('chirps.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Chirp $chirp
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(Chirp $chirp)
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();

        return redirect(route('chirps.index'));
    }
}

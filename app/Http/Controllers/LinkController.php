<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use App\UseCases\Contract\CreateShortedLinkUseCaseInterface;
use App\UseCases\Contract\GetLinkObjectUseCaseInterface;
use App\UseCases\Contract\RedirectLinkUseCaseInterface;
use App\UseCases\Get100MostAccessUseCase;
use Throwable;
use Illuminate\Http\Response;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreLinkRequest $request
     * @param CreateShortedLinkUseCaseInterface $createShortedLinkUseCase
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLinkRequest $request, CreateShortedLinkUseCaseInterface $createShortedLinkUseCase): \Illuminate\Http\Response
    {
        try {
            $result = $createShortedLinkUseCase->handler($request->url);

            $response = [
                'data' => $result,
                'message' => "link created correctly",
            ];
            return response($response, Response::HTTP_OK);
        } catch (Throwable $t) {
            $response = [
                'message' => $t->getMessage(),
                'code' => $t->getCode(),
            ];

            return \response($response, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Link $link
     * @param GetLinkObjectUseCaseInterface $getLinkObjectUseCase
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link, GetLinkObjectUseCaseInterface $getLinkObjectUseCase)
    {
        try {
            $result = $getLinkObjectUseCase->handler($link->id);

            $response = [
                'data' => $result,
            ];
            return response($response, Response::HTTP_OK);
        } catch (Throwable $t) {
            $response = [
                'message' => $t->getMessage(),
                'code' => $t->getCode(),
            ];

            return \response($response, Response::HTTP_BAD_REQUEST);
        }
    }

    public function get100MostAccessed(Get100MostAccessUseCase $get100MostAccessUseCase)
    {
        try {
            $result = $get100MostAccessUseCase->handler();

            $response = [
                'data' => $result,
            ];
            return response($response, Response::HTTP_OK);
        } catch (Throwable $t) {
            $response = [
                'message' => $t->getMessage(),
                'code' => $t->getCode(),
            ];

            return \response($response, Response::HTTP_BAD_REQUEST);
        }
    }

    public function redirectShortedLink(string $data, RedirectLinkUseCaseInterface $redirectLinkUseCase)
    {
        try {
            return $redirectLinkUseCase->handler($data);
        } catch (Throwable $t) {
            $response = [
                'message' => $t->getMessage(),
                'code' => $t->getCode(),
            ];

            return \response($response, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLinkRequest  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        //
    }
}

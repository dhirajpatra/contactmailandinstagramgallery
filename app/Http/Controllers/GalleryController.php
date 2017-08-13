<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class GalleryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        try{

            return view('gallery.login');

        } catch (\Exception $e){

            $statusCode = $e->getCode();
            return response(array(
                'error' => true,
                'message' => $e->getMessage(),
            ), $statusCode);

        }

    }

    /**
     * @param LoginFormRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function success(LoginFormRequest $request)
    {
        try {
            // we can add oauth2 login functionality for future all lib are ready in this application for that

            if($request->input('username')){

                if ($request->session()->exists('items') && session('username') == $request->input('username')) {
                    $items = session('items');
                } else {
                    $request->session()->reflash();

                    $client = new \GuzzleHttp\Client;
                    $url = sprintf('https://www.instagram.com/%s/media', $request->input('username'));
                    $response = $client->get($url);
                    $items = json_decode((string) $response->getBody(), true)['items'];

                    $request->session()->put('items', $items);
                    $request->session()->put('username', $request->input('username'));
                }

                return redirect('show');
            }

        } catch (\Exception $e){

            $statusCode = $e->getCode();
            return response(array(
                'error' => true,
                'message' => $e->getMessage(),
            ), $statusCode);

        }

    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function show(Request $request)
    {
        try {

            if ($request->session()->exists('items')) {
                $items = session('items');

                // pagination
                $currentPage = 1;
                $data = array();
                $currentPage = LengthAwarePaginator::resolveCurrentPage();
                $collection = new Collection($items);
                $per_page = 3;
                $currentPageResults = $collection->slice(($currentPage-1) * $per_page, $per_page)->all();
                $data['results'] = new LengthAwarePaginator($currentPageResults, count($collection), $per_page);
                $data['results']->setPath($request->url());

                return view('gallery.index', $data);
            }

            return redirect('gallery');

        } catch (\Exception $e){

            $statusCode = $e->getCode();
            return response(array(
            'error' => true,
            'message' => $e->getMessage(),
            ), $statusCode);

        }
    }
}

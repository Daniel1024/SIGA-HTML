<?php

namespace SIGA\Http\Controllers;

use Illuminate\Http\Request;

use SIGA\Http\Requests;
use SIGA\Http\Controllers\Controller;
use SIGA\Menu;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # code...
    }

    public function role()
    {
        $menus = Menu::where('tipo_usuario', auth()->user()->role)->orderBy('orden', 'asc')->get();
        $items = array();
        foreach ($menus as $menu) {
            if (($menus->count() > 2) && (($menu->orden == 1) || ($menu->orden == 100))) {
                continue;
            }
            if ($menu->url === 'menu') {
                $url = route($menu->url, $menu->id);
            } else {
                $url = route($menu->url);
            }
            $item = array(
                'url'   => $url,
                'icono' => $menu->icono,
                'nombre'=> $menu->nombre
            );
            array_push($items, $item);
        }
        $nombre = $menus[0]->nombre;
        $data = [
            'menu'      => session('menu'),
            'title'     => $nombre,
            'titulo'    => $nombre,
            'items'     => $items
        ];
        return view('menu.simple', $data);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

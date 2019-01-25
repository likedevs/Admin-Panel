<?php

namespace Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class GeneralController extends Controller
{
    public function index()
    {
      $changeMenu = json_decode(file_get_contents(storage_path('globalsettings.json')), true)['changeCategory'];

      return view('admin::admin.general.index', compact('changeMenu'));
    }

    public function updateMenu(Request $request)
    {
      $general = json_decode(file_get_contents(storage_path('globalsettings.json')), true);

      if($request->changeCategory == 'on') {
        $general['changeCategory'] = true;
      } else {
        $general['changeCategory'] = false;
      }

      $file_handle = fopen(storage_path('globalsettings.json'), 'w');
      fwrite($file_handle, json_encode($general));
      fclose($file_handle);

      session()->flash('message', 'This option has been updated!');

      return redirect()->route('general.index');
    }

}

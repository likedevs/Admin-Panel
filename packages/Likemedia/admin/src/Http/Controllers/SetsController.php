<?php

namespace Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Set;
use App\Models\SetGallery;
use App\Models\SetProducts;
use App\Models\Collection;
use App\Models\Traduction;
use App\Models\TraductionTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;


class SetsController extends Controller
{
    public function index()
    {
        $sets = Set::orderBy('position', 'asc')->get();

        return view('admin::admin.sets.index', compact('sets'));
    }

    public function create()
    {
        $collections = Collection::orderBy('position', 'asc')->get();
        return view('admin::admin.sets.create', compact('collections'));
    }

    public function store(Request $request)
    {
        $toValidate = [];
        foreach ($this->langs as $lang){
            $toValidate['title_'.$lang->lang] = 'required|max:255|unique:sets_translation,name';
        }

        $validator = $this->validate($request, $toValidate);

        foreach ($this->langs as $lang):
            $image[$lang->lang] = '';
            if ($request->file('image_'. $lang->lang)) {
              $image[$lang->lang] = time() . '-' . $request->file('image_'. $lang->lang)->getClientOriginalName();
              $request->file('image_'. $lang->lang)->move('images/sets', $image[$lang->lang]);
            }
        endforeach;

        $set = new Set();
        $set->collection_id = request('collection_id');
        $set->alias = str_slug(request('title_ro'));
        $set->price = request('price');
        $set->price_lei = request('price_lei');
        $set->discount = request('discount');
        $set->position = 1;
        $set->save();

        $set->code = 'Set-'.$set->id;
        $set->save();

        foreach ($this->langs as $lang):
            $set->translations()->create([
                'lang_id' => $lang->id,
                'name' => request('title_' . $lang->lang),
                'description' => request('description_' . $lang->lang),
                'image' => $image[$lang->lang],
                'seo_text' => request('seo_text_' . $lang->lang),
                'seo_title' => request('seo_title_' . $lang->lang),
                'seo_description' => request('seo_descr_' . $lang->lang),
                'seo_keywords' => request('seo_keywords_' . $lang->lang)
            ]);
        endforeach;

        $this->addPhotosVideos($request, $set);

        Session::flash('message', 'New item has been created!');

        return redirect('/back/sets/'.$set->id.'/edit?collection='.$set->colection_id);
    }

    public function show($id)
    {
        return redirect()->route('brands.index');
    }

    public function edit($id)
    {
        $set = Set::findOrFail($id);
        $collections = Collection::orderBy('position', 'asc')->get();

        return view('admin::admin.sets.edit', compact('set', 'collections'));
    }

    public function update(Request $request, $id)
    {
        $toValidate = [];
        foreach ($this->langs as $lang){
            $toValidate['title_'.$lang->lang] = 'required|max:255';
        }

        $validator = $this->validate($request, $toValidate);

        foreach ($this->langs as $lang):
            $image[$lang->lang] = '';
            if ($request->file('image_'. $lang->lang)) {
              $image[$lang->lang] = time() . '-' . $request->file('image_'. $lang->lang)->getClientOriginalName();
              $request->file('image_'. $lang->lang)->move('images/sets', $image[$lang->lang]);
            }else{
                if ($request->get('old_image_'. $lang->lang)) {
                    $image[$lang->lang] = $request->get('old_image_'. $lang->lang);
                }
            }
        endforeach;

        if ($request->on_home == 'on') {
            $onHome = 1;
        } else {
            $onHome = 0;
        }

        if ($request->active == 'on') { $active = 1; }
        else { $active = 0; }

        $set = Set::findOrFail($id);
        $set->collection_id = request('collection_id');
        $set->alias = str_slug(request('title_ro'));
        $set->price = request('price');
        $set->price_lei = request('price_lei');
        $set->discount = request('discount');
        $set->on_home = $onHome;
        $set->active = $active;
        $set->save();

        $set->translations()->delete();

        foreach ($this->langs as $lang):
            $set->translations()->create([
                'lang_id' => $lang->id,
                'name' => request('title_' . $lang->lang),
                'description' => request('description_' . $lang->lang),
                'image' => $image[$lang->lang],
                'seo_text' => request('seo_text_' . $lang->lang),
                'seo_title' => request('seo_title_' . $lang->lang),
                'seo_description' => request('seo_descr_' . $lang->lang),
                'seo_keywords' => request('seo_keywords_' . $lang->lang)
            ]);
        endforeach;

        $this->addPhotosVideos($request, $set);

        return redirect()->back();
    }

    public function addPhotosVideos($request, $set)
    {
        if($files = $request->get('video')){
            $image = SetGallery::create([
                'set_id' =>  $set->id,
                'src' =>  $request->get('video'),
                'type' => 'video',
            ]);
        }

        if($files = $request->file('photos')){
            foreach($files as $key => $file){
                $uniqueId = uniqid();
                $name = $uniqueId.$file->getClientOriginalName();
                $image_resize = Image::make($file->getRealPath());
                $product_image_size = json_decode(file_get_contents(storage_path('globalsettings.json')), true)['crop']['product'];

                $image_resize->save(public_path('images/sets/og/' .$name), 75);
                $image_resize->resize($product_image_size[0]['bgfrom'], $product_image_size[0]['bgto'])->save('images/sets/bg/' .$name, 75);
                $image_resize->resize($product_image_size[1]['mdfrom'], $product_image_size[1]['mdto'])->save('images/sets/md/' .$name, 75);
                $image_resize->resize($product_image_size[2]['smfrom'], $product_image_size[2]['smto'])->save('images/sets/sm/' .$name, 85);

                $image = SetGallery::create([
                    'set_id' =>  $set->id,
                    'src' =>  $name,
                    'type' => 'photo',
                ]);
            }
        }
    }

    public function deleteGalleryItem($id)
    {
        $image = SetGallery::findOrFail($id);

        if (file_exists(public_path('images/sets/bg/'.$image->src))) {
            unlink(public_path('images/sets/bg/'.$image->src));
        }
        if (file_exists(public_path('images/sets/og/'.$image->src))) {
            unlink(public_path('images/sets/og/'.$image->src));
        }
        if (file_exists(public_path('images/sets/md/'.$image->src))) {
            unlink(public_path('images/sets/md/'.$image->src));
        }
        if (file_exists(public_path('images/sets/sm/'.$image->src))) {
            unlink(public_path('images/sets/sm/'.$image->src));
        }

        SetGallery::where('id', $id)->delete();

        return redirect()->back();
    }

    public function setMainGalleryItem($id)
    {
        $image = SetGallery::findOrFail($id);

        SetGallery::where('set_id', $image->set_id)->update([
            'main' => 0,
        ]);

        SetGallery::where('id', $image->id)->update([
            'main' => 1,
        ]);

        return redirect()->back();

    }

    public function changePosition()
    {
        $neworder = Input::get('neworder');
        $i = 1;
        $neworder = explode("&", $neworder);

        foreach ($neworder as $k => $v) {
            $id = str_replace("tablelistsorter[]=", "", $v);
            if (!empty($id)) {
                Set::where('id', $id)->update(['position' => $i]);
                $i++;
            }
        }
    }

    public function getByCollection($collection_id)
    {
        $sets = Set::where('collection_id', $collection_id)->orderBy('position', 'asc')->get();
        $collection = Collection::findOrFail($collection_id);

        return view('admin::admin.sets.index', compact('sets', 'collection'));
    }

    public function destroy($id)
    {
        $set = Set::findOrFail($id);
        $images = SetGallery::where('set_id', $id)->get();

        if (file_exists('/images/sets' . $set->banner)) {
            unlink('/images/sets' . $set->banner);
        }

        foreach ($this->langs as $lang):
            if (file_exists('/images/sets' . $set->translation($lang->id)->first()->image)) {
                unlink('/images/sets' . $set->translation($lang->id)->first()->image);
            }
            $set->translation($lang->id)->delete();
        endforeach;

        $set->delete();

        SetProducts::where('set_id', $set->id)->delete();

        if (count($images) > 0) {
            foreach ($images as $key => $image) {
                if (file_exists(public_path('images/sets/bg/'.$image->src))) {
                    unlink(public_path('images/sets/bg/'.$image->src));
                }
                if (file_exists(public_path('images/sets/og/'.$image->src))) {
                    unlink(public_path('images/sets/og/'.$image->src));
                }
                if (file_exists(public_path('images/sets/md/'.$image->src))) {
                    unlink(public_path('images/sets/md/'.$image->src));
                }
                if (file_exists(public_path('images/sets/sm/'.$image->src))) {
                    unlink(public_path('images/sets/sm/'.$image->src));
                }

                SetGallery::where('id', $image->id)->delete();
            }
        }

        session()->flash('message', 'Item has been deleted!');

        return redirect()->back();
    }

}

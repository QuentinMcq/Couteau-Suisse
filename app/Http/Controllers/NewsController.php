<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('user');

        return view('news.index', [
            'news' => $news
        ]);
    }


    public function create()
    {
        return view('news.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $new = new News();

        $new->title = $request->input('title');
        $new->department = $request->input('department');
        $new->user = Auth::user()->name;
        $new->informations = $request->input('informations');
        $new->url = $request->input('url');

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/images', $filename);
            $new->img = $filename;
        } else {
            $new->img = null;
        }

        $new->save();

        return redirect()->route('news.index')->with('success', 'L\'actualité a été créée avec succès.');
    }


    public function show($id)
    {
        if (is_numeric($id)) {
            $new = News::where('id', $id)->with('user')->first();

            if (strcmp($new->read_state, 'non lu') === 0) {
                $new->read_state = 'consulté';
                $new->save();
            }

            return view('news.show', [
                'new' => $new
            ]);
        }

        abort(404);
    }


    public function edit($id)
    {
        if (is_numeric($id)) {
            $new = News::where('id', $id)->with('user')->first();
            // $this->authorize('edit', $course);

            return view('news.edit', [
                'new' => $new,
            ]);
        } else {
            abort(404);
        }
        return 0;
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $new = News::find($id);

        $new->title = $request->input('title');
        $new->department = $request->input('department');
        $new->informations = $request->input('informations');
        $new->url = $request->input('url');

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/images', $filename);
            $new->img = $filename;
        } else {
            $new->img = null;
        }

        $new->save();

        return redirect()->route('news.index')->with('success', 'L\'actualité a été modifiée avec succès.');
    }


    public function destroy($id): RedirectResponse
    {
        $new = News::findOrFail($id);
        $new->delete();

        return redirect()->route('news.index')->with('success', 'L\'actualité a été supprimée avec succès.');
    }
}

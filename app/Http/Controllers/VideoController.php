<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Video;

class VideoController extends Controller
{
    /**
     * Просмотр списка видиофайлов пользователя
     *
     * @return View
     */
    public function index()
    {
        // получение всех видиофайлов пользователя
        // отсортированных по лайкам
        $items = Video::where('user_id', Auth::id())
            ->orderByDesc('likes')
            ->orderBy('dislikes')
            ->get();

        // передаем в представление данные переменной $items
        return view('videos.index', compact('items'));
    }


    /**
     * Вызов формы создания записи
     *
     * @return View
     */
    public function create()
    {
        return view('videos.create');
    }


    /**
     * Сохранение новой записи
     *
     * @param Request $request запрос
     *
     * @return RedirectResponse перенаправление
     */
    public function store(Request $request)
    {
        // подключаем диск с именем public
        $disk = Storage::disk('public');

        // получаем файл из формы
        $file = $request->file('video_file');
        // генерируем уникальное имя
        $name = time() . '_' . $file->getClientOriginalName();
        // сохраняем файл на диск
        $disk->putFileAs('', $file, $name);

        // сохранение записи, данные получены из $request
        Video::create(
            [
                'user_id' => Auth::id(),
                'title' => $request->title,
                'description' => $request->description,
                'category' => $request->category,
                'video_file' => $name,
            ]
        );

        // перенаправление
        return redirect()->route('videos.index');
    }


    /**
     * Просмотр видиофайлов
     *
     * @param int $id идентификатор видиофайлов
     *
     * @return View
     */
    public function show($id)
    {
        // поиск записи по id, если нет ошибка 404
        $item = Video::findOrFail($id);

        // передаем в представление данные переменной $item
        return view('videos.show', compact('item'));
    }
}

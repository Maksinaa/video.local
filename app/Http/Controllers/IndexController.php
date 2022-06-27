<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Comment;

class IndexController extends Controller
{
    /**
     * Просмотр списка видиофайлов пользователя
     *
     * @return View
     */
    public function index()
    {

        // отсортированных по лайкам
        $items = Video::where('restrictions', 'Без ограничений')
            ->orderByDesc('created_at')
            ->paginate(10);

        // передаем в представление данные переменной $items
        return view('index', compact('items'));
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
        $comments = Comment::where('video_id', $item->id)
            ->orderByDesc('created_at')
            ->get();

        // передаем в представление данные переменной $item
        return view('show', compact('item', 'comments'));
    }
    /**
     * like видиофайлов
     *
     * @param int $id идентификатор видиофайлов
     *
     * @return View
     */
    public function like($id)
    {
        // поиск записи по id, если нет ошибка 404
        $item = Video::findOrFail($id);
        //увеличиваем число лайков
        $item->likes = $item->likes + 1;
        $item->save();

        // возвращает назад
        return back();
    }
    /**
     * Dislike видиофайлов
     *
     * @param int $id идентификатор видиофайлов
     *
     * @return View
     */
    public function dislike($id)
    {
        // поиск записи по id, если нет ошибка 404
        $item = Video::findOrFail($id);
        //увеличиваем число dislike
        $item->dislikes = $item->dislikes + 1;
        $item->save();

        // возвращает назад
        return back();
    }
}

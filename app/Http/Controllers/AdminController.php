<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class AdminController extends Controller
{
    /**
     * Просмотр списка аудиофайлов пользователя
     *
     * @return View
     */
    public function index()
    {
        // получение всех аудиофайлов пользователя
        $items = Video::orderByDesc('created_at')
            ->get();

        // передаем в представление данные переменной $items
        return view('admins.index', compact('items'));
    }

    /**
     * Обновление
     *
     * @param Request $request запрос
     * @param int     $id      идентификатор
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // поиск записи по id, если нет ошибка 404
        $item = Video::findOrFail($id);
        // с помощью only можно оставить только выбранное поле
        $item->update($request->only('restrictions'));

        // перенаправление обратно
        return back();
    }
}

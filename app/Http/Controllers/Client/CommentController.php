<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show($id) {

        $comments = Comments::where('san_pham_id', $id)->where('trang_thai', 1)->get();
        // dd($comments);
        return view('client.comments', [
            'comments' => $comments
        ]);
    }
    public function store() {

        // dd(request()->all());
        $data = request()->validate([
            'san_pham_id' => 'required|integer|exists:tb_san_pham,id',
            'ten_nguoi_dung' => 'required|string|max:255',
            'noi_dung' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $data['ngay_binh_luan'] = date('Y-m-d H:i:s');
        $data['trang_thai'] = 1;

        $comments = new Comments();
        $comments->san_pham_id = $data['san_pham_id'];
        $comments->ten_nguoi_dung = $data['ten_nguoi_dung'];
        $comments->noi_dung = $data['noi_dung'];
        $comments->email = $data['email'];

        $comments->save();

        return redirect()->route('product', $data['san_pham_id'])->with('success', 'Thêm comment thành công !!!');
    }
}
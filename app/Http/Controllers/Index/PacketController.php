<?php

namespace App\Http\Controllers\Index;

use App\Models\Packet;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PacketController extends Controller
{
    public function detail($id)
    {
        $packet = Packet::where(['packet_id' => $id])->first();
        $relatedPacket = Packet::whereNotIn('packet_id', [$packet->packet_id])->get();
        $products = Product::all();
        $url = URL('/') . '/' . (Auth::user() ? Auth::user()->user_id : NULL) . '/' .
            \App\Http\Helpers::getTranslatedSlugRu((Auth::user() ? Auth::user()->login : null));
        return view('new_design.packet.detail', [
            'packet' => $packet,
            'relatedPacket' => $relatedPacket,
            'url' => $url,
            'products' => $products
        ]);

    }
}

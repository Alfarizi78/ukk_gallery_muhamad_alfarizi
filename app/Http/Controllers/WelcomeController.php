<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Agenda;
use App\Models\Album;
use App\Models\Event;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Ambil data berita
        $beritas = Berita::with('user')
            ->where('status', 'published')
            ->orderByDesc('is_featured')
            ->orderByDesc('created_at')
            ->take(5)
            ->get();

        // Ambil data agenda
        $agendas = Agenda::with('user')
            ->whereIn('status', ['upcoming', 'ongoing'])
            ->orderBy('tanggal_mulai', 'asc')
            ->take(5)
            ->get();

        // Ambil data kategori untuk galeri
        $kategoris = Kategori::with(['albums' => function($query) {
            $query->whereNull('parent_id');
        }, 'albums.photos'])->get();

        // Ambil semua album untuk tampilan default
        $allAlbums = Album::with(['photos', 'kategori'])
            ->whereNull('parent_id')  // Hanya album utama
            ->latest()
            ->take(8)  // Batasi 8 album terbaru
            ->get();

        // Hitung total foto untuk setiap kategori
        $kategoris->each(function($kategori) {
            $kategori->total_photos = $kategori->albums->sum(function($album) {
                return $album->photos->count();
            });
        });

        // Ambil events yang masih aktif (dalam 1 bulan)
        $events = Event::with('user')
            ->where('event_date', '>=', now())
            ->where('event_date', '<=', now()->addMonth())
            ->orderBy('event_date', 'asc')
            ->take(2)
            ->get();

        // Hitung jumlah events berdasarkan status
        $upcomingCount = Event::where('status', 'upcoming')->count();
        $ongoingCount = Event::where('status', 'ongoing')->count();
        $completedCount = Event::where('status', 'completed')->count();

        return view('welcome', compact('beritas', 'kategoris', 'agendas', 'allAlbums', 'events', 
            'upcomingCount', 'ongoingCount', 'completedCount'));
    }

    // Tambahkan method untuk pencarian album
    public function searchAlbums(Request $request)
    {
        $query = $request->get('query');
        
        $albums = Album::with(['photos', 'kategori'])
            ->where('album_name', 'like', "%{$query}%")
            ->orWhereHas('kategori', function($q) use ($query) {
                $q->where('kategori_judul', 'like', "%{$query}%");
            })
            ->latest()
            ->get();

        return response()->json([
            'albums' => $albums->map(function($album) {
                return [
                    'id' => $album->album_id,
                    'name' => $album->album_name,
                    'cover' => $album->cover_image,
                    'photos_count' => $album->photos->count(),
                    'category' => $album->kategori->kategori_judul,
                    'description' => $album->description
                ];
            })
        ]);
    }

    public function showAlbum(Album $album)
    {
        // Load relasi yang diperlukan
        $album->load(['photos', 'children', 'parent', 'kategori']);
        
        // Breadcrumb data
        $breadcrumbs = collect();
        $currentAlbum = $album;
        while ($currentAlbum->parent) {
            $breadcrumbs->prepend($currentAlbum->parent);
            $currentAlbum = $currentAlbum->parent;
        }

        return view('album.show', compact('album', 'breadcrumbs'));
    }
} 
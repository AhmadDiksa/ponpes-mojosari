<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\ProgramPendidikan;

class ProgramComposer
{
    /**
     * Data program yang akan dibagikan ke view.
     * Dibuat sebagai properti untuk caching jika diperlukan di masa depan.
     */
    protected $programs;

    /**
     * Create a new program composer.
     */
    public function __construct()
    {
        // Ambil semua data program, kelompokkan berdasarkan kategori.
        // Ini hanya akan dieksekusi sekali per request.
        $this->programs = ProgramPendidikan::orderBy('nama', 'asc')->get()->groupBy('kategori');
    }

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        // Kirim data dengan nama variabel 'programsForMenu' ke view.
        $view->with('programsForMenu', $this->programs);
    }
}
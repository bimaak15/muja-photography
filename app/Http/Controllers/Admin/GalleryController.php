<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GalleryController extends Controller
{
    /**
     * Default presets for the 17 homepage gallery positions.
     *
     * @var array<int, array{title: string, category: string, path: string}>
     */
    public const DEFAULT_PRESETS = [
        1 => ['title' => 'Graduation Portrait', 'category' => 'Graduation', 'path' => 'img/hero/mjp_2866.webp'],
        2 => ['title' => 'Studio Monochrome', 'category' => 'Portrait', 'path' => 'img/hero/mjp_2599.webp'],
        3 => ['title' => 'Couple Elegant', 'category' => 'Prewedding', 'path' => 'img/hero/mjp_2862.webp'],
        4 => ['title' => 'Creative Fashion', 'category' => 'Fashion', 'path' => 'img/hero/mjp_2682.webp'],
        5 => ['title' => 'Classic Editorial', 'category' => 'Editorial', 'path' => 'img/hero/mjp_2614.webp'],
        6 => ['title' => 'Warm Portrait', 'category' => 'Portrait', 'path' => 'img/hero/mjp_2609.webp'],
        7 => ['title' => 'Editorial Glamour', 'category' => 'Editorial', 'path' => 'img/hero/mjp_2866.webp'],
        8 => ['title' => 'Minimalist Silhouette', 'category' => 'Artistic', 'path' => 'img/hero/mjp_2599.webp'],
        9 => ['title' => 'Golden Hour Magic', 'category' => 'Prewedding', 'path' => 'img/hero/mjp_2862.webp'],
        10 => ['title' => 'Vintage Aesthetic', 'category' => 'Vintage', 'path' => 'img/hero/mjp_2682.webp'],
        11 => ['title' => 'Fine Art Studio', 'category' => 'Fine Art', 'path' => 'img/hero/mjp_2614.webp'],
        12 => ['title' => 'Modern Family', 'category' => 'Family', 'path' => 'img/hero/mjp_2609.webp'],
        13 => ['title' => 'High Key Beauty', 'category' => 'Beauty', 'path' => 'img/hero/mjp_2866.webp'],
        14 => ['title' => 'Urban Portrait', 'category' => 'Urban', 'path' => 'img/hero/mjp_2599.webp'],
        15 => ['title' => 'Prewedding Serenity', 'category' => 'Prewedding', 'path' => 'img/hero/mjp_2862.webp'],
        16 => ['title' => 'Artistic Grain', 'category' => 'Artistic', 'path' => 'img/hero/mjp_2682.webp'],
        17 => ['title' => 'Cinematic Mood', 'category' => 'Cinematic', 'path' => 'img/hero/mjp_2614.webp'],
    ];

    /**
     * Display gallery management page with all 17 slots.
     */
    public function index(): View
    {
        // Ensure all 17 slots exist
        $items = GalleryItem::orderBy('position')->get()->keyBy('position');

        for ($pos = 1; $pos <= 17; $pos++) {
            if (! isset($items[$pos])) {
                $preset = self::DEFAULT_PRESETS[$pos] ?? [
                    'title' => "Slot #{$pos}",
                    'category' => 'Portfolio',
                    'path' => 'img/hero/mjp_2866.webp',
                ];

                $created = GalleryItem::create([
                    'position' => $pos,
                    'title' => $preset['title'],
                    'category' => $preset['category'],
                    'image_path' => $preset['path'],
                    'alt_text' => $preset['title'],
                    'is_active' => true,
                    'sort_order' => $pos,
                ]);

                $items[$pos] = $created;
            }
        }

        $items = $items->sortBy('position')->values();

        $stats = [
            'total' => 17,
            'active' => $items->where('is_active', true)->count(),
            'custom_uploads' => $items->filter(fn ($item) => str_starts_with($item->image_path, 'storage/'))->count(),
            'categories' => $items->pluck('category')->unique()->filter()->count(),
        ];

        return view('admin.gallery', compact('items', 'stats'));
    }

    /**
     * Update an individual gallery slot.
     */
    public function update(Request $request, GalleryItem $galleryItem): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:100'],
            'is_active' => ['nullable', 'boolean'],
            'image_file' => ['nullable', 'file', 'mimes:jpeg,png,jpg,webp,avif', 'max:10240'],
            'image_url' => ['nullable', 'string', 'max:1000'],
        ]);

        $updateData = [
            'title' => $validated['title'] ?? $galleryItem->title,
            'category' => $validated['category'] ?? $galleryItem->category,
            'is_active' => $request->boolean('is_active'),
        ];

        // Handle uploaded file
        if ($request->hasFile('image_file')) {
            // Delete old custom storage image if applicable
            if (str_starts_with($galleryItem->image_path, 'storage/gallery/')) {
                $oldPath = str_replace('storage/', '', $galleryItem->image_path);
                Storage::disk('public')->delete($oldPath);
            }

            $storedPath = $request->file('image_file')->store('gallery', 'public');
            $updateData['image_path'] = 'storage/'.$storedPath;
        } elseif (! empty($validated['image_url'])) {
            $updateData['image_path'] = trim($validated['image_url']);
        }

        $galleryItem->update($updateData);

        return redirect()->route('admin.gallery')->with('success', "Slot #{$galleryItem->position} berhasil diperbarui.");
    }

    /**
     * Reset a single slot to its original default preset.
     */
    public function reset(GalleryItem $galleryItem): RedirectResponse
    {
        $preset = self::DEFAULT_PRESETS[$galleryItem->position] ?? null;

        if ($preset) {
            // Delete old uploaded file from storage if applicable
            if (str_starts_with($galleryItem->image_path, 'storage/gallery/')) {
                $oldPath = str_replace('storage/', '', $galleryItem->image_path);
                Storage::disk('public')->delete($oldPath);
            }

            $galleryItem->update([
                'title' => $preset['title'],
                'category' => $preset['category'],
                'image_path' => $preset['path'],
                'alt_text' => $preset['title'],
                'is_active' => true,
            ]);
        }

        return redirect()->route('admin.gallery')->with('success', "Slot #{$galleryItem->position} dikembalikan ke preset default.");
    }

    /**
     * Reset all 17 slots to their factory default presets.
     */
    public function resetAll(): RedirectResponse
    {
        foreach (self::DEFAULT_PRESETS as $pos => $preset) {
            $item = GalleryItem::where('position', $pos)->first();

            if ($item) {
                if (str_starts_with($item->image_path, 'storage/gallery/')) {
                    $oldPath = str_replace('storage/', '', $item->image_path);
                    Storage::disk('public')->delete($oldPath);
                }

                $item->update([
                    'title' => $preset['title'],
                    'category' => $preset['category'],
                    'image_path' => $preset['path'],
                    'alt_text' => $preset['title'],
                    'is_active' => true,
                ]);
            }
        }

        return redirect()->route('admin.gallery')->with('success', 'Semua 17 slot galeri berhasil direset ke preset default.');
    }
}

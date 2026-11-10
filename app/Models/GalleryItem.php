<?php

namespace App\Models;

use Database\Factories\GalleryItemFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    /** @use HasFactory<GalleryItemFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'position',
        'title',
        'category',
        'image_path',
        'alt_text',
        'is_active',
        'sort_order',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'position' => 'integer',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    /**
     * Get accessible URL for the gallery image.
     *
     * @return Attribute<string, never>
     */
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: function (): string {
                $path = (string) $this->image_path;

                if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
                    return $path;
                }

                if (str_starts_with($path, 'img/') || str_starts_with($path, 'images/') || str_starts_with($path, 'assets/')) {
                    return asset($path);
                }

                if (str_starts_with($path, 'storage/')) {
                    return asset($path);
                }

                return asset('storage/'.ltrim($path, '/'));
            }
        );
    }
}

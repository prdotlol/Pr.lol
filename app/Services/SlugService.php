<?php

namespace App\Services;

use Illuminate\Support\Str;

class SlugService
{
    public function createUniqueSlug($modelClass, $value)
    {
        $slug = Str::slug($value, '-');
        $allSlugs = $this->getRelatedSlugs($modelClass, $slug);

        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }

        throw new Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($modelClass, $slug)
    {
        return $modelClass::select('slug')->where('slug', 'like', $slug.'%')->get();
    }
}

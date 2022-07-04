<?php

declare(strict_types=1);


namespace Pandawa\ModelCaching\Model;

use GeneaLabs\LaravelModelCaching\CachedBelongsToMany;
use GeneaLabs\LaravelModelCaching\Traits\Cachable as BaseCachable;
use GeneaLabs\LaravelModelCaching\Traits\ModelCaching;
use Illuminate\Database\Eloquent\Builder as BaseBuilder;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany as BaseBelongsToMany;
use Pandawa\Component\Ddd\AbstractModel;
use Pandawa\Component\Ddd\Relationship\BelongsToMany;

/**
 * @mixin AbstractModel
 *
 * @author  Adi Putra <adiputrapermana@gmail.com>
 */
trait Cachable
{
    use ModelCaching;
    use BaseCachable {
        ModelCaching::newEloquentBuilder insteadof BaseCachable;
    }

    /**
     * {@inheritdoc}
     */
    protected function newBelongsToMany(BaseBuilder $query, BaseModel $parent, $table, $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey, $relationName = null): BaseBelongsToMany|BelongsToMany|CachedBelongsToMany
    {
        return parent::newBelongsToMany($query, $parent, $table, $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey, $relationName);
    }
}
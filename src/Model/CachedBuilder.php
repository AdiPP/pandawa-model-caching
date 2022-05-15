<?php

declare(strict_types=1);


namespace Pandawa\ModelCaching\Model;

use Closure;
use GeneaLabs\LaravelModelCaching\CachedBuilder as BaseCachedBuilder;

/**
 * @author  Adi Putra <adiputrapermana@gmail.com>
 */
class CachedBuilder extends BaseCachedBuilder
{
    protected function eagerLoadRelation(array $models, $name, Closure $constraints)
    {
        $models = array_map(fn($model) => $model->getMappedModel(), $models);
        $relation = $this->getRelation($name);

        $relation->addEagerConstraints($models);

        $constraints($relation);

        return $relation->match(
            $relation->initRelation($models, $name),
            $relation->getEager(), $name
        );
    }
}
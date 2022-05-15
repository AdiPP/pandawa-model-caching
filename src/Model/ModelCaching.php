<?php

declare(strict_types=1);


namespace Pandawa\ModelCaching\Model;

use GeneaLabs\LaravelModelCaching\Traits\ModelCaching as BaseModelCaching;
use Pandawa\Reloquent\Builder;

/**
 * @mixin Cachable
 *
 * @author  Adi Putra <adiputrapermana@gmail.com>
 */
trait ModelCaching
{
    use BaseModelCaching;

    public function newEloquentBuilder($query)
    {
        if (! $this->isCachable()) {
            $this->isCachable = false;

            return new Builder($query);
        }

        return new CachedBuilder($query);
    }
}
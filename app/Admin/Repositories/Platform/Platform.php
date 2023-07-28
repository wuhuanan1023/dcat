<?php

namespace App\Admin\Repositories\Platform;

use App\Models\Devops\Platform\Platform as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Platform extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}

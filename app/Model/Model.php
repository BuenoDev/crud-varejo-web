<?php
/** Modelo padrão para execução de tarefas no banco de dados */

namespace Varejo\Model;

use Varejo\Traits\ConnTrait;

abstract class Model{
    use ConnTrait;
}
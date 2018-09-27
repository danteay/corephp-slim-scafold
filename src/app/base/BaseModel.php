<?php
/**
 * Base Model taht contains all the configurations that will be shared betwen all
 * the models
 *
 * PHP Version 7.1
 *
 * @category  Scafolding
 * @package   CorePHP_Slim_Scafold
 * @author    Eduardo Aguilar <dante.aguilar41@gmail.com>
 * @copyright 2018 Eduardo Aguilar
 * @license   https://github.com/danteay/corephp-slim-scafold/LICENSE Apache-2
 * @link      https://github.com/danteay/corephp-slim-scafold
 */

namespace Base;

use Illuminate\Database\Eloquent\Model;

/**
 * BaseModel
 *
 * @category  Base
 * @package   CorePHP_Slim_Scafold
 * @author    Eduardo Aguilar <dante.aguilar41@gmail.com>
 * @copyright 2018 Eduardo Aguilar
 * @license   https://github.com/danteay/corephp-slim-scafold/LICENSE Apache-2
 * @link      https://github.com/danteay/corephp-slim-scafold
 */
class BaseModel extends Model
{
    /**
     * Table name to map
     *
     * @var string
     */
    protected $table;

    /**
     * Datetime format definition
     *
     * @return string Date format
     */
    public function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }
}

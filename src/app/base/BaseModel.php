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

    /**
     * Scope for pagination return
     *
     * @param mixed   $query Current query scope
     * @param integer $limit Total of elements to retrive by page
     * @param integer $page  Page to retrive
     * @param boolean $links Return array links to generate pagination nav
     *
     * @return mixed
     */
    public function scopePagination($query, $limit=100, $page=1, $links=false)
    {
        $total = $query->count();
        $pages = ceil(floatval($total) / floatval($limit));

        $page = ($page <= 0) ? 1 : $page;
        $page = ($page > $pages) ? $pages : $page;

        $offset = ($page - 1) * $limit;

        $items = $query->skip($offset)
            ->take($limit)
            ->get();

        $pagination = [
            'limit' => $limit,
            'pages' => $pages,
            'total' => $total,
            'page' => $page,
        ];

        if ($links) {
            $pagination['links'] = Utils::links($page, $pages);
        }

        $data = [
            'data' => $items,
            'pages' => $pagination
        ];

        return $data;
    }
}

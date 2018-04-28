<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SubProductOut Entity
 *
 * @property int $id
 * @property int $product_id
 * @property int $out_id
 * @property int $cost_per_unit
 * @property int $amount
 * @property int $total_cost
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Out $out
 */
class SubProductOut extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'product_id' => true,
        'out_id' => true,
        'cost_per_unit' => true,
        'amount' => true,
        'total_cost' => true,
        'product' => true,
        'out' => true
    ];
}

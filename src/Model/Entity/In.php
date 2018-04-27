<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * In Entity
 *
 * @property int $id
 * @property int $product_id
 * @property int $supplier_id
 * @property int $amount
 * @property int $cost_per_unit
 * @property int $total_cost
 * @property string $description
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Supplier $supplier
 */
class In extends Entity
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
        'supplier_id' => true,
        'amount' => true,
        'cost_per_unit' => true,
        'total_cost' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'product' => true,
        'supplier' => true
    ];
}

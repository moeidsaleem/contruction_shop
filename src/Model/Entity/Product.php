<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $type_id
 * @property int $supplier_id
 * @property string $price
 * @property string $brand
 * @property int $amount
 * @property string $unit
 * @property string $description
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\Supplier $supplier
 * @property \App\Model\Entity\In[] $ins
 * @property \App\Model\Entity\SubProductOut[] $sub_product_outs
 */
class Product extends Entity
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
        'code' => true,
        'name' => true,
        'type_id' => true,
        'supplier_id' => true,
        'price' => true,
        'brand' => true,
        'amount' => true,
        'unit' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'type' => true,
        'supplier' => true,
        'ins' => true,
        'sub_product_outs' => true
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Out Entity
 *
 * @property int $id
 * @property int $client_id
 * @property int $total_cost
 * @property int $paid
 * @property int $remained
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\SubProductOut[] $sub_product_outs
 */
class Out extends Entity
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
        'client_id' => true,
        'total_cost' => true,
        'paid' => true,
        'remained' => true,
        'created' => true,
        'modified' => true,
        'client' => true,
        'sub_product_outs' => true
    ];
}

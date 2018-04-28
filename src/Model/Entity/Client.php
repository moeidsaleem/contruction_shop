<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $phone
 * @property string $address
 * @property string $description
 * @property int $debt_amount
 * @property \Cake\I18n\Time $debt_due
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Out[] $outs
 */
class Client extends Entity
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
        'phone' => true,
        'address' => true,
        'description' => true,
        'debt_amount' => true,
        'debt_due' => true,
        'created' => true,
        'modified' => true,
        'outs' => true
    ];
}

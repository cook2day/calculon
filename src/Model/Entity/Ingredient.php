<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ingredient Entity
 *
 * @property int $ID
 * @property string $NAME
 * @property int $COOK_UNIT
 * @property int $SHOP_UNIT
 * @property float $QC_UNIT
 * @property float $QS_UNIT
 */
class Ingredient extends Entity
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
        '*' => true,
        'ID' => false
    ];
}

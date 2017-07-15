<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Doaco Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property int $pessoa_id
 * @property int $produtos_doacoes_id
 *
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property \App\Model\Entity\Produto $produto
 */
class Doacao extends Entity
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
        'id' => false
    ];
}

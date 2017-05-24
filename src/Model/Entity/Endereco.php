<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Endereco Entity
 *
 * @property int $id
 * @property string $logradouro
 * @property string $bairro
 * @property string $complemento
 * @property int $numero
 * @property int $cidade_id
 *
 * @property \App\Model\Entity\Cidade $cidade
 * @property \App\Model\Entity\Pessoa[] $pessoas
 * @property \App\Model\Entity\Sede[] $sedes
 */
class Endereco extends Entity
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

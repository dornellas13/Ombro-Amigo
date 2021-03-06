<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pessoa Entity
 *
 * @property int $id
 * @property string $nome_razao_social
 * @property string $telefone
 * @property string $celular
 * @property int $endereco_id
 *
 * @property \App\Model\Entity\Endereco $endereco
 * @property \App\Model\Entity\Doaco[] $doacoes
 * @property \App\Model\Entity\Solicitaco[] $solicitacoes
 * @property \App\Model\Entity\User[] $users
 */
class Pessoa extends Entity
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

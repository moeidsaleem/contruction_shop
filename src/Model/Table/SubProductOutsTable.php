<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SubProductOuts Model
 *
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\OutsTable|\Cake\ORM\Association\BelongsTo $Outs
 *
 * @method \App\Model\Entity\SubProductOut get($primaryKey, $options = [])
 * @method \App\Model\Entity\SubProductOut newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SubProductOut[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SubProductOut|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubProductOut patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SubProductOut[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SubProductOut findOrCreate($search, callable $callback = null, $options = [])
 */
class SubProductOutsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('sub_product_outs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id'
        ]);
        $this->belongsTo('Outs', [
            'foreignKey' => 'out_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('cost_per_unit')
            ->allowEmpty('cost_per_unit');

        $validator
            ->integer('amount')
            ->allowEmpty('amount');

        $validator
            ->integer('total_cost')
            ->allowEmpty('total_cost');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['out_id'], 'Outs'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\TypesTable|\Cake\ORM\Association\BelongsTo $Types
 * @property \App\Model\Table\SuppliersTable|\Cake\ORM\Association\BelongsTo $Suppliers
 * @property \App\Model\Table\InsTable|\Cake\ORM\Association\HasMany $Ins
 * @property \App\Model\Table\SubProductOutsTable|\Cake\ORM\Association\HasMany $SubProductOuts
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table
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

        $this->setTable('products');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

//        $this->belongsTo('Types', [
//            'foreignKey' => 'type_id'
//        ]);
//        $this->belongsTo('Suppliers', [
//            'foreignKey' => 'supplier_id'
//        ]);
//        $this->hasMany('Ins', [
//            'foreignKey' => 'product_id'
//        ]);
//        $this->hasMany('SubProductOuts', [
//            'foreignKey' => 'product_id'
//        ]);
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
            ->scalar('code')
            ->maxLength('code', 20)
            ->allowEmpty('code');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->allowEmpty('name');

        $validator
            ->scalar('price')
            ->maxLength('price', 255)
            ->allowEmpty('price');

        $validator
            ->scalar('brand')
            ->maxLength('brand', 30)
            ->allowEmpty('brand');

        $validator
            ->integer('amount')
            ->allowEmpty('amount');

        $validator
            ->scalar('unit')
            ->maxLength('unit', 50)
            ->allowEmpty('unit');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

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
//        $rules->add($rules->existsIn(['type_id'], 'Types'));
//        $rules->add($rules->existsIn(['supplier_id'], 'Suppliers'));

        return $rules;
    }
}

<?php

use App\Damage\DamageBase;
use App\Damage\TypeModifier;
use App\AttackType;

class DamageTest extends TestCase
{
    public function testInflictNormalDamage()
    {
        $damage = new DamageBase(1, 1, 1, 1);
        $damage = new TypeModifier($damage);

        $damage->setTypes(AttackType::TYPE_NORMAL, AttackType::TYPE_NORMAL);
        $this->assertEquals(2.048, $damage->calculate());
    }

    public function testInflictDoubleDamage()
    {
        $damage = new DamageBase(1, 1, 1, 1);
        $damage = new TypeModifier($damage);

        $damage->setTypes(AttackType::TYPE_FIRE, AttackType::TYPE_GRASS);
        $this->assertEquals(4.096, $damage->calculate());
    }

    public function testInflictHalfDamage()
    {
        $damage = new DamageBase(1, 1, 1, 1);
        $damage = new TypeModifier($damage);

        $damage->setTypes(AttackType::TYPE_FIRE, AttackType::TYPE_WATER);
        $this->assertEquals(1.024, $damage->calculate());
    }

    public function testInflictNoDamage()
    {
        $damage = new DamageBase(1, 1, 1, 1);
        $damage = new TypeModifier($damage);

        $damage->setTypes(AttackType::TYPE_NORMAL, AttackType::TYPE_GHOST);
        $this->assertEquals(0, $damage->calculate());
    }
}
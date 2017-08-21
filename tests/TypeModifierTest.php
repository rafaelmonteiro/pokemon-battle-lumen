<?php

use App\DamageType;
use App\TypeModifier;

class TypeModifierTest extends TestCase
{

    public function testNormalModifier()
    {
        $damageType = DamageType::NORMAL;
        $typeModifier = new TypeModifier($damageType);

        $this->assertEquals($damageType, $typeModifier->getId());
        $this->assertEquals('NORMAL', $typeModifier->getDescription());
        $this->assertEquals(10, $typeModifier->getMultiplier());
    }

    public function testMissedModifier()
    {
        $damageType = DamageType::MISSED;
        $typeModifier = new TypeModifier($damageType);

        $this->assertEquals($damageType, $typeModifier->getId());
        $this->assertEquals('(Missed!)', $typeModifier->getDescription());
        $this->assertEquals(0, $typeModifier->getMultiplier());
    }

    public function testCriticalModifier()
    {
        $damageType = DamageType::CRITICAL;
        $typeModifier = new TypeModifier($damageType);

        $this->assertEquals($damageType, $typeModifier->getId());
        $this->assertEquals('(CRITICAL Hit!)', $typeModifier->getDescription());
        $this->assertEquals(1.8, $typeModifier->getMultiplier());
    }

    public function testDoubleModifier()
    {
        $damageType = DamageType::DOUBLE_DAMAGE;
        $typeModifier = new TypeModifier($damageType);

        $this->assertEquals($damageType, $typeModifier->getId());
        $this->assertEquals("It's super effective!", $typeModifier->getDescription());
        $this->assertEquals(20, $typeModifier->getMultiplier());
    }

    public function testHalfModifier()
    {
        $damageType = DamageType::HALF_DAMAGE;
        $typeModifier = new TypeModifier($damageType);

        $this->assertEquals($damageType, $typeModifier->getId());
        $this->assertEquals("It's not very effective... ", $typeModifier->getDescription());
        $this->assertEquals(2.5, $typeModifier->getMultiplier());
    }

    public function testNoDamageModifier()
    {
        $damageType = DamageType::NO_DAMAGE;
        $typeModifier = new TypeModifier($damageType);

        $this->assertEquals($damageType, $typeModifier->getId());
        $this->assertEquals("It's not effective ", $typeModifier->getDescription());
        $this->assertEquals(0, $typeModifier->getMultiplier());
    }

    public function testCriticalDoubleModifier()
    {
        $damageType = DamageType::CRITICAL_2XDAMAGE;
        $typeModifier = new TypeModifier($damageType);

        $this->assertEquals($damageType, $typeModifier->getId());
        $this->assertEquals('Not implemented', $typeModifier->getDescription());
        $this->assertEquals(0, $typeModifier->getMultiplier());
    }

    public function testCriticalHalfDamageModifier()
    {
        $damageType = DamageType::CRITICAL_HALF_DAMAGE;
        $typeModifier = new TypeModifier($damageType);

        $this->assertEquals($damageType, $typeModifier->getId());
        $this->assertEquals('Not implemented', $typeModifier->getDescription());
        $this->assertEquals(0, $typeModifier->getMultiplier());
    }

    public function testDefineCritical()
    {
        $typeModifier = new TypeModifier(DamageType::NORMAL);
        $typeModifier->defineCritical();

        $this->assertEquals(DamageType::CRITICAL, $typeModifier->getId());
        $this->assertEquals('(CRITICAL Hit!)', $typeModifier->getDescription());
        $this->assertEquals(1.8, $typeModifier->getMultiplier());
    }

    public function testDefineMissed()
    {
        $typeModifier = new TypeModifier(DamageType::NORMAL);
        $typeModifier->defineMissed();

        $this->assertEquals(DamageType::MISSED, $typeModifier->getId());
        $this->assertEquals('(Missed!)', $typeModifier->getDescription());
        $this->assertEquals(0, $typeModifier->getMultiplier());
    }
}

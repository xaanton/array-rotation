<?php

declare(strict_types=1);


namespace Xeanton\ArrayRotation;

use PHPUnit\Framework\TestCase;
use Xeanton\ArrayRotation\Factory\HardcodedFactory;

class FinalTest extends TestCase
{
    /**
     * @var ArrayRotation
     */
    protected $arrayRotationApp;

    protected function setUp() : void
    {
        $this->arrayRotationApp = new ArrayRotation();
    }

    public function addDataProvider()
    {
        $factory = new HardcodedFactory();

        return [
            /*0*/ ['aegj', $factory, '286/435/971'],
            /*1*/ ['a', $factory, '231/456/789'],
            /*2*/ ['e', $factory, '183/426/759'],
            /*3*/ ['g', $factory, '123/456/978'],
            /*4*/ ['j', $factory, '126/459/783'],
            /*5*/ ['bb', $factory, '123/645/789'],
            /*6*/ ['jjj', $factory, '123/456/789'],
            /*7*/ ['bd', $factory, '723/164/589'],
            /*8*/ ['ah', $factory, '231/645/789'],
            /*9*/ ['bj', $factory, '124/569/783'],
            /*10*/ ['db', $factory, '723/561/489'],
            /*11*/ ['dh', $factory, '723/615/489'],
            /*12*/ ['dl', $factory, '123/456/789'],
            /*13*/ ['hc', $factory, '123/645/897'],
            /*14*/ ['gf', $factory, '128/453/976'],
            /*15*/ ['hl', $factory, '623/745/189'],
            /*16*/ ['ja', $factory, '261/459/783'],
            /*17*/ ['ld', $factory, '123/456/789'],
            /*18*/ ['ki', $factory, '315/486/729'],
            /*19*/ ['lfa', $factory, '294/753/186'],
            /*20*/ ['kga', $factory, '531/486/972'],
            /*21*/ ['dbi', $factory, '372/561/489'],
            /*22*/ ['che', $factory, '193/625/847'],
            /*23*/ ['iea', $factory, '823/416/759'],
            /*24*/ ['gbl', $factory, '523/964/178'],
            /*25*/ ['egj', $factory, '186/425/973'],
            /*26*/ ['jcf', $factory, '127/456/839'],
            /*27*/ ['djh', $factory, '726/915/483'],
            /*28*/ ['hld', $factory, '123/645/789'],
            /*29*/ ['leeh', $factory, '453/678/129'],
            /*30*/ ['heja', $factory, '851/629/743'],
            /*31*/ ['cakh', $factory, '251/649/837'],
            /*32*/ ['bhjik', $factory, '652/489/713'],
            /*33*/ ['eabji', $factory, '483/269/751'],
            /*34*/ ['cdbch', $factory, '823/156/974'],
            /*35*/ ['ckgajc', $factory, '536/492/817'],
            /*36*/ ['ggchha', $factory, '231/564/978'],
            /*37*/ ['gfbkeg', $factory, '128/534/697'],
            /*38*/ ['agfbcbf', $factory, '239/148/765'],
            /*39*/ ['ekahijf', $factory, '123/645/789'],
            /*40*/ ['hajdjbe', $factory, '789/432/615'],
            /*41*/ ['elgililj', $factory, '976/325/814'],
            /*42*/ ['chffefif', $factory, '317/629/845'],
            /*43*/ ['ilbbihak', $factory, '462/587/319'],
            /*44*/ ['abcdefghijkl', $factory, '123/456/789'],
            /*45*/ ['hkijbglfaced', $factory, '768/125/493'],
            /*46*/ ['dfkbjiechlga', $factory, '256/387/419'],
            /*47*/ ['hgfkbidlajce', $factory, '186/745/239'],
            /*48*/ ['baciefjhgkdl', $factory, '153/482/796']
        ];
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testFinalResult($commands, $factory, $expected) : void
    {
        $actual = $this->arrayRotationApp->run($commands, $factory)->toString();
        $this->assertSame($expected, $actual);
    }
}

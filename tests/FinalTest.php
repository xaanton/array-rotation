<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-05
 * Time: 11:05
 */

namespace Xeanton\ArrayRotation;

use FunctionalTest;
use PHPUnit\Framework\TestCase;
use Xeanton\ArrayRotation\Factory\HardcodedFactory;

class FinalTest extends TestCase
{
    /**
     * @var ArrayRotation
     */
    protected $arrayRotationApp;

    protected function setUp(): void
    {
        $this->arrayRotationApp = new ArrayRotation();
    }

    public function addDataProvider()
    {
        $factory = new HardcodedFactory();
        return array(
            /*0*/ array( "aegj", $factory, "286/435/971" ),
            /*1*/ array( "a", $factory, "231/456/789" ),
            /*2*/ array( "e", $factory, "183/426/759" ),
            /*3*/ array( "g", $factory, "123/456/978" ),
            /*4*/ array( "j", $factory, "126/459/783" ),
            /*5*/ array( "bb", $factory, "123/645/789" ),
            /*6*/ array( "jjj", $factory, "123/456/789" ),
            /*7*/ array( "bd", $factory, "723/164/589" ),
            /*8*/ array( "ah", $factory, "231/645/789" ),
            /*9*/ array( "bj", $factory, "124/569/783" ),
            /*10*/ array( "db", $factory, "723/561/489" ),
            /*11*/ array( "dh", $factory, "723/615/489" ),
            /*12*/ array( "dl", $factory, "123/456/789" ),
            /*13*/ array( "hc", $factory, "123/645/897" ),
            /*14*/ array( "gf", $factory, "128/453/976" ),
            /*15*/ array( "hl", $factory, "623/745/189" ),
            /*16*/ array( "ja", $factory, "261/459/783" ),
            /*17*/ array( "ld", $factory, "123/456/789" ),
            /*18*/ array( "ki", $factory, "315/486/729" ),
            /*19*/ array( "lfa", $factory, "294/753/186" ),
            /*20*/ array( "kga", $factory, "531/486/972" ),
            /*21*/ array( "dbi", $factory, "372/561/489" ),
            /*22*/ array( "che", $factory, "193/625/847" ),
            /*23*/ array( "iea", $factory, "823/416/759" ),
            /*24*/ array( "gbl", $factory, "523/964/178" ),
            /*25*/ array( "egj", $factory, "186/425/973" ),
            /*26*/ array( "jcf", $factory, "127/456/839" ),
            /*27*/ array( "djh", $factory, "726/915/483" ),
            /*28*/ array( "hld", $factory, "123/645/789" ),
            /*29*/ array( "leeh", $factory, "453/678/129" ),
            /*30*/ array( "heja", $factory, "851/629/743" ),
            /*31*/ array( "cakh", $factory, "251/649/837" ),
            /*32*/ array( "bhjik", $factory, "652/489/713" ),
            /*33*/ array( "eabji", $factory, "483/269/751" ),
            /*34*/ array( "cdbch", $factory, "823/156/974" ),
            /*35*/ array( "ckgajc", $factory, "536/492/817" ),
            /*36*/ array( "ggchha", $factory, "231/564/978" ),
            /*37*/ array( "gfbkeg", $factory, "128/534/697" ),
            /*38*/ array( "agfbcbf", $factory, "239/148/765" ),
            /*39*/ array( "ekahijf", $factory, "123/645/789" ),
            /*40*/ array( "hajdjbe", $factory, "789/432/615" ),
            /*41*/ array( "elgililj", $factory, "976/325/814" ),
            /*42*/ array( "chffefif", $factory, "317/629/845" ),
            /*43*/ array( "ilbbihak", $factory, "462/587/319" ),
            /*44*/ array( "abcdefghijkl", $factory, "123/456/789" ),
            /*45*/ array( "hkijbglfaced", $factory, "768/125/493" ),
            /*46*/ array( "dfkbjiechlga", $factory, "256/387/419" ),
            /*47*/ array( "hgfkbidlajce", $factory, "186/745/239" ),
            /*48*/ array( "baciefjhgkdl", $factory, "153/482/796" )
        );
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testFinalResult($commands, $factory, $expected)
    {
        $actual = $this->arrayRotationApp->run($commands, $factory)->toString();
        $this->assertEquals($expected, $actual);
    }
}

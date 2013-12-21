<?php
class Fizzbuzz {
  function __construct($initial) {
    $this->number = $initial;
  }

  function toString() {
    $arr = [];
    for ($i = 1; $i <= $this->number; $i++) {
      $arr[] = $this->getElement($i);
    }
    return implode(', ', $arr);
  }

  function getElement($i) {
    $fizz = new Fizz($i);
    $buzz = new Buzz($fizz);
    return $fizz->getValue().$buzz->getValue();
  }
}

class Fizz {
    public $i;

    function __construct($i) {
      $this->i = $i;
    }

    function getValue() {
      $fizz = ["Fizz", "", ""];
      return $fizz[$this->i%3];
    }

    function remaining() {
      $i = $this->i;
      $remainings = ["", $i, $i];
      return $remainings[$i%3];
    }
}

class Buzz {
    private $i;
    public $buzz;

    function __construct($fizz) {
      $this->i = $fizz->i;
      $remaining = $fizz->remaining();
      $this->buzz = ["Buzz", $remaining, $remaining, $remaining, $remaining];
    }

    function getValue() {
      return $this->buzz[$this->i%5];
    }
}

class FizzBuzzTest extends PHPUnit_Framework_TestCase{
  function testgetElement1ShouldBe1() {
    $dont_care = 0;
    $fizzBuzz = new Fizzbuzz($dont_care);
    $actual = $fizzBuzz->getElement(1);
    $this->assertEquals(1, $actual);
  }
  function testgetElement3ShouldBeFizz() {
    $dont_care = 0;
    $fizzBuzz = new Fizzbuzz($dont_care);
    $actual = $fizzBuzz->getElement(3);
    $this->assertEquals("Fizz", $actual);
  }
  function testgetElement5ShouldBeBuzz() {
    $dont_care = 0;
    $fizzBuzz = new Fizzbuzz($dont_care);
    $actual = $fizzBuzz->getElement(5);
    $this->assertEquals("Buzz", $actual);
  }
  function testgetElement15ShouldBeFizzBuzz() {
    $dont_care = 0;
    $fizzBuzz = new Fizzbuzz($dont_care);
    $actual = $fizzBuzz->getElement(15);
    $this->assertEquals("FizzBuzz", $actual);
  }
  function test1ShouldReturn1() {
    $expect = "1";
    $fizzBuzz = new Fizzbuzz(1);
    $actual = $fizzBuzz->toString();
    $this->assertEquals($expect, $actual);
  }
  function test2ShouldReturn2() {
    $expect = "1, 2";
    $fizzBuzz = new Fizzbuzz(2);
    $actual = $fizzBuzz->toString();
    $this->assertEquals($expect, $actual);
  }
  function test3ShouldReturn12Fizz() {
    $expect = "1, 2, Fizz";
    $fizzBuzz = new Fizzbuzz(3);
    $actual = $fizzBuzz->toString();
    $this->assertEquals($expect, $actual);
  }
  function test5ShouldReturn12Fizz4Buzz() {
    $expect = "1, 2, Fizz, 4, Buzz";
    $fizzBuzz = new Fizzbuzz(5);
    $actual = $fizzBuzz->toString();
    $this->assertEquals($expect, $actual);
  }
  function test15ShouldReturn12Fizz4Buzz14FizzBuzz() {
    $expect = "1, 2, Fizz, 4, Buzz, Fizz, 7, 8, Fizz, Buzz, 11, Fizz, 13, 14, FizzBuzz";
    $fizzBuzz = new Fizzbuzz(15);
    $actual = $fizzBuzz->toString();
    $this->assertEquals($expect, $actual);
  }
}

<?php
  require 'clockTowerBellCounter.php';
  class clockTowerBellCounterTests extends PHPUnit_Framework_TestCase 
  {
  private $clockTowerBellCounter;
  
  protected function setUp()
  {
      $this->clockTowerBellCounter = new clockTowerBellCounter();
  }

  protected function tearDown()
  {
      $this->clockTowerBellCounter = NULL;
  }
  
  public function addDataProvider() {
        return array(
            array('2:00','3:00',5),
            array('14:00','15:00',5),
            array('14:23','15:42',3),
            array('23:00','1:00',24),
        );
    }
 
    /**
     * @dataProvider addDataProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $result = $this->clockTowerBellCounter->countBells($a, $b);
        $this->assertEquals($expected, $result);
    }
}

?>

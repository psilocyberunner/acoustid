<?php

namespace Tests\AcoustId;

use AcoustId\Exceptions\InvalidArgumentException;
use AcoustId\Exceptions\UnexpectedValueException;
use AcoustId\LookUp;
use Tests\TestCase;

/**
 * Class LookUpTest
 *
 * @package Tests\AcoustId
 */
class LookUpTest extends TestCase
{
    /**
     * @var LookUp
     */
    protected $instance;

    /**
     * LookUpTest constructor.
     *
     * @param string|null $name
     * @param array       $data
     * @param string      $dataName
     */
    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    /**
     *
     */
    protected function setUp(): void
    {
        $this->instance = new class(getenv('API_APPLICATION_TOKEN')) extends LookUp {
        };
    }

    /**
     * @throws InvalidArgumentException
     * @throws UnexpectedValueException
     * @covers \AcoustId\LookUp::setMetaData
     */
    public function testSetBadMetaData(): void
    {
        $this->expectException(\TypeError::class);
        $this->instance->setMetaData(false);

        $this->expectException(InvalidArgumentException::class);
        $this->instance->setMetaData([]);

        $this->expectException(UnexpectedValueException::class);
        $this->instance->setMetaData([1, null, []]);
    }

}

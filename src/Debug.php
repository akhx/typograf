<?php

namespace Akh\Typograf;

/**
 * @internal
 */
class Debug
{
    public const STATUS_DEACTIVATE = 'deactivate';

    public const STATUS_MODIFY = 'modify';

    public const STATUS_NOT_MODIFY = 'not modify';

    /**
     * @var string
     */
    private $startValue = '';

    /**
     * @var string
     */
    private $endValue = '';

    /**
     * @var array<array<string, string>>
     */
    private $trace = [];

    public function __construct() {}

    public function setStartValue(string $startValue): void
    {
        $this->startValue = $startValue;
    }

    public function setEndValue(string $endValue): void
    {
        $this->endValue = $endValue;
    }

    public function addTrace(Rule\AbstractRule $rule, string $start, string $end, string $status): void
    {
        $this->trace[] = [
            'rule' => get_class($rule),
            'startText' => $start,
            'endText' => $end,
            'status' => $status,
        ];
    }

    /**
     * @return array<string, array<array<string, string>>|string>
     */
    public function getAllInfo(): array
    {
        return $this->getInfo($this->trace);
    }

    /**
     * @return array<string, array<array<string, string>>|string>
     */
    public function getModifyInfo(): array
    {
        $trace = [];
        foreach ($this->trace as $item) {
            if (self::STATUS_MODIFY === $item['status']) {
                $trace[] = $item;
            }
        }

        return $this->getInfo($trace);
    }

    /**
     * @param array<array<string, string>> $trace
     *
     * @return array<string, array<array<string, string>>|string>
     */
    private function getInfo(array $trace): array
    {
        return [
            'start' => $this->startValue,
            'end' => $this->endValue,
            'trace' => $trace,
        ];
    }
}

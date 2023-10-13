<?php

namespace useCases\Statistic;

class StatisticGet
{
    public function __construct(
        private StatisticService $statisticService
    ) {}

    public function handle()
    {
        return $this->statisticService->getStatistic();
    }
}
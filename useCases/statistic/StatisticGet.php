<?php

namespace statistic;

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
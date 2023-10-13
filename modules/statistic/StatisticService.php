<?php

namespace statistic;

class StatisticService
{
    public function __construct(
        private StatisticRepository $statisticRepository
    ) { }

    public function getStatistic(bool $useCache = true): Object
    {

        // if ($useCache && $hasCache) {}
        return $this->statisticRepository->getStatistic();
    }

    public function updateStatistic(): void
    {
        // create debounced job
    }
}
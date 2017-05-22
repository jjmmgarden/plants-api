<?php
/**
 * Created by PhpStorm.
 * User: sueysok
 * Date: 16/6/23
 * Time: 上午10:05
 */

namespace App\Services\Works\Resources;

use App\Eloquent\KKDates;
use App\Eloquent\KKNews;
use App\Eloquent\KKSeeds;
use App\Services\Repositories\KKNewsRepository;
use App\Services\Repositories\KKSeedsRepository;
use App\Services\Repositories\KKDatesRepository;


/**
 * Trait KKRepositories
 *
 * @package App\Services\Works\Resources
 * @author  sueysok
 */
trait KKRepositories
{

    /**
     * @var KKSeedsRepository
     */
    private $KKSeeds;
    /**
     * @var KKDatesRepository
     */
    private $KKDates;
    /**
     * @var KKNewsRepository
     */
    private $KKNews;

    /**
     * @return KKSeedsRepository
     */
    protected function seedsRepository()
    {
        return $this->KKSeeds ?: $this->KKSeeds = new KKSeedsRepository(new KKSeeds);
    }

    /**
     * @return KKDatesRepository
     */
    protected function datesRepository()
    {
        return $this->KKDates ?: $this->KKDates = new KKDatesRepository(new KKDates);
    }

    /**
     * @return KKNewsRepository
     */
    protected function newsRepository()
    {
        return $this->KKNews ?: $this->KKNews = new KKNewsRepository(new KKNews);
    }

}
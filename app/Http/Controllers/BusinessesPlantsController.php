<?php
/**
 * Created by PhpStorm.
 * User: sueysok
 * Date: 16/2/2
 * Time: 下午2:37
 */

namespace App\Http\Controllers;

use App\Http\Transformers\BusinessesPlantsTransformer;
use App\Services\Works\BusinessesPlants;
use Dingo\Api\Http\Request;
use Illuminate\Routing\Router;


/**
 * Class BusinessesPlantsController
 *
 * @package App\Http\Controllers
 * @author  sueysok
 */
class BusinessesPlantsController extends Controller
{

    /**
     * @var BusinessesPlants
     */
    protected $BusinessesPlants;

    /**
     * @param Request          $Request
     * @param Router           $Route
     * @param BusinessesPlants $BusinessesPlants
     */
    public function __construct(Request $Request, Router $Route, BusinessesPlants $BusinessesPlants)
    {
        parent::__construct($Request, $Route);

        $this->BusinessesPlants = $BusinessesPlants;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function allPlants()
    {
        $businessesId = $this->Route->input('businesses_id');

        $BusinessesCollection = $this->BusinessesPlants->many($businessesId);

        return $this->response()->collection($BusinessesCollection, new BusinessesPlantsTransformer);
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: sueysok
 * Date: 15/11/20
 * Time: 下午5:44
 */

namespace App\Http\Controllers;

use App\Http\Transformers\BusinessesPlantsTransformer;
use App\Http\Transformers\BusinessesTransformer;
use App\Services\Works\Businesses;
use App\Services\Works\BusinessesPlants;
use Dingo\Api\Http\Request;
use Illuminate\Routing\Router;
use LucaDegasperi\OAuth2Server\Authorizer;


/**
 * Class BusinessesController
 *
 * @package App\Http\Controllers
 * @author  sueysok
 */
class BusinessesController extends Controller
{

    /**
     * @var Businesses
     */
    protected $Businesses;

    /**
     * @param Request    $Request
     * @param Router     $Route
     * @param Authorizer $Authorizer
     * @param Businesses $Businesses
     */
    public function __construct(Request $Request, Router $Route, Authorizer $Authorizer, Businesses $Businesses)
    {
        parent::__construct($Request, $Route, $Authorizer);

        $this->Businesses = $Businesses;
    }

    /**
     * @param int $businessesId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function oneBusiness($businessesId)
    {
        $BusinessesEntity = $this->Businesses->one($businessesId);

        return $this->response()->item($BusinessesEntity, new BusinessesTransformer);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function allBusinesses()
    {
        $BusinessesCollection = $this->Businesses->many();

        return $this->response()->collection($BusinessesCollection, new BusinessesTransformer);
    }

}
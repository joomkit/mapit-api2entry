<?php
/**
 * mapitApi2entry plugin for Craft CMS 3.x
 *
 * Call mapit api to store results with entry for later mapping
 *
 * @link      https://www.joomkit.co.uk
 * @copyright Copyright (c) 2021 Alan Sparkes
 */

namespace joomkit\mapitapi2entry\controllers;

use joomkit\mapitapi2entry\MapitApi2entry;

use Craft;
use craft\web\Controller;
use craft\elements\Entry;
use craft\db\Query;
use craft\base\Element;
use craft\db\QueryAbortedException;

use craft\helpers\App;
use craft\queue\BaseJob;
use yii\base\Exception;

/**
 * Default Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    Alan Sparkes
 * @package   MapitApi2entry
 * @since     1.0.0
 */
class DefaultController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['index', 'do-something', 'map-it'];

    // Public Methods
    // =========================================================================

    /**
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/mapit-api2entry/default
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'Welcome to the DefaultController actionIndex() method';

        return $result;
    }

    /**
     * Handle a request going to our plugin's actionDoSomething URL,
     * e.g.: actions/mapit-api2entry/default/do-something
     *
     * @return mixed
     */
    public function actionDoSomething()
    {
        $result = 'Welcome to the DefaultController actionDoSomething() method';

        return $result;
    }

    public function actionMapIt()
    {
        $this->requirePostRequest();
        $request = Craft::$app->getRequest();

        // $body = Craft::$app->request->getRawBody();
        // var_dump($body);


        $entries = Entry::find()    
        ->section('openFunding')
        ->orderBy('lsoaname')
        ->limit(null)
        ->all();

        $OLFentries = Entry::find()    
        ->section('mapitOlfData')
        ->orderBy('title')
        ->limit(3)
        ->all();

        // Craft::$app->getUrlManager()->setRouteParams([
        //     'variable' => $myVariable
        // ]);
    
        // return null;
    
        $variables = array('what'=> 'no');
     return $this->renderTemplate('/mapit-api2entry/results', ['event' => $variables]);
//         return $this->renderTemplate('mapit-api2entry/results', $variables);

        // return $OLFentries[0];
        // $q = (new \craft\db)
        // $query = (new \craft\db\Query())
        // ->select('openFunding')
        // ->indexBy('lsoaname')
        // ->ons($entry->lsoacode)
        // ->all();        

        
        // return $query;
        // $match = Entry::find()->title('E01013372')->section('mapitOlfData')->all();

        // foreach ($entries as $entry) {
  
        //     $match = Entry::find()->section('mapitOlfData')->ons($entry->lsoacode)->all();
      
        //     // foreach ($match as $m){
        //     foreach (\craft\helpers\Db::each($match) as $m) {
        //         echo $entry->lsoacode. ":: has areaid:". $m->mapitAreaId. "<br>";
        //     }
        // }
       
        // $res = "ran query";
        // return $res;
        // $data = craft\helpers\Json::decode($body);
        // return $data;
        
    }

    public function updateEntriesWithCustomInfo()
        {
            /** @var craft\services\Elements $elementService */
            $elementService = Craft::$app->elements;

            // add conditions here
        
            

            $entries = Entry::find()->limit(1500)->all();

            foreach ($entries as $entry) {
                // update your field
                $entry->setFieldValue('my_custom_field', 'some_value');
                $success = $elementService->saveElement($entry);
                if (!$success) {
                    // saving failed, log error or abort
                }
            }
        }
}



class importGeoJson extends BaseJob
{
    // Properties
    // =========================================================================

    /**
     * @var int[] The user Ids
     */
    public $userIds;

    /**
     * @var string the reference number
     */
    public $refNumber;

    // Public Methods
    // =========================================================================

    /**
     * execute
     *
     * @param \craft\queue\QueueInterface|\yii\queue\Queue $queue
     *
     * @throws \Throwable
     * @throws \craft\errors\ElementNotFoundException
     * @throws \yii\base\Exception
     *
     * @author Robin Schambach
     * @since  07.05.2019
     */
    public function execute($queue)
    {
        //$query = Entry::find()->id($this->userIds);

        $query = Entry::find()    
        ->section('mapitOlfData')
        ->orderBy('title')
        ->limit(3)
        ->all();

        $totalElements = $query->count();
        $currentElement = 0;

        $elements = \Craft::$app->getElements();

        try {
            $i = 0;
            foreach ($query->each() as $user) {
                $i ++;
                $this->setProgress($queue, $currentElement++ / $totalElements);

                // $tableValue   = $entry->getFieldValue( 'ons' );
                // $tableValue[] = [
                //     'col0' => $this->refNumber . '-' . $i,
                // ];
                // $user->setFieldValue( 'aktionsRefNumber', $tableValue );

                // /** @var Element $element */
                // $user->setScenario(Element::SCENARIO_ESSENTIALS);
                // if (!$elements->saveElement($user)) {
                //     throw new Exception('Couldn’t save element ' . $user->id . ' (' . get_class($user) . ') due to validation errors.');
                // }
            }
        } catch (QueryAbortedException $e) {
            // Fail silently
        }
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function defaultDescription(): string
    {
        return Craft::t('app', 'Importing geojson for elements', [
            'class' => App::humanizeClass(User::class)
        ]);
    }
}


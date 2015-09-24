<?phpnamespace App\Http\Controllers;use App\Site;use Illuminate\Http\Request;use App\Http\Requests;use Exception;class SiteController extends Controller {    /**     * Display a listing of the resource.     *     * @return \Illuminate\Http\Response     */    public function index() {        try {            $statusCode = 200;            $response = [                'sites' => Site::all()->toArray(),            ];        } catch (Exception $e) {            $statusCode = 400;            $response = [];        } finally {            return response()->json($response, $statusCode);        }    }    /**     * Show the form for creating a new resource.     *     * @return \Illuminate\Http\Response     */    public function create() {        return response()->json([            'csrf' => csrf_token(),        ]);    }    /**     * Store a newly created resource in storage.     *     * @param Requests\StoreSiteRequest|Request $request     * @return \Illuminate\Http\Response     */    public function store(Requests\StoreSiteRequest $request) {        try {            $site = Site::create($request->all());            $statusCode = 200;            $response = ['site' => $site];        } catch (Exception $e) {            $statusCode = 400;            $response = $e->getMessage();        }        return response()->json($response, $statusCode);    }    /**     * Display the specified resource.     *     * @param  int $id     * @return \Illuminate\Http\Response     */    public function show($id) {        try {            /** @var Site $site */            $site = Site::find($id);            $statusCode = 200;            $response = $site->toArray();        } catch (Exception $e) {            $response = [                "error" => "Site doesn`t exists"            ];            $statusCode = 404;        } finally {            return response()->json($response, $statusCode);        }    }    /**     * Show the form for editing the specified resource.     *     * @param  int $id     * @return \Illuminate\Http\Response     */    public function edit($id) {        return response()->json([            'csrf' => csrf_token(),        ]);    }    /**     * Update the specified resource in storage.     *     * @param  \Illuminate\Http\Request $request     * @param  int $id     * @return \Illuminate\Http\Response     */    public function update(Request $request, $id) {        try {//            dd($request->all());            /** @var Site $site */            $site = Site::find($id);            if ($site === null) {                throw new Exception('Site doesn`t exists');            }            $site->fill($request->all());            $site->save();            $statusCode = 200;            $response = ['site' => $site];        } catch (Exception $e) {            $statusCode = 400;//            var_dump($e->getMessage());            $response = $e->getMessage();        }        return response()->json($response, $statusCode);    }    /**     * Remove the specified resource from storage.     *     * @param  int $id     * @return \Illuminate\Http\Response     */    public function destroy($id) {        echo __FUNCTION__ . PHP_EOL;        //    }    /**     * @param $id     * @return \Illuminate\Http\Response     */    public function nginxConfig($id) {        try {            /** @var Site $site */            $site = Site::find($id);            $statusCode = 200;            $response = $site->getNginxConfAttribute();        } catch (Exception $e) {            $response = [                "error" => "Site doesn`t exists"            ];            $statusCode = 404;        } finally {            return response()->json($response, $statusCode);        }    }//    public function visit($site, $url) {//        try {//            /** @var Site $site *///            $site = Site::where('url', '=', $url)->one();//            $statusCode = 200;////////        } catch (Exception $e) {//            $response = "Site doesn`t exists";//            $statusCode = 404;//        } finally {//            return response()->make($response, $statusCode);//        }//    }}
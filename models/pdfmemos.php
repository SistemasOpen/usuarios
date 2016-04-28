<?PHP

namespace app\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;



 
/**
* Class Person
* @package common\models
* @package common\models
* @property int $id unique person identifier
* @property string $name person / user name
* @property array $avatar generated filename on server
* @property string $filename source filename from client
*/
class Pdfmemosupload extends Model
{
    /**
    * @var mixed image the attribute for rendering the file input
    * widget for upload on the form
    */
    public $image;
    public function rules()
    {
        return [
/*
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png','maxFiles'=>1000],
*/
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf, PDF'],
        ];
    }
     public function upload()
    {

        if ($this->validate()) { 
           // print_r(Yii::$app->request->post('Usuario'));exit;
                $this->image->saveAs('memos/p' . $_POST['memos']['id'] .  '.' . $this->image->extension);
              // $this->image->saveAs('uploads/'.$_POST['legajo']."_".$_POST['empresa']. '.' . $this->image);
            return true;
        }
    }
}

?>
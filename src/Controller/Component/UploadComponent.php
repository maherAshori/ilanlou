<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Utility\Text;

/**
 * Upload component
 */
class UploadComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function start($directory, $name, $request, $output){

        $fileName = $request->getData($name)["name"];
        $uploadPath = "uploads/".$directory."/";
        $uploadFile = $uploadPath . $fileName;
        if (move_uploaded_file($this->request->getData($name)["tmp_name"], $uploadFile)) {
            $uuid = Text::uuid();
            $extension = explode(".", $uploadPath . $fileName);
            $newName = $uuid . '.' . $extension[1];
            rename($uploadPath . $fileName, $uploadPath . $newName);
            $output->$name = $newName;
        }

    }

    public function excel($name, $request){

        $fileName = $request->getData($name)["name"];
        $uploadPath = "uploads/";
        $uploadFile = $uploadPath . $fileName;
        if (move_uploaded_file($request->getData($name)["tmp_name"], $uploadFile)) {
            $uuid = Text::uuid();
            $extension = explode(".", $uploadPath . $fileName);
            $newName = $uuid . '.' . $extension[1];
            rename($uploadPath . $fileName, $uploadPath . $newName);
            return true;
        }else{
            return false;
        }
    }

}

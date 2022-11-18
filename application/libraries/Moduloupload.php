<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Moduloupload{

    /*
     *  LOGISTICA - START // APAGAR ESTE CÓDIGO PARA REUTILIZAR O MÓDULO!!
    */
    
    //ASSUMING THE STANDARD 'ID-DOC' FOR THE INPUT FILE ID
    public static function uploadByIdArray($ids = null, $idUpload = null, $documentos_tipos = null, $frota = null, $tipoIdUpload = 'documento_titular_cpfcnpj', $upload_dir = '/uploads/'){
        if(!isset($ids) || $ids == null || sizeof($ids) == 0)return "\nUpload Module - uploadByIdArray(): hasn't received any parameters. \n";
        if(!is_array($ids))return "\nUpload Module - uploadByIdArray(): parameter must be an array. \n";
        if(!isset($documentos_tipos) || $documentos_tipos == null || sizeof($ids) == 0)return "\nUpload Module - uploadByIdArray(): documentos_tipos has not been passed. \n";
        if(!is_array($documentos_tipos))return "\nUpload Module - uploadByIdArray(): documentos_tipos must be an array. \n";

        
        $error = "";
        
        $FILE_TYPES = [
			'application/pdf', //pdf
			'application/msword', //doc
            'application/rtf', //rtf
            'application/vnd.ms-excel', //xls
            'application/vnd.ms-powerpoint', //ppt
            'application/vnd.oasis.opendocument.text', //odt
            'application/vnd.oasis.opendocument.spreadsheet', //ods
            'text/plain' //txt
		];
        $IMAGE_TYPES = [
			'image/jpeg', //jpg/jpeg
			'image/gif', //gif
			'image/png' //png
		];
        
        foreach($documentos_tipos as $doc){
            if(in_array($doc['documentos_tipos_id'], $ids)){
                $inputFileName = $doc['documentos_tipos_id'] . '-doc';
                
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $inputFileType = finfo_file($finfo, $_FILES[$inputFileName]['tmp_name']);
                
                $image = false;
                $canInsert = false;
                $canUpload = false;
                
                if(in_array($inputFileType, $IMAGE_TYPES)){
                    $image = true;
                    $canInsert = true;
                }else if(in_array($inputFileType, $FILE_TYPES)){
                    $image = false;
                    $canInsert = true;
                }else{
                    $error .= "\nUpload Module - uploadByIdArray(): ". $inputFileName ." / O tipo de arquivo não foi aceito.\n";
                }
                
                if($canInsert){
                    if($frota == null){
                        $data = [
                            $tipoIdUpload => $idUpload,
                            'documento_tipo_id' => $doc['documentos_tipos_id']
                            ];
                    }else{
                        $tipoIdUpload = 'documento_frota';
                        $data = [
                            $tipoIdUpload => $frota,
                            'documento_tipo_id' => $doc['documentos_tipos_id']
                            ];
                    }
                    if($image){
                        $data['documento_isimagem'] = 1;
                    }else{
                        $data['documento_isimagem'] = 0;
                    }
                    
                    if($frota == null){
                        $valida = get_instance()->documentosmodel->search($doc['documentos_tipos_id'], $data[$tipoIdUpload]);
                    }else{
                        $valida = get_instance()->documentosmodel->search2($doc['documentos_tipos_id'], $data[$tipoIdUpload]);
                    }
                    if($valida){
                        if($frota == null){
                            $anchor = get_instance()->documentosmodel->getOldDoc($doc['documentos_tipos_id'], $data[$tipoIdUpload]);
                        }else{
                            $anchor = get_instance()->documentosmodel->getOldByPlaca($doc['documentos_tipos_id'], $data[$tipoIdUpload]);
                        }
                        if($image){$img=1;}else{$img=0;}
                        if($anchor['documento_isimagem'] != $img){
                            $anchor['documento_isimagem'] = $img;
                            get_instance()->documentosmodel->updateTypeDoc($anchor['documento_id'], $anchor);
                        }
                        $canUpload = true;
                    }else{
                        if(get_instance()->documentosmodel->insert($data)){
                            $canUpload = true; 
                        }else{
                            $error .= "\nUpload Module - uploadByIdArray(): ". $inputFileName ." / A inserção no banco de dados não obteve sucesso.\n";
                        }
                    }
                }
                
                if($canUpload){
                    if($image){
                        self::uploadImage($inputFileName, $data[$tipoIdUpload] . '_' . $doc['documentos_tipos_id'], $upload_dir);
                    }else{
                        self::uploadFile($inputFileName, $data[$tipoIdUpload] . '_' . $doc['documentos_tipos_id'], $upload_dir);
                    }
                }
            }
        }
        
        if(empty($error)){
            return true;
        }else{
            return $error;
        }
    }
    
    /*
     *  LOGISTICA - END // APAGAR ESTE CÓDIGO PARA REUTILIZAR O MÓDULO!!
    */
    /**
     * @return string
     * RETURNS RESULT FROM UPLOAD OR ERROR
     * 
     * $inputName = name of the input[type=file] where the files were uploaded
     * $newName = name to save the new files as
     * $dir = uploads directory (HAS TO HAVE '/' BEFORE AND AFTER)
     * $saveExtension = extension to create the new files with
     * $quality = compression level. 0- basic compression, 9- maximum file size compression
     * "/imagens/upaload/"
     */
	public static function uploadImage($inputName = null, $newName = null, $dir = null, $saveExtension = '.png', $quality = 50){
		if(!isset($inputName))return "\nUpload Module - uploadImage(): parameter 'inputName' not given \n";
		if(!isset($newName))return "\nUpload Module - uploadImage(): parameter 'newName' not given \n";

		$img = array();

		if(is_array($_FILES[$inputName]['name'])){
			for($i = 0; $i < sizeof($_FILES[$inputName]['name']); $i++){
				array_push($img, 
						array('tmp_name' => $_FILES[$inputName]['tmp_name'],
						'new_name' => $newName . $i,
						'dir' => $_SERVER['DOCUMENT_ROOT'] . $dir,
						'type' => $_FILES[$inputName]['type'],
						'quality' => $quality));
			}
		}else{
			$img['tmp_name'] = $_FILES[$inputName]['tmp_name'];
			$img['new_name'] = $newName;
			$img['dir'] = $_SERVER['DOCUMENT_ROOT'] . $dir;
			$img['type'] = $_FILES[$inputName]['type'];
			
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
            $inputFileType = finfo_file($finfo, $_FILES[$inputName]['tmp_name']);
			
			$img['type'] = $inputFileType;
			$img['quality'] = $quality;
		}

		if(is_array(reset($img))){
		    $result = "";
			foreach($img as $i){
				try{
					$result .= self::imageUploadLogic($i['tmp_name'], $i['dir'].$i['new_name'].$saveExtension, $i['type'], $i['quality']);
				}catch(Exception $ex){
					return $ex;
				}
			}
			return $result;
		}else{
			try{
				$result = self::imageUploadLogic($img['tmp_name'], $img['dir'].$img['new_name'].$saveExtension, $img['type'], $img['quality']);	
    			return $result;
			}catch(Exception $ex){
				return $ex;
			}
		}
	}

    /**
     * SE CONSEGUIR FAZER O UPLOAD COM SUCESSO
     * @return boolean
     * SE NÃO
     * @return string
     * 
     * $inputName = name of the input[type=file] where the files were uploaded
     * $newName = name to save the new files as
     * $dir = uploads directory (HAS TO HAVE '/' BEFORE AND AFTER)
     * 
     */
     
    //TRUE = UPLOAD OK
    //ISSET($ERROR) = UPLOAD FALHOU
	private static function imageUploadLogic($tmpName, $saveTo, $imageType, $quality){
		$ALLOWED_TYPES = [
			'image/jpeg',
			'image/gif',
			'image/png'
		];


		$error = "";

		if(in_array($imageType, $ALLOWED_TYPES)){
			$result = imagejpeg(self::imgAsResource($tmpName), $saveTo, $quality);
			if($result == false){
				$error = "Upload - imageUploadLogic(): there has been an error in trying to upload " . $tmpName . " to " . $saveTo;
			}
		}else{
			$error = "Upload - imageUploadLogic(): File not compatible with supported extensions (jpg, jpeg, png, gif).";
		}

		if(empty($error)){
			return true;
		}else{
			return $error;
		}
	}
    
    //TRUE = UPLOAD OK
    //ISSET($ERROR) = UPLOAD FALHOU
	private static function imgAsResource($input_file){
    	$input = imagecreatefromstring(file_get_contents($input_file));
    	list($width, $height) = getimagesize($input_file);
    	$output = imagecreatetruecolor($width, $height);
    	$white = imagecolorallocate($output, 255, 255, 255);
    	imagefilledrectangle($output, 0, 0, $width, $height, $white);
    	imagecopy($output, $input, 0, 0, 0, 0, $width, $height);
    	return $output;
	}
     
    //TRUE = UPLOAD OK
    //ISSET($ERROR) = UPLOAD FALHOU
	public static function uploadFile($inputName = null, $newName = null, $dir = '/uploads/', $SAVE_AS = '.pdf'){
	    if(!isset($inputName))return "¥nUpload Module - uploadFile(): parameter 'inputName' not given ¥n";
		if(!isset($newName))return "¥nUpload Module - uploadFile(): parameter 'newName' not given ¥n";

		$files = array();

		if(is_array($_FILES[$inputName]['name'])){
			for($i = 0; $i < sizeof($_FILES[$inputName]['name']); $i++){
				array_push($files, 
						array(
						'tmp_name' => $_FILES[$inputName]['tmp_name'],
						'new_name' => $newName . $i,
						'dir' => $_SERVER['DOCUMENT_ROOT'] . $dir,
						'type' => $_FILES[$inputName]['type']
						));
			}
		}else{
			$files['tmp_name'] = $_FILES[$inputName]['tmp_name'];
			$files['new_name'] = $newName;
			$files['dir'] = $_SERVER['DOCUMENT_ROOT'] . $dir;
			$files['type'] = $_FILES[$inputName]['type'];
		}
		
		if(is_array(reset($files))){
		    $result = "";
		    foreach($files as $f){
		        try{
		            $result .= self::fileUploadLogic($f['tmp_name'], $f['dir'].$f['new_name'].$SAVE_AS, $f['type']);
		        }catch(Exception $e){
		            return $e;
		        }
		    }
		    return $result;
		}else{
		    try{
		        $result = self::fileUploadLogic($files['tmp_name'], $files['dir'].$files['new_name'].$SAVE_AS, $files['type']);
		    }catch(Exception $e){
		        return $e;
		    }
		    return $result;
		}
		
	}
	
	//TRUE = UPLOAD OK
    //ISSET($ERROR) = UPLOAD FALHOU
	private static function fileUploadLogic($tmpName, $saveTo, $fileType){
	    $ALLOWED_TYPES = [
			'application/pdf', //pdf
			'application/msword', //doc
            'application/rtf', //rtf
            'application/vnd.ms-excel', //xls
            'application/vnd.ms-powerpoint', //ppt
            'application/vnd.oasis.opendocument.text', //odt
            'application/vnd.oasis.opendocument.spreadsheet', //ods
            'text/plain' //txt
		];
		
		$error = "";
		
		if(in_array($fileType, $ALLOWED_TYPES)){
			$result = file_put_contents($saveTo, file_get_contents($tmpName));
			if($result == false){
				$error = "Upload - fileUploadLogic(): there has been an error in trying to upload " . $tmpName . " to " . $saveTo;
			}
		}else{
			$error = "Upload - fileUploadLogic(): File not compatible with supported extensions (pdf, doc, rtf, xls, ppt, odt, ods, txt).";
		}
		
		if(empty($error)){
			return true;
		}else{
			return $error;
		}
	}
}